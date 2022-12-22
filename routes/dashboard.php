<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('dashboard.layout');
});

Route::get('/login', function () {
    return view('dashboard.login');
});



