<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\WebsiteHeaderComposer;
use App\View\Composers\PopularProductsComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'website.partials.header',
            'website.partials.slider',
        ], WebsiteHeaderComposer::class);

        View::composer([
            'website.partials.popular_products',
        ], PopularProductsComposer::class);
    }
}
