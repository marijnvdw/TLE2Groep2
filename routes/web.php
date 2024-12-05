<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

//Route::get('/vacature-overzicht', function () {
//    return view('ApplicationController');
//})->name('vacatures');

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/application', [ModalController::class, 'showModal'])->name('application.index');
Route::get('/application/filter', [ModalController::class, 'filterResults'])->name('filter.results');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
