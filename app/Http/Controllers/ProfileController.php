<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Remedies;
use App\Models\Herbs;
use App\Models\Articles;
use App\Models\User;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return $this->practitioner();
    }

    /**
     * Update the user's profile information.
     */

     public function user(){

        return view('profile.user',[
            'user' => Auth::user(),
        ]);
     }

     public function practitioner(){
        $user=Auth::user();
        $remedies = Remedies::with('herbs')->where('posted_by',$user->id)->get();

        $herbs=Herbs::where('posted_by',$user->id)->get();
        $articles=Articles::where('author_id',$user->id)->get();

        return view('profile.practitioner',['user'=>$user,'remedies'=>$remedies,'herbs'=>$herbs,'articles'=>$articles]);

    }

    public function profile($id){
        if(Auth::user()->user_id != $id){
            $user=User::findOrFail($id);
            $remedies = Remedies::with('herbs')->where('posted_by',$user->user_id)->get();

            $herbs=Herbs::where('posted_by',$user->user_id)->get();
            $articles=Articles::where('author_id',$user->user_id)->get();
            return view('profile.practitioner',['user'=>$user,'remedies'=>$remedies,'herbs'=>$herbs,'articles'=>$articles]);
        }
        else{
            return redirect()->route('practitioner');
        }

    }

    public function update(Request $request): RedirectResponse
    {
        // Validate the request data
        $validated = $request->validate([
            'bio' => 'nullable|string|max:1000', // Bio can be optional but must be a string and under 1000 characters
            'specialties' => 'nullable|string|max:255', // Specialties can be optional but should be a string and max 255 characters
'email' => 'required|email|max:255|unique:users,email,' . $request->user()->user_id . ',user_id', // Email is required, must be valid, and unique excluding the current user's email
            'last_name' => 'nullable|string|max:100', // Last name is optional but should be a string and max 100 characters
            'first_name' => 'string|max:100', // First name is optional but should be a string and max 100 characters
            'Pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation for profile picture (optional)
        ]);

        $user = $request->user();

        // Only update the profile picture if a new one is uploaded
        if ($request->hasFile('Pic')) {
            $Path = public_path('images/Profile/'); // Define the public/Profile path

            if (!File::exists($Path)) {
                File::makeDirectory($Path, 0755, true); // Create the directory with permissions
            }
            $image = $request->file('Pic');
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension(); // Generate a unique file name
            $image->move($Path, $fileName); // Move the file to the directory
            dump($fileName);
            dump($Path);
            dump($image);
            dump($validated);
            sleep(30);

            $validated['profile_picture'] = 'images/Profile/' . $fileName;
        }

        // Update the user profile with the validated data
        $user->update($validated);

        // Redirect back with a success message
        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user_id = $request->input('user_id'); // Retrieve the user_id from the request

        if(Auth::user()->user_id == $user_id ){
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
            $request->session()->regenerateToken();


        }
        elseif( Auth::user()->hasRole('admin')){

            $user=User::findOrFail($user_id);
            $user->delete();

        }
        return Redirect::to('/');
    }
}
