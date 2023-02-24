<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show($id){
        $product = Product::with(['category', 'photos'])->find($id);

        $product->increment('views');

        return view('website.product', compact('product'));
    }

    public function review()
    {
        auth()->user()->ratings()->attach(
            request()->product_id,
            request()->only(['rating', 'comment'])
        );

        return back()->with('success', 'Thanks for your review.');
    }
}
