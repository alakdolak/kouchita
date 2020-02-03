<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
//        dd(\Config::get('app.url'));
=======
>>>>>>> 561afa8b76619767852d4eaa30448db7dc2f8b77
        if (str_contains(\Config::get('app.url'), 'http://')) {
            \URL::forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
