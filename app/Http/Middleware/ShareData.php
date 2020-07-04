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
            $userLevelFooter = auth()->user()->nearestLevelInModel($userFooter->id);

            $userTotalPointFooter = auth()->user()->getUserPointInModel($userFooter->id);

            $nextLevelFooter = $userLevelFooter[1]->floor - $userTotalPointFooter;

            $registerUser = verta($userFooter->created_at)->format('Y/m/d');

            $userInfo = auth()->user()->getUserActivityCount();

            $buPic = auth()->user()->getUserPicInModel($userFooter->id);

            $userNamename = $userFooter->username;

            View::share(['userNamename' => $userNamename, 'userInfo' => $userInfo, 'buPic' => $buPic, 'config' => $config,
                        'registerUser' => $registerUser, 'nextLevelFooter' => $nextLevelFooter, 'userTotalPointFooter' => $userTotalPointFooter,
                        'userLevelFooter' => $userLevelFooter, 'userFooter' => $userFooter ]);
        }
        else {
            $buPic = \URL::asset('_images/nopic/blank.jpg');
            View::share(['buPic' => $buPic, 'config' => $config]);
        }


        return $next($request);
    }
}
