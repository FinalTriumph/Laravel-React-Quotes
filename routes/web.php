<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    if (Auth::check()) {
        return view('home');
    }

    return view('welcome');
})->name('home');

Route::view('/quotes/all', 'quotes.all')->name('quotes.all');
Route::view('/quotes/source/{source}', 'quotes.source');
// Route::view('/quotes/user/{user}', 'quotes.user');
Route::get('/quotes/user/{user}', [UserController::class, 'userQuotesPage']);

Route::middleware('guest')->group(function() {
    Route::view('/register', 'auth.register')->name('register');
    Route::view('/login', 'auth.login')->name('login');

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function() {
    Route::view('/quotes/my', 'quotes.my')->name('quotes.my');

    Route::prefix('user')->group(function () {
        Route::view('/profile', 'user.profile')->name('user.profile');

        Route::view('/edit', 'user.edit')->name('user.edit');
        Route::patch('/update', [UserController::class, 'update'])->name('user.update');
    
        Route::view('/change-password', 'user.change-password')->name('user.password.change');
        Route::patch('/change-password', [UserController::class, 'changePassword'])->name('user.password.update');

        Route::view('/delete-profile', 'user.delete-profile')->name('user.profile.delete');
        Route::delete('/delete-profile', [UserController::class, 'deleteProfile'])->name('user.delete');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
