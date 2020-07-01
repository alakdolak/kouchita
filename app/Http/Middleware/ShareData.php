<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class ShareData
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
        $config = \App\models\ConfigModel::first();
        if(auth()->check()){
            $userFooter = \Auth::user();
            $userLevelFooter = auth()->user()->getUserNearestLevel();

            $userTotalPointFooter = auth()->user()->getUserTotalPoint();

            $nextLevelFooter = $userLevelFooter[1]->floor - $userTotalPointFooter;

            $registerUser = verta(auth()->user()->created_at)->format('Y/m/d');

            $userInfo = auth()->user()->getUserActivityCount();

            $buPic = auth()->user()->getUserPicInModel(auth()->user()->id);

            $userNamename = auth()->user()->username;

            View::share(['userNamename' => $userNamename, 'userInfo' => $userInfo,
                        'registerUser' => $registerUser, 'nextLevelFooter' => $nextLevelFooter, 'userTotalPointFooter' => $userTotalPointFooter,
                        'userLevelFooter' => $userLevelFooter, 'userFooter' => $userFooter ]);
        }
        else
            $buPic = \URL::asset('_images/nopic/blank.jpg');

        View::share(['buPic' => $buPic, 'config' => $config]);

        return $next($request);
    }
}
