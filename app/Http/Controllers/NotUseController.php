<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Adab;
use App\models\Amaken;
use App\models\Cities;
use App\models\ConfigModel;
use App\models\DefaultPic;
use App\models\Hotel;
use App\models\HotelApi;
use App\models\LogModel;
use App\models\Majara;
use App\models\Place;
use App\models\PlaceStyle;
use App\models\QuestionAns;
use App\models\Restaurant;
use App\models\SectionPage;
use App\models\State;
use App\models\Survey;
use App\models\Tag;
use Illuminate\Http\Request;

class NotUseController extends Controller
{
    public function showHotelDetailAllReview($placeId, $placeName = "", $mode = "", $err = "")
    {
        return \redirect(route('placeDetails', ['kindPlaceId' => 4, 'placeId' => $placeId]));
        deleteReviewPic();

        if (Hotel::whereId($placeId) == null)
            return Redirect::route('main');

        $hasLogin = true;
        $kindPlaceId = Place::whereName('هتل')->first()->id;
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
        else {
            $hasLogin = false;
            $userCode = null;
            $uPic = URL::asset('_images/nopic/blank.jpg');
        }

        if ($hasLogin) {

            $activityId = Activity::whereName('مشاهده')->first()->id;

            $condition = ['visitorId' => $uId, 'placeId' => $placeId, 'kindPlaceId' => $kindPlaceId,
                'activityId' => $activityId];
            $log = LogModel::where($condition)->first();
            if ($log == null) {
                $log = new LogModel();
                $log->time = getToday()["time"];
                $log->activityId = $activityId;
                $log->placeId = $placeId;
                $log->kindPlaceId = $kindPlaceId;
                $log->visitorId = $uId;
                $log->date = date('Y-m-d');
                $log->save();
            } else {
                $log->date = date('Y-m-d');
                $log->save();
            }
        }
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

        $place = Hotel::whereId($placeId);
        $city = Cities::whereId($place->cityId);
        $state = State::whereId($city->stateId);
        $photos = [];

        if (!empty($place->picNumber)) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/s-' . $place->picNumber))) {
                $photos[count($photos)] = URL::asset('_images') . '/hotels/' . $place->file . '/s-' . $place->picNumber;
                $thumbnail = URL::asset('_images') . '/hotels/' . $place->file . '/f-' . $place->picNumber;
            } else {
                $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
                $thumbnail = URL::asset('_images/nopic/blank.jpg');
            }
        } else {
            $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
            $thumbnail = URL::asset('_images/nopic/blank.jpg');
        }

        $aksActivityId = Activity::whereName('عکس')->first()->id;

//        $userPhotos = 0;
        $logPhoto = '';
//
//        $tmp = DB::select("select count(*) as countNum from log WHERE confirm = 1 and activityId = " . $aksActivityId . " and placeId = " . $placeId . " and kindPlaceId = " . $kindPlaceId . " and pic <> 0");
//        if ($tmp != null && count($tmp) > 0)
//            $userPhotos = $tmp[0]->countNum;

        $srcCities = DB::select("select DISTINCT(src) from log, comment WHERE log.placeId = " . $placeId . ' and ' .
            'kindPlaceId = ' . $kindPlaceId . ' and activityId = ' . Activity::whereName('نظر')->first()->id .
            ' and logId = log.id and status = 1');

        $rooms = null;

        if (session('goDate') != null && $place->reserveId != null) {

            session()->forget(['reserve_room']);
            $goDate = jalaliToGregorian(session('goDate'));
            $backDate = jalaliToGregorian(session('backDate'));

            $go = $goDate[0] . '-' . $goDate[1] . '-' . $goDate[2];
            $back = $backDate[0] . '-' . $backDate[1] . '-' . $backDate[2];


            $access_token = $this->getAccessTokenHotel(1);

            $hotelApi= HotelApi::whereId($place->reserveId);
            $input = array('CheckIn' => $go,
                'CheckOut' => $back,
                'CityIdOrHotelId' => $hotelApi->userName,
                'rph' => $hotelApi->rph,
                'Nationality' => 'IR',
                'Categorykey' => 'Hotel',
                'IsDomestic' => true
            );
            $input = json_encode($input);
            do{
                $out_room = $this->getRoomDetails($input, $access_token);
            }while($out_room == null);

            if(session('room') == 0)
                session('room', 1);

            $passNumMin = floor(session('adult') / session('room'));
            $passNumMax = ceil(session('adult') / session('room'));
            $passNumMax = $passNumMax > 4 ? 4 : $passNumMax;

            if ($out_room != null && $out_room->data != null) {
                $room = $out_room->data->rooms;
                $check = true;
                $check_available = false;
                $rooms = array();

                $min = 0;
                $minMaxPass = 0;
                $max = 0;

                for ($i = 0; $i < count($room); $i++) {
                    if ($room[$i]->capacity->adultCount == $passNumMin ||  $room[$i]->capacity->adultCount == $passNumMax || $room[$i]->capacity->adultCount == $passNumMin-1) {
                        for ($j = 0; $j < count($room[$i]->perDay); $j++) {
                            if (!$room[$i]->perDay[$j]->availablity)
                                $check = false;
                        }
                        if ($check) {
                            if($room[$i]->capacity->adultCount == $passNumMax){
                                if($minMaxPass = 0){
                                    $maxNumPriceRoomId = $i;
                                    $minMaxPass = $room[$i]->perDay[0]->price;
                                }
                                else if($minMaxPass > $room[$i]->perDay[0]->price){
                                    $maxNumPriceRoomId = $i;
                                    $minMaxPass = $room[$i]->perDay[0]->price;
                                }
                            }
                            if($room[$i]->capacity->adultCount == $passNumMin-1){
                                if ($min == 0) {
                                    $place->minPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                    $place->maxPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;

                                    $min = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                    $max = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;

                                    $place->service = $room[$i]->roomService;
                                    $check_available = true;

                                }
                                else if ($min > $room[$i]->perDay[0]->price) {
                                    $place->minPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                    $min = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                    $place->service = $room[$i]->roomService;
                                }
                                else if ($max < $room[$i]->perDay[0]->price) {
                                    $place->maxPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                    $max = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                }
                            }
                            else{
                                if ($min == 0) {
                                    $place->minPrice = $room[$i]->perDay[0]->price;
                                    $place->maxPrice = $room[$i]->perDay[0]->price;

                                    $min = $room[$i]->perDay[0]->price;
                                    $max = $room[$i]->perDay[0]->price;

                                    $place->service = $room[$i]->roomService;
                                    $check_available = true;

                                }
                                else if ($min > $room[$i]->perDay[0]->price) {
                                    $place->minPrice = $room[$i]->perDay[0]->price;
                                    $min = $room[$i]->perDay[0]->price;
                                    $place->service = $room[$i]->roomService;
                                }
                                else if ($max < $room[$i]->perDay[0]->price) {
                                    $place->maxPrice = $room[$i]->perDay[0]->price;
                                    $max = $room[$i]->perDay[0]->price;
                                }
                            }
                            $room[$i]->provider = $hotelApi->provider;
                            $room[$i]->pic = URL::asset('/_images/nopic/blank.jpg');
                            array_push($rooms, $room[$i]);
                        }
                    }
                }

                if ($check_available) {
                    $place->otherRoom = count($rooms);
                    $place->savePercent = ceil(($place->maxPrice - $place->minPrice) * 100 / $place->maxPrice);
                    $place->minPrice = dotNumber($place->minPrice);
                    $place->policy = $this->getHotelInfo($hotelApi->userName, $access_token, $go, $back, $hotelApi->rph);
                    $place->hotel_name = $hotelApi->userName;
                    $place->rph = $hotelApi->rph;
                }
            }
        }
        $jsonRoom = json_encode($rooms);

        $allState = State::all();

        $pics = getAllPlacePicsByKind($kindPlaceId, $placeId);
        if($pics[0] != null)
            $sitePics = $pics[0];
        else
            $sitePics = [];

        if($pics[1] != null)
            $sitePicsJSON = $pics[1];
        else
            $sitePicsJSON = [];

        if($pics[2] != null)
            $photographerPics = $pics[2];
        else
            $photographerPics = [];

        if($pics[3] != null)
            $photographerPicsJSON = $pics[3];
        else
            $photographerPicsJSON = [];

        $section = \DB::select('SELECT questionId FROM questionSections WHERE (kindPlaceId = 0 OR kindPlaceId = ' . $kindPlaceId . ') AND (stateId = 0 OR stateId = ' . $state->id . ') AND (cityId = 0 OR cityId = ' . $city->id . ') GROUP BY questionId');

        $questionId = array();
        foreach ($section as $item)
            array_push($questionId, $item->questionId);

        $questions = \DB::select('SELECT * FROM questions WHERE id IN (' . implode(",", $questionId) . ')');
        $questionsAns = \DB::select('SELECT * FROM questionAns WHERE questionId IN (' . implode(",", $questionId) . ')');

        $multiQuestion = array();
        $textQuestion = array();
        $rateQuestion = array();

        foreach ($questions as $item) {
            if ($item->ansType == 'multi') {
                $item->ans = QuestionAns::where('questionId', $item->id)->get();
                array_push($multiQuestion, $item);
            }
            else if($item->ansType == 'text')
                array_push($textQuestion, $item);
            else if($item->ansType == 'rate')
                array_push($rateQuestion, $item);
        }

        $multiQuestionJSON = json_encode($multiQuestion);
        $textQuestionJSON = json_encode($textQuestion);
        $rateQuestionJSON = json_encode($rateQuestion);

        $userPhotos = DB::select('SELECT pic.* , users.* FROM reviewPics AS pic, log, users WHERE pic.isVideo = 0 AND pic.logId = log.id AND log.kindPlaceId = ' . $kindPlaceId . ' AND log.placeId = ' . $placeId . ' AND log.confirm = 1 AND log.visitorId = users.id');
        foreach ($userPhotos as $item){

            $item->pic = URL::asset('userPhoto/hotels/' . $place->file . '/' . $item->pic);

            if ($item->first_name != null)
                $item->username = $item->first_name . ' ' . $item->last_name;

            if($item->uploadPhoto == 0){
                $deffPic = DefaultPic::find($item->picture);

                if($deffPic != null)
                    $item->userPic = URL::asset('defaultPic/' . $deffPic->name);
                else
                    $item->userPic = URL::asset('_images/nopic/blank.jpg');
            }
            else{
                $item->userPic = URL::asset('userProfile/' . $item->picture);
            }
        }
        $userPhotosJson = json_encode($userPhotos);

        $video = $place->video;
        return view('hotel-details.allReviewPage.hotel-detailsAllReviews', array('place' => $place, 'save' => $save, 'city' => $city, 'thumbnail' => $thumbnail,
            'tags' => Tag::whereKindPlaceId($kindPlaceId)->get(), 'state' => $state, 'avgRate' => $rates[1],
            'photographerPics' => $photographerPics, 'photographerPicsJSON' => $photographerPicsJSON, 'userPic' => $uPic,
            'rateQuestion' => $rateQuestion, 'textQuestion' => $textQuestion, 'multiQuestion' => $multiQuestion,
            'rateQuestionJSON' => $rateQuestionJSON, 'textQuestionJSON' => $textQuestionJSON, 'multiQuestionJSON' => $multiQuestionJSON,
            'sitePics' => $sitePics, 'sitePicsJSON' => $sitePicsJSON, 'allState' => $allState, 'userCode' => $userCode,
            'kindPlaceId' => $kindPlaceId, 'mode' => $mode, 'rates' => $rates[0], 'logPhoto' => $logPhoto,
            'photos' => $photos, 'userPhotos' => $userPhotos, 'userPhotosJson' => $userPhotosJson,
            'config' => ConfigModel::first(),
            'hasLogin' => $hasLogin, 'bookMark' => $bookMark, 'err' => $err,
            'srcCities' => $srcCities, 'placeStyles' => PlaceStyle::whereKindPlaceId($kindPlaceId)->get(),
            'placeMode' => 'hotel', 'rooms' => $rooms, 'jsonRoom' => $jsonRoom, 'video' => $video,
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));
    }

    public function showHotelDetailAllQuestions($placeId, $placeName = "", $mode = "", $err = "")
    {
        return \redirect(route('placeDetails', ['kindPlaceId' => 4, 'placeId' => $placeId]));
        deleteReviewPic();

        if (Hotel::whereId($placeId) == null)
            return Redirect::route('main');

        $hasLogin = true;
        $kindPlaceId = Place::whereName('هتل')->first()->id;
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
        else {
            $hasLogin = false;
            $userCode = null;
            $uPic = URL::asset('_images/nopic/blank.jpg');
        }

        if ($hasLogin) {

            $activityId = Activity::whereName('مشاهده')->first()->id;

            $condition = ['visitorId' => $uId, 'placeId' => $placeId, 'kindPlaceId' => $kindPlaceId,
                'activityId' => $activityId];
            $log = LogModel::where($condition)->first();
            if ($log == null) {
                $log = new LogModel();
                $log->time = getToday()["time"];
                $log->activityId = $activityId;
                $log->placeId = $placeId;
                $log->kindPlaceId = $kindPlaceId;
                $log->visitorId = $uId;
                $log->date = date('Y-m-d');
                $log->save();
            } else {
                $log->date = date('Y-m-d');
                $log->save();
            }
        }
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

        $place = Hotel::whereId($placeId);
        $city = Cities::whereId($place->cityId);
        $state = State::whereId($city->stateId);
        $photos = [];

        if (!empty($place->picNumber)) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/s-' . $place->picNumber))) {
                $photos[count($photos)] = URL::asset('_images') . '/hotels/' . $place->file . '/s-' . $place->picNumber;
                $thumbnail = URL::asset('_images') . '/hotels/' . $place->file . '/f-' . $place->picNumber;
            } else {
                $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
                $thumbnail = URL::asset('_images/nopic/blank.jpg');
            }
        } else {
            $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
            $thumbnail = URL::asset('_images/nopic/blank.jpg');
        }

        $aksActivityId = Activity::whereName('عکس')->first()->id;

//        $userPhotos = 0;
        $logPhoto = '';
//
//        $tmp = DB::select("select count(*) as countNum from log WHERE confirm = 1 and activityId = " . $aksActivityId . " and placeId = " . $placeId . " and kindPlaceId = " . $kindPlaceId . " and pic <> 0");
//        if ($tmp != null && count($tmp) > 0)
//            $userPhotos = $tmp[0]->countNum;

        $srcCities = DB::select("select DISTINCT(src) from log, comment WHERE log.placeId = " . $placeId . ' and ' .
            'kindPlaceId = ' . $kindPlaceId . ' and activityId = ' . Activity::whereName('نظر')->first()->id .
            ' and logId = log.id and status = 1');

        $rooms = null;

        if (session('goDate') != null && $place->reserveId != null) {

            session()->forget(['reserve_room']);
            $goDate = jalaliToGregorian(session('goDate'));
            $backDate = jalaliToGregorian(session('backDate'));

            $go = $goDate[0] . '-' . $goDate[1] . '-' . $goDate[2];
            $back = $backDate[0] . '-' . $backDate[1] . '-' . $backDate[2];


            $access_token = $this->getAccessTokenHotel(1);

            $hotelApi= HotelApi::whereId($place->reserveId);
            $input = array('CheckIn' => $go,
                'CheckOut' => $back,
                'CityIdOrHotelId' => $hotelApi->userName,
                'rph' => $hotelApi->rph,
                'Nationality' => 'IR',
                'Categorykey' => 'Hotel',
                'IsDomestic' => true
            );
            $input = json_encode($input);
            do{
                $out_room = $this->getRoomDetails($input, $access_token);
            }while($out_room == null);

            if(session('room') == 0)
                session('room', 1);

            $passNumMin = floor(session('adult') / session('room'));
            $passNumMax = ceil(session('adult') / session('room'));
            $passNumMax = $passNumMax > 4 ? 4 : $passNumMax;

            if ($out_room != null && $out_room->data != null) {
                $room = $out_room->data->rooms;
                $check = true;
                $check_available = false;
                $rooms = array();

                $min = 0;
                $minMaxPass = 0;
                $max = 0;

                for ($i = 0; $i < count($room); $i++) {
                    if ($room[$i]->capacity->adultCount == $passNumMin ||  $room[$i]->capacity->adultCount == $passNumMax || $room[$i]->capacity->adultCount == $passNumMin-1) {
                        for ($j = 0; $j < count($room[$i]->perDay); $j++) {
                            if (!$room[$i]->perDay[$j]->availablity)
                                $check = false;
                        }
                        if ($check) {
                            if($room[$i]->capacity->adultCount == $passNumMax){
                                if($minMaxPass = 0){
                                    $maxNumPriceRoomId = $i;
                                    $minMaxPass = $room[$i]->perDay[0]->price;
                                }
                                else if($minMaxPass > $room[$i]->perDay[0]->price){
                                    $maxNumPriceRoomId = $i;
                                    $minMaxPass = $room[$i]->perDay[0]->price;
                                }
                            }
                            if($room[$i]->capacity->adultCount == $passNumMin-1){
                                if ($min == 0) {
                                    $place->minPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                    $place->maxPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;

                                    $min = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                    $max = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;

                                    $place->service = $room[$i]->roomService;
                                    $check_available = true;

                                }
                                else if ($min > $room[$i]->perDay[0]->price) {
                                    $place->minPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                    $min = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                    $place->service = $room[$i]->roomService;
                                }
                                else if ($max < $room[$i]->perDay[0]->price) {
                                    $place->maxPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                    $max = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;
                                }
                            }
                            else{
                                if ($min == 0) {
                                    $place->minPrice = $room[$i]->perDay[0]->price;
                                    $place->maxPrice = $room[$i]->perDay[0]->price;

                                    $min = $room[$i]->perDay[0]->price;
                                    $max = $room[$i]->perDay[0]->price;

                                    $place->service = $room[$i]->roomService;
                                    $check_available = true;

                                }
                                else if ($min > $room[$i]->perDay[0]->price) {
                                    $place->minPrice = $room[$i]->perDay[0]->price;
                                    $min = $room[$i]->perDay[0]->price;
                                    $place->service = $room[$i]->roomService;
                                }
                                else if ($max < $room[$i]->perDay[0]->price) {
                                    $place->maxPrice = $room[$i]->perDay[0]->price;
                                    $max = $room[$i]->perDay[0]->price;
                                }
                            }
                            $room[$i]->provider = $hotelApi->provider;
                            $room[$i]->pic = URL::asset('/_images/nopic/blank.jpg');
                            array_push($rooms, $room[$i]);
                        }
                    }
                }

                if ($check_available) {
                    $place->otherRoom = count($rooms);
                    $place->savePercent = ceil(($place->maxPrice - $place->minPrice) * 100 / $place->maxPrice);
                    $place->minPrice = dotNumber($place->minPrice);
                    $place->policy = $this->getHotelInfo($hotelApi->userName, $access_token, $go, $back, $hotelApi->rph);
                    $place->hotel_name = $hotelApi->userName;
                    $place->rph = $hotelApi->rph;
                }
            }
        }
        $jsonRoom = json_encode($rooms);

        $allState = State::all();

        $pics = getAllPlacePicsByKind($kindPlaceId, $placeId);
        if($pics[0] != null)
            $sitePics = $pics[0];
        else
            $sitePics = [];

        if($pics[1] != null)
            $sitePicsJSON = $pics[1];
        else
            $sitePicsJSON = [];

        if($pics[2] != null)
            $photographerPics = $pics[2];
        else
            $photographerPics = [];

        if($pics[3] != null)
            $photographerPicsJSON = $pics[3];
        else
            $photographerPicsJSON = [];

        $section = \DB::select('SELECT questionId FROM questionSections WHERE (kindPlaceId = 0 OR kindPlaceId = ' . $kindPlaceId . ') AND (stateId = 0 OR stateId = ' . $state->id . ') AND (cityId = 0 OR cityId = ' . $city->id . ') GROUP BY questionId');

        $questionId = array();
        foreach ($section as $item)
            array_push($questionId, $item->questionId);

        $questions = \DB::select('SELECT * FROM questions WHERE id IN (' . implode(",", $questionId) . ')');
        $questionsAns = \DB::select('SELECT * FROM questionAns WHERE questionId IN (' . implode(",", $questionId) . ')');

        $multiQuestion = array();
        $textQuestion = array();
        $rateQuestion = array();

        foreach ($questions as $item) {
            if ($item->ansType == 'multi') {
                $item->ans = QuestionAns::where('questionId', $item->id)->get();
                array_push($multiQuestion, $item);
            }
            else if($item->ansType == 'text')
                array_push($textQuestion, $item);
            else if($item->ansType == 'rate')
                array_push($rateQuestion, $item);
        }

        $multiQuestionJSON = json_encode($multiQuestion);
        $textQuestionJSON = json_encode($textQuestion);
        $rateQuestionJSON = json_encode($rateQuestion);

        $userPhotos = DB::select('SELECT pic.* , users.* FROM reviewPics AS pic, log, users WHERE pic.isVideo = 0 AND pic.logId = log.id AND log.kindPlaceId = ' . $kindPlaceId . ' AND log.placeId = ' . $placeId . ' AND log.confirm = 1 AND log.visitorId = users.id');
        foreach ($userPhotos as $item){

            $item->pic = URL::asset('userPhoto/hotels/' . $place->file . '/' . $item->pic);

            if ($item->first_name != null)
                $item->username = $item->first_name . ' ' . $item->last_name;

            if($item->uploadPhoto == 0){
                $deffPic = DefaultPic::find($item->picture);

                if($deffPic != null)
                    $item->userPic = URL::asset('defaultPic/' . $deffPic->name);
                else
                    $item->userPic = URL::asset('_images/nopic/blank.jpg');
            }
            else{
                $item->userPic = URL::asset('userProfile/' . $item->picture);
            }
        }
        $userPhotosJson = json_encode($userPhotos);

        $video = $place->video;
        return view('hotel-details.allQuestionPage.hotel-detailsQuestions', array('place' => $place, 'save' => $save, 'city' => $city, 'thumbnail' => $thumbnail,
            'tags' => Tag::whereKindPlaceId($kindPlaceId)->get(), 'state' => $state, 'avgRate' => $rates[1],
            'photographerPics' => $photographerPics, 'photographerPicsJSON' => $photographerPicsJSON, 'userPic' => $uPic,
            'rateQuestion' => $rateQuestion, 'textQuestion' => $textQuestion, 'multiQuestion' => $multiQuestion,
            'rateQuestionJSON' => $rateQuestionJSON, 'textQuestionJSON' => $textQuestionJSON, 'multiQuestionJSON' => $multiQuestionJSON,
            'sitePics' => $sitePics, 'sitePicsJSON' => $sitePicsJSON, 'allState' => $allState, 'userCode' => $userCode,
            'kindPlaceId' => $kindPlaceId, 'mode' => $mode, 'rates' => $rates[0], 'logPhoto' => $logPhoto,
            'photos' => $photos, 'userPhotos' => $userPhotos, 'userPhotosJson' => $userPhotosJson,
            'config' => ConfigModel::first(),
            'hasLogin' => $hasLogin, 'bookMark' => $bookMark, 'err' => $err,
            'srcCities' => $srcCities, 'placeStyles' => PlaceStyle::whereKindPlaceId($kindPlaceId)->get(),
            'placeMode' => 'hotel', 'rooms' => $rooms, 'jsonRoom' => $jsonRoom, 'video' => $video,
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));
    }


    public function showHotelList($city, $mode) {
        return redirect(route('main'));

        return redirect(route(['place.list', ['kindPlaceId' => 4, 'mode' => $mode, 'city' => $city]]));

        session()->forget(['goDate', 'backDate', 'room', 'adult', 'children', 'ageOfChild', 'reserve_room']);
        if ($mode == "state") {

            $state = State::whereName($city)->first();
            if ($state == null)
                return "نتیجه ای یافت نشد";

        }
        else {
            $tmp = Cities::whereName($city)->first();
            if ($tmp == null)
                return "نتیجه ای یافت نشد";

            $state = State::whereId($tmp->stateId);
            if ($state == null)
                return "نتیجه ای یافت نشد";
        }

        return view('hotel-list', array('mode' => $mode, 'placeMode' => 'hotel', 'city' => $city, 'state' => $state,
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));
    }

    public function getRestaurantListElems($city, $mode)
    {
        return redirect(route('main'));

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
        $kindPlaceId = Place::whereName('رستوران')->first()->id;

        $z = "";

        if (isset($_POST["kind_id"])) {

            $name = $_POST["kind_id"];

            $i = 0;
            $y = count($name);
            $allow = false;
            $first = true;

            $x = "(";
            while ($i < $y) {

                $t = makeValidInput($name[$i]);

                if ($t == -1)
                    $allow = true;

                if (!$allow) {
                    if ($first) {
                        $x .= '`kind_id` = ' . $t;
                        $first = false;
                    } else {
                        $x .= ' OR `kind_id` = ' . $t;
                    }
                }
                $i++;
            }

            $n = strlen($x);
            if ($n > 5 && !$allow)
                $z .= substr($x, 0, $n - 4) . ')';
        }

        if (empty($z))
            $z = " 1 = 1 ";

        $z .= " and ";

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
            $z .= substr($x, 0, $n - 4);
        }

        if (empty($z))
            $z = "1 = 1";

        if ($mode == "city") {

            $city = Cities::whereName($city)->first();
            if ($city == null)
                return "نتیجه ای یافت نشد";

            if ($sort == "review")
                $hotels = DB::select("Select restaurant.id, restaurant.name, restaurant.cityId, restaurant.file, restaurant.pic_1, COUNT(*) as matches from restaurant, log, activity WHERE " . $z . " cityId = " . $city->id . " and activity.id = " . $activityId . " and log.activityId = activity.id and log.placeId = restaurant.id and log.kindPlaceId = " . $kindPlaceId . " GROUP BY(log.placeId) ORDER by matches limit 4 offset " . (($currPage - 1) * 4));
            elseif ($sort == "rate")
                $hotels = DB::select("Select restaurant.id, restaurant.name, restaurant.cityId, restaurant.file, restaurant.pic_1, AVG(userOpinions.rate) as avgRate from restaurant, log, activity, userOpinions WHERE " . $z . " cityId = " . $city->id . " and activity.id = " . $rateActivityId . " and log.activityId = activity.id and log.placeId = restaurant.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id GROUP BY(log.placeId) HAVING avgRate > 2 ORDER by avgRate DESC limit 4 offset " . (($currPage - 1) * 4));
            else
                $hotels = DB::select("Select restaurant.id, restaurant.name, restaurant.cityId, restaurant.file, restaurant.pic_1 from restaurant WHERE " . $z . " cityId = " . $city->id . " ORDER by restaurant.name ASC limit 4 offset " . (($currPage - 1) * 4));

            $reminder = 4 - count($hotels);
            if ($reminder > 0) {
                if ($sort == "review")
                    $hotels = array_merge($hotels, DB::select("select restaurant.id, restaurant.name, restaurant.cityId, restaurant.file, restaurant.pic_1 from restaurant where " . $z . " not exists(Select * from log WHERE " . $z . " cityId = " . $city->id . " and log.activityId = " . $activityId . " and log.placeId = restaurant.id and log.kindPlaceId = " . $kindPlaceId . ") and cityId = " . $city->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
                else if ($sort == "rate")
                    $hotels = array_merge($hotels, DB::select("select restaurant.id, restaurant.name, restaurant.cityId, restaurant.file, restaurant.pic_1 from restaurant where " . $z . " not exists(Select * from log, userOpinions WHERE " . $z . " cityId = " . $city->id . " and log.activityId = " . $rateActivityId . " and log.placeId = restaurant.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id) and cityId = " . $city->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
            }
        } else {
            $state = State::whereName($city)->first();
            if ($state == null)
                return "نتیجه ای یافت نشد";

            if ($sort == "review")
                $hotels = DB::select("Select restaurant.id, restaurant.name, restaurant.cityId, restaurant.file, restaurant.pic_1, COUNT(*) as matches from restaurant, cities, state, log, activity WHERE " . $z . " cityId = cities.id and state.id = stateId and state.id = " . $state->id . " and activity.id = " . $activityId . " and log.activityId = activity.id and log.placeId = restaurant.id and log.kindPlaceId = " . $kindPlaceId . " GROUP BY(log.placeId) ORDER by matches limit 4 offset " . (($currPage - 1) * 4));
            elseif ($sort == "rate")
                $hotels = DB::select("Select restaurant.id, restaurant.name, restaurant.cityId, restaurant.file, restaurant.pic_1, AVG(userOpinions.rate) as avgRate from restaurant, cities, state, log, activity, userOpinions WHERE " . $z . " cityId = cities.id and state.id = stateId and state.id = " . $state->id . " and activity.id = " . $rateActivityId . " and log.activityId = activity.id and log.placeId = restaurant.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id GROUP BY(log.placeId) HAVING avgRate > 2 ORDER by avgRate DESC limit 4 offset " . (($currPage - 1) * 4));
            else
                $hotels = DB::select("Select restaurant.id, restaurant.name, restaurant.cityId, restaurant.file, restaurant.pic_1 from restaurant, cities, state WHERE " . $z . " cityId = cities.id and state.id = stateId and state.id = " . $state->id . " ORDER by restaurant.name ASC limit 4 offset " . (($currPage - 1) * 4));

            $reminder = 4 - count($hotels);
            if ($reminder > 0) {
                if ($sort == "review")
                    $hotels = array_merge($hotels, DB::select("select restaurant.id, restaurant.name, restaurant.cityId, restaurant.file, restaurant.pic_1 from restaurant, cities, state where " . $z . " not exists(Select * from log WHERE " . $z . " cityId = cities.id and stateId = " . $state->id . " and log.activityId = " . $activityId . " and log.placeId = restaurant.id and log.kindPlaceId = " . $kindPlaceId . ") and cityId = cities.id and state.id = stateId and state.id = " . $state->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
                else if ($sort == "rate")
                    $hotels = array_merge($hotels, DB::select("select restaurant.id, restaurant.name, restaurant.cityId, restaurant.file, restaurant.pic_1 from restaurant, cities, state where " . $z . " not exists(Select * from log, userOpinions WHERE " . $z . " cityId = cities.id and stateId = " . $state->id . " and log.activityId = " . $rateActivityId . " and log.placeId = restaurant.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id) and cityId = cities.id and state.id = stateId and state.id = " . $state->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
            }
        }

        foreach ($hotels as $hotel) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $hotel->file . '/f-1.jpg')))
                $hotel->pic = URL::asset('_images/restaurant/' . $hotel->file . '/f-1.jpg');
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

    public function showRestaurantList($city, $mode) {
        return redirect(route('main'));
        return redirect(route(['place.list', ['kindPlaceId' => 3, 'mode' => $mode, 'city' => $city]]));
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

        return view('hotel-list', array('mode' => $mode, 'placeMode' => 'restaurant', 'city' => $city, 'state' => $state,
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));

    }

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
        return redirect(route(['place.list', ['kindPlaceId' => 6, 'mode' => $mode, 'city' => $city]]));

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

    public function getAmakenListElems($city, $mode)
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
        $kindPlaceId = Place::whereName('اماکن')->first()->id;

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

        $z .= " and ";

        if ($mode == "city") {

            $city = Cities::whereName($city)->first();
            if ($city == null)
                return "نتیجه ای یافت نشد";

            if ($sort == "review")
                $hotels = DB::select("Select amaken.id, amaken.name, amaken.cityId, amaken.file, amaken.pic_1, COUNT(*) as matches from amaken, log, activity WHERE " . $z . " cityId = " . $city->id . " and activity.id = " . $activityId . " and log.activityId = activity.id and log.placeId = amaken.id and log.kindPlaceId = " . $kindPlaceId . " GROUP BY(log.placeId) ORDER by matches limit 4 offset " . (($currPage - 1) * 4));
            elseif ($sort == "rate")
                $hotels = DB::select("Select amaken.id, amaken.name, amaken.cityId, amaken.file, amaken.pic_1, AVG(userOpinions.rate) as avgRate from amaken, log, activity, userOpinions WHERE " . $z . " cityId = " . $city->id . " and activity.id = " . $rateActivityId . " and log.activityId = activity.id and log.placeId = amaken.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id GROUP BY(log.placeId) HAVING avgRate > 2 ORDER by avgRate DESC limit 4 offset " . (($currPage - 1) * 4));
            else
                $hotels = DB::select("Select amaken.id, amaken.name, amaken.cityId, amaken.file, amaken.pic_1 from amaken WHERE " . $z . " cityId = " . $city->id . " ORDER by amaken.name ASC limit 4 offset " . (($currPage - 1) * 4));

            $reminder = 4 - count($hotels);
            if ($reminder > 0) {
                if ($sort == "review")
                    $hotels = array_merge($hotels, DB::select("select amaken.id, amaken.name, amaken.cityId, amaken.file, amaken.pic_1 from amaken where " . $z . " not exists (Select * from log WHERE " . $z . " cityId = " . $city->id . " and log.activityId = " . $activityId . " and log.placeId = amaken.id and log.kindPlaceId = " . $kindPlaceId . ") and cityId = " . $city->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
                elseif ($sort == "rate")
                    $hotels = array_merge($hotels, DB::select("select amaken.id, amaken.name, amaken.cityId, amaken.file, amaken.pic_1 from amaken where " . $z . " not exists(Select * from log, userOpinions WHERE " . $z . " cityId = " . $city->id . " and log.activityId = " . $rateActivityId . " and log.placeId = amaken.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id) and cityId = " . $city->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
            }
        } else {
            $state = State::whereName($city)->first();
            if ($state == null)
                return "نتیجه ای یافت نشد";

            if ($sort == "review")
                $hotels = DB::select("Select amaken.id, amaken.name, amaken.cityId, amaken.file, amaken.pic_1, COUNT(*) as matches from amaken, cities, state, log, activity WHERE " . $z . " cityId = cities.id and state.id = stateId and state.id = " . $state->id . " and activity.id = " . $activityId . " and log.activityId = activity.id and log.placeId = amaken.id and log.kindPlaceId = " . $kindPlaceId . " GROUP BY(log.placeId) ORDER by matches limit 4 offset " . (($currPage - 1) * 4));
            elseif ($sort == "rate")
                $hotels = DB::select("Select amaken.id, amaken.name, amaken.cityId, amaken.file, amaken.pic_1, AVG(userOpinions.rate) as avgRate from amaken, cities, state, log, activity, userOpinions WHERE " . $z . " cityId = cities.id and state.id = stateId and state.id = " . $state->id . " and activity.id = " . $rateActivityId . " and log.activityId = activity.id and log.placeId = amaken.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id GROUP BY(log.placeId) HAVING avgRate > 2 ORDER by avgRate DESC limit 4 offset " . (($currPage - 1) * 4));
            else
                $hotels = DB::select("Select amaken.id, amaken.name, amaken.cityId, amaken.file, amaken.pic_1 from amaken, cities, state WHERE " . $z . " cityId = cities.id and state.id = stateId and state.id = " . $state->id . " ORDER by amaken.name ASC limit 4 offset " . (($currPage - 1) * 4));

            $reminder = 4 - count($hotels);
            if ($reminder > 0) {
                if ($sort == "review")
                    $hotels = array_merge($hotels, DB::select("select amaken.id, amaken.name, amaken.cityId, amaken.file, amaken.pic_1 from amaken, cities, state where " . $z . " not exists(Select * from log WHERE " . $z . " cityId = cities.id and stateId = " . $state->id . " and log.activityId = " . $activityId . " and log.placeId = amaken.id and log.kindPlaceId = " . $kindPlaceId . ") and cityId = cities.id and state.id = stateId and state.id = " . $state->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
                elseif ($sort == "rate")
                    $hotels = array_merge($hotels, DB::select("select amaken.id, amaken.name, amaken.cityId, amaken.file, amaken.pic_1 from amaken, cities, state where " . $z . " not exists(Select * from log, userOpinions WHERE " . $z . " cityId = cities.id and stateId = " . $state->id . " and log.activityId = " . $rateActivityId . " and log.placeId = amaken.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id) and cityId = cities.id and state.id = stateId and state.id = " . $state->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
            }
        }

        foreach ($hotels as $hotel) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $hotel->file . '/f-1.jpg')))
                $hotel->pic = URL::asset('_images/amaken/' . $hotel->file . '/f-1.jpg');
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

    public function showAmakenList($city, $mode) {

        return redirect(route(['place.list', ['kindPlaceId' => 1, 'mode' => $mode, 'city' => $city]]));

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

        return view('hotel-list', array('mode' => $mode, 'placeMode' => 'amaken', 'city' => $city, 'state' => $state,
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));

    }

    public function userQuestions()
    {
        return view('userActivities.userQuestions');
    }

    public function userPosts()
    {
        return view('userActivities.userPosts');
    }

    public function userPhotosAndVideos()
    {
        return view('userActivities.userPhotosAndVideos');
    }

    public function gardeshnameEdit()
    {
        return view('gardeshnameEdit');
    }

    public function myTripInner()
    {
        return view('myTripInner');
    }

    public function business()
    {
        return view('business');
    }

    public function userActivitiesProfile()
    {
        return view('profile.userActivitiesProfile');
    }

    public function getLogPhotos()
    {

        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"])) {

            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);

            switch ($kindPlaceId) {
                case 1:
                default:
                    $imgPath = "amaken";
                    break;
                case 3:
                    $imgPath = "restaurant";
                    break;
                case 4:
                    $imgPath = "hotel";
                    break;
                case 6:
                    $imgPath = "majara";
                    break;
                case 8:
                    $place = Adab::whereId($placeId);
                    if ($place->category == 3) {
                        ;
                        $imgPath = "ghazamahali";
                    } else {
                        if ($place->category == 1)
                            $imgPath = "soghat";
                        else
                            $imgPath = "sanaye";
                    }
                    break;
            }

            $aksActivityId = Activity::whereName('عکس')->first()->id;

            $logPhotos = DB::select("select picItems.id, picItems.name, count(*) as countNum, text from log, picItems WHERE confirm = 1 and activityId = " . $aksActivityId . " and placeId = " . $placeId . " and log.kindPlaceId = " . $kindPlaceId . " and pic <> 0 and picItems.id = log.pic group by(picItems.id)");

            foreach ($logPhotos as $logPhoto) {
                if (file_exists(__DIR__ . '/../../../../assets/userPhoto/' . $imgPath . '/l-' . $logPhoto->text))
                    $logPhoto->text = URL::asset('userPhoto/' . $imgPath . '/l-' . $logPhoto->text);
                else
                    $logPhoto->text = URL::asset('_images') . '/nopic/blank.jpg';
            }

            echo \GuzzleHttp\json_encode($logPhotos);
            return;
        }

        echo \GuzzleHttp\json_encode([]);

    }

    public function getSlider1Photo()
    {

        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"]) && isset($_POST["val"])) {

            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $val = makeValidInput($_POST["val"]);

            switch ($kindPlaceId) {
                case 1:
                default:
                    $subDir = "/amaken/";
                    $place = Amaken::whereId($placeId);
                    break;
                case 3:
                    $subDir = "/restaurant/";
                    $place = Restaurant::whereId($placeId);
                    break;
                case 4:
                    $subDir = "/hotels/";
                    $place = Hotel::whereId($placeId);
                    break;
                case 6:
                    $subDir = "/majara/";
                    $place = Majara::whereId($placeId);
                    break;
                case 8:
                    $place = Adab::whereId($placeId);
                    if ($place->category == 3)
                        $subDir = "/adab/ghazamahali/";
                    else
                        $subDir = '/adab/soghat/';
                    break;
            }

            if ($place != null) {
                switch ($val) {
                    case 1:
                    default:
                        if (file_exists((__DIR__ . '/../../../../assets/_images') . $subDir . $place->file . '/s-1.jpg'))
                            echo URL::asset('_images') . $subDir . $place->file . '/s-1.jpg';
                        else
                            echo URL::asset('_images/nopic/blank.jpg');
                        break;
                    case 2:
                        if (file_exists((__DIR__ . '/../../../../assets/_images') . $subDir . $place->file . '/s-2.jpg' ))
                            echo URL::asset('_images') . $subDir . $place->file . '/s-2.jpg' ;
                        else
                            echo URL::asset('_images/nopic/blank.jpg');
                        break;
                    case 3:
                        if (file_exists((__DIR__ . '/../../../../assets/_images') . $subDir . $place->file . '/s-3.jpg' ))
                            echo URL::asset('_images') . $subDir . $place->file . '/s-3.jpg' ;
                        else
                            echo URL::asset('_images/nopic/blank.jpg');
                        break;
                    case 4:
                        if (file_exists((__DIR__ . '/../../../../assets/_images') . $subDir . $place->file . '/s-4.jpg'))
                            echo URL::asset('_images') . $subDir . $place->file . '/s-4.jpg';
                        else
                            echo URL::asset('_images/nopic/blank.jpg');
                        break;
                    case 5:
                        if (file_exists((__DIR__ . '/../../../../assets/_images') . $subDir . $place->file . '/s-5.jpg'))
                            echo URL::asset('_images') . $subDir . $place->file . '/s-5.jpg';
                        else
                            echo URL::asset('_images/nopic/blank.jpg');
                        break;
                }
                return;
            }
        }
        echo "nok";
    }

    public function getSlider2Photo()
    {

        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"]) && isset($_POST["val"])) {}

        $placeId = makeValidInput($_POST["placeId"]);
        $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
        $val = makeValidInput($_POST["val"]);

        $aksActivityId = Activity::whereName('عکس')->first()->id;

        $tmp = DB::select("select text from log WHERE confirm = 1 and activityId = " . $aksActivityId . " and placeId = " . $placeId . " and kindPlaceId = " . $kindPlaceId . " and pic <> 0 limit " . $val . ', 1');
        if ($tmp != null && count($tmp) > 0) {
            switch ($kindPlaceId) {
                case 1:
                default:
                    $subDir = "/amaken/";
                    break;
                case 3:
                    $subDir = "/restaurant/";
                    break;
                case 4:
                    $subDir = "/hotel/";
                    break;
                case 6:
                    $subDir = "/majara/";
                    break;
                case 8:
                    $subDir = '/adab/';
                    break;
            }
            if (file_exists(__DIR__ . '/../../../../assets/userPhoto' . $subDir . 'l-' . $tmp[0]->text))
                echo URL::asset('userPhoto' . $subDir . 'l-' . $tmp[0]->text);
            else
                echo URL::asset('_images/nopic/blank.jpg');
            return;
        }

        echo URL::asset('_images/nopic/blank.jpg');
        return;


        echo "nok";
    }

    function survey()
    {
        if (isset($_POST["questionId"]) && isset($_POST["ans"]) && isset($_POST["kindPlaceId"]) && isset($_POST["placeId"])) {

            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $uId = Auth::user()->id;
            $activityId = Activity::whereName('نظرسنجی')->first()->id;

            $condition = ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId, 'visitorId' => $uId,
                'activityId' => $activityId];

            $ans = makeValidInput($_POST["ans"]);
            switch ($ans) {
                case "yes":
                    $ans = 1;
                    break;
                case "no":
                    $ans = 2;
                    break;
                default:
                    $ans = 3;
            }

            $log = LogModel::where($condition)->first();

            if ($log == null) {
                $log = new LogModel();
                $log->visitorId = $uId;
                $log->time = getToday()["time"];
                $log->activityId = $activityId;
                $log->placeId = $placeId;
                $log->kindPlaceId = $kindPlaceId;
                $log->date = date('Y-m-d');
                $log->save();

                $survey = new Survey();
                $survey->logId = $log->id;
                $survey->questionId = makeValidInput($_POST["questionId"]);
                $survey->ans = $ans;

                $survey->save();

            } else {
                $condition = ['logId' => $log->id, 'questionId' => makeValidInput($_POST["questionId"])];
                $survey = Survey::where($condition)->first();
                if ($survey == null) {
                    $survey = new Survey();
                    $survey->logId = $log->id;
                    $survey->questionId = makeValidInput($_POST["questionId"]);
                    $survey->ans = $ans;
                    $survey->save();
                } else {
                    $survey->ans = $ans;
                    $survey->save();
                }
            }

        }
    }

    function getSurvey()
    {

        if (isset($_POST["questionId"]) && isset($_POST["kindPlaceId"]) && isset($_POST["placeId"])) {

            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $uId = Auth::user()->id;
            $activityId = Activity::whereName('نظرسنجی')->first()->id;

            $condition = ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId, 'visitorId' => $uId,
                'activityId' => $activityId];

            $log = LogModel::where($condition)->first();

            if ($log == null) {
                echo "-1";
                return;
            }

            $condition = ['questionId' => makeValidInput($_POST["questionId"]), 'logId' => $log->id];
            $question = Survey::where($condition)->first();

            if ($question == null) {
                echo "-1";
                return;
            }

            $ans = $question->ans;
            switch ($ans) {
                case 1:
                    $ans = "yes";
                    break;
                case 2:
                    $ans = "no";
                    break;
                default:
                    $ans = "noIdea";
            }

            echo $ans;
        }
    }

    public function removeReview() {

        if(isset($_POST["logId"])) {

            $logId = makeValidInput($_POST["logId"]);
            $log = LogModel::whereId($logId);

            if($log != null && (Auth::user()->level == 1 || Auth::user()->id == $log->visitorId)) {

                LogModel::whereRelatedTo($logId)->delete();
                LogModel::destroy($logId);

                echo "ok";
            }

        }

    }

}
