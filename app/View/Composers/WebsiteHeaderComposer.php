<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class WebsiteHeaderComposer
{

    protected $categories;

    public function __construct()
    {
        $this->categories = Category::get();
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
        
    }
}
