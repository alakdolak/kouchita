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

        $thumbnail_path = '/var/www/assets/videoPicThumnails';
        $second             = 1;
        $thumbSize       = '150x150';

        $videoname  = '/var/www/assets/video/YouTube.mp4';

        $cmd = "/usr/bin/ffmpeg -i " . $videoname . " -deinterlace -an -ss {$second} -t 00:00:01  -s {$thumbSize} -r 1 -y -vcodec mjpeg -f mjpeg {$thumbnail_path} 2>&1";

        exec($cmd, $output, $retval);

        if ($retval)
        {
            echo 'error in generating video thumbnail';
        }
        else
        {
            echo 'Thumbnail generated successfully';
            echo $thumb_path = $thumbnail_path . $videoname . '.jpg';
        }


        return;
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

//                rename($loc . '/' . $vidLoc)
            }
        }
//        dd(scandir($loc));
    }
}
