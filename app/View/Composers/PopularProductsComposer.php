<?php

namespace App\View\Composers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;

class PopularProductsComposer
{
    protected $products;

    public function __construct()
    {
        $this->products = Product::orderBy('views', 'desc')->limit(10)->get();
    }


    public function compose(View $view)
    {
        $view->with('products', $this->products);
    }
}
