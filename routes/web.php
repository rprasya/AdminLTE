<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('layouts.main');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/post', [ProductController::class, 'store'])->name('products.post');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');