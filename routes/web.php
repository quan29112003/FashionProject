<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\ProductColor;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Models\ProductVariant;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('points', AdminPointController::class);
// });
Route::get('/', function () {
    return view('welcome');
});


Route::get('show-product',[ProductController::class, 'index'])->name('product');
Route::get('create-product',[ProductController::class, 'create'])->name('store-product');
Route::post('create-product',[ProductController::class,'store'])->name('handleStore-product');

Route::get('product-variant/{id}',[ProductVariantController::class, 'show'])->name('product-variant');
Route::get('edit-product-variant/{id}',[ProductVariantController::class, 'edit'])->name('edit-productVariant');
Route::put('edit-product-variant/{id}',[ProductVariantController::class, 'handleEdit'])->name('handleEdit-productVariant');

Route::get('show-category',[CategoryController::class, 'index'])->name('category');
Route::get('create-category',[CategoryController::class, 'create'])->name('store-category');
Route::post('create-category',[CategoryController::class,'store'])->name('handleStore-category');
Route::get('edit-category/{id}',[CategoryController::class, 'edit'])->name('edit-category');
Route::put('edit-category/{id}',[CategoryController::class, 'handleEdit'])->name('handleEdit-category');

Route::get('show-color',[ColorController::class, 'index'])->name('color');
Route::get('create-color',[ColorController::class, 'create'])->name('store-color');
Route::post('create-color',[ColorController::class, 'store'])->name('handleStore-color');
Route::get('edit-color/{id}',[ColorController::class, 'edit'])->name('edit-color');
Route::put('edit-color/{id}',[ColorController::class, 'handleEdit'])->name('handleEdit-color');

Route::get('show-size',[SizeController::class, 'index'])->name('size');
Route::get('create-size',[SizeController::class, 'create'])->name('store-size');
Route::post('create-size',[SizeController::class, 'store'])->name('handleStore-size');
Route::get('edit-size/{id}',[SizeController::class, 'edit'])->name('edit-size');
Route::put('edit-size/{id}',[SizeController::class, 'handleEdit'])->name('handleEdit-size');

