<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::redirect('/', '/home');



Route::middleware(['auth'])->prefix('admin')->group(function () {
  Route::get('home', [HomeController::class, 'index'])->name('home');

  Route::resource('users', UserController::class);

  Route::get('users/profile/{user}', function ($id) {
    if (!$id) {
      return back();
    }

    $user = \App\Models\User::findOrFail($id);

    return view('users.show', compact('user'));
  })->name('users.profile');
});
