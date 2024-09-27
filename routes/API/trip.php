<?php

use App\Http\Controllers\API\RecommendationController;
use App\Http\Controllers\API\TripController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('trip')->name('trip.')->group(function () {
    Route::get('/{userId}', [TripController::class, 'index'])->name('index');

    Route::post('/search', [TripController::class, 'searchTrips'])->name('search');

    Route::get('/upcoming-trips/{paginate?}', [TripController::class, 'upcomingTrips'])->name('upcoming.trips');

    Route::post('/create-trip', [TripController::class, 'store'])->name('create.trip');

    Route::get('/details/{tripId}', [TripController::class, 'show'])->name('details');

    Route::post('/{tripId}/trip-enroll', [TripController::class, 'enrollUserInTrip'])->name('trip.enrollment');

    Route::post('/{tripId}/trip-leave', [TripController::class, 'leaveUserInTrip']);

    Route::get('/recommendation/{tripId}', [RecommendationController::class, 'index'])->name('trip.recommendation.service');
});
