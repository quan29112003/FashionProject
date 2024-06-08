<?php

use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductVariantController;
use App\Http\Controllers\Api\ProductImageController;
use App\Http\Controllers\Api\ProductColorController;
use App\Http\Controllers\Api\ProductSizeController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\VoucherController;

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

// user
Route::resource('users', UserController::class);

Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('product-variants', ProductVariantController::class);
Route::apiResource('product-images', ProductImageController::class);
Route::apiResource('product-colors', ProductColorController::class);
Route::apiResource('product-sizes', ProductSizeController::class);

// Route::apiResource('blog', BlogController::class);

Route::get('blog', [BlogController::class, 'index']);
Route::post('blog', [BlogController::class, 'store']);
Route::get('blog/{id}', [BlogController::class, 'show']);
Route::put('blog/{id}', [BlogController::class, 'update']);
Route::delete('blog/{id}', [BlogController::class, 'destroy']);

Route::get('vouchers', [VoucherController::class, 'index']); // Lấy danh sách voucher
Route::post('addvouchers', [VoucherController::class, 'store']); // Tạo mới voucher
Route::get('vouchers/{id}', [VoucherController::class, 'show']); // Lấy thông tin voucher theo id
Route::put('vouchers/{id}', [VoucherController::class, 'update']); // Cập nhật thông tin voucher theo id
Route::delete('vouchers/{id}', [VoucherController::class, 'destroy']); // Xóa voucher theo id
