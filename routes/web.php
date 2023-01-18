<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomepageController;

Route::get('/', HomepageController::class);

Route::get('/category', function () {
    return view('website.category');
});

Route::get('/product', function () {
    return view('website.product');
});
