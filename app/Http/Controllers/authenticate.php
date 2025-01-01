<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class authenticate extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
         
        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user(); // Get the authenticated user

            return view('admin' ,['user'=>$user]);
        }
        return back()->withErrors([
            'error' => 'Invalid email or password.',
        ])->withInput();
    }
}
