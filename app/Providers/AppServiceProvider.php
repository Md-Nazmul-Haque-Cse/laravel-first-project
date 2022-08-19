<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Cart;
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
        View::composer(['front.includes.header'],function ($view){
            $view->with('categories', Category::all());
        });
        View::composer(['front.includes.header'],function ($view){
            $view->with('cart_products', Cart::content());
        });
//        View::share('name', 'BITM');
        View::composer(['front.includes.footer'],function ($view){
            $view->with('brands', Brand::all());
        });

    }
}
