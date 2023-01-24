<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show($id){
        $category = Category::find($id);

        $products = Product::with('photos')->where('category_id', $id)->paginate(10);

        $start = ($products->currentPage() - 1) * $products->perPage();

        return view('website.category', compact('category', 'products', 'start'));
    }
}
