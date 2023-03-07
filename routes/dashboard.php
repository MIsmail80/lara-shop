<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/login', function () {
    return view('dashboard.login');
})->name('login');

Route::resource('/categories', CategoryController::class);
Route::resource('/products', ProductController::class);
Route::resource('/customers', UserController::class);
Route::resource('/orders', OrderController::class);
