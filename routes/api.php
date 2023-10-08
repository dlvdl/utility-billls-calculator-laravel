<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\UtilizationController;

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/calculator/calculate', [CalculatorController::class, 'calculate']);
    Route::apiResource('/calculator/tariffs', TariffController::class);
    Route::apiResource('/calculator/utilizations', UtilizationController::class);
    Route::get('/calculator/utilization/{service?}/{order?}', [UtilizationController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);
});