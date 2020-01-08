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
        dd(str_contains(\Config::get('app.url'), 'localhost'));
        dd(\Config::get('app.url'));
        if(!str_contains(\Config::get('app.url'), 'localhost')) {
            if (str_contains(\Config::get('app.url'), 'http://')) {
                \URL::forceScheme('https');
            }
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
