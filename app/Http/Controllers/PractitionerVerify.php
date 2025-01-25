<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PractitionerVerify extends Controller
{
    public function index( string $id){

        $user = User::findOrFail($id);
        return view('admin_varify_form',['user'=>$user]);
    }
}
