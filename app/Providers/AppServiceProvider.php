<?php

namespace App\Providers;

use App\View\Components\AppFooter;
use App\View\Components\AppHeader;
use App\View\Components\AppNavbarMobile;
use App\View\Components\CouponCard;
use App\View\Components\NewsCard;
use App\View\Components\ProductCard;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        Blade::component('AppCouponCard',CouponCard::class);
        Blade::component('NewsCard',NewsCard::class);
        Blade::component('AppNavbarMobile',AppNavbarMobile::class);
        Blade::component('AppFooter',AppFooter::class);
        
        Paginator::useBootstrap();

    }
}
