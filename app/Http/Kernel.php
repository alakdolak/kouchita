<?php

namespace App\Http;

use App\Http\Middleware\Localization;
use App\Http\Middleware\setSession;
use App\Http\Middleware\ShareData;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \Barryvdh\Cors\HandleCors::class,
        \Illuminate\Session\Middleware\StartSession::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
//            \App\Http\Middleware\VerifyCsrfToken::class,
            \Barryvdh\Cors\HandleCors::class,
            \App\Http\Middleware\Localization::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
//        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'notUse' => \App\Http\Middleware\notUse::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'adminAccess' => \App\Http\Middleware\AdminAccess::class,
        'nothing' => \App\Http\Middleware\Nothing::class,
        'controllerAccess' => \App\Http\Middleware\ControllerAccess::class,
        'cors' => \App\Http\Middleware\Cors::class,
        'operatorAccess' => \App\Http\Middleware\OperatorAccess::class,
        'vodShareData' => \App\Http\Middleware\vodShareData::class,
        'SafarnamehShareData' => \App\Http\Middleware\SafarnamehShareData::class,
        'shareData' => \App\Http\Middleware\ShareData::class,
        'BusinessShareData' => \App\Http\Middleware\BusinessShareData::class,
    ];
}