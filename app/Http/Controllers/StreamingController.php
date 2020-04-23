<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StreamingController extends Controller
{
    public function indexStreaming()
    {
        return view('streaming.streamingIndex');
    }

    public function showStreaming()
    {
        return view('streaming.streamingShow');
    }

    public function streamingLive($room)
    {
        $name = random_int(10000, 99999);
        if(auth()->check() && isset($_GET['name'])){
            $user = User::where('username', $_GET['name'])->first();
            if($user !=  null && $user->id == auth()->user()->id)
                $kind = 'streamer';
            else
                $kind = 'see';
        }
        else
            $kind = 'see';

//        $kind = 'streamer';

        return view('streaming.streamingLive', compact(['kind', 'room', 'name']));
    }
}
