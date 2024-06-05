<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlockController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function(){
    Route::get('block/show',[BlockController::class,'show'])->name('show-block');
    Route::get('block/add',[BlockController::class,'add'])->name('add-block');
    Route::post('block/add',[BlockController::class,'handleAdd'])->name('handleAdd-block');
    Route::get('block/edit/{id}',[BlockController::class,'edit'])->name('edit-block');
    Route::post('block/edit/{id}',[BlockController::class,'handleEdit'])->name('handleEdit-block');
    Route::get('block/delete/{id}',[BlockController::class,'delete'])->name('delete-block');

});

