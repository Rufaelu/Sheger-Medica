<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class authenticate extends Controller
{

    public function check(){
        $user=Users::where('email', 'jane.smith@example.com')->first();
        return $user ;
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        // Retrieve user by email
         $user = Users::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->withErrors(['email' => 'Invalid email or password.']);
        }
        // Verify the password
        if (bin2hex($request->password)!=  $user->password) {
            // return back()->withErrors(['password' => 'Invalid email or password.']);
            return "wrong Pss";
        }
      

        // If authentication passes, store user data in session
        session([
            'user_id' => $user->user_id,
            'email' => $user->email,
            'role' => $user->role,
            'first_name'=>$user->first_name,
            'last_name'=>$user->last_name,
        ]);


        //  return view('admin', ['user' => $user]);
         return redirect()->route('admin')->with('success', 'Data saved successfully!');


       
    }
}
