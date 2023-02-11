<?php

use App\Http\Controllers\Website\CategoriesController;
use App\Http\Controllers\Website\HomepageController;
use Illuminate\Support\Facades\Route;

// home route

Route::group([
    'prefix' => '/',
    'as' => 'website.'

], function () {

    Route::get('/', HomepageController::class)
        ->name('home');

    //categories route
    Route::get('categories/{id}', [CategoriesController::class , 'index'])->name('categories');

    Route::get('/product', function () {
        return view('website.product');
    })->name('products');

});
