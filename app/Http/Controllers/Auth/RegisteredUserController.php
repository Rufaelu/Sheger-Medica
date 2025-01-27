<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

 public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(15)->toDateString()], // At least 15 years old
        'gender' => ['required', 'string', 'in:male,female,other'],
        'checkbox' => ['nullable'], // Checkbox can be nullable
        'specialty' => ['required_with:checkbox', 'string', 'max:255'], // Use 'specialty' instead of 'specialties'
        'certificate' => ['required_with:checkbox', 'file', 'mimes:pdf', 'max:9048'], // Validate the file only if checkbox is checked
    ]);

    // Split name into first and last name
    $fullname = $this->splitName($request->name);
    $fname = $fullname[0];
    $lname = $fullname[1] ?? '';

    // Prepare user data
    $userData = [
        'first_name' => $fname,
        'last_name' => $lname,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'approval_status' => $request->boolean('checkbox') ? 'pending' : null, // Default approval status
        'dob' => $request->dob,
        'gender' => $request->gender,
    ];

    if ($request->boolean('checkbox')) {
        $userData['specialties'] = $request->specialty; // Ensure 'specialty' is correctly referenced

        // Handle file upload
        if ($request->hasFile('certificate')) {
            $certificatesPath = public_path('images/certificates'); // Define the public/certificates path

            // Check if the directory exists, and create it if it doesn't
            if (!File::exists($certificatesPath)) {
                File::makeDirectory($certificatesPath, 0755, true); // Create the directory with permissions
            }

            // Save the file in the public/certificates directory
            $certificate = $request->file('certificate');
            $fileName = uniqid() . '.' . $certificate->getClientOriginalExtension(); // Generate a unique file name
            $certificate->move($certificatesPath, $fileName); // Move the file to the directory

            $userData['certificate'] = 'images/certificates/' . $fileName;
        }
    }
    // Create user in the database
    $user = User::create($userData);

    // Trigger registration event
    event(new Registered($user));

    // Log the user in
    Auth::login($user);

    // Redirect with success message
    return redirect()->route('admin');

}



    /**
     * Helper function to split name into first and last names.
     */
   public static function splitName(string $name): array
    {
        $parts = explode(' ', $name, 2);
        $firstName = $parts[0];
        $lastName = $parts[1] ?? ''; // Default to empty if no last name
        return [$firstName, $lastName];
    }

}
