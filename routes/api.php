<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShippingInfoController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Orders
Route::get('/orders', [OrdersController::class, 'index']);
Route::prefix('/order')->group( function() {
    Route::post('/store', [OrdersController::class, 'store']);
    Route::put('/{id}', [OrdersController::class, 'update']);
    Route::delete('/{id}', [OrdersController::class, 'destroy']);
});

// Products
Route::get('/products', [ProductsController::class, 'index']);
Route::prefix('/product')->group( function() {
    Route::post('/store', [ProductsController::class, 'store']);
    Route::put('/{id}', [ProductsController::class, 'update']);
    Route::delete('/{id}', [ProductsController::class, 'destroy']);
});

// Users
Route::get('/customers', [CustomersController::class, 'index']);
Route::prefix('/customer')->group( function() {
    Route::post('/store', [CustomersController::class, 'store']);
    Route::put('/{id}', [CustomersController::class, 'update']);
    Route::delete('/{id}', [CustomersController::class, 'destroy']);
});

// Shipping info
Route::get('/shipping', [ShippingInfoController::class, 'index']);
Route::prefix('/ship')->group( function() {
    Route::post('/store', [ShippingInfoController::class, 'store']);
    Route::put('/{id}', [ShippingInfoController::class, 'update']);
    Route::delete('/{id}', [ShippingInfoController::class, 'destroy']);
});

// Reviews 
Route::get('/reviews', [ReviewController::class, 'index']);
Route::prefix('/review')->group( function() {
    Route::post('/store', [ReviewController::class, 'store']);
    Route::put('/{id}', [ReviewController::class, 'update']);
    Route::delete('/{id}', [ReviewController::class, 'destroy']);
});


//
