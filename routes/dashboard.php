<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DealController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/login', function () {
    return view('dashboard.login');
})->name('login');

Route::get('/products/del-image/{id}', [ProductController::class, 'delImage']);

Route::get('/toggle-slide-active/{id}', [SliderController::class, 'toggleActive']);

Route::resource('/categories', CategoryController::class);
Route::resource('/products', ProductController::class);
Route::resource('/customers', UserController::class);
Route::resource('/orders', OrderController::class);
Route::resource('/deals', DealController::class);
Route::resource('/coupons', CouponController::class);
Route::resource('/slides', SliderController::class);
