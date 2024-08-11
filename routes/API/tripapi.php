<?php

use App\Http\Controllers\API\TripController;
use Illuminate\Support\Facades\Route;

Route::prefix('trip')->name('trip.')->group(function () {
    Route::get('/{userId}', [TripController::class, 'index'])->name('index');
})->middleware('auth:sanctum');