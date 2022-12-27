<?php

namespace App\Providers;

use App\View\Components\AppHeader;
use App\View\Components\ProductCard;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('AppHeader',AppHeader::class);
        Blade::component('ProductCard',ProductCard::class);
        //
    }
}
