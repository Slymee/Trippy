<?php

use App\Http\Controllers\API\TripController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('trip')->name('trip.')->group(function () {
    Route::get('/{userId}', [TripController::class, 'index'])->name('index');

    Route::post('/search', [TripController::class, 'searchTrips'])->name('search');

    Route::get('/upcoming-trips/{paginate?}', [TripController::class, 'upcomingTrips'])->name('upcoming.trips');
});
