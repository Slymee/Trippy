<?php

use App\Http\Controllers\API\TripController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('trip')->name('trip.')->group(function () {
    Route::get('/{userId}', [TripController::class, 'index'])->name('index');
});
