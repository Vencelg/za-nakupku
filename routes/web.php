<?php

use App\Http\Controllers\Web\AuthenticationController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\ListingController;
use App\Http\Controllers\Web\ListingImageController;
use App\Http\Controllers\Web\PaymentController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/categories', [CategoryController::class, 'index'])->name('category');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category.detail');
Route::post('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
Route::get('/categories/{id}/delete', [CategoryController::class, 'softDelete'])->name('category.softDelete');
Route::get('/categories/{id}/delete/force', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('/listings', [ListingController::class, 'index'])->name('listing');
Route::get('/listings/create', [ListingController::class, 'create'])->name('listing.create');
Route::post('/listings/store', [ListingController::class, 'store'])->name('listing.store');
Route::get('/listings/{id}', [ListingController::class, 'show'])->name('listing.detail');
Route::post('/listings/{id}', [ListingController::class, 'update'])->name('listing.update');
Route::get('/listings/{id}/restore', [ListingController::class, 'restore'])->name('listing.restore');
Route::get('/listings/{id}/delete', [ListingController::class, 'softDelete'])->name('listing.softDelete');
Route::get('/listings/{id}/delete/force', [ListingController::class, 'delete'])->name('listing.delete');

Route::post('/listings/{listingId}/image/add', [ListingImageController::class, 'store'])->name('listing-image.store');
Route::get('/listings/{listingId}/image/{imageId}/delete', [ListingImageController::class, 'delete'])->name('listing-image.delete');

Route::get('/payments', [PaymentController::class, 'index'])->name('payment');
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payments/store', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('payment.detail');
Route::post('/payments/{id}', [PaymentController::class, 'update'])->name('payment.update');
Route::get('/payments/{id}/restore', [PaymentController::class, 'restore'])->name('payment.restore');
Route::get('/payments/{id}/delete', [PaymentController::class, 'softDelete'])->name('payment.softDelete');
Route::get('/payments/{id}/delete/force', [PaymentController::class, 'delete'])->name('payment.delete');

Route::get('/users', [UserController::class, 'index'])->name('user');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('user.detail');
Route::post('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/users/{id}/restore', [UserController::class, 'restore'])->name('user.restore');
Route::get('/users/{id}/delete', [UserController::class, 'softDelete'])->name('user.softDelete');
Route::get('/users/{id}/delete/force', [UserController::class, 'delete'])->name('user.delete');

Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');

Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
