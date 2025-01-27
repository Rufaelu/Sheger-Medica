<?php

use App\Http\Controllers\Adminpage;
use App\Http\Controllers\ApproveorReject;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\HerbsController;
use App\Http\Controllers\RemediesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Practitionerpage;
use App\Models\Herbs;


Route::get('/', [Homepage::class, 'index'])->name('Home');



Route::post('approve/{id}', [ApproveorReject::class, 'approvePractitioner'])->name('approve');
Route::post('reject/{id}', [ApproveorReject::class, 'rejectPractitioner'])->name('reject');





Route::get('/verify/{id}', [Adminpage::class, 'get_user_details'])->name('verify');

Route::post('download/{path}', [download::class, 'download_certificate'])->middleware('auth');
Route::get('/practitioner', function(){
    if(Auth::user()->hasRole('practitioner')){
        return redirect()->route('practitioner');
    }
    else{
        return redirect()->route('user');
    }
})->name('profile')->middleware('auth');

Route::middleware('auth')->group(function () {


Route::get('/practitioner', [ProfileController::class, 'practitioner'])->name('practitioner');
Route::get('/user', [ProfileController::class, 'user'])->name('user');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('dashboard', [Adminpage::class, 'index'])->middleware(['auth'])->name('admin');


Route::get('post', [HerbsController::class,'populatePost'])->name('post')->middleware('auth');


//! Herbs routes
Route::get('/herbs', [HerbsController::class, 'index'])->name('herbs.all');
Route::post('/herbs', [HerbsController::class, 'store'])->name('herbs.store');
Route::get('/herbs/{id}', [HerbsController::class, 'show'])->name('herbs.show');
Route::get('/herbs/{id}/edit', [HerbsController::class, 'edit'])->name('herbs.edit');
Route::put('/herbs/{id}', [HerbsController::class, 'update'])->name('herbs.update');
Route::delete('/herbs/{id}', [HerbsController::class, 'destroy'])->name('herbs.destroy');

//! Remedies routes
Route::get('/remedies', [RemediesController::class, 'all'])->name('remedies.all');
Route::post('/remedies', [RemediesController::class, 'store'])->name('remedies.store');
Route::get('/remedies/{id}', [RemediesController::class, 'show'])->name('remedies.show');
Route::get('/remedies/{id}/edit', [RemediesController::class, 'edit'])->name('remedies.edit');
Route::put('/remedies/{id}', [RemediesController::class, 'update'])->name('remedies.update');
Route::delete('/remedies/{id}', [RemediesController::class, 'destroy'])->name('remedies.destroy');


//! Articles routes
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
Route::post('/articles', [ArticlesController::class, 'store'])->name('articles.store');
Route::get('/articles/{id}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/articles/{id}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{id}', [ArticlesController::class, 'update'])->name('articles.update');
Route::delete('/articles/{id}', [ArticlesController::class, 'destroy'])->name('articles.destroy');

//! Practitioner routes
Route::get('/practitioner/{id}', [ProfileController::class, 'profile'])->name('practitioner.show');
Route::get('/practitioners', [Practitionerpage::class, 'index'])->name('practitioners');
//! Admin Routes
// Route::get('admin_profile')



Route::view('contact_us', 'contact_us')->name('contact_us');
Route::view('about_us', 'about_us')->name('about_us');



require __DIR__ . '/auth.php';
