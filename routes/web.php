<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;


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


Route::get('index',[ProductController::class, 'index']);
Route::get('create',[ProductController::class, 'create'])->name('store-product');
Route::post('create',[ProductController::class,'store'])->name('handleStore-product');

