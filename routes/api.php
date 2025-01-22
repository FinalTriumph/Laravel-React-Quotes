<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Only for testing, will be deleted later
Route::get('/test', function (Request $request) {
    return response()->json([
        'response' => 'test'
    ]);
});

// Only for testing, will be deleted later
Route::post('/test', function (Request $request) {
    // Validate
    $fields = $request->validate([
        'author' => 'required',
        'quote' => 'required',
    ]);

    return response()->json([
        'fields' => $fields
    ]);
});
