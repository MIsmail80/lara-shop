<?php

namespace App\Http\Controllers\Website;

use App\Models\Deal;
use App\Models\Slide;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $slides = Slide::where('active', 1)->get();

        $deals = Deal::with('product')->where('active', 1)->get();

        $products = Product::with('photos')->orderBy('sales', 'desc')->limit(6)->get();

        $computersProducts = Product::with('photos')
                                    ->where('category_id', 1)
                                    ->orderBy('sales', 'desc')
                                    ->limit(6)
                                    ->get();

        return view('website.home', compact('products', 'computersProducts', 'deals', 'slides'));
    }
}
