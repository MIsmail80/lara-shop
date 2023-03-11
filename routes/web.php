<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\UserController;
use App\Http\Controllers\Website\OrderController;
use App\Http\Controllers\Website\ProductController;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\HomepageController;

Route::get('/', HomepageController::class);

Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/product/{id}', [ProductController::class, 'show']);
Route::post('/product/review', [ProductController::class, 'review']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'postRegister']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/profile', [UserController::class, 'getProfile']);
Route::post('/profile', [UserController::class, 'postProfile']);

Route::get('/orders', [UserController::class, 'getOrders']);

Route::get('/change-password', [UserController::class, 'getChangePassword']);
Route::post('/change-password', [UserController::class, 'postChangePassword']);

Route::get('/cart', [CartController::Class, 'index']);
Route::post('/add-to-cart', [CartController::Class, 'addToCart']);
Route::get('/remove-from-cart/{productId}', [CartController::Class, 'removeFromCart']);
Route::post('/update-cart', [CartController::Class, 'update']);

Route::post('/apply-coupon', [OrderController::class, 'applyCoupon']);
Route::get('/checkout', [OrderController::class, 'checkout']);
Route::post('/create-order', [OrderController::class, 'store']);
Route::get('/complete-order', [OrderController::class, 'completeOrder']);