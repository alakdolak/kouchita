<?php

namespace App\Http\Controllers;

use App\models\Followers;
use App\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function setFollower(Request $request)
    {
        if(isset($request->id)){
            $u = \Auth::user();
            $followed = User::find($request->id);
            if($followed != null){
                $check = Followers::where('userId', $u->id)->where('followedId', $followed->id)->first();
                if($check != null){
                    $check->delete();
                    $status = 'delete';
                }
                else{
                    $check = new Followers();
                    $check->userId = $u->id;
                    $check->followedId = $followed->id;
                    $check->save();
                    $status = 'store';
                }

                $number = Followers::where('followedId', $followed->id)->count();
                echo json_encode(['status' => $status, 'number' => $number]);
            }
            else
                echo json_encode(['status' => 'notFound']);
        }
        else
            echo json_encode(['status' => 'nok']);

        return;
    }

    public function getFollower(Request $request)
    {
        if(isset($request->id)){
            $followeds = Followers::where('followedId', $request->id)->get();
            $you = 0;
            if(auth()->check())
                $you = auth()->user()->id;
            foreach ($followeds as $item){
                $user = User::select(['id', 'username'])->find($item->userId);
                $item->pic = getUserPic($user->id);
                $item->url = route('profile', ['username' => $user->username]);
                $item->username = $user->username;
                $item->followed = 0;
                if($you != 0) {
                    $item->followed = Followers::where('userId', $you)
                        ->where('followedId', $item->id)
                        ->count();
                    $item->notMe = 1;
                    if($user->id == $you)
                        $item->notMe = 0;
                }
            }
            echo json_encode(['status' => 'ok', 'result' => $followeds]);
        }
        else
            echo json_encode(['status' => 'nok']);

        return;
    }
}
