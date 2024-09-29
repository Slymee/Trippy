<?php

use App\Http\Controllers\API\UserAuthController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');


Route::middleware('auth:sanctum')->prefix('profile')->name('profile.')->group(function () {
    Route::get('/{userId}', [UserController::class, 'index'])->name('index');
    Route::patch('/{userId}/update', [UserController::class, 'update'])->name('update');
});
