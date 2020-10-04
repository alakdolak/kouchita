<?php

namespace App\Http\Middleware;

use App\models\User;
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
        $fileVersions = 1;
        $config = \App\models\ConfigModel::first();
        if(auth()->check()){
            $userFooter = \Auth::user();
            $userLevelFooter = auth()->user()->nearestLevelInModel($userFooter->id);
            $userTotalPointFooter = auth()->user()->getUserPointInModel($userFooter->id);
            $nextLevelFooter = $userLevelFooter[1]->floor - $userTotalPointFooter;
            $registerUser = verta($userFooter->created_at)->format('Y/m/d');
            $userInfo = User::getUserActivityCount($userFooter->id);
            $buPic = auth()->user()->getUserPicInModel($userFooter->id);
            $userNamename = $userFooter->username;

            View::share(['userNamename' => $userNamename, 'userInfo' => $userInfo, 'buPic' => $buPic, 'config' => $config,
                        'registerUser' => $registerUser, 'nextLevelFooter' => $nextLevelFooter, 'userTotalPointFooter' => $userTotalPointFooter,
                        'userLevelFooter' => $userLevelFooter, 'userFooter' => $userFooter, 'fileVersions' => $fileVersions ]);
        }
        else {
            $buPic = \URL::asset('_images/nopic/blank.jpg');
            View::share(['buPic' => $buPic, 'config' => $config, 'fileVersions' => $fileVersions]);
        }


        return $next($request);
    }
}
