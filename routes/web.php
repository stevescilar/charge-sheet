<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HourController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// hour app routes
Route::get('/hours', [HourController::class, 'index'])->name('hours.main');
Route::get('/hours/create', [HourController::class, 'create'])->name('hours.create');
Route::post('/hours', [HourController::class, 'store'])->name('hours.store');

require __DIR__.'/auth.php';
