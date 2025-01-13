<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('layouts.main');
});

// read
Route::get('/products', [ProductController::class, 'index'])->name('products');

// create
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/post', [ProductController::class, 'store'])->name('products.post');

// delete
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');

// update
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');