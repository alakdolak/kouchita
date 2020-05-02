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

//        $thumbnail_path = '/var/www/assets/videoPicThumnails';
//        $second             = 1;
//        $thumbSize       = '150x150';
//
//        $videoname  = '/var/www/assets/video/YouTube.mp4';
//
//        $cmd = "/usr/bin/ffmpeg -i " . $videoname . " -deinterlace -an -ss {$second} -t 00:00:01  -s {$thumbSize} -r 1 -y -vcodec mjpeg -f mjpeg {$thumbnail_path} 2>&1";
//
//        exec($cmd, $output, $retval);
//
//        if ($retval)
//        {
//            echo 'error in generating video thumbnail';
//        }
//        else
//        {
//            echo 'Thumbnail generated successfully';
//            echo $thumb_path = $thumbnail_path . $videoname . '.jpg';
//        }

        $ffmpeg = '/usr/bin/ffmpeg';

// the input video file
        $video  = '/var/www/assets/video/YouTube.mp4';

// where you'll save the image
        $image  = '/var/www/assets/videoPicThumnails/demo.jpg';

// default time to get the image
        $second = 1;

// get the duration and a random place within that
        $cmd = "$ffmpeg -i $video 2>&1";
        if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', $cmd, $time)) {
            $total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
            $second = rand(1, ($total - 1));
        }

// get the screenshot
//$cmd = "$ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $image 2>&1";
        $return = $cmd;

// done! <img src="http://blog.amnuts.com/wp-includes/images/smilies/icon_wink.gif" alt=";-)" class="wp-smiley">
        echo 'done!';



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
