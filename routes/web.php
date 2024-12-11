<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('vacature-overzicht', ApplicationController::class);

Route::resource('admin-overzicht', AdminController::class);

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/application', [ModalController::class, 'showModal'])->name('application.index');
Route::get('/application/filter', [ModalController::class, 'filterResults'])->name('filter.results');

Route::get('email/send/{application}', [EmailController::class, 'sendEmail'])->name('email.send');
Route::get('email/register/{application}', [EmailController::class, 'registerEmail'])->name('email.register');
Route::get('email/complete-registration', [EmailController::class, 'completeRegistration'])->name('complete-registration');
Route::get('email/check-queue', [EmailController::class, 'checkQueue'])->name('check-queue');
Route::get('/error', function () {
    return view('error');
})->name('error.page');

Route::resource('application', ApplicationController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//company routes
Route::resource('company', \App\Http\Controllers\companyController::class);


require __DIR__.'/auth.php';


