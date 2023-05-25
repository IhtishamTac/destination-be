<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('v1/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('logout', [AuthController::class, 'logout']);
            Route::get('me', [AuthController::class, 'me']);
        });
    });
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::resource('destination', DestinationController::class);
        Route::post('destinations/{id}', [DestinationController::class, 'update']);
    });
    Route::get('destinations',[DestinationController::class, 'index']);
    Route::get('destinations/{id}',[DestinationController::class, 'show']);
    Route::get('allUser', [AuthController::class, 'allUser']);
});
