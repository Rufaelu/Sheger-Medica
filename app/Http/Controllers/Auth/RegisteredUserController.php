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
        // Validate incoming request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(15)->toDateString()], // At least 15 years old
            'gender' => ['required', 'string', 'in:male,female,other'],
            'checkbox' => ['nullable'], // Checkbox can be nullable
            'specialties' => ['required_with:checkbox', 'string', 'max:255'], // Required with checkbox
            'certificate' => ['required_with:checkbox', 'mimes:pdf', 'max:10240'], // File validation
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
            $userData['specialties'] = $request->specialties;

            // Handle file upload
            $certificate = $request->file('certificate');
            $certificatePath = $certificate->storeAs('certificates', uniqid() . '.' . $certificate->getClientOriginalExtension(), 'public');
            $userData['certificate'] = $certificatePath;
            $userData['approval_status'] = 'pending';
        }

        // Create user in the database
        $user = User::create($userData);



        // Trigger registration event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Redirect with success message
        return redirect()->route('aadmin')->with(
            'success',
            $request->boolean('checkbox')
                ? 'Practitioner registered successfully!'
                : 'User registered successfully!'
        );
    }

    /**
     * Helper function to split name into first and last names.
     */
    private function splitName(string $name): array
    {
        $parts = explode(' ', $name, 2);
        $firstName = $parts[0];
        $lastName = $parts[1] ?? ''; // Default to empty if no last name
        return [$firstName, $lastName];
    }

}
