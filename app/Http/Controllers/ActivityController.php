<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Adab;
use App\models\Amaken;
use App\models\Cities;
use App\models\Hotel;
use App\models\LogModel;
use App\models\MahaliFood;
use App\models\Majara;
use App\models\Restaurant;
use App\models\SogatSanaie;
use App\models\State;
use App\models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class ActivityController extends Controller {
    public function getActivities() {

        $activityId = makeValidInput($_POST["activityId"]);
        $uId = makeValidInput($_POST["uId"]);
        $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
        $page = makeValidInput($_POST["page"]);
        $rateActivityId = Activity::whereName('امتیاز')->first()->id;
        $reviewActivityId = Activity::whereName('نظر')->first()->id;
        $page = ($page - 1) * 5;


        if($kindPlaceId != -1)
            $condition = ["visitorId" => $uId, "activityId" => $activityId, "kindPlaceId" => $kindPlaceId, 'confirm' => 1];
        else
            $condition = ["visitorId" => $uId, "activityId" => $activityId, 'confirm' => 1];
        
        $out = LogModel::where($condition)->skip($page)->limit(5)->get();

        if($out == null || count($out) == 0) {
            echo "empty";
        }
        else {

            foreach($out as $itr) {
                if($itr->pic == 0)
                    $itr->pic = "";
                $itr->visitorId = User::whereId($itr->visitorId)->username;
                switch ($itr->kindPlaceId) {
                    case 1:
                    default:
                        $tmp = Amaken::whereId($itr->placeId);
                        if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $tmp->file . "/f-1.jpg")))
                            $itr->placePic = URL::asset("_images/amaken/" . $tmp->file . "/f-1.jpg");
                        else
                            $itr->placePic = URL::asset("_images/nopic/blank.jpg");

                        $itr->placeRedirect = route('amakenDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                        if($itr->pic != "")
                            $itr->pic = URL::asset("userPhoto/amaken/l-" . $itr->text);
                    break;
                        break;
                    case 3:
                        $tmp = Restaurant::whereId($itr->placeId);
                        if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $tmp->file . "/f-1.jpg")))
                            $itr->placePic = URL::asset('_images/restaurant/' . $tmp->file . "/f-1.jpg");
                        else
                            $itr->placePic = URL::asset('_images/nopic/blank.jpg');

                        $itr->placeRedirect = route('restaurantDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                        if($itr->pic != "")
                            $itr->pic = URL::asset("userPhoto/restaurant/l-" . $itr->text);
                        break;
                    case 4:
                        $tmp = Hotel::whereId($itr->placeId);
                        if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $tmp->file . "/f-1.jpg")))
                            $itr->placePic = URL::asset("_images/hotels/" . $tmp->file . "/f-1.jpg");
                        else
                            $itr->placePic = URL::asset("_images/nopic/blank.jpg");

                        $itr->placeRedirect = route('hotelDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                        if($itr->pic != "")
                            $itr->pic = URL::asset("userPhoto/hotels/l-" . $itr->text);
                        break;

                    case 6:
                        $tmp = Majara::whereId($itr->placeId);
                        if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $tmp->file . "/f-1.jpg")))
                            $itr->placePic = URL::asset("_images/majara/" . $tmp->file . "/f-1.jpg");
                        else
                            $itr->placePic = URL::asset("_images/nopic/blank.jpg");

                        $itr->placeRedirect = route('majaraDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                        if($itr->pic != "")
                            $itr->pic = URL::asset("userPhoto/majara/l-" . $itr->text);
                        break;

                    case 8:
                        $tmp = Adab::whereId($itr->placeId);
                        if($tmp->category == 3) {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $tmp->file . "/f-1.jpg")))
                                $itr->placePic = URL::asset("_images/adab/ghazamahali/" . $tmp->file . "/f-1.jpg");
                            else
                                $itr->placePic = URL::asset("_images/nopic/blank.jpg");
                        }
                        else {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $tmp->file . "/f-1.jpg")))
                                $itr->placePic = URL::asset("_images/adab/soghat/" . $tmp->file . "/f-1.jpg");
                            else
                                $itr->placePic = URL::asset("_images/nopic/blank.jpg");
                        }

                        $itr->placeRedirect = route('adabDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                        if($itr->pic != "")
                            $itr->pic = URL::asset("userPhoto/adab/l-" . $itr->text);
                        break;
                }
                $itr->date = convertDate($itr->date);
                if($activityId == $rateActivityId)
                    $itr->point = ceil(DB::select('select AVG(userOpinions.rate) as avgRate from log, userOpinions WHERE log.id = logId and log.id = ' . $itr->id)[0]->avgRate);
                elseif ($activityId == $reviewActivityId) {
                    $condition = ['activityId' => $reviewActivityId, 'visitorId' => $uId, 'placeId' => $itr->placeId,
                        'kindPlaceId' => $itr->kindPlaceId, 'confirm' => 1];
                    $logId = LogModel::where($condition)->first()->id;
                    $itr->point = ceil(DB::select('select AVG(userOpinions.rate) as avgRate from log, userOpinions WHERE log.id = logId and log.id = ' . $logId)[0]->avgRate);
                }
                else
                    $itr->point = -1;
            }

            echo json_encode($out);
        }
        
    }

    function getNumsActivities() {

        $activityId = makeValidInput($_POST["activityId"]);
        $uId = makeValidInput($_POST["uId"]);

        $nums = DB::select("SELECT place.name as placeName, place.id as placeId, COUNT(kindPlaceId) as nums FROM log, place WHERE confirm = 1 and kindPlaceId = place.id and visitorId = " . $uId . " and activityId = " . $activityId . " GROUP BY(kindPlaceId)");

        echo json_encode($nums);
    }

    function getRecentlyActivities() {
        if(Auth::check()) {
            $uId = Auth::user()->id;
            $activities = DB::select("SELECT * FROM log WHERE log.activityId = 1 and log.visitorId = " . $uId . " order by date DESC limit 0, 8");
        }
        else{
            $lastWeek = Carbon::now()->subWeek()->format('Y-m-d');
            $activities = DB::select("SELECT kindPlaceId, placeId, COUNT(*) as num FROM log WHERE log.activityId = 1 AND `date` > '" . $lastWeek . "' GROUP BY kindPlaceId, placeId ORDER BY num DESC limit 0, 8");
        }
        $activityId = Activity::whereName('نظر')->first()->id;

        foreach($activities as $itr) {

            if($itr->placeId == -1)
                continue;

            switch ($itr->kindPlaceId) {
                case 1:
                    $tmp = Amaken::whereId($itr->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $tmp->file . "/f-1.jpg")))
                        $itr->placePic = URL::asset("_images/amaken/" . $tmp->file . "/f-1.jpg");
                    else
                        $itr->placePic = URL::asset("_images/nopic/blank.jpg");

                    $itr->placeRedirect = route('amakenDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                    break;
                case 3:
                    $tmp = Restaurant::whereId($itr->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $tmp->file . "/f-1.jpg")))
                        $itr->placePic = URL::asset('_images/restaurant/' . $tmp->file . "/" . $tmp->pic_1);
                    else
                        $itr->placePic = URL::asset('_images/nopic/blank.jg');

                    $itr->placeRedirect = route('restaurantDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                    break;
                case 4:
                    $tmp = Hotel::whereId($itr->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $tmp->file . "/f-1.jpg")))
                        $itr->placePic = URL::asset("_images/hotels/" . $tmp->file . "/f-1.jpg");
                    else
                        $itr->placePic = URL::asset("_images/nopic/blank.jpg");

                    $itr->placeRedirect = route('hotelDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                    break;
                case 6:
                    $tmp = Majara::whereId($itr->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $tmp->file . "/f-1.jpg")))
                        $itr->placePic = URL::asset("_images/majara/" . $tmp->file . "/f-1.jpg");
                    else
                        $itr->placePic = URL::asset("_images/nopic/blank.jpg");

                    $itr->placeRedirect = route('majaraDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                    break;
                case 10:
                    $tmp = SogatSanaie::find($itr->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/sogatsanaie/' . $tmp->file . "/f-1.jpg")))
                        $itr->placePic = URL::asset("_images/sogatsanaie/" . $tmp->file . "/f-1.jpg");
                    else
                        $itr->placePic = URL::asset("_images/nopic/blank.jpg");

                    $itr->placeRedirect = route('sanaiesogatDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                    break;
                case 11:
                    $tmp = MahaliFood::find($itr->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/mahalifood/' . $tmp->file . "/f-1.jpg")))
                        $itr->placePic = URL::asset("_images/mahalifood/" . $tmp->file . "/f-1.jpg");
                    else
                        $itr->placePic = URL::asset("_images/nopic/blank.jpg");

                    $itr->placeRedirect = route('mahaliFoodDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                    break;
            }

            $city = Cities::whereId($tmp->cityId);
            $itr->placeCity = $city->name;
            $itr->placeState = State::whereId($city->stateId)->name;
            $itr->placeName = $tmp->name;
            $itr->placeRate = getRate($itr->placeId, $itr->kindPlaceId)[1];

            $itr->placeReviews = DB::select('select count(*) as countNum from log, comment WHERE logId = log.id and status = 1 and placeId = ' . $itr->placeId .
                ' and kindPlaceId = ' . $itr->kindPlaceId . ' and activityId = ' . $activityId)[0]->countNum;

        }

        echo json_encode($activities);
    }

    public function getBookMarks() {

        $uId = Auth::user()->id;

        $activityId = Activity::whereName('نشانه گذاری')->first()->id;

        $activities = DB::select("SELECT * FROM log WHERE log.activityId = " . $activityId . " and log.visitorId = " . $uId . " order by log.date DESC");

        $activityId = Activity::whereName('نظر')->first()->id;

        foreach($activities as $itr) {

            if($itr->placeId == -1)
                continue;

            switch ($itr->kindPlaceId) {
                case 1:
                default:
                    $tmp = Amaken::whereId($itr->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $tmp->file . "/f-1.jpg")))
                        $itr->placePic = URL::asset("_images/amaken/" . $tmp->file . "/f-1.jpg");
                    else
                        $itr->placePic = URL::asset("_images/nopic/blank.jpg");

                    $itr->placeRedirect = route('amakenDetails', ['placeId' => $tmp->id]);
                    break;
                case 3:
                    $tmp = Restaurant::whereId($itr->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $tmp->file . "/f-1.jpg")))
                        $itr->placePic = URL::asset('_images/restaurant/' . $tmp->file . "/" . $tmp->pic_1);
                    else
                        $itr->placePic = URL::asset('_images/nopic/blank.jg');

                    $itr->placeRedirect = route('restaurantDetails', ['placeId' => $tmp->id]);
                    break;
                case 4:
                    $tmp = Hotel::whereId($itr->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $tmp->file . "/f-1.jpg")))
                        $itr->placePic = URL::asset("_images/hotels/" . $tmp->file . "/f-1.jpg");
                    else
                        $itr->placePic = URL::asset("_images/nopic/blank.jpg");

                    $itr->placeRedirect = route('hotelDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                    break;

                case 6:
                    $tmp = Majara::whereId($itr->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $tmp->file . "/f-1.jpg")))
                        $itr->placePic = URL::asset("_images/majara/" . $tmp->file . "/f-1.jpg");
                    else
                        $itr->placePic = URL::asset("_images/nopic/blank.jpg");

                    $itr->placeRedirect = route('majaraDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                    break;

                case 8:
                    $tmp = Adab::whereId($itr->placeId);
                    if($tmp->category == 3) {
                        if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $tmp->file . "/f-1.jpg")))
                            $itr->placePic = URL::asset("_images/adab/ghazamahali/" . $tmp->file . "/f-1.jpg");
                        else
                            $itr->placePic = URL::asset("_images/nopic/blank.jpg");
                    }
                    else {
                        if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $tmp->file . "/f-1.jpg")))
                            $itr->placePic = URL::asset("_images/adab/soghat/" . $tmp->file . "/f-1.jpg");
                        else
                            $itr->placePic = URL::asset("_images/nopic/blank.jpg");
                    }

                    $itr->placeRedirect = route('adabDetails', ['placeId' => $tmp->id, 'placeName' => $tmp->name]);
                    break;
            }

            $city = Cities::whereId($tmp->cityId);
            $itr->placeCity = $city->name;
            $itr->placeState = State::whereId($city->stateId)->name;
            $itr->placeName = $tmp->name;
            $itr->placeRate = getRate($itr->placeId, $itr->kindPlaceId)[1];

            $itr->placeReviews = DB::select('select count(*) as countNum from log, comment WHERE logId = log.id and status = 1 and placeId = ' . $itr->placeId .
                ' and kindPlaceId = ' . $itr->kindPlaceId . ' and activityId = ' . $activityId)[0]->countNum;

        }

        echo json_encode($activities);
    }
}