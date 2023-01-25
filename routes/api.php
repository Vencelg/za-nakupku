<?php

use App\Events\ListingPriceEvent;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\FavouritesController;
use App\Http\Controllers\API\ListingController;
use App\Http\Controllers\API\ListingImageController;
use App\Http\Controllers\API\MainPageController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\SearchController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VerificationController;
use App\Http\Controllers\Controller;
use App\Services\ResponseService;
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

Route::group(['prefix' => 'auth'], function () {
    Route::get('user', [AuthenticationController::class, 'currentUser'])
        ->middleware('auth:sanctum');
    Route::post('register', [AuthenticationController::class, 'register']);
    Route::post('login', [AuthenticationController::class, 'login']);
    Route::get('logout', [AuthenticationController::class, 'logout'])
        ->middleware('auth:sanctum');
    Route::get('user/favourite', [AuthenticationController::class, 'favouriteListings'])
        ->middleware('auth:sanctum');


    Route::group(['prefix' => 'password/reset'], function () {
        Route::post('resend', [AuthenticationController::class, 'sendPasswordReset']);
        Route::post('', [AuthenticationController::class, 'passwordReset']);
    });

    Route::group(['prefix' => 'email/verify', 'middleware' => ['throttle:6,1']], function () {
        Route::get('{id}/{hash}', [VerificationController::class, 'verify'])
            ->name('verification.verify');

        Route::post('resend', [VerificationController::class, 'resend'])
            ->middleware('auth:sanctum')
            ->name('verification.send');
    });
});

Route::apiResources([
    'categories' => CategoryController::class,
    'listings' => ListingController::class,
    'reviews' => ReviewController::class
]);

Route::post('listings/{id}/image/add', [ListingImageController::class, 'store']);
Route::post('listings/{id}/image/delete', [ListingImageController::class, 'delete']);
Route::get('listings/status/all', [ListingController::class, 'checkAllListingStatuses']);

Route::get('users/{id}', [UserController::class, 'show']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::patch('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);
Route::get('user/favourite/{listingId}/add', [FavouritesController::class, 'addFavourite']);
Route::delete('user/favourite/{listingId}/delete', [FavouritesController::class, 'delFavourite']);
Route::get('user/{id}/listings', [UserController::class, 'listingsUserBidsOn']);

Route::get('mainpage/{maxPrice}', [MainPageController::class, 'index']);
Route::get('search/{search}', [SearchController::class, 'index']);

Route::post('payments', [PaymentController::class, 'store']);

Route::post('playground', function (Request $request) {
   return response()->json([
       'headers' => $request->headers,
       'body' => $request->all()
   ]);
});

Route::fallback(function () {
    return ResponseService::response([
        'message' => 'HTTP Route not found. Check your URL',
        'url' => url()->current()
    ], 404, true);
});
