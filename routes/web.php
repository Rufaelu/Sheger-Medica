<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ApproveorReject;

//Route::get('/', function () {
//    return view('auth/register');
//});
Route::get('/',[RegisteredUserController::class,'create']);

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('approve',[ApproveorReject::class,'approvePractitioner'])->name('approve');
Route::post('reject',[ApproveorReject::class,'rejectPractitioner'])->name('reject');
//Route::post('adduser',[register::class,'store'])->name('adduser');

Route::get('/admindashoard',function (){
    return view('admin');
})->middleware(['auth', 'verified'])->name('aadmin');

Route::get('/verify/{id}',[\App\Http\Controllers\PractitionerVerify::class,'index'])->name('verify');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
