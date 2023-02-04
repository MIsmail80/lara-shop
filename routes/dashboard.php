<?php

use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use Illuminate\Support\Facades\Route;




Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
],function(){

    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');

        // category route
    Route::resource('/categories' , CategoryController::class);

        // Brand route
    Route::resource('/brands' , BrandController::class);

        // Product route
    Route::resource('/products' , ProductController::class);

});

Route::get('/login', function () {
    return view('dashboard.login');
    });
