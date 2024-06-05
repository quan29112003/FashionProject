<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;


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
    Route::get('blog/show',[BlogController::class,'show'])->name('show-blog');
    Route::get('blog/add',[BlogController::class,'add'])->name('add-blog');
    Route::post('blog/add',[BlogController::class,'handleAdd'])->name('handleAdd-blog');
    Route::get('blog/edit/{id}',[BlogController::class,'edit'])->name('edit-blog');
    Route::post('blog/edit/{id}',[BlogController::class,'handleEdit'])->name('handleEdit-blog');
    Route::get('blog/delete/{id}',[BlogController::class,'delete'])->name('delete-blog');

});

