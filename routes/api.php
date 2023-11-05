<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('alliance', [\App\Http\Controllers\Api\AllianceController::class, 'index']);
    Route::post('alliance/store', [\App\Http\Controllers\Api\AllianceController::class, 'store']);
});

Route::post('user/login', [\App\Http\Controllers\Api\UserController::class, 'login']);
Route::post('user/logout', [\App\Http\Controllers\Api\UserController::class, 'logout']);