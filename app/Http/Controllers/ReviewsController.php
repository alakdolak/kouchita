<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Adab;
use App\models\Alert;
use App\models\Amaken;
use App\models\Boomgardy;
use App\models\Cities;
use App\models\ConfigModel;
use App\models\DefaultPic;
use App\models\GoyeshCity;
use App\models\Hotel;
use App\models\LogModel;
use App\models\MahaliFood;
use App\models\Majara;
use App\models\Place;
use App\models\QuestionAns;
use App\models\QuestionUserAns;
use App\models\Report;
use App\models\ReportsType;
use App\models\Restaurant;
use App\models\LogFeedBack;
use App\models\ReviewPic;
use App\models\ReviewUserAssigned;
use App\models\SogatSanaie;
use App\models\State;
use App\models\UserOpinion;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;


class ReviewsController extends Controller
{
    public function reviewUploadPic(Request $request)
    {
        $location = __DIR__ . '/../../../../assets/limbo';

        if(!file_exists($location))
            mkdir($location);

        if(isset($_FILES['pic']) && isset($request->code) && $_FILES['pic']['error'] == 0){

            $valid_ext = array('image/jpeg','image/png');
            if(in_array($_FILES['pic']['type'], $valid_ext)){
                $filename = time() . '_' . pathinfo($_FILES['pic']['name'], PATHINFO_FILENAME) . '.jpg';
                $destinationMainPic = $location . '/' . $filename;
                compressImage($_FILES['pic']['tmp_name'], $destinationMainPic, 60);

                $newPicReview = new ReviewPic();
                $newPicReview->pic = $filename;
                $newPicReview->code = $request->code;
                $newPicReview->save();

                echo json_encode(['ok', $filename]);
            }
            else
                echo 'nok2';
        }
        else
            echo 'nok3';

        return;
    }

    public function reviewUploadVideo(Request $request)
    {
        $location = __DIR__ . '/../../../../assets/limbo';

        if(!file_exists($location))
            mkdir($location);

        if(isset($_FILES['video']) && isset($request->code)){
            $filename = time() . '_' . $_FILES['video']['name'];
            $destinationMainPic = $location . '/' . $filename;
            move_uploaded_file($_FILES['video']['tmp_name'], $destinationMainPic);

            $img = $_POST['videoPic'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $videoArray = explode('.', $filename);
            $videoName = '';
            for($k = 0; $k < count($videoArray)-1; $k++)
                $videoName .= $videoArray[$k] . '.';
            $videoName .= 'png';

            $file =  __DIR__ . '/../../../../assets/limbo/' . $videoName;
            $success = file_put_contents($file, $data);

            $newPicReview = new ReviewPic();
            $newPicReview->pic = $filename;
            $newPicReview->code = $request->code;
            if(isset($request->isVideo) && $request->isVideo == 1)
                $newPicReview->isVideo = 1;
            if(isset($request->is360) && $request->is360 == 1) {
                $newPicReview->is360 = 1;
                $newPicReview->isVideo = 1;
            }
            $newPicReview->save();

            echo json_encode(['ok', $filename]);
        }
        else
            echo 'nok3';

        return;
    }

    public function deleteReviewPic(Request $request){
        $code = $request->code;
        $name = $request->name;

        $pics = ReviewPic::where('code', $code)->where('pic', $name)->first();

        if($pics != null){
            if($pics->isVideo == 1){
                $videoArray = explode('.', $pics->pic);
                $videoName = '';
                for($k = 0; $k < count($videoArray)-1; $k++)
                    $videoName .= $videoArray[$k] . '.';
                $videoName .= 'png';

                $location2 = __DIR__ . '/../../../../assets/limbo/' . $videoName;

                if(file_exists($location2)) {
                    unlink($location2);
                }
            }
            $location = __DIR__ . '/../../../../assets/limbo/' . $pics->pic;
            if(file_exists($location))
                unlink($location);
            $pics->delete();
            echo 'ok';
        }
        else
            echo 'nok';

        return;
    }

    public function doEditReviewPic(Request $request)
    {
        if(isset($request->code) && isset($request->name)){
            $name = $request->name;
            $code = $request->code;

            $location = __DIR__ . '/../../../../assets/limbo/' . $name;
            if(file_exists($location))
                unlink($location);

            move_uploaded_file($_FILES['pic']['tmp_name'], $location);

            echo 'ok';
        }

        return;
    }

    public function storeReview(Request $request)
    {
        $activity = Activity::where('name', 'نظر')->first();

        if(isset($request->placeId) && isset($request->kindPlaceId) && isset($request->code)){

            $placeId = $request->placeId;
            $uId = Auth::user()->id;
            $kindPlaceId = $request->kindPlaceId;
            $kindPlace = Place::find($kindPlaceId);
            $place = DB::table($kindPlace->tableName)->find($placeId);
            $kindPlaceName = $kindPlace->fileName;

            $log = new LogModel();
            $log->placeId = $placeId;
            $log->kindPlaceId = $kindPlaceId;
            $log->visitorId = $uId;
            $log->date = Carbon::now()->format('Y-m-d');
            $log->time = getToday()['time'];
            $log->activityId = $activity->id;
            if ($request->text != null)
                $log->text = $request->text;
            else
                $log->text = '';

            $log->save();

            $reviewPic = ReviewPic::where('code', $request->code)->get();
            \DB::select('UPDATE `reviewPics` SET `logId`= ' . $log->id . ' WHERE code ="' . $request->code . '";');

            if (count($reviewPic) > 0) {
                $location = __DIR__ . '/../../../../assets/userPhoto/' . $kindPlaceName;
                if (!file_exists($location))
                    mkdir($location);
                $location .= '/' . $place->file;
                if (!file_exists($location))
                    mkdir($location);

                $limboLocation = __DIR__ . '/../../../../assets/limbo/';

                foreach ($reviewPic as $item) {
                    $file = $limboLocation . $item->pic;
                    $dest = $location . '/' . $item->pic;
                    if (file_exists($file))
                        rename($file, $dest);

                    if ($item->isVideo == 1) {
                        $videoArray = explode('.', $item->pic);
                        $videoName = '';
                        for ($k = 0; $k < count($videoArray) - 1; $k++)
                            $videoName .= $videoArray[$k] . '.';
                        $videoName .= 'png';

                        $file = $limboLocation . $videoName;
                        $dest = $location . '/' . $videoName;
                        if (file_exists($file))
                            rename($file, $dest);
                    }
                }
            }
            else if($request->text == null){
                $log->subject = 'dontShowThisText';
                $log->confirm = 1;
                $log->save();
            }

            $assignedUser = json_decode($request->assignedUser);
            if ($assignedUser != null) {
                foreach ($assignedUser as $item) {
                    $newAssigned = new ReviewUserAssigned();
                    $newAssigned->logId = $log->id;

                    $user = User::where('username', $item)->orWhere('email', $item)->first();
                    if ($user != null)
                        $newAssigned->userId = $user->id;
                    else
                        $newAssigned->email = $item;

                    $newAssigned->save();

                    if($user != null){
                        $newAlert = new Alert();
                        $newAlert->subject = 'assignedUserToReview';
                        $newAlert->referenceTable = 'reviewUserAssigned';
                        $newAlert->referenceId = $newAssigned->id;
                        $newAlert->userId = $user->id;
                        $newAlert->seen = 0;
                        $newAlert->click = 0;
                        $newAlert->save();
                    }

                }
            }

            if($request->textId != null && $request->textAns != null){
                $textQuestion = $request->textId;
                $textAns = $request->textAns;
                for($i = 0; $i < count($textAns); $i++){
                    if($textAns[$i] != null && $textAns[$i] != '' && $textQuestion[$i] != null){
                        $newAns = new QuestionUserAns();
                        $newAns->logId = $log->id;
                        $newAns->questionId = $textQuestion[$i];
                        $newAns->ans = $textAns[$i];
                        $newAns->save();
                    }
                }
            }

            if($request->multiQuestion != null && $request->multiAns != null) {
                $multiQuestion = json_decode($request->multiQuestion);
                $multiAns = json_decode($request->multiAns);

                for($i = 0; $i < count($multiAns); $i++){
                    if($multiAns[$i] != null && $multiAns[$i] != '' && $multiQuestion[$i] != null){
                        $newAns = new QuestionUserAns();
                        $newAns->logId = $log->id;
                        $newAns->questionId = $multiQuestion[$i];
                        $newAns->ans = $multiAns[$i];
                        $newAns->save();
                    }
                }
            }

            if($request->rateQuestion != null && $request->rateAns != null) {
                $rateQuestion = json_decode($request->rateQuestion);
                $rateAns = json_decode($request->rateAns);

                for($i = 0; $i < count($rateAns); $i++){
                    if($rateAns[$i] != null && $rateAns[$i] != '' && $rateQuestion[$i] != null){
                        $newAns = new QuestionUserAns();
                        $newAns->logId = $log->id;
                        $newAns->questionId = $rateQuestion[$i];
                        $newAns->ans = $rateAns[$i];
                        $newAns->save();
                    }
                }
            }

            $newAlert = new Alert();
            $newAlert->subject = 'addReview';
            $newAlert->referenceTable = 'log';
            $newAlert->referenceId = $log->id;
            $newAlert->userId = $uId;
            $newAlert->seen = 0;
            $newAlert->click = 0;
            $newAlert->save();

            $code = $uId . '_' . rand(10000,99999);

            echo json_encode(['status' => 'ok', 'code' => $code]);
        }
        else
            echo json_encode(['status' => 'nok']);

        return;
    }

    public function getReviews(Request $request){

        if(isset($request->placeId) && isset($request->kindPlaceId)){
            $activity = Activity::where('name', 'نظر')->first();
            $a = Activity::where('name', 'پاسخ')->first();

            $ques = array();
            $ans = array();
            $isFilter = false;
            $isPicFilter = false;
            $sqlQuery = ' CHARACTER_LENGTH(text) >= 0';
            $onlyPic = 0;

            $count = 0;
            $num = 0;
            if(isset($request->count))
                $count = $request->count;
            if(isset($request->num))
                $num = $request->num;

            if(\auth()->check())
                $uId = \auth()->user()->id;
            else
                $uId = 0;

            $sqlQuery1 = 'activityId = ' . $activity->id . ' AND placeId = ' . $request->placeId . ' AND kindPlaceId = ' . $request->kindPlaceId . ' AND relatedTo = 0 AND ((visitorId = ' . $uId . ') OR (confirm = 1)) AND subject != "dontShowThisText"';

            if(isset($request->filters)) {
                foreach ($request->filters as $item) {
                    if ($item != null && $item['kind'] != 'onlyPic' && $item['kind'] != 'textSearch') {
                        array_push($ques, $item['id']);
                        array_push($ans, $item['value']);
                    }
                    else if($item != null && $item['kind'] == 'onlyPic'){

                        if($item['value'] != 3) {
                            $onlyPic = $item['value'];
                            $isPicFilter = true;
                        }
                        else{
                            if($sqlQuery != '')
                                $sqlQuery .= ' AND';
                            $sqlQuery = ' CHARACTER_LENGTH(text) > 150';
                        }

                    }
                    else if($item != null && $item['kind'] == 'textSearch'){

                        if($sqlQuery != '')
                            $sqlQuery .= ' AND';

                        $sqlQuery .= ' text LIKE "%' . $item['value'] . '%"';
                    }

                }

                $lo = array();
                if (count($ques) > 0) {
                    $isFilter = true;

                    $logs = LogModel::whereRaw($sqlQuery1)->get();

                    $logId = array();
                    for ($i = 0; $i < count($logs); $i++)
                        array_push($logId, $logs[$i]->id);

                    $isNull = false;

                    for ($i = 0; $i < count($ques); $i++) {
                        if (count($lo) != 0)
                            $n = DB::select('SELECT logId FROM questionUserAns WHERE questionId = ' . $ques[$i] . ' AND ans = ' . $ans[$i] . ' AND  logId IN (' . implode(",", $lo) . ')');
                        else
                            $n = DB::select('SELECT logId FROM questionUserAns WHERE questionId = ' . $ques[$i] . ' AND ans = ' . $ans[$i] . ' AND logId IN (' . implode(",", $logId) . ')');

                        if (count($n) == 0) {
                            $isNull = true;
                            break;
                        }

                        $lo = array();
                        foreach ($n as $l)
                            array_push($lo, $l->logId);
                    }

                    if ($isNull) {
                        echo 'nok1';
                        return;
                    }
                }

                if($isPicFilter){

                    if($sqlQuery == '')
                        $sqlQuery = '1';

                    $logs = LogModel::whereRaw($sqlQuery1)->whereRaw($sqlQuery)->get();

                    $loo = array();
                    foreach ($logs as $item)
                        array_push($loo, $item->id);

                    if($onlyPic != 3){
                        $ni = DB::select('SELECT logId, GROUP_CONCAT(isVideo) AS video FROM reviewPics WHERE logId IN (' . implode(",", $loo) . ') GROUP BY logId;');

                        $lo = array();
                        foreach ($ni as $item){
                            switch ($onlyPic){
                                case 1:
                                    if(strpos($item->video, '1') === false)
                                        array_push($lo, $item->logId);
                                    break;
                                case 2:
                                    if(strpos($item->video, '0') === false) {
                                        array_push($lo, $item->logId);
                                    }
                                    break;
                                case 4:
                                    array_push($lo, $item->logId);
                                    break;
                            }
                        }
                    }

                    $isFilter = true;

                }

                if(count($lo) > 0){
                    if($sqlQuery != '')
                        $sqlQuery .= ' AND';

                    $sqlQuery .= ' id IN (' . implode(",", $lo) . ')';
                }
                else if(($isPicFilter || count($ques) > 0) && count($lo) == 0){
                    echo 'nok1';
                    return;
                }

            }

            if($sqlQuery == '')
                $sqlQuery = '1';

            $logCount = LogModel::whereRaw($sqlQuery1)->whereRaw($sqlQuery)->count();
            if($num == 0 && $count == 0)
                $logs = LogModel::whereRaw($sqlQuery1)->whereRaw($sqlQuery)->orderByDesc('date')->orderByDesc('time')->get();
            else
                $logs = LogModel::whereRaw($sqlQuery1)->whereRaw($sqlQuery)->orderByDesc('date')->orderByDesc('time')->skip(($num-1)*$count)->take($count)->get();

            if(count($logs) == 0)
                echo 'nok1';
            else{
                foreach ($logs as $key => $item)
                    $item = $this->reviewTrueType($item);

                echo json_encode([$logs, $logCount]);
            }
        }

        return;

    }

    public function ansReview(Request $request)
    {
        if(\auth()->check()) {
            if (isset($request->text) && isset($request->logId)) {
                if (strlen($request->text) > 2) {
                    $u = Auth::user();
                    $a = Activity::where('name','پاسخ')->first();
                    $mainLog = LogModel::find($request->logId);
                    if($mainLog != null) {
                        $newLog = New LogModel();
                        $newLog->placeId = $mainLog->placeId;
                        $newLog->kindPlaceId = $mainLog->kindPlaceId;
                        $newLog->visitorId = $u->id;
                        $newLog->date = Carbon::now()->format('Y-m-d');;
                        $newLog->time = getToday()['time'];
                        $newLog->activityId = $a->id;
                        $newLog->text = $request->text;
                        $newLog->relatedTo = $mainLog->id;
                        $newLog->save();

                        if(isset($request->ansAns) && $request->ansAns == 1){
                            $mainLog->subject = 'ans';
                            $mainLog->save();
                        }

                        echo 'ok';
                    }
                }
            }
        }
    }

    public function deleteReview(Request $request)
    {
        if(\auth()->check()){
            $user = \auth()->user();
            if(isset($request->id)){
                $review = LogModel::find($request->id);
                if($review != null && $review->visitorId == $user->id){
                    $kindPlace = Place::find($review->kindPlaceId);
                    $place = \DB::table($kindPlace->tableName)->find($review->placeId);
                    $location = __DIR__ . '/../../../../assets/userPhoto/' . $kindPlace->fileName . '/' . $place->file;
                    $reviewPics = ReviewPic::where('logId', $review->id)->get();
                    foreach ($reviewPics as $pic){
                        if(is_file($location.'/'.$pic->pic))
                            unlink($location.'/'.$pic->pic);
                        $pic->delete();
                    }

                    $userAssigned = ReviewUserAssigned::where('logId', $review->id)->get();
                    foreach ($userAssigned as $item){
                        Alert::where('referenceId', $item->id)->where('referenceTable', 'reviewUserAssigned')->delete();
                        $item->delete();
                    }

                    LogFeedBack::where('logId', $review->id)->delete();

                    $anses = LogModel::where('relatedTo', $review->id)->get();
                    foreach ($anses as $item)
                        deleteAnses($item->id);

                    QuestionUserAns::where('logId', $review->id)->delete();
                    Report::where('logId', $review->id)->delete();

                    $alert = new Alert();
                    $alert->userId = $user->id;
                    $alert->subject = 'deleteReviewByUser';
                    $alert->referenceTable = $kindPlace->tableName;
                    $alert->referenceId = $place->id;
                    $alert->save();

                    $rates = getRate($place->id, $kindPlace->id)[1];
                    switch ($kindPlace->id){
                        case 1:
                            Amaken::where('id', $place->id)->update(['reviewCount' => $place->reviewCount-1, 'fullRate' => $rates]);
                            break;
                        case 3:
                            Restaurant::where('id', $place->id)->update(['reviewCount' => $place->reviewCount-1, 'fullRate' => $rates]);
                            break;
                        case 4:
                            Hotel::where('id', $place->id)->update(['reviewCount' => $place->reviewCount-1, 'fullRate' => $rates]);
                            break;
                        case 6:
                            Majara::where('id', $place->id)->update(['reviewCount' => $place->reviewCount-1, 'fullRate' => $rates]);
                            break;
                        case 10:
                            SogatSanaie::where('id', $place->id)->update(['reviewCount' => $place->reviewCount-1, 'fullRate' => $rates]);
                            break;
                        case 11:
                            MahaliFood::where('id', $place->id)->update(['reviewCount' => $place->reviewCount-1, 'fullRate' => $rates]);
                            break;
                        case 12:
                            Boomgardy::where('id', $place->id)->update(['reviewCount' => $place->reviewCount-1, 'fullRate' => $rates]);
                            break;
                    }

                    $review->delete();
                    echo 'ok';
                }
                else
                    echo 'nok2';
            }
            else
                echo 'nok1';
        }
        else
            echo 'nok';

        return;
    }

    private function imageStyleCreate($item){
        foreach ($item->pics as $item2) {
            if($item2->isVideo == 1){
                $videoArray = explode('.', $item2->pic);
                $videoName = '';
                for($k = 0; $k < count($videoArray)-1; $k++)
                    $videoName .= $videoArray[$k] . '.';
                $videoName .= 'png';

                $item2->url = URL::asset('userPhoto/' . $item->mainFile . '/' . $item->place->file . '/' . $videoName);
                $item2->videoUrl = URL::asset('userPhoto/' . $item->mainFile . '/' . $item->place->file . '/' . $item2->pic);
            }
            else
                $item2->url = URL::asset('userPhoto/' . $item->mainFile . '/' . $item->place->file . '/' . $item2->pic);
        }
        return $item;
    }

    private function reviewTrueType($_log){
        $anss = getAnsToComments($_log->id);
        $ansToReview = $anss[0];
        $_log->ansNum = $anss[1];

        if(count($ansToReview) > 0)
            $_log->comment = $ansToReview;
        else
            $_log->comment = array();

        $_log->user = User::select(['id', 'first_name', 'last_name', 'username', 'picture', 'uploadPhoto'])->find($_log->visitorId);
        $_log->usernameReviewWriter = $_log->user->username;

        $_log->userPic = getUserPic($_log->user->id);

        $_log->assigned = ReviewUserAssigned::where('logId', $_log->id)->get();

        $kindPlace = Place::find($_log->kindPlaceId);
        $_log->mainFile = $kindPlace->fileName;
        $_log->place = DB::table($kindPlace->tableName)->select(['id', 'name', 'cityId', 'file'])->find($_log->placeId);
        $_log->kindPlace = $kindPlace->name;

        $_log->pics = ReviewPic::where('logId', $_log->id)->get();
        $_log = $this->imageStyleCreate($_log);

        $_log->city = Cities::find($_log->place->cityId);
        $_log->state = State::find($_log->city->stateId);

        if (count($_log->assigned) != 0) {
            foreach ($_log->assigned as $_log2) {
                if ($_log2->userId != null) {
                    $u = User::find($_log2->userId);
                    if ($u != null)
                        $_log2->name = $u->username;
                }
            }
        }

        $_log->ans = \DB::select('SELECT us.logId, us.questionId, us.ans, qus.id, qus.description, qus.ansType FROM questionUserAns AS us , questions AS qus WHERE us.logId = ' . $_log->id . ' AND qus.id = us.questionId ORDER BY qus.ansType');
        if (count($_log->ans) != 0) {
            foreach ($_log->ans as $_log2) {
                if ($_log2->ansType == 'multi') {
                    $anss = QuestionAns::where('questionId', $_log2->id)->where('id', $_log2->ans)->first();
                    $_log2->ans = $anss->ans;
                    $_log2->ansId = $anss->id;
                }
            }
        }

        $time = $_log->date . '';
        if(strlen($_log->time) == 1)
            $_log->time = '000' . $_log->time;
        else if(strlen($_log->time) == 2)
            $_log->time = '00' . $_log->time;
        else if(strlen($_log->time) == 3)
            $_log->time = '0' . $_log->time;

        if(strlen($_log->time) == 4) {
            $time .= ' ' . substr($_log->time, 0, 2) . ':' . substr($_log->time, 2, 2);
            $_log->timeAgo = getDifferenceTimeString($time);
        }
        else
            $_log->timeAgo = '';

        $_log->like = LogFeedBack::where('logId', $_log->id)->where('like', 1)->count();
        $_log->dislike = LogFeedBack::where('logId', $_log->id)->where('like', -1)->count();

        $_log->yourReview = false;
        if (\auth()->check()) {
            $u = \auth()->user();
            $_log->userLike = LogFeedBack::where('logId', $_log->id)->where('userId', $u->id)->first();
            if($_log->visitorId == $u->id)
                $_log->yourReview = true;
        } else
            $_log->userLike = null;

        return $_log;
    }

}
