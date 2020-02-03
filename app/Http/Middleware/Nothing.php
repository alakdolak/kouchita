<?php

namespace App\Http\Middleware;

use App\models\AbstractLog;
use Closure;

class Nothing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        
//        if($request->getRealMethod() == "GET") {
//            $date = getToday()["date"];
//            $requestURL = $request->getRequestUri();
//
//            $condition = ['url' => $requestURL, 'date' => $date];
//            if(AbstractLog::where($condition)->count() == 0) {
//
//                $tmp = new AbstractLog();
//                $tmp->url = $requestURL;
//                $tmp->date = $date;
//                $tmp->counter = 1;
//                $tmp->save();
//            }
//            else {
//                $tmp = AbstractLog::where($condition)->first();
//                $tmp->counter = $tmp->counter + 1;
//                $tmp->save();
//            }
//        }

        return $next($request);
    }
}
