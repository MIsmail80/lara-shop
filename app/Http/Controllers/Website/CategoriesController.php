<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class CategoriesController extends Controller
{
public function index($id)
    {
        $category = Category::findOrfail($id);
        $products =Product::where('category_id' ,$id)->paginate(2);

        // dd($products);
        $start = ($products->currentPage() -1 ) *  $products->perPage();

        return view('website.categories' , compact('category' , 'products' , 'start'));
    }
}
