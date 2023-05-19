<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Setting;
use App\Models\Size;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $setting = Setting::first();
            $view->with('setting',  $setting);
            $categories = Category::all();
            $view->with('categories',  $categories);
            $collections = Collection::all();
            $view->with('collections',  $collections);
            $cartItem = session('cart',[]);
            $view->with('cartItem',  $cartItem);
            $totalPrice= 0;
            foreach ($cartItem as $cart) {
                $totalPrice += $cart['price'] * $cart['quantity'];
            }
            $view->with('totalPrice',  $totalPrice);
        });
    }
}
