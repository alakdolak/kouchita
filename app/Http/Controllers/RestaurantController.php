<?php

namespace App\Http\Controllers;


use App\models\Activity;
use App\models\Cities;
use App\models\ConfigModel;
use App\models\DefaultPic;
use App\models\LogModel;
use App\models\Place;
use App\models\PlaceStyle;
use App\models\Restaurant;
use App\models\SectionPage;
use App\models\State;
use App\models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class RestaurantController extends Controller {

    public function getRestaurantsMain()
    {

        $activityId = Activity::whereName('نظر')->first()->id;
        $kindPlaceId = Place::whereName('رستوران')->first()->id;
        $place1 = DB::select("select restaurant.id, restaurant.name, restaurant.cityId, restaurant.file, restaurant.pic_1, COUNT(*) as matches from restaurant, log, activity WHERE confirm = 1 and log.activityId = " . $activityId . " and log.activityId = activity.id and log.placeId = restaurant.id and log.kindPlaceId = " . $kindPlaceId . " GROUP BY(log.placeId) ORDER by matches limit 0, 4");

        $reminder = 4 - count($place1);
        $z = "(";
        $first = true;

        foreach ($place1 as $itr) {
            if ($first)
                $first = false;
            else
                $z .= ',';

            $z .= $itr->id;
        }

        $z .= ')';

        if (!$first)
            $place1 = array_merge($place1, DB::select('select id, name, cityId, file, pic_1, 0 as matches from 
              restaurant WHERE id not in ' . $z . 'limit 0, ' . $reminder));
        else
            $place1 = array_merge($place1, DB::select('select id, name, cityId, file, pic_1, 0 as matches from 
              restaurant limit 0, ' . $reminder));

        foreach ($place1 as $itr) {

            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $itr->file . '/f-1.jpg')))
                $itr->pic = URL::asset('_images/restaurant/' . $itr->file . '/f-1.jpg');
            else
                $itr->pic = URL::asset('_images/nopic/blank.jpg');

            $itr->reviews = $itr->matches;
            $itr->rate = getRate($itr->id, $kindPlaceId)[1];
            $itr->url = route('restaurantDetails', ['placeId' => $itr->id, 'placeName' => $itr->name]);
            $itr->kindPlaceId = $kindPlaceId;
        }

        foreach ($place1 as $itr) {

            if ($itr == null || count($itr) == 0) {
                $itr = null;
                continue;
            }

            $itr->present = true;

            if ($itr->kindPlaceId != 8) {
                $city = Cities::whereId($itr->cityId);
                if ($city == null) {
                    $itr->present = false;
                    continue;

                }

                $itr->city = $city->name;
                $itr->state = State::whereId($city->stateId)->name;
            } else {
                $city = State::whereId($itr->stateId);
                if ($city == null) {
                    $itr = null;
                    continue;
                }
                $itr->state = $itr->city = $city->name;
            }
        }

        echo json_encode($place1);
    }

    private function getSimilarRestaurants($place)
    {

        $stateId = State::whereId(Cities::whereId($place->cityId)->stateId)->id;

        $restaurants = DB::Select('select * from restaurant where cityId in (select cities.id from cities where stateId = ' . $stateId . ')');
        $arr = [];
        $count = 0;

        foreach ($restaurants as $restaurant) {

            if ($restaurant->id == $place->id) {
                $restaurant->point = -1;
                continue;
            }

            $point = 0;
            if ($restaurant->modern == $place->modern)
                $point += 3;
            if ($restaurant->mamooli == $place->mamooli)
                $point += 3;
            if ($restaurant->kind_id == $place->kind_id)
                $point += 3;
            if ($restaurant->food_irani == $place->food_irani)
                $point += 3;
            if ($restaurant->food_farangi == $place->food_farangi)
                $point += 3;
            if ($restaurant->food_mahali == $place->food_mahali)
                $point += 3;

            $arr[$count++] = [$count, $point];

        }

        usort($arr, function ($a, $b) {
            return $a[1] - $b[1];
        });

        $out = [$restaurants[$arr[0][0]], $restaurants[$arr[1][0]], $restaurants[$arr[2][0]], $restaurants[$arr[3][0]]];

        $kindPlaceId = Place::whereName('رستوران')->first()->id;
        for ($i = 0; $i < count($out); $i++) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $out[$i]->file . '/f-1.jpg')))
                $out[$i]->pic = URL::asset("_images/restaurant/" . $out[$i]->file . '/f-1.jpg');
            else
                $out[$i]->pic = URL::asset("_images/nopic/blank.jpg");

            $condition = ['placeId' => $out[$i]->id, 'kindPlaceId' => $kindPlaceId, 'confirm' => 1,
                'activityId' => Activity::whereName('نظر')->first()->id];

            $out[$i]->reviews = LogModel::where($condition)->count();
            $out[$i]->rate = getRate($out[$i]->id, $kindPlaceId)[1];
        }

        return $out;
    }

    public function getSimilarsRestaurant()
    {

        if (isset($_POST["placeId"])) {
            $place = Restaurant::whereId(makeValidInput($_POST["placeId"]));
            if ($place != null) {
                echo \GuzzleHttp\json_encode($this->getSimilarRestaurants($place));
                return;
            }
        }

        echo \GuzzleHttp\json_encode([]);
    }

    public function showRestaurantDetail($placeId, $placeName = "", $mode = "", $err = "") {

        deleteReviewPic();

        if (Restaurant::whereId($placeId) == null)
            return Redirect::route('main');

        $hasLogin = true;
        $kindPlaceId = Place::whereName('رستوران')->first()->id;
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

        $place = Restaurant::whereId($placeId);
        $city = Cities::whereId($place->cityId);
        $state = State::whereId($city->stateId);
        $photos = [];

        if (!empty($place->picNumber)) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/s-' . $place->picNumber))) {
                $photos[count($photos)] = URL::asset('_images') . '/restaurant/' . $place->file . '/s-' . $place->picNumber;
                $thumbnail = URL::asset('_images') . '/restaurant/' . $place->file . '/f-' . $place->picNumber;
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

        $inPage = 'place_' . $kindPlaceId . '_' . $placeId;
        session(['inPage' => $inPage]);

        return view('hotel-details.hotel-details', array('place' => $place, 'save' => $save, 'city' => $city, 'thumbnail' => $thumbnail,
            'state' => $state, 'avgRate' => $rates[1], 'photos' => $photos,
            'userPhotos' => $userPhotos, 'userPhotosJson' => $userPhotosJson,
            'reviewCount' => $reviewCount, 'ansReviewCount' => $ansReviewCount, 'userReviewCount' => $userReviewCount,
            'photographerPics' => $photographerPics, 'photographerPicsJSON' => $photographerPicsJSON, 'userPic' => $uPic,
            'rateQuestion' => $rateQuestion, 'textQuestion' => $textQuestion, 'multiQuestion' => $multiQuestion,
            'rateQuestionJSON' => $rateQuestionJSON, 'textQuestionJSON' => $textQuestionJSON, 'multiQuestionJSON' => $multiQuestionJSON,
            'sitePics' => $sitePics, 'sitePicsJSON' => $sitePicsJSON, 'allState' => $allState, 'userCode' => $userCode,
            'kindPlaceId' => Place::whereName('رستوران')->first()->id, 'mode' => $mode, 'rates' => $rates[0],
            'hasLogin' => $hasLogin, 'bookMark' => $bookMark, 'err' => $err, 'config' => ConfigModel::first(),
            'placeStyles' => PlaceStyle::whereKindPlaceId($kindPlaceId)->get(), 'placeMode' => 'restaurant',
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));
    }
}
