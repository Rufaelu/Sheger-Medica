<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authenticate;

Route::get('/', function () {
    return view('Login_signup_regular');
})->name('/l');

Route::get('proceedApplications/{id}', function (){
    return view('admin_varify_form');
});

Route::get('admin',function(){
    return view('admin');
})->name('admin');

Route::post('/login',[authenticate::class, 'login'])->name('log');



Route::get('/about us',function (){
return view('about_us');
})->name('about us');
Route::get('/contact us',function (){
return view('FINAL CONTACT US/contact_us');
})->name('contact us');


Route::get('data',[authenticate::class,'check']);