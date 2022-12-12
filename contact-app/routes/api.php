<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('heartbeat', [\App\Http\Controllers\HealthCheckController::class, 'healthCheck']);

Route::prefix('contact')->group(function () {
    Route::get('/', [\App\Http\Controllers\ContactController::class, 'index']);

    Route::post('/store', [\App\Http\Controllers\ContactController::class, 'store']);
    Route::get('/show/{contactUuid}', [\App\Http\Controllers\ContactController::class, 'show']);
    Route::put('/update/{contactUuid}', [\App\Http\Controllers\ContactController::class, 'update']);
    Route::delete('/delete/{contactUuid}', [\App\Http\Controllers\ContactController::class, 'delete']);

    Route::prefix('/{contactUuid}/information')->group(function () {
        Route::post('/store', [\App\Http\Controllers\InformationController::class, 'store']);
    });
});

Route::post('/get-contacts-from-location', [\App\Http\Controllers\InformationController::class, 'getNumberCountFromLocation']);
