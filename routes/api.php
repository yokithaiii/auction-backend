<?php

use App\Http\Controllers\LotController;
use App\Http\Controllers\Ping\PingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::get('/ping', [PingController::class, 'ping']);

    Route::prefix('lots')->group(function () {
        Route::get('/', [LotController::class, 'index']);
        Route::post('/', [LotController::class, 'store']);
        Route::put('/{id}', [LotController::class, 'update']);
        Route::delete('/{id}', [LotController::class, 'destroy']);
    });
});
