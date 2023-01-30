<?php

use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
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

        // category route
    Route::resource('/brands' , BrandController::class);



});

Route::get('/login', function () {
    return view('dashboard.login');
    });
