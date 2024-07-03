<?php

use App\Http\Controllers\Todo;
use App\Http\Controllers\PageController;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
Route::get('/home/{page}', [PageController::class, 'show'])->middleware('auth', 'is_yourPage')->name('home');
