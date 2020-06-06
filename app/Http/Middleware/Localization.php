<?php

namespace App\Http\Middleware;

use App\models\Language;
use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Session::has('lang'))
            \App::setlocale(\Session::get('lang'));

        return $next($request);
    }
}
