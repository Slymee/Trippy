<?php

use App\Http\Controllers\API\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');
