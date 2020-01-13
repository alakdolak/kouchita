<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Cities;
use App\models\ConfigModel;
use App\models\DefaultPic;
use App\models\LogModel;
use App\models\Majara;
use App\models\Place;
use App\models\PlaceStyle;
use App\models\SectionPage;
use App\models\State;
use App\models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class MajaraController extends Controller {

    public function getMajaraListElems($city, $mode)
    {

        if (isset($_POST["pageNum"]))
            $currPage = makeValidInput($_POST["pageNum"]);
        else {
            echo \GuzzleHttp\json_encode([]);
            return;
        }

        $sort = "rate";
        if (isset($_POST["sort"]))
            $sort = makeValidInput($_POST["sort"]);

        $activityId = Activity::whereName('نظر')->first()->id;
        $rateActivityId = Activity::whereName('امتیاز')->first()->id;
        $kindPlaceId = Place::whereName('ماجرا')->first()->id;

        $z = "";

        if (isset($_POST['color'])) {

            $name = $_POST['color'];

            $i = 0;
            $y = count($name);

            $x = "";
            while ($i < $y) {

                $t = $name[$i];
                $x = $x . '`' . $t . '`=1 AND ';

                $i++;
            }
            $n = strlen($x);
            $z = substr($x, 0, $n - 4);
        }

        if (empty($z))
            $z = "1 = 1";

        if ($mode == "city") {

            $city = Cities::whereName($city)->first();
            if ($city == null)
                return "نتیجه ای یافت نشد";

            if ($sort == "review")
                $hotels = DB::select("Select majara.id, majara.name, majara.cityId, majara.file, majara.pic_1, COUNT(*) as matches from majara, log, activity WHERE " . $z . " and cityId = " . $city->id . " and activity.id = " . $activityId . " and log.activityId = activity.id and log.placeId = majara.id and log.kindPlaceId = " . $kindPlaceId . " GROUP BY(log.placeId) ORDER by matches limit 4 offset " . (($currPage - 1) * 4));
            elseif ($sort == "rate")
                $hotels = DB::select("Select majara.id, majara.name, majara.cityId, majara.file, majara.pic_1, AVG(userOpinions.rate) as avgRate from majara, log, activity, userOpinions WHERE " . $z . " and cityId = " . $city->id . " and activity.id = " . $rateActivityId . " and log.activityId = activity.id and log.placeId = majara.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id GROUP BY(log.placeId) HAVING avgRate > 2 ORDER by avgRate DESC limit 4 offset " . (($currPage - 1) * 4));
            else
                $hotels = DB::select("Select majara.id, majara.name, majara.cityId, majara.file, majara.pic_1 from majara WHERE " . $z . " and cityId = " . $city->id . " ORDER by majara.name ASC limit 4 offset " . (($currPage - 1) * 4));

            $reminder = 4 - count($hotels);

            if ($reminder > 0) {
                if ($sort == "review")
                    $hotels = array_merge($hotels, DB::select("select majara.id, majara.name, majara.cityId, majara.file, majara.pic_1 from majara where " . $z . " and not exists (Select * from log WHERE " . $z . " and cityId = " . $city->id . " and log.activityId = " . $activityId . " and log.placeId = majara.id and log.kindPlaceId = " . $kindPlaceId . ") and cityId = " . $city->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
                else if ($sort == "rate")
                    $hotels = array_merge($hotels, DB::select("select majara.id, majara.name, majara.cityId, majara.file, majara.pic_1 from majara where " . $z . " and not exists (Select * from log, userOpinions WHERE " . $z . " and cityId = " . $city->id . " and log.activityId = " . $rateActivityId . " and log.placeId = majara.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id) and cityId = " . $city->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
            }
        } else {
            $state = State::whereName($city)->first();
            if ($state == null)
                return "نتیجه ای یافت نشد";

            if ($sort == "review")
                $hotels = DB::select("Select majara.id, majara.name, majara.cityId, majara.file, majara.pic_1, COUNT(*) as matches from majara, cities, state, log, activity WHERE " . $z . " and cityId = cities.id and state.id = stateId and state.id = " . $state->id . " and activity.id = " . $activityId . " and log.activityId = activity.id and log.placeId = majara.id and log.kindPlaceId = " . $kindPlaceId . " GROUP BY(log.placeId) ORDER by matches limit 4 offset " . (($currPage - 1) * 4));
            elseif ($sort == "rate")
                $hotels = DB::select("Select majara.id, majara.name, majara.cityId, majara.file, majara.pic_1, AVG(userOpinions.rate) as avgRate from majara, cities, state, log, activity, userOpinions WHERE " . $z . " and cityId = cities.id and state.id = stateId and state.id = " . $state->id . " and activity.id = " . $rateActivityId . " and log.activityId = activity.id and log.placeId = majara.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id GROUP BY(log.placeId) HAVING avgRate > 2 ORDER by avgRate DESC limit 4 offset " . (($currPage - 1) * 4));
            else
                $hotels = DB::select("Select majara.id, majara.name, majara.cityId, majara.file, majara.pic_1 from majara, cities, state WHERE " . $z . " and cityId = cities.id and state.id = stateId and state.id = " . $state->id . " ORDER by majara.name ASC limit 4 offset " . (($currPage - 1) * 4));

            $reminder = 4 - count($hotels);

            if ($reminder > 0) {
                if ($sort == "review")
                    $hotels = array_merge($hotels, DB::select("select majara.id, majara.name, majara.cityId, majara.file, majara.pic_1 from majara, cities, state where " . $z . " and not exists(Select * from log WHERE " . $z . " and cityId = cities.id and stateId  = " . $state->id . " and log.activityId = " . $activityId . " and log.placeId = majara.id and log.kindPlaceId = " . $kindPlaceId . ") and cityId = cities.id and state.id = stateId and state.id = " . $state->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
                else if ($sort == "rate")
                    $hotels = array_merge($hotels, DB::select("select majara.id, majara.name, majara.cityId, majara.file, majara.pic_1 from majara, cities, state where " . $z . " and not exists(Select * from log, userOpinions WHERE " . $z . " and cityId = cities.id and stateId = " . $state->id . " and log.activityId = " . $rateActivityId . " and log.placeId = majara.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id) and cityId = cities.id and state.id = stateId and state.id = " . $state->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
            }
        }

        foreach ($hotels as $hotel) {

            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $hotel->file . '/f-1.jpg')))
                $hotel->pic = URL::asset('_images/majara/' . $hotel->file . '/f-1.jpg');
            else
                $hotel->pic = URL::asset('_images/nopic/blank.jpg');

            $condition = ['placeId' => $hotel->id, 'kindPlaceId' => $kindPlaceId,
                'activityId' => $activityId];
            $hotel->reviews = LogModel::where($condition)->count();
            $cityObj = Cities::whereId($hotel->cityId);
            $hotel->city = $cityObj->name;
            $hotel->state = State::whereId($cityObj->stateId)->name;
            $hotel->avgRate = getRate($hotel->id, $kindPlaceId)[1];
        }

        if ($sort == "rate") {
            usort($hotels, function ($a, $b) {
                return $b->avgRate - $a->avgRate;
            });
        }

        echo \GuzzleHttp\json_encode(['places' => $hotels]);

    }

    public function showMajaraList($city, $mode) {
        if ($mode == "state") {

            $state = State::whereName($city)->first();
            if ($state == null)
                return "نتیجه ای یافت نشد";

        } else {
            $tmp = Cities::whereName($city)->first();
            if ($tmp == null)
                return "نتیجه ای یافت نشد";

            $state = State::whereId($tmp->stateId);
            if ($state == null)
                return "نتیجه ای یافت نشد";
        }

        return view('majara-list', array('mode' => $mode, 'placeMode' => 'amaken', 'city' => $city, 'state' => $state,
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));

    }

    private function getSimilarMajaras($place)
    {

        $stateId = State::whereId(Cities::whereId($place->cityId)->stateId)->id;

        $amakens = DB::Select('select * from amaken where cityId in (select cities.id from cities where stateId = ' . $stateId . ')');
        $arr = [];
        $count = 0;

        foreach ($amakens as $amaken) {

            if ($amaken->id == $place->id) {
                $amaken->point = -1;
                continue;
            }

            $point = 0;
            if ($amaken->tarikhibana == $place->tarikhibana)
                $point += 3;
            if ($amaken->modern == $place->modern)
                $point += 3;
            if ($amaken->mamooli == $place->mamooli)
                $point += 3;
            if ($amaken->tabiat == $place->tabiat)
                $point += 3;
            if ($amaken->kooh == $place->kooh)
                $point += 3;
            if ($amaken->darya == $place->darya)
                $point += 3;

            $arr[$count++] = [$count, $point];

        }

        usort($arr, function ($a, $b) {
            return $a[1] - $b[1];
        });

        $out = [$amakens[$arr[0][0]], $amakens[$arr[1][0]], $amakens[$arr[2][0]], $amakens[$arr[3][0]]];

        $kindPlaceId = Place::whereName('اماکن')->first()->id;
        for ($i = 0; $i < count($out); $i++) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $out[$i]->file . '/f-1.jpg')))
                $out[$i]->pic = URL::asset("_images/amaken/" . $out[$i]->file . '/f-1.jpg');
            else
                $out[$i]->pic = URL::asset("_images/nopic/blank.jpg");

            $condition = ['placeId' => $out[$i]->id, 'kindPlaceId' => $kindPlaceId, 'confirm' => 1,
                'activityId' => Activity::whereName('نظر')->first()->id];

            $out[$i]->reviews = LogModel::where($condition)->count();
            $out[$i]->rate = getRate($out[$i]->id, $kindPlaceId)[1];
        }

        return $out;
    }

    public function getSimilarsMajara()
    {

        if (isset($_POST["placeId"])) {
            $place = Majara::whereId(makeValidInput($_POST["placeId"]));
            if ($place != null) {
                echo \GuzzleHttp\json_encode($this->getSimilarMajaras($place));
                return;
            }
        }

        echo \GuzzleHttp\json_encode([]);
    }

    public function showMajaraDetail($placeId, $placeName = "", $mode = "", $err = "") {

        deleteReviewPic();

        if (Majara::whereId($placeId) == null)
            return Redirect::route('main');

        $hasLogin = true;
        $kindPlaceId = Place::whereName('ماجرا')->first()->id;
        $uId = -1;

        if (Auth::check()) {
            $u = Auth::user();
            $uId = $u->id;
            $userCode = $uId . '_' . rand(10000,99999);
            if($u->uploadPhoto == 0){
                $deffPic = DefaultPic::find($u->picture);

                if($deffPic != null)
                    $uPic = URL::asset('defaultPic/' . $deffPic->name);
                else
                    $uPic = URL::asset('_images/nopic/blank.jpg');
            }
            else{
                $uPic = URL::asset('userProfile/' . $u->picture);
            }
        }
        else{
            $hasLogin = false;
            $userCode = null;
            $uPic = URL::asset('_images/nopic/blank.jpg');
        }

        saveViewPerPage($kindPlaceId, $placeId);

        $bookMark = false;
        $condition = ['visitorId' => $uId, 'activityId' => Activity::whereName("نشانه گذاری")->first()->id,
            'placeId' => $placeId, 'kindPlaceId' => $kindPlaceId];
        if (LogModel::where($condition)->count() > 0)
            $bookMark = true;

        $rates = getRate($placeId, $kindPlaceId);

        $save = false;
        $count = DB::select("select count(*) as tripPlaceNum from trip, tripPlace WHERE tripPlace.placeId = " . $placeId . " and tripPlace.kindPlaceId = " . $kindPlaceId . " and tripPlace.tripId = trip.id and trip.uId = " . $uId);
        if ($count[0]->tripPlaceNum > 0)
            $save = true;


        $place = Majara::whereId($placeId);
        $city = Cities::whereId($place->cityId);
        $state = State::whereId($city->stateId);
        $photos = [];
        $place->address = $place->dastresi;

        if (!empty($place->picNumber)) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/s-' . $place->picNumber))) {
                $photos[count($photos)] = URL::asset('_images') . '/majara/' . $place->file . '/s-' . $place->picNumber;
                $thumbnail = URL::asset('_images') . '/majara/' . $place->file . '/f-' . $place->picNumber;
            } else {
                $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
                $thumbnail = URL::asset('_images/nopic/blank.jpg');
            }
        }
        else {
            $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
            $thumbnail = URL::asset('_images/nopic/blank.jpg');
        }

        $allState = State::all();

        $pics = getAllPlacePicsByKind($kindPlaceId, $placeId);
        $sitePics = $pics[0];
        $sitePicsJSON = $pics[1];
        $photographerPics = $pics[2];
        $photographerPicsJSON = $pics[3];
        $userPhotos = $pics[4];
        $userPhotosJson = $pics[5];

        $result = commonInPlaceDetails($kindPlaceId, $placeId, $city, $state, $place);
        $reviewCount = $result[0];
        $ansReviewCount = $result[1];
        $userReviewCount = $result[2];
        $multiQuestion = $result[3];
        $textQuestion = $result[4];
        $rateQuestion = $result[5];

        $multiQuestionJSON = json_encode($multiQuestion);
        $textQuestionJSON = json_encode($textQuestion);
        $rateQuestionJSON = json_encode($rateQuestion);

        return view('hotel-details.hotel-details', array('place' => $place, 'save' => $save, 'city' => $city, 'thumbnail' => $thumbnail,
            'userPhotos' => $userPhotos, 'userPhotosJson' => $userPhotosJson,
            'reviewCount' => $reviewCount, 'ansReviewCount' => $ansReviewCount, 'userReviewCount' => $userReviewCount,
            'photographerPics' => $photographerPics, 'photographerPicsJSON' => $photographerPicsJSON, 'userPic' => $uPic,
            'rateQuestion' => $rateQuestion, 'textQuestion' => $textQuestion, 'multiQuestion' => $multiQuestion,
            'rateQuestionJSON' => $rateQuestionJSON, 'textQuestionJSON' => $textQuestionJSON, 'multiQuestionJSON' => $multiQuestionJSON,
            'sitePics' => $sitePics, 'sitePicsJSON' => $sitePicsJSON, 'allState' => $allState, 'userCode' => $userCode,
            'state' => $state, 'avgRate' => $rates[1], 'photos' => $photos,
            'kindPlaceId' => $kindPlaceId, 'mode' => $mode, 'rates' => $rates[0], 'config' => ConfigModel::first(),
            'hasLogin' => $hasLogin, 'bookMark' => $bookMark, 'err' => $err,
            'placeStyles' => PlaceStyle::whereKindPlaceId($kindPlaceId)->get(), 'placeMode' => 'majara',
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));
    }
}
