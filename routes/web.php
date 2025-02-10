<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    if (Auth::check()) {
        return view('home');
    }

    return view('welcome');
})->name('home');

Route::view('/quotes/all', 'quotes.all')->name('quotes.all');
Route::view('/quotes/source/{source}', 'quotes.source');
Route::view('/quotes/user/{user}', 'quotes.user');

Route::middleware('guest')->group(function() {
    Route::view('/register', 'auth.register')->name('register');
    Route::view('/login', 'auth.login')->name('login');

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function() {
    Route::view('/quotes/my', 'quotes.my')->name('quotes.my');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
