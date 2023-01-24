<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\HomepageController;

Route::get('/', HomepageController::class);

Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/product', function () {
    return view('website.product');
});

