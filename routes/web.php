<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'is_admin'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
Route::get('/home/{page}', [PageController::class, 'show'])->middleware('auth', 'is_yourPage')->name('home');
Route::get('/todo/{user}', [PageController::class, 'completed'])->middleware('auth')->name('completed');
Route::delete('/todo/{todo}', [TodoController::class, 'destroy'])->middleware('auth')->name('todo.delete');
