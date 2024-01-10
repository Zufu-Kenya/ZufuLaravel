<?php

use App\Http\Controllers\API\BlogAPIController;
use App\Http\Controllers\API\BrandAPIController;
use App\Http\Controllers\API\ConditionAPIController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\ProductTypeAPIController;
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

Route::get('/product-conditions', [ConditionAPIController::class, 'index']);

Route::get('/blogs', [BlogAPIController::class, 'index']);

Route::get('/product-types', [ProductTypeAPIController::class, 'index']);

Route::get('/brands', [BrandAPIController::class, 'index']);
