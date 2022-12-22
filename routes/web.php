<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.home');
});

Route::get('categories', function () {
    return view('website.categories');
});

Route::get('/product', function () {
    return view('website.product');
});
