<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Login_signup_regular');
});

Route::get('proceedApplications/{id}', function (){
    return view('admin_varify_form');
});


Route::post('/login',[authenticate::class, 'login']);