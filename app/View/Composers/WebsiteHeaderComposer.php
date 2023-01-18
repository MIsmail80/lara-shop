<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class WebsiteHeaderComposer
{
    protected $cats;

    public function __construct()
    {
        $this->cats = Category::get();
    }


    public function compose(View $view)
    {
        $view->with('cats', $this->cats);
    }
}
