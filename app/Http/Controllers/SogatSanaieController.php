<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Cities;
use App\models\ConfigModel;
use App\models\DefaultPic;
use App\models\LogModel;
use App\models\MahaliFood;
use App\models\Place;
use App\models\PlaceStyle;
use App\models\SectionPage;
use App\models\SogatSanaie;
use App\models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class SogatSanaieController extends Controller
{
    public function showSogatSanaieDetails($placeId, $placeName = "", $mode = "", $err = "")
    {
        deleteReviewPic();

        if (SogatSanaie::whereId($placeId) == null)
            return Redirect::route('main');

        $hasLogin = true;
        $kindPlaceId = Place::whereName('صنایع سوغات')->first()->id;
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

        $place = SogatSanaie::find($placeId);
        $city = Cities::whereId($place->cityId);
        $state = State::whereId($city->stateId);

        $photos = [];

        if (!empty($place->picNumber)) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/mahalifood/' . $place->file . '/s-' . $place->picNumber))) {
                $photos[count($photos)] = URL::asset('_images') . '/mahalifood/' . $place->file . '/s-' . $place->picNumber;
                $thumbnail = URL::asset('_images') . '/mahalifood/' . $place->file . '/f-' . $place->picNumber;
            } else {
                $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
                $thumbnail = URL::asset('_images/nopic/blank.jpg');
            }
        }
        else {
            $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
            $thumbnail = URL::asset('_images/nopic/blank.jpg');
        }

        switch ($place->style){
            case 1:
                $place->style = 'سنتی';
                break;
            case 2:
                $place->style = 'مدرن';
                break;
            case 3:
                $place->style = 'تلفیقی';
                break;
        }

        if($place->fragile == 1)
            $place->fragile = 'شکستنی';
        else
            $place->fragile = 'غیر شکستنی';

        switch ($place->size){
            case 1:
                $place->size = 'کوچک';
                break;
            case 2:
                $place->size = 'متوسط';
                break;
            case 3:
                $place->size = 'بزرگ';
                break;
        }
        switch ($place->price){
            case 1:
                $place->price = 'ارزان';
                break;
            case 2:
                $place->price = 'متوسط';
                break;
            case 3:
                $place->price = 'گران';
                break;
        }
        switch ($place->weight){
            case 1:
                $place->weight = 'سبک';
                break;
            case 2:
                $place->weight = 'متوسط';
                break;
            case 3:
                $place->weight = 'متوسط';
                break;
        }

        $place->kind = '';
        if($place->jewelry == 1)
            $place->kind .= 'زیورآلات';
        if($place->cloth == 1){
            if($place->kind != '')
                $place->kind .= ' , ';

            $place->kind .= 'پارچه و پوشیدنی';
        }
        if($place->applied == 1){
            if($place->kind != '')
                $place->kind .= ' , ';

            $place->kind .= 'لوازم کاربردی منزل';
        }
        if($place->decorative == 1){
            if($place->kind != '')
                $place->kind .= ' , ';

            $place->kind .= 'لوازم تزئینی';
        }

        $place->taste = '';
        if($place->torsh == 1)
            $place->taste .= 'ترش';
        if($place->shirin == 1){
            if($place->taste != '')
                $place->taste .= ' , ';

            $place->taste .= 'شیرین';
        }
        if($place->talkh == 1){
            if($place->taste != '')
                $place->taste .= ' , ';

            $place->taste .= 'تلخ';
        }
        if($place->malas == 1){
            if($place->taste != '')
                $place->taste .= ' , ';

            $place->taste .= 'ملس';
        }
        if($place->shor == 1){
            if($place->taste != '')
                $place->taste .= ' , ';

            $place->taste .= 'شور';
        }
        if($place->tond == 1){
            if($place->taste != '')
                $place->taste .= ' , ';

            $place->taste .= 'تند';
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

//        dd($place->material);
//        place-details.mahaliFood-details
        return view('hotel-details.hotel-details', array(
            'place' => $place, 'save' => $save, 'city' => $city, 'thumbnail' => $thumbnail,
            'state' => $state, 'avgRate' => $rates[1], 'photos' => $photos,
            'userPhotos' => $userPhotos, 'userPhotosJson' => $userPhotosJson,
            'reviewCount' => $reviewCount, 'ansReviewCount' => $ansReviewCount, 'userReviewCount' => $userReviewCount,
            'photographerPics' => $photographerPics, 'photographerPicsJSON' => $photographerPicsJSON, 'userPic' => $uPic,
            'rateQuestion' => $rateQuestion, 'textQuestion' => $textQuestion, 'multiQuestion' => $multiQuestion,
            'rateQuestionJSON' => $rateQuestionJSON, 'textQuestionJSON' => $textQuestionJSON, 'multiQuestionJSON' => $multiQuestionJSON,
            'sitePics' => $sitePics, 'sitePicsJSON' => $sitePicsJSON, 'allState' => $allState, 'userCode' => $userCode,
            'kindPlaceId' => $kindPlaceId, 'mode' => $mode, 'rates' => $rates[0], 'config' => ConfigModel::first(),
            'hasLogin' => $hasLogin, 'bookMark' => $bookMark, 'err' => $err,
            'placeStyles' => PlaceStyle::whereKindPlaceId($kindPlaceId)->get(), 'placeMode' => 'sogatsanaie',
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));
    }
}
