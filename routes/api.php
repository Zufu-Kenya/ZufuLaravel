<?php

use App\Http\Controllers\API\BlogAPIController;
use App\Http\Controllers\API\BrandAPIController;
use App\Http\Controllers\API\CategoryAPIController;
use App\Http\Controllers\API\ConditionAPIController;
use App\Http\Controllers\API\CustomerAPIController;
use App\Http\Controllers\API\ProductAPIController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('customer')->group(function () {
        Route::post('/register', [CustomerAPIController::class, 'register']);
        Route::post('/login', [CustomerAPIController::class, 'login']);

        Route::group([], function () {
            Route::get('/logout', [CustomerAPIController::class, 'logout']);
            Route::put('/{customer}', [CustomerAPIController::class, 'update']);
            Route::delete('/{customer}', [CustomerAPIController::class, 'destroy']);
        });
    });
});

Route::controller(ProductAPIController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/products-categories/{categoryName}', 'getByCategory');
    Route::get('/products-brands/{brandName}', 'getByBrand');
    Route::get('/products-conditions/{conditionName}', 'getByCondition');
});

Route::controller(ConditionAPIController::class)->group(function () {
    Route::get('/conditions', 'index');
});

Route::controller(BlogAPIController::class)->group(function () {
    Route::get('/blogs', 'index');
});

Route::controller(BrandAPIController::class)->group(function () {
    Route::get('/brands', 'index');
});

Route::controller(CategoryAPIController::class)->group(function () {
    Route::get('/categories', 'index');
});
