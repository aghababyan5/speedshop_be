<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Products\DestroyProductController;
use App\Http\Controllers\Products\GetAllProductsController;
use App\Http\Controllers\Products\ShowProductController;
use App\Http\Controllers\Products\GetUserProductsController;
use App\Http\Controllers\Products\StoreProductController;
use App\Http\Controllers\Products\UpdateProductController;
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

Route::group(['middleware' => 'api'], function () {
    Route::post('/register', RegisterController::class); // tested, mnuma nkarner etaly chisht arvi vorpes fayl
    Route::get('/all-products', GetAllProductsController::class); //tested
    Route::get('/product/{id}', ShowProductController::class); // tested
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/logout',  LogoutController::class); // tested
        Route::post('/product', StoreProductController::class); // tested
        Route::get('/user-products/{id}', GetUserProductsController::class); // tested, bayc harcakana senc petqa arvi te user_idn sovorakan dzevov petqa uxarkvi
        Route::put('/product', UpdateProductController::class); // tested
        Route::delete('/product/{id}', DestroyProductController::class); // tested
    });
});
