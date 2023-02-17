<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class WebsiteHeaderComposer
{
    protected $cats;

    protected $cartCount;

    public function __construct()
    {
        $this->cartCount = auth()->check() ? auth()->user()->cart->products->count() : 0;
        $this->cats = Category::get();
    }


    public function compose(View $view)
    {
        $view->with('cats', $this->cats)
        ->with('cartCount', $this->cartCount);
    }
}
