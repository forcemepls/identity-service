<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/**
    * Блок авторизации/регистрации
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware(['auth:api']);
Route::post('/refresh', [AuthController::class, 'refresh'])->middleware(['auth:api']);

/**
    * Блок профиля
*/
Route::middleware('auth:api')->group(function(){
    Route::get('/profile', [ProfileController::class, 'get_profile']);
    Route::put('/profile', [ProfileController::class, 'update_profile']);
});