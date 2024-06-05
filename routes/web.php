<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\AdminPointController;


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
Route::resource('promotions', PromotionController::class);
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('points', AdminPointController::class);
});
Route::get('/', function () {
    return view('welcome');
});