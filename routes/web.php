<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('vacature-overzicht', ApplicationController::class);

Route::resource('admin-overzicht', AdminController::class);
Route::delete('/admin-overzicht/{id}', [AdminController::class, 'destroy'])->name('admin-overzicht.destroy');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/application/filter', [ApplicationController::class, 'index'])->name('applications.filter');
Route::resource('application', ApplicationController::class);


Route::get('email/send/{application}', [EmailController::class, 'sendEmail'])->name('email.send');
Route::get('email/register/{application}', [EmailController::class, 'registerEmail'])->name('email.register');
Route::get('email/complete-registration', [EmailController::class, 'completeRegistration'])->name('complete-registration');
Route::get('email/check-queue', [EmailController::class, 'checkQueue'])->name('check-queue');
Route::get('/error', function () {
    return view('error');
})->name('error.page');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//company routes
Route::get('/companies', function () {
    return view('companies');
})->name('companies');

require __DIR__ . '/auth.php';


