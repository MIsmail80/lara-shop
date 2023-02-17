<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $products = auth()->user()->cart->products;

        return view('website.cart', compact('products'));
    }

    public function addToCart(Request $request)
    {
        auth()->user()
        ->cart
        ->products()
        ->attach(
            $request->product_id,
            ['quantity' => $request->quantity]
        );

        return 'Product has been added successfully.';
    }
}
