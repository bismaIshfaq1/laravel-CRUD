<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product',[productController::class,'index'])->name('product.index');
Route::get('/product/create',[productController::class,'create'])->name('product.create');
Route::post('/product',[productController::class,'store'])->name('product.store');
// Route to display the edit form
Route::get('/products/{id}/edit',[productController::class, 'edit'])->name('product.edit');
// Route to handle the update request
Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
