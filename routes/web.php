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
    Route::get('/', [\App\Http\Controllers\ApplcationsController::class, 'show']);

    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

    Route::view('/make_applications',  'pages/make_applications');

    Route::post('/applications', [\App\Http\Controllers\ApplcationsController::class, 'create']);

    Route::middleware(['admins'])->group( function (){
        Route::get('/admin_panel', [\App\Http\Controllers\ApplcationsController::class, 'index']);
        Route::patch('/application/{id}', [\App\Http\Controllers\ApplcationsController::class, 'update']);
    });
});

Route::view('/login', 'pages/login');
Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');

Route::view('/signup', 'pages/signup');
Route::post('/signup', [App\Http\Controllers\UserController::class, 'signup'])->name('signup');
