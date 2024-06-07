<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductVariantController;
use App\Http\Controllers\Api\ProductImageController;
use App\Http\Controllers\Api\ProductColorController;
use App\Http\Controllers\Api\ProductSizeController;


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
Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('product-variants', ProductVariantController::class);
Route::apiResource('product-images', ProductImageController::class);
Route::apiResource('product-colors', ProductColorController::class);
Route::apiResource('product-sizes', ProductSizeController::class);
