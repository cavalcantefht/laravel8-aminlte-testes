<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;



Route::redirect('/', '/login');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::resource('users', UserController::class);
    });
});
