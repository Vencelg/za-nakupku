<?php

use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\VerificationController;
use App\Http\Controllers\Controller;
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

Route::group(['prefix' => 'user'], function () {
    Route::post('register', [AuthenticationController::class, 'register']);
    Route::post('login', [AuthenticationController::class, 'login']);
});

Route::group(['prefix' => 'email/verify', 'middleware' => ['auth:sanctum', 'throttle:6,1']], function () {
    Route::get('{id}/{hash}', [VerificationController::class, 'verify'])
        ->name('verification.verify');

    Route::post('resend', [VerificationController::class, 'resend'])
        ->name('verification.send');
});

Route::apiResources([
    'categories' => CategoryController::class,
]);
