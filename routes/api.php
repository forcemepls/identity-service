<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Публичные
Route::get('/users/{user_id}', [ProfileController::class, 'show_profile']);

// Авторизация
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Защищённые
Route::middleware('auth:api')->group(function(){
    Route::get('/me', [ProfileController::class, 'get_profile']);
    Route::put('/profile', [ProfileController::class, 'update_profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});