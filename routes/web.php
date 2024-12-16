<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::get('/', function () {
        Route::redirect('/applications');
    });

    Route::view('/applications', 'pages/applications')->name('dashboard');
    Route::get('/logout', [\App\Http\Controllers\UserController::class.'logout'])->name('logout');
});

Route::view('/login', 'pages/login');
Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');

Route::view('/signup', 'pages/signup');
Route::post('/signup', [App\Http\Controllers\UserController::class, 'signup'])->name('signup');
