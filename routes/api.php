<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\UtilizationController;
use App\Http\Controllers\ReadingController;

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/calculator/calculate', [CalculatorController::class, 'calculate']);
    Route::apiResource('/calculator/tariffs', TariffController::class);
    Route::get('/calculator/utilizations', [UtilizationController::class, 'index']);
    Route::get('/calculator/utilizations/{serviceID}', [UtilizationController::class, 'show']);
    Route::get('/calculator/readings', [ReadingController::class, 'getLastReading']);
    Route::post('/logout', [AuthController::class, 'logout']);
});