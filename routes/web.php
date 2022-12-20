<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.home');
});

Route::get('/category', function () {
    return view('website.category');
});

Route::get('/product', function () {
    return view('website.product');
});
