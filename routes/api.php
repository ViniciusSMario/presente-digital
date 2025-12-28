<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GiftController;
use App\Http\Controllers\Api\PaymentController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/gifts/{slug}', [GiftController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/user/gifts', [GiftController::class, 'index']);
    Route::post('/gifts', [GiftController::class, 'store']);
    Route::post('/gifts/{gift}/checkout', [PaymentController::class, 'checkout']);
});
