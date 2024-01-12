<?php

use App\Http\Controllers\API\BlogAPIController;
use App\Http\Controllers\API\BrandAPIController;
use App\Http\Controllers\API\CategoryAPIController;
use App\Http\Controllers\API\ConditionAPIController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductAPIController::class, 'index']);

Route::get('/conditions', [ConditionAPIController::class, 'index']);

Route::get('/blogs', [BlogAPIController::class, 'index']);

Route::get('/brands', [BrandAPIController::class, 'index']);

Route::get('/categories', [CategoryAPIController::class, 'index']);

Route::get('/products-categories/{categoryName}', [ProductAPIController::class, 'getByCategory']);

Route::get('/products-brands/{brandName}', [ProductAPIController::class, 'getByBrand']);

Route::get('/products-conditions/{conditionName}', [ProductAPIController::class, 'getByCondition']);
