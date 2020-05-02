<?php

namespace App\Http\Controllers;

use App\models\Video;
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
        if(auth()->check())
            $kind = 'streamer';
        else
            $kind = 'see';

//        $kind = 'streamer';

        return view('streaming.streamingLive', compact(['kind', 'room', 'name']));
    }

    public function importVideoToDB()
    {
        $loc = __DIR__ . '/../../../../assets/video';

        $videos = scandir($loc);
        foreach ($videos as $video){
            $vidLoc = $loc . '/' . $video;
            if(is_file($vidLoc)) {
                $nVid = new Video();
                $nVid->userId = auth()->user()->id;
                $nVid->title = explode('.', $video)[0];
                $nVid->description = '';
                $nVid->file = $video;
                $nVid->categoryId = 1;
                $nVid->subtitle = null;
                $nVid->thumbnail = null;
                $nVid->save();

                $nloc = $loc . '/' . auth()->user()->id;
                if(!is_dir($nloc))
                    mkdir($nloc);

                rename($loc . '/' . $video, $nloc .'/'. $video);

                $vidLoc = $nloc . '/' . $video;

                $ffmpeg = \FFMpeg\FFMpeg::create();
                $video = $ffmpeg->open($vidLoc);
                $frame = $video->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(42));
                $frame->save($nloc . '/image.jpg');
                dd('done');
            }
        }
    }
}
