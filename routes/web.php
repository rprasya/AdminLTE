<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// PRODUCTS
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


// CATEGORY
// read
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

// create
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/post', [CategoryController::class, 'store'])->name('categories.post');

// delete
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

// update
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');