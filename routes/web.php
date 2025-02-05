<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\IsLogin;
use Illuminate\Support\Facades\Route;

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login.page');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('register.page');
Route::post('/register', [AuthController::class, 'createAdmin'])->name('register.user');

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(IsLogin::class)->group(function(){
        
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
});