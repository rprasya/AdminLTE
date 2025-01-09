<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('layouts.main');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');