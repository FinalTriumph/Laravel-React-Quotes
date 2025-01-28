<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuoteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('quotes', QuoteController::class)->only([
    'index',
]);

Route::apiResource('quotes', QuoteController::class)->only([
    'store',
])->middleware('auth:sanctum');

Route::prefix('quotes')->group(function () {
    Route::get('/random', [QuoteController::class, 'random']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::get('/my', [QuoteController::class, 'my']);
    });
});
