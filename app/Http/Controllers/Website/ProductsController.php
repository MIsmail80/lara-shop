<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index( $id )
    {

        $product = Product::with(['category' , 'photos'])->findOrFail($id);

        $product->increment('views');

        
        return view('website.product', compact('product'));
    }
}
