<?php

namespace App\Http\Middleware;

use App\models\Followers;
use App\models\logs\UserSeenLog;
use App\models\Message;
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
        $fileVersions = 6;
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

            $newMsgCount = Message::where('seen', 0)
                                    ->where('receiverId', $userFooter->id)
                                    ->count();

            $followersCount = Followers::where('followedId', $userFooter->id)->count();
            $followingCount = Followers::where('userId', $userFooter->id)->count();

            $newRegisterOpen = false;
            if(\Session::get('newRegister'))
                $newRegisterOpen = true;

            View::share(['newMsgCount' => $newMsgCount, 'followingCount' => $followingCount, 'followersCount' => $followersCount,
                        'userNamename' => $userNamename, 'userInfo' => $userInfo, 'buPic' => $buPic, 'config' => $config,
                        'registerUser' => $registerUser, 'nextLevelFooter' => $nextLevelFooter, 'userTotalPointFooter' => $userTotalPointFooter,
                        'userLevelFooter' => $userLevelFooter, 'userFooter' => $userFooter, 'fileVersions' => $fileVersions,
                        'newRegisterOpen' => $newRegisterOpen]);
        }
        else {
            $followingCount = 0;
            $buPic = \URL::asset('_images/nopic/blank.jpg');
            View::share(['buPic' => $buPic, 'config' => $config, 'followingCount' => $followingCount, 'fileVersions' => $fileVersions]);
        }

        return $next($request);
    }
}
