<?php

namespace App\Http\Controllers;

use App\models\Video;
use App\models\VideoCategory;
use App\models\VideoLimbo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StreamingController extends Controller
{
    public function indexStreaming()
    {
        $videos = Video::all();
        foreach ($videos as $video) {
            $video->pic = \URL::asset('_images/video/' . $video->userId . '/' . $video->thumbnail);
            $video->url = route('streaming.show', ['id' => $video->id]);
            $video->username = User::find($video->userId)->username;
        }

        return view('streaming.streamingIndex', compact(['videos']));
    }

    public function showStreaming($id)
    {
        $video = Video::find($id);
        if($video == null)
            return redirect(route('streaming.index'));

        $video->video = \URL::asset('_images/video/' . $video->userId . '/' . $video->video);
        $video->pic = \URL::asset('_images/video/' . $video->userId . '/' . $video->thumbnail);
        $video->url = route('streaming.show', ['id' => $video->id]);
        $video->username = User::find($video->userId)->username;

        return view('streaming.streamingShow', compact(['video']));
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

    public function uploadVideoPage()
    {
        $this->deleteLimbo();

        $categories = VideoCategory::all();
        while(true){
            $code = random_int(10000, 99999);
            $check = VideoLimbo::where('code', $code)->first();
            if($check == null){
                $newLimbo = new VideoLimbo();
                $newLimbo->code = $code;
                $newLimbo->userId = auth()->user()->id;
                $newLimbo->save();
                break;
            }
        }

        return view('streaming.uploadVideo', compact(['categories', 'code']));
    }

    private function deleteLimbo(){
        $limbos = VideoLimbo::all();
        foreach ($limbos as $item){
            $diff = Carbon::now()->diffInHours($item->created_at);
            if($diff > 2){
                \File::delete('_images/video/limbo/'. $item->video);
                $item->delete();
            }
        }

        return;
    }

    public function storeVideo(Request $request)
    {
        $user = auth()->user();

        if(isset($request->kind) && $request->kind == 'video'){
            if(isset($_FILES['video']) && isset($request->code) && $_FILES['video']['error'] == 0){
                $limbo = VideoLimbo::where('code', $request->code)->where('userId', $user->id)->first();
                if($limbo != null){
                    $videoName = time().$_FILES['video']['name'];
                    $location = __DIR__ .'/../../../../assets/_images/video';
                    if(!is_dir($location))
                        mkdir($location);

                    $location .= '/limbo' ;
                    if(!is_dir($location))
                        mkdir($location);
                    $location .= '/' . $videoName;

                    if(move_uploaded_file($_FILES['video']['tmp_name'], $location)){
                        $limbo->video = $videoName;
                        $limbo->save();

                        try{
                            $ffprobe = \FFMpeg\FFProbe::create();
                            $duration = (int)$ffprobe->format($location)->get('duration');
                            $second = $duration % 60;
                            $duration = (int)($duration / 60);
                            $min = $duration % 60;
                            $duration = (int)($duration / 60);

                            if($second < 10)
                                $second = '0' . $second;
                            if($min < 10)
                                $min = '0' . $min;
                            $duration = $duration . ':' . $min . ':' . $second;
                        }
                        catch (\Exception $exception){
                            $duration = '01:00:00';
                        }


                        echo json_encode(['status' => 'ok', 'duration' => $duration]);
                    }
                    else
                        echo json_encode(['status' => 'nok2']);
                }
                else
                    echo json_encode(['status' => 'nok1']);
            }
        }
        else if(isset($request->kind) && $request->kind == 'setting'){
            if(isset($request->name) && isset($request->code) && isset($request->categoryId)){
                $limbo = VideoLimbo::where('code', $request->code)->where('userId', $user->id)->first();
                if($limbo != null){

                    $location = __DIR__ .'/../../../../assets/_images/video';
                    $nLoc = $location . '/' . $user->id;
                    if(!is_dir($nLoc))
                        mkdir($nLoc);

                    $img = $_POST['thumbnail'];
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $thumbanil = time().rand(100, 999) . '.png';

                    $file =  $nLoc . '/' . $thumbanil;
                    $success = file_put_contents($file, $data);

                    while(true){
                        $sCode = generateRandomString(10);
                        $check = Video::where('code', $sCode)->first();
                        if($check == null)
                            break;
                    }

                    $newVideo = new Video();
                    $newVideo->userId = $user->id;
                    $newVideo->code = $sCode;
                    $newVideo->title = $request->name;
                    $newVideo->description = $request->description;
                    $newVideo->video = $limbo->video;
                    $newVideo->categoryId = $request->categoryId;
                    $newVideo->duration = $request->duration;
                    $newVideo->thumbnail = $thumbanil;
                    $newVideo->seen = 0;
                    $newVideo->confirm = 0;
                    $newVideo->state = $request->state;
                    $newVideo->save();

                    $limboLoc = $location . '/limbo/' . $limbo->video;
                    $nLoc .= '/' . $limbo->video;
                    rename($limboLoc, $nLoc);

                    echo json_encode(['status' => 'ok']);
                }
                else
                    echo json_encode(['status' => 'nok2']);
            }
            else
                echo json_encode(['status' => 'nok1']);
        }
        else
            echo json_encode(['status' => 'nok']);

        return;
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
                $nVid->video = $video;
                $nVid->categoryId = 1;
                $nVid->subtitle = null;
                $nVid->thumbnail = $thumbnailName;

                $ffprobe = \FFMpeg\FFProbe::create();
                $duration = (int)$ffprobe->format($vidLoc)->get('duration');
                $second = $duration % 60;
                $duration = (int)($duration / 60);
                $min = $duration % 60;
                $duration = (int)($duration / 60);

                if($second < 10)
                    $second = '0' . $second;
                if($min < 10)
                    $min = '0' . $min;
                $nVid->duration = $duration . ':' . $min . ':' . $second;

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

    public function setVideoDuration()
    {
        $video = Video::all();
        foreach ($video as $item){
            $loc = __DIR__.'/../../../../assets/_images/video/' . $item->userId. '/' . $item->video;

            $ffprobe = \FFMpeg\FFProbe::create();
            $duration = (int)$ffprobe->format($loc)->get('duration');
            $second = $duration % 60;
            $duration = (int)($duration / 60);
            $min = $duration % 60;
            $duration = (int)($duration / 60);

            if($second < 10)
                $second = '0' . $second;
            if($min < 10)
                $min = '0' . $min;
            $item->duration = $duration . ':' . $min . ':' . $second;
            $item->save();
        }

        dd('done');
    }

    public function setCode()
    {
        $videos = Video::all();
        foreach ($videos as $video) {
            while(true){
                $sCode = generateRandomString(10);
                $check = Video::where('code', $sCode)->first();
                if($check == null)
                    break;
            }
            $video->code = $sCode;
            $video->save();
        }
        dd('done');
    }
}
