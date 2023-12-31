<?php

namespace App\Providers;

use App\Models\Cart;
use App\Repositories\Cart as RepositoriesCart;
use App\Repositories\CartRepository;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CartRepository::class, function ($app) {
            return new RepositoriesCart();
        });

        /*$this->app->bind('cart.id', function($app) {
            $cookie_id = Cookie::get('cart_cookie_id');
            if (!$cookie_id) {
                $cookie_id = Str::uuid();
                Cookie::queue('cart_cookie_id', $cookie_id, 60 * 24 * 30);
            }
            return $cookie_id;
        });

        $this->app->bind('cart', function($app) {
            $cart = Cart::where('cookie_id', $app->make('cart.id'))->get();
            return $cart;
        });*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
