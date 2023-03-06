<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show($id){
        $product = Product::with(['category', 'photos'])
        ->with(['comments' => function ($query) {
            $query->whereNotNull('comment');
        }])
        ->withCount(['comments' => function ($query) {
            $query->whereNotNull('rating');
        }])
        ->find($id);

        $rating = round(ProductReview::where('product_id', $id)->avg('rating'));

        $product->increment('views');

        return view('website.product', compact('product', 'rating'));
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
