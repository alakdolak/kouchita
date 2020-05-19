<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Amaken;
use App\models\Cities;
use App\models\CityPic;
use App\models\Place;
use App\models\State;
use App\models\Video;
use App\models\VideoCategory;
use App\models\VideoComment;
use App\models\VideoFeedback;
use App\models\VideoLimbo;
use App\models\VideoLive;
use App\models\VideoPlaceRelation;
use App\models\VideoTagRelation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use Intervention\Image\Image;

class StreamingController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Tehran');
        $userPicture = null;
        if(auth()->check())
            $userPicture = getUserPic(auth()->user()->id);
        else
            $userPicture = getUserPic(0);

        $today = Carbon::now()->format('Y-m-d');
        $nowTime = Carbon::now()->format('H:i');
        $todayVid = VideoLive::where('sDate', $today)->where('isLive', 1)->orderBy('sTime')->first();
        if($todayVid != null && $nowTime > $todayVid->sTime)
            $hasLive = $todayVid->code;
        else
            $hasLive = '';

        \View::share(['userPicture' => $userPicture, 'hasLive' => $hasLive]);
    }

    public function indexStreaming()
    {
        $confirmContidition = ['state' => 1, 'confirm' => 1];
        $lastVideos = Video::where($confirmContidition)->take(5)->orderByDesc('created_at')->get();
        foreach ($lastVideos as $lvid)
            $lvid = $this->getVideoFullInfo($lvid, false);

        $videoCategory = VideoCategory::all();
        foreach ($videoCategory as $vic) {
            $vic->video = Video::where($confirmContidition)->where('categoryId', $vic->id)->take(5)->orderByDesc('created_at')->get();
            foreach ($vic->video as $catVid)
                $catVid = $this->getVideoFullInfo($catVid, false);
        }

        return view('streaming.streamingIndex', compact(['lastVideos', 'videoCategory']));
    }

    public function showStreaming(Request $request, $code)
    {
        $video = Video::where('code', $code)->first();
        if ($video == null)
            return redirect(route('streaming.index'));

        $uId = 0;
        if (auth()->check())
            $uId = auth()->user()->id;

        if (($video->confirm == 1 && $video->state == 1) || ($video->userId == $uId)) {

            if (!\Cookie::has('video_' . $video->code)) {
                \Cookie::queue(\Cookie::make('video_' . $video->code, 1, 5));
                $video->seen++;
                $video->save();
            }
            $video->video = \URL::asset('_images/video/' . $video->userId . '/' . $video->video);
            $video = $this->getVideoFullInfo($video, true);
//            dd($video);

            $userMoreVideo = Video::where('userId', $video->userId)->where('id', '!=', $video->id)->take(4)->orderByDesc('created_at')->get();
            foreach ($userMoreVideo as $vid)
                $vid = $this->getVideoFullInfo($vid, false);

            $sameCategory = Video::where('categoryId', $video->categoryId)->where('id', '!=', $video->id)->take(4)->orderByDesc('created_at')->get();
            foreach ($sameCategory as $vid)
                $vid = $this->getVideoFullInfo($vid, false);


            return view('streaming.streamingShow', compact(['video', 'userMoreVideo', 'sameCategory']));
        }

        return redirect(route('streaming.index'));

    }

    public function uploadVideoPage()
    {
        $this->deleteLimbo();

        $categories = VideoCategory::all();
        while (true) {
            $code = random_int(10000, 99999);
            $check = VideoLimbo::where('code', $code)->first();
            if ($check == null) {
                $newLimbo = new VideoLimbo();
                $newLimbo->code = $code;
                $newLimbo->userId = auth()->user()->id;
                $newLimbo->save();
                break;
            }
        }

        return view('streaming.uploadVideo', compact(['categories', 'code']));
    }

    private function deleteLimbo()
    {
        $limbos = VideoLimbo::all();
        foreach ($limbos as $item) {
            $diff = Carbon::now()->diffInHours($item->created_at);
            if ($diff > 3) {
                $location = __DIR__ . '/../../../../assets/_images/video/limbo/' . $item->video;
                if (is_file($location))
                    unlink($location);
                $item->delete();
            }
        }

        return;
    }

    public function storeVideo(Request $request)
    {
        $user = auth()->user();
        if (isset($_FILES['video']) && isset($request->code) && $_FILES['video']['error'] == 0) {
            $limbo = VideoLimbo::where('code', $request->code)->where('userId', $user->id)->first();
            if ($limbo != null) {
                $videoName = time() . $_FILES['video']['name'];
                $location = __DIR__ . '/../../../../assets/_images/video';
                if (!is_dir($location))
                    mkdir($location);

                $location .= '/limbo';
                if (!is_dir($location))
                    mkdir($location);
                $location .= '/' . $videoName;

                if (move_uploaded_file($_FILES['video']['tmp_name'], $location)) {
                    $limbo->video = $videoName;
                    $limbo->save();

                    try {
                        $ffprobe = \FFMpeg\FFProbe::create();
                        $duration = (int)$ffprobe->format($location)->get('duration');
                        $second = $duration % 60;
                        $duration = (int)($duration / 60);
                        $min = $duration % 60;
                        $duration = (int)($duration / 60);

                        if ($second < 10)
                            $second = '0' . $second;
                        if ($min < 10)
                            $min = '0' . $min;
                        $duration = $duration . ':' . $min . ':' . $second;
                    } catch (\Exception $exception) {
                        $duration = '01:00:00';
                    }


                    echo json_encode(['status' => 'ok', 'duration' => $duration]);
                } else
                    echo json_encode(['status' => 'nok2']);
            } else
                echo json_encode(['status' => 'nok1']);
        } else
            echo json_encode(['status' => 'nok']);

        return;
    }

    public function storeVideoInfo(Request $request)
    {
        $user = auth()->user();
        if (isset($request->name) && isset($request->code) && isset($request->categoryId)) {

            $limbo = VideoLimbo::where('code', $request->code)->where('userId', $user->id)->first();
            if ($limbo != null) {
                $location = __DIR__ . '/../../../../assets/_images/video';
                $nLoc = $location . '/' . $user->id;
                if (!is_dir($nLoc))
                    mkdir($nLoc);

                $img = $_POST['thumbnail'];
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $thumbanil = time() . rand(100, 999) . '.jpg';

                $file = $nLoc . '/' . $thumbanil;
                $success = file_put_contents($file, $data);

                $img = \Image::make($file);
                $img->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($nLoc . '/min_' . $thumbanil);

                while (true) {
                    $sCode = generateRandomString(10);
                    $check = Video::where('code', $sCode)->first();
                    if ($check == null)
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

                if (isset($request->places) && $request->places != null) {
                    $places = explode(',', $request->places);
                    foreach ($places as $place) {
                        $p = explode('_', $place);
                        $check = VideoPlaceRelation::where('videoId', $newVideo->id)
                            ->where('kindPlaceId', $p[0])
                            ->where('placeId', $p[1])
                            ->first();
                        if ($check == null) {
                            $newRel = new VideoPlaceRelation();
                            $newRel->videoId = $newVideo->id;
                            $newRel->kindPlaceId = (int)$p[0];
                            $newRel->placeId = (int)$p[1];
                            $newRel->save();
                        }
                    }
                }

                if (isset($request->tags) && $request->tags != null) {
                    $tags = explode(',', $request->tags);
                    foreach ($tags as $tag) {
                        $t = explode('_', $tag);
                        if ($t[0] == 'old')
                            $tagId = $t[1];
                        else
                            $tagId = storeNewTag($t[1]);

                        $newTagRel = new VideoTagRelation();
                        $newTagRel->videoId = $newVideo->id;
                        $newTagRel->tagId = $tagId;
                        $newTagRel->save();
                    }
                }

                $url = route('streaming.show', ['code' => $newVideo->code]);

                echo json_encode(['status' => 'ok', 'url' => $url]);
            } else
                echo json_encode(['status' => 'nok1']);
        } else
            echo json_encode(['status' => 'nok']);

        return;
    }

    public function setVideoFeedback(Request $request)
    {
        $user = \Auth::user();
        if (isset($request->kind) && isset($request->videoId)) {
            $video = Video::find($request->videoId);
            if ($video != null) {
                if ($request->kind == 'likeVideo') {
                    $feedback = VideoFeedback::where('videoId', $request->videoId)
                                               ->where('userId', $user->id)
                                               ->whereNotNull('like')->first();
                    if ($feedback != null && $request->like == 0)
                        $feedback->delete();
                    elseif ($feedback == null) {
                        $feedback = new VideoFeedback();
                        $feedback->videoId = $request->videoId;
                        $feedback->userId = $user->id;
                        $feedback->like = $request->like;
                        $feedback->save();
                    }
                    else {
                        $feedback->like = $request->like;
                        $feedback->save();
                    }
                }
                else if ($request->kind == 'likeComment') {
                    $feedback = VideoFeedback::where('videoId', $request->videoId)
                                                ->where('commentId', $request->commentId)
                                                ->where('userId', $user->id)
                                                ->whereNotNull('like')->first();
                    if ($feedback != null) {
                        if($feedback->like == $request->like)
                            $feedback->like = 0;
                        else
                            $feedback->like = $request->like;

                        $feedback->save();
                    }
                    else {
                        $feedback = new VideoFeedback();
                        $feedback->videoId = $request->videoId;
                        $feedback->commentId = $request->commentId;
                        $feedback->userId = $user->id;
                        $feedback->like = $request->like;
                        $feedback->save();
                    }

                    $likeCount = VideoFeedback::where('videoId', $request->videoId)->where('commentId', $request->commentId)->where('like', 1)->count();
                    $disLikeCount = VideoFeedback::where('videoId', $request->videoId)->where('commentId', $request->commentId)->where('like', -1)->count();

                    echo json_encode(['status' => 'ok', 'like' => $likeCount, 'disLike' => $disLikeCount]);
                    return;
                }
                else
                    echo json_encode(['status' => 'nok2']);

                $fullInfo = $this->getVideoFullInfo($video, false);
                echo json_encode(['status' => 'ok', 'like' => $fullInfo->like, 'disLike' => $fullInfo->disLike, 'commentsCount' => $fullInfo->commentsCount]);

            }
            else
                echo json_encode(['status' => 'nok1']);
        }
        else
            echo json_encode(['status' => 'nok']);


        return;
    }

    private function getVideoFullInfo($video, $main = false)
    {
        $userLogin = auth()->check();

        $loc = __DIR__ .'/../../../../assets/_images/video/' . $video->userId;
        if(is_file($loc .'/min_'. $video->thumbnail))
            $video->pic = \URL::asset('_images/video/' . $video->userId . '/min_' . $video->thumbnail);
        else
            $video->pic = \URL::asset('_images/video/' . $video->userId . '/' . $video->thumbnail);

        $video->url = route('streaming.show', ['code' => $video->code]);
        $video->username = User::find($video->userId)->username;
        $video->userPic = getUserPic($video->userId);
        $video->time = getDifferenceTimeString($video->created_at);

        $video->like = VideoFeedback::where('videoId', $video->id)->where('like', 1)->count();
        $video->disLike = VideoFeedback::where('videoId', $video->id)->where('like', -1)->count();
        $video->commentsCount = VideoComment::where('videoId', $video->id)->count();
        $video->comments = [];
        $video->places = [];

        if($main){
            $video->pic = \URL::asset('_images/video/' . $video->userId . '/' . $video->thumbnail);
            $resultComment = [];
            $video->comments = $this->getVideoComments($video->id, 0);

            $activityId = Activity::whereName('نظر')->first()->id;
            $places = VideoPlaceRelation::where('videoId', $video->id)->get();
            $result = [];
            foreach ($places as $place) {
                if ($place->kindPlaceId > 0) {
                    $kindPlace = Place::find($place->kindPlaceId);
                    $place = \DB::table($kindPlace->tableName)->where('id', $place->placeId)->select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->first();
                    if($place != null) {
                        $file = $kindPlace->fileName;
                        if (file_exists((__DIR__ . '/../../../../assets/_images/' . $file . '/' . $place->file . '/f-' . $place->picNumber)))
                            $place->placePic = \URL::asset('_images/' . $file . '/' . $place->file . '/f-' . $place->picNumber);
                        else
                            $place->placePic = \URL::asset("_images/nopic/blank.jpg");

                        $place->url = createUrl($kindPlace->id, $place->id, 0, 0);
                        $city = Cities::whereId($place->cityId);
                        $place->placeCity = $city->name;
                        $place->placeState = State::whereId($city->stateId)->name;
                        $place->placeRate = getRate($place->id, $kindPlace->id)[1];
                        $place->placeReviews = \DB::select('select count(*) as countNum from log, comment WHERE logId = log.id and status = 1 and placeId = ' . $place->id .
                            ' and kindPlaceId = ' . $kindPlace->id . ' and activityId = ' . $activityId)[0]->countNum;

                        $place->kindPlaceId = $kindPlace->id;

                        array_push($result, $place);
                    }
                }
                else {
                    if($place->kindPlaceId == -1){
                        $place = State::find($place->placeId);
                        if($place != null){
                            $place->placePic = null;
                            $cities = Cities::where('stateId', $place->id)->get();
                            foreach ($cities as $city){
                                $p = getCityPic($city->id);
                                if($p != null){
                                    $place->placePic = $p;
                                    break;
                                }
                            }
                            if($place->placePic == null)
                                $place->placePic = URL::asset('_images/nopic/blank.jpg');

                            $place->kindPlaceId = -1;
                            $place->url = route('cityPage', ['kind' => 'state', 'city' => $place->name]);
                            $place->name = 'استان '  . $place->name;
                            array_push($result, $place);
                        }
                    }
                    else{
                        $place = Cities::find($place->placeId);
                        if($place != null){
                            $place->placePic = getCityPic($place->id);
                            if($place->placePic == null)
                                $place->placePic = URL::asset('_images/nopic/blank.jpg');

                            $place->placeState = State::find($place->stateId)->name;
                            $place->kindPlaceId = 0;
                            $place->url = route('cityPage', ['kind' => 'city', 'city' => $place->name]);
                            $place->name = 'شهر '  . $place->name;
                            array_push($result, $place);
                        }
                    }
                }
            }
            $video->places = $result;
        }


        $video->uLike = 0;
        if($userLogin){
            $uLike = VideoFeedback::where('videoId', $video->id)->where('userId', auth()->user()->id)->first();
            if($uLike != null)
                $video->uLike = $uLike->like;
        }

        return $video;
    }

    private function getVideoComments($videoId, $parent){
        $comments = VideoComment::where('videoId', $videoId)->where('confirm', 0)->where('parent', $parent)->get();
        foreach ($comments as $comment) {
            $ucomment = User::find($comment->userId);
            if ($ucomment != null) {
                $comment->username = $ucomment->username;
                $comment->userPic = getUserPic($ucomment->id);
                $comment->like = VideoFeedback::where('videoId', $videoId)->where('commentId', $comment->id)->where('like', 1)->count();
                $comment->disLike = VideoFeedback::where('videoId', $videoId)->where('commentId', $comment->id)->where('like', -1)->count();
                $comment->time = getDifferenceTimeString($comment->created_at);
                $comment->comments = $this->getVideoComments($videoId, $comment->id);
                if($comment->parent != 0)
                    $comment->ansToUsername = User::find(VideoComment::find($comment->parent)->userId)->username;
                $comment->ansCount = count($comment->comments);
            }
        }
        return $comments;
    }

    public function setVideoComment(Request $request)
    {
        $videoId = json_decode($request->data)->videoId;
        $video = Video::find($videoId);
        if($video != null){
            $newComment = new VideoComment();
            $newComment->videoId = $video->id;
            $newComment->parent = $request->ansTo;
            $newComment->text = $request->text;
            $newComment->userId = auth()->user()->id;
            $newComment->save();

            echo json_encode(['status' => 'ok', 'comment' => $newComment]);
        }
        else
            echo json_encode(['status' => 'nok', 'msg' => 'not find video']);

        return;
    }

    public function setVideoCommentFeedback(Request $request)
    {
        dd($request->all());
        $comment = VideoComment::find($request->commentId);
        if($comment != null){

        }

    }

    public function streamingLive($room = '')
    {
        $data = [
            'title' => '',
            'desc' => '',
            'user' => '',
            'userPic' => getUserPic(0),
            'like' => 0,
            'disLike' => 0,
            'haveVideo' => false
        ];
        if($room != null){
            $video = VideoLive::where('code', $room)->where('isLive', 1)->first();
            $today = Carbon::now()->format('Y-m-d');
            $nowTime = Carbon::now()->format('H:i');
            if($video != null){
                $data['title'] = $video->title;
                $data['desc'] = $video->description;
                $user = User::find($video->userId);
                $user->pic = getUserPic($user->id);
                $data['user'] = $user;
                $data['haveVideo'] = true;
            }
            $room = '';
        }

        return view('streaming.streamingLive', compact(['room', 'data']));
    }


    public function importVideoToDB()
    {
        $loc = __DIR__ . '/../../../../assets/_images/video';

        $videos = scandir($loc);
        foreach ($videos as $video) {
            $vidLoc = $loc . '/' . $video;
            if (is_file($vidLoc)) {
                $thumbnailName = explode('.', $video)[0] . '.jpg';

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

                if ($second < 10)
                    $second = '0' . $second;
                if ($min < 10)
                    $min = '0' . $min;
                $nVid->duration = $duration . ':' . $min . ':' . $second;

                $nVid->save();

                $nloc = $loc . '/' . auth()->user()->id;
                if (!is_dir($nloc))
                    mkdir($nloc);

                rename($loc . '/' . $video, $nloc . '/' . $video);

                $vidLoc = $nloc . '/' . $video;

                $ffmpeg = \FFMpeg\FFMpeg::create();
                $video = $ffmpeg->open($vidLoc);
                $frame = $video->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(42));
                $frame->save($nloc . '/' . $thumbnailName);
            }
        }
        dd('done');
    }

    public function setVideoDuration()
    {
        $video = Video::all();
        foreach ($video as $item) {
            $loc = __DIR__ . '/../../../../assets/_images/video/' . $item->userId . '/' . $item->video;

            $ffprobe = \FFMpeg\FFProbe::create();
            $duration = (int)$ffprobe->format($loc)->get('duration');
            $second = $duration % 60;
            $duration = (int)($duration / 60);
            $min = $duration % 60;
            $duration = (int)($duration / 60);

            if ($second < 10)
                $second = '0' . $second;
            if ($min < 10)
                $min = '0' . $min;
            $item->duration = $duration . ':' . $min . ':' . $second;
            $item->save();
        }

        dd('done');
    }



}
