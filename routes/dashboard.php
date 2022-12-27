<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/login', function () {
    return view('dashboard.login');
});

Route::resource('/categories', CategoryController::class);
