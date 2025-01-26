<?php

use App\Http\Controllers\Adminpage;
use App\Http\Controllers\ApproveorReject;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

//Route::get('/', function () {
//    return view('auth/register');
//});
// Route::get('/',[RegisteredUserController::class,'create']);
// Route::get('/', function () {
//     return view('Home', ['role' => 'guest']);
// }
// )->name('Landing');

Route::get('/', [Homepage::class, 'index'])->name('Home');

// Route::get('/admin', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::post('approve/{id}', [ApproveorReject::class, 'approvePractitioner'])->name('approve');
Route::post('reject/{id}', [ApproveorReject::class, 'rejectPractitioner'])->name('reject');


//Route::post('adduser',[register::class,'store'])->name('adduser');



Route::get('/verify/{id}', [Adminpage::class, 'get_user_details'])->name('verify');

Route::post('download/{path}', [download::class, 'download_certificate'])->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/welcome', function () {

//     if(Auth::user()->hasRole('practitioner')){
//         return redirect()->route('practitioner');
//     }
//     else{
//         return redirect()->route('user');
//     }
//     return view('welcome',['user_id'=>Auth::user()->id,'role'=>Auth::user()->role]);
// })->name('welcome')->middleware('auth');

// Admin routes

Route::get('dashboard', [Adminpage::class, 'index'])->middleware(['auth'])->name('admin');


Route::get('post', function () {
    if (Auth::user()->hasRole('Practitioner')) {
        return view('post', ['role' => Auth::user()->role]);
    }
}
)->name('post')->middleware('auth');


//! Herbs routes
Route::get('/herbs', [HerbsController::class, 'index'])->name('herbs');
Route::post('/herbs', [HerbsController::class, 'store'])->name('herbs.store');
Route::get('/herbs/{id}', [HerbsController::class, 'show'])->name('herbs.show');
Route::get('/herbs/{id}/edit', [HerbsController::class, 'edit'])->name('herbs.edit');
Route::put('/herbs/{id}', [HerbsController::class, 'update'])->name('herbs.update');
Route::delete('/herbs/{id}', [HerbsController::class, 'destroy'])->name('herbs.destroy');

//! Remedies routes
Route::get('/remedies', [RemediesController::class, 'index'])->name('remedies');
Route::post('/remedies', [RemediesController::class, 'store'])->name('remedies.store');
Route::get('/remedies/{id}', [RemediesController::class, 'show'])->name('remedies.show');
Route::get('/remedies/{id}/edit', [RemediesController::class, 'edit'])->name('remedies.edit');
Route::put('/remedies/{id}', [RemediesController::class, 'update'])->name('remedies.update');
Route::delete('/remedies/{id}', [RemediesController::class, 'destroy'])->name('remedies.destroy');



//! Admin Routes
// Route::get('admin_profile')






require __DIR__ . '/auth.php';
