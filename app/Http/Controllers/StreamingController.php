<?php

namespace App\Http\Controllers;

use App\models\Video;
use App\User;
use Illuminate\Http\Request;

class StreamingController extends Controller
{
    public function indexStreaming()
    {
        $videos = Video::all();
        foreach ($videos as $video)
            $video->pic = \URL::asset('_images/video/' . $video->userId .'/' . $video->thumbnail);

        return view('streaming.streamingIndex', compact(['videos']));
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
        $loc = __DIR__ . '/../../../../assets/_images/video';

        $videos = scandir($loc);
        foreach ($videos as $video){
            $vidLoc = $loc . '/' . $video;
            if(is_file($vidLoc)) {
                $thumbnailName = explode('.', $video)[0].'.jpg';

                $nVid = new Video();
                $nVid->userId = auth()->user()->id;
                $nVid->title = explode('.', $video)[0];
                $nVid->description = '';
                $nVid->file = $video;
                $nVid->categoryId = 1;
                $nVid->subtitle = null;
                $nVid->thumbnail = $thumbnailName;
                $nVid->save();

                $nloc = $loc . '/' . auth()->user()->id;
                if(!is_dir($nloc))
                    mkdir($nloc);

                rename($loc . '/' . $video, $nloc .'/'. $video);

                $vidLoc = $nloc . '/' . $video;

                $ffmpeg = \FFMpeg\FFMpeg::create();
                $video = $ffmpeg->open($vidLoc);
                $frame = $video->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(42));
                $frame->save($nloc . '/'. $thumbnailName);
            }
        }
        dd('done');
    }
}
