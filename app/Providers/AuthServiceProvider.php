<?php

namespace App\Providers;

use App\CustomUserProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

//        Passport::routes();
//
//        Passport::tokensExpireIn(Carbon::now()->addDays(7));
//
//        Passport::refreshTokensExpireIn(Carbon::now()->addDays(7));

//        Auth::provider('custom-user-provider',function($app, array $config)  {
//            return new CustomUserProvider($app['hash'], $config['model']);
//        });
    }
}
