<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Adab;
use App\models\Amaken;
use App\models\BannerPics;
use App\models\Cities;
use App\models\Comment;
use App\models\ConfigModel;
use App\models\DefaultPic;
use App\models\Hotel;
use App\models\LogModel;
use App\models\MahaliFood;
use App\models\MainSliderPic;
use App\models\Majara;
use App\models\Opinion;
use App\models\OpOnActivity;
use App\models\PhotographersLog;
use App\models\PhotographersPic;
use App\models\PicItem;
use App\models\Place;
use App\models\PlaceFeatureRelation;
use App\models\PlaceFeatures;
use App\models\PlaceStyle;
use App\models\PlaceTag;
use App\models\Post;
use App\models\PostCategory;
use App\models\PostCategoryRelation;
use App\models\PostCityRelation;
use App\models\PostComment;
use App\models\Question;
use App\models\QuestionUserAns;
use App\models\Report;
use App\models\Restaurant;
use App\models\ReviewPic;
use App\models\ReviewUserAssigned;
use App\models\SectionPage;
use App\models\SogatSanaie;
use App\models\SpecialAdvice;
use App\models\State;
use App\models\Survey;
use App\models\Tag;
use App\models\TripPlace;
use App\models\User;
use App\models\UserOpinion;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class PlaceController extends Controller {

    public function showPlaceDetails($kindPlaceName, $slug, Request $request){
        deleteReviewPic();  // common.php

        $kindPlace = Place::where('fileName', $kindPlaceName)->first();
        if($kindPlace == null)
            return \redirect(\url('/'));
        $kindPlaceId = $kindPlace->id;
        switch ($kindPlaceId){
            case 1:
                $placeMode = 'amaken';
                $kindPlace->title = 'جاذبه های';
                break;
            case 3:
                $placeMode = 'restaurant';
                $kindPlace->title = 'رستوران های';
                break;
            case 4:
                $placeMode = 'hotel';
                $kindPlace->title = 'مراکز اقامتی';
                break;
            case 6:
                $placeMode = 'majara';
                $kindPlace->title = 'ماجراهای';
                break;
            case 10:
                $placeMode = 'sogatSanaies';
                $kindPlace->title = 'صنایع دستی و سوغات';
                break;
            case 11:
                $placeMode = 'mahaliFood';
                $kindPlace->title = 'غذاهای محلی';
                break;
        }

        if(is_numeric($slug))
            $place = DB::table($kindPlace->tableName)->find((int)$slug);
        else
            $place = DB::table($kindPlace->tableName)->where('slug', $slug)->first();

        if($place == null)
            return \redirect(\url('/'));

        $place->tags = PlaceTag::getTags($kindPlace->id, $place->id);

        $hasLogin = true;
        $uId = -1;
        if(auth()->check()){
            $u = Auth::user();
            $uId = $u->id;
            $userCode = $uId . '_' . rand(10000,99999);
        }
        else{
            $userCode = null;
            $hasLogin = false;
        }
        $uPic = getUserPic(); // common.php

        saveViewPerPage($kindPlaceId, $place->id); // common.php

        $bookMark = false;
        $condition = ['visitorId' => $uId, 'activityId' => Activity::whereName("نشانه گذاری")->first()->id,
            'placeId' => $place->id, 'kindPlaceId' => $kindPlaceId];
        if (LogModel::where($condition)->count() > 0)
            $bookMark = true;

        $rates = getRate($place->id, $kindPlaceId); // common.php

        $save = false;
        $count = DB::select("select count(*) as tripPlaceNum from trip, tripPlace WHERE tripPlace.placeId = " . $place->id . " and tripPlace.kindPlaceId = " . $kindPlaceId . " and tripPlace.tripId = trip.id and trip.uId = " . $uId);
        if ($count[0]->tripPlaceNum > 0)
            $save = true;

        $city = Cities::whereId($place->cityId);
        $state = State::whereId($city->stateId);

        $photos = [];

        if (!empty($place->picNumber)) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/' . $kindPlace->fileName . '/' . $place->file . '/s-' . $place->picNumber))) {
                $photos[count($photos)] = URL::asset('_images') . '/' . $kindPlace->fileName . '/' . $place->file . '/s-' . $place->picNumber;
                $thumbnail = URL::asset('_images') . '/' . $kindPlace->fileName . '/' . $place->file . '/f-' . $place->picNumber;
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

        $pics = getAllPlacePicsByKind($kindPlaceId, $place->id); // common.php
        $sitePics = $pics[0];
        $sitePicsJSON = $pics[1];
        $photographerPics = $pics[2];
        $photographerPicsJSON = $pics[3];
        $userPhotos = $pics[4];
        $userPhotosJson = $pics[5];

        $result = commonInPlaceDetails($kindPlaceId, $place->id, $city, $state, $place);  // common.php
        $reviewCount = $result[0];
        $ansReviewCount = $result[1];
        $userReviewCount = $result[2];
        $multiQuestion = $result[3];
        $textQuestion = $result[4];
        $rateQuestion = $result[5];

        $multiQuestionJSON = json_encode($multiQuestion);
        $textQuestionJSON = json_encode($textQuestion);
        $rateQuestionJSON = json_encode($rateQuestion);

        $inPage = 'place_' . $kindPlaceId . '_' . $place->id;
        session(['inPage' => $inPage]);

        $features = PlaceFeatures::where('kindPlaceId', $kindPlace->id)->where('parent', 0)->get();
        $featId = array();
        foreach ($features as $item) {
            $item->subFeat = PlaceFeatures::where('parent', $item->id)->get();
            $fId = PlaceFeatures::where('parent', $item->id)->pluck('id')->toArray();
            $featId = array_merge($featId, $fId);
        }
        $place->features = PlaceFeatureRelation::where('placeId', $place->id)->whereIn('featureId', $featId)->pluck('featureId')->toArray();

        if($kindPlace->tableName == 'sogatSanaies')
            $place = $this->sogatSanaieDet($place);
        else if($kindPlace->tableName == 'mahaliFood')
            $place = $this->mahaliFoodDet($place);

        $video = '';
        if(isset($place->video))
            $video = $place->video;

        $mode = 'city';
        $err = '';
        $rooms = '';
        $jsonRoom = '';

        $articleUrl = \url('/article/list/place/' . $kindPlaceId . '_' . $place->id);
        $cityName = 'شهر ' . $city->name;
        $locationName = ["name" => $place->name, 'state' => $state->name, 'cityName' => $cityName, 'cityNameUrl' => $city->name, 'articleUrl' => $articleUrl, 'kindState' => 'city', 'kindPage' => 'place'];

        $mainWebSiteUrl = \url('/');
        $mainWebSiteUrl .= '/' . $request->path();
        $localStorageData = ['kind' => 'place', 'name' => $place->name, 'city' => $city->name, 'state' => $state->name, 'mainPic' => $sitePics[0]['f'], 'redirect' => $mainWebSiteUrl];

        return view('hotel-details.hotel-details', array('place' => $place, 'features' => $features , 'save' => $save, 'city' => $city, 'thumbnail' => $thumbnail,
            'state' => $state, 'avgRate' => $rates[1], 'locationName' => $locationName, 'localStorageData' => $localStorageData,
            'reviewCount' => $reviewCount, 'ansReviewCount' => $ansReviewCount, 'userReviewCount' => $userReviewCount,
            'photographerPics' => $photographerPics, 'photographerPicsJSON' => $photographerPicsJSON, 'userPic' => $uPic,
            'rateQuestion' => $rateQuestion, 'textQuestion' => $textQuestion, 'multiQuestion' => $multiQuestion,
            'rateQuestionJSON' => $rateQuestionJSON, 'textQuestionJSON' => $textQuestionJSON, 'multiQuestionJSON' => $multiQuestionJSON,
            'sitePics' => $sitePics, 'sitePicsJSON' => $sitePicsJSON, 'allState' => $allState, 'userCode' => $userCode,
            'kindPlaceId' => $kindPlaceId, 'mode' => $mode, 'rates' => $rates[0],
            'photos' => $photos, 'userPhotos' => $userPhotos, 'userPhotosJson' => $userPhotosJson,
            'config' => ConfigModel::first(), 'hasLogin' => $hasLogin, 'bookMark' => $bookMark, 'err' => $err,
            'placeStyles' => PlaceStyle::whereKindPlaceId($kindPlaceId)->get(), 'kindPlace' => $kindPlace,
            'placeMode' => $kindPlace->tableName, 'rooms' => $rooms, 'jsonRoom' => $jsonRoom, 'video' => $video,
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));
    }

    private function sogatSanaieDet($place){

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

        return $place;
    }

    private function mahaliFoodDet($place){

        $place->material = json_decode($place->material);

        switch ($place->kind){
            case 1:
                $place->kindName = 'چلوخورش';
                break;
            case 2:
                $place->kindName = 'خوراک';
                break;
            case 3:
                $place->kindName = 'سالاد و پیش غذا';
                break;
            case 4:
                $place->kindName = 'ساندویچ';
                break;
            case 5:
                $place->kindName = 'کباب';
                break;
            case 6:
                $place->kindName = 'دسر';
                break;
            case 7:
                $place->kindName = 'نوشیدنی';
                break;
            case 8:
                $place->kindName = 'سوپ و آش';
                break;
        }

        if($place->hotOrCold == 1)
            $place->hotOrCold = 'گرم';
        else
            $place->hotOrCold = 'سرد';

        if($place->gram == 1)
            $place->source = 'گرم';
        else
            $place->source = 'قاشق غذاخوری';

        return $place;
    }

    private function getNearbies($C, $D, $count)
    {
        $D *= 3.14 / 180;
        $C *= 3.14 / 180;

        $nearbyHotels = DB::select("SELECT id, name, cityId, C, D, file, pic_1, alt1, acos(" . sin($D) . " * sin(D / 180 * 3.14) + " . cos($D) . " * cos(D / 180 * 3.14) * cos(C / 180 * 3.14 - " . $C . ")) * 6371 as distance FROM hotels HAVING distance between 0.001 and " . ConfigModel::first()->radius . " order by distance ASC limit 0, " . $count);
        $hotelPlaceId = Place::whereName('هتل')->first()->id;
        foreach ($nearbyHotels as $nearbyHotel) {

            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $nearbyHotel->file . '/l-1.jpg')))
                $nearbyHotel->pic = URL::asset("_images/hotels/" . $nearbyHotel->file . '/l-1.jpg');
            else
                $nearbyHotel->pic = URL::asset("_images/nopic/blank.jpg");

            $condition = ['placeId' => $nearbyHotel->id, 'kindPlaceId' => $hotelPlaceId, 'confirm' => 1,
                'activityId' => Activity::whereName('نظر')->first()->id];
            $nearbyHotel->reviews = LogModel::where($condition)->count();
            $nearbyHotel->distance = round($nearbyHotel->distance, 2);
            $nearbyHotel->rate = getRate($nearbyHotel->id, $hotelPlaceId)[1];
            $nearbyHotel->url =  createUrl(4, $nearbyHotel->id, 0, 0, 0);
            $nearbyHotel->city = Cities::find($nearbyHotel->cityId);
            $nearbyHotel->state = State::find($nearbyHotel->city->stateId);
        }

        $nearbyRestaurants = DB::select("SELECT id, name, cityId, C, D, kind_id, file, pic_1, alt1, acos(" . sin($D) . " * sin(D / 180 * 3.14) + " . cos($D) . " * cos(D / 180 * 3.14) * cos(C / 180 * 3.14 - " . ($C) . ")) * 6371 as distance FROM restaurant HAVING distance between 0.001 and " . ConfigModel::first()->radius . " order by distance ASC limit 0, " . $count);
        $restaurantPlaceId = Place::whereName('رستوران')->first()->id;
        foreach ($nearbyRestaurants as $nearbyRestaurant) {

            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $nearbyRestaurant->file . '/l-1.jpg')))
                $nearbyRestaurant->pic = URL::asset("_images/restaurant/" . $nearbyRestaurant->file . '/l-1.jpg');
            else
                $nearbyRestaurant->pic = URL::asset("_images/nopic/blank.jpg");

            $condition = ['placeId' => $nearbyRestaurant->id, 'kindPlaceId' => $restaurantPlaceId, 'confirm' => 1,
                'activityId' => Activity::whereName('نظر')->first()->id];
            $nearbyRestaurant->reviews = LogModel::where($condition)->count();
            $nearbyRestaurant->distance = round($nearbyRestaurant->distance, 2);
            $nearbyRestaurant->rate = getRate($nearbyRestaurant->id, $restaurantPlaceId)[1];
            $nearbyRestaurant->url = createUrl(3, $nearbyRestaurant->id, 0, 0, 0);
            $nearbyRestaurant->city = Cities::find($nearbyRestaurant->cityId);
            $nearbyRestaurant->state = State::find($nearbyRestaurant->city->stateId);
        }

        $nearbyAmakens = DB::select("SELECT id, name, cityId, mooze, tarikhi, tafrihi, tabiatgardi, markazkharid,  C, D, file, pic_1, alt1, acos(" . sin($D) . " * sin(D / 180 * 3.14) + " . cos($D) . " * cos(D / 180 * 3.14) * cos(C / 180 * 3.14 - " . ($C) . ")) * 6371 as distance FROM amaken HAVING distance between 0.001 and " . ConfigModel::first()->radius . " order by distance ASC limit 0," . $count);
        $amakenPlaceId = Place::whereName('اماکن')->first()->id;
        foreach ($nearbyAmakens as $nearbyAmaken) {

            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $nearbyAmaken->file . '/l-1.jpg')))
                $nearbyAmaken->pic = URL::asset("_images/amaken/" . $nearbyAmaken->file . '/l-1.jpg');
            else
                $nearbyAmaken->pic = URL::asset("_images/nopic/blank.jpg");

            $condition = ['placeId' => $nearbyAmaken->id, 'kindPlaceId' => $amakenPlaceId, 'confirm' => 1,
                'activityId' => Activity::whereName('نظر')->first()->id];
            $nearbyAmaken->reviews = LogModel::where($condition)->count();
            $nearbyAmaken->distance = round($nearbyAmaken->distance, 2);
            $nearbyAmaken->rate = getRate($nearbyAmaken->id, $amakenPlaceId)[1];
            $nearbyAmaken->url = createUrl(1, $nearbyAmaken->id, 0, 0, 0);
            $nearbyAmaken->city = Cities::find($nearbyAmaken->cityId);
            $nearbyAmaken->state = State::find($nearbyAmaken->city->stateId);
        }

        $nearbyMajaras = DB::select("SELECT id, name, cityId, C, D, file, pic_1, alt1, acos(" . sin($D) . " * sin(D / 180 * 3.14) + " . cos($D) . " * cos(D / 180 * 3.14) * cos(C / 180 * 3.14 - " . ($C) . ")) * 6371 as distance FROM majara HAVING distance between 0.001 and " . ConfigModel::first()->radius . " order by distance ASC limit 0, " . $count);
        $majaraPlaceId = Place::whereName('ماجرا')->first()->id;
        foreach ($nearbyMajaras as $nearbyMajara) {

            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $nearbyMajara->file . '/l-1.jpg')))
                $nearbyMajara->pic = URL::asset("_images/majara/" . $nearbyMajara->file . '/l-1.jpg');
            else
                $nearbyMajara->pic = URL::asset("_images/nopic/blank.jpg");

            $condition = ['placeId' => $nearbyMajara->id, 'kindPlaceId' => $majaraPlaceId, 'confirm' => 1,
                'activityId' => Activity::whereName('نظر')->first()->id];
            $nearbyMajara->reviews = LogModel::where($condition)->count();
            $nearbyMajara->distance = round($nearbyMajara->distance, 2);
            $nearbyMajara->rate = getRate($nearbyMajara->id, $majaraPlaceId)[1];
            $nearbyMajara->url = createUrl(6, $nearbyMajara->id, 0, 0, 0);
            $nearbyMajara->city = Cities::find($nearbyMajara->cityId);
            $nearbyMajara->state = State::find($nearbyMajara->city->stateId);
        }

        return [$nearbyHotels, $nearbyRestaurants, $nearbyAmakens, $nearbyMajaras];
    }

    public function getNearby()
    {

        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"])) {

            if(isset($_POST["count"]))
                $count = $_POST["count"];
            else
                $count = 4;

            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);

            switch ($kindPlaceId) {
                case 1:
                    $place = Amaken::whereId(makeValidInput($_POST["placeId"]));
                    break;
                case 3:
                    $place = Restaurant::whereId(makeValidInput($_POST["placeId"]));
                    break;
                case 4:
                default:
                    $place = Hotel::whereId(makeValidInput($_POST["placeId"]));
                    break;
                case 8:
                    $place = Majara::whereId(makeValidInput($_POST["placeId"]));
                    break;
            }

            if ($place != null) {
                $today = getToday()["date"];
                $nowTime = getToday()["time"];

                $cityId = $place->cityId;
                $postsId = PostCityRelation::where('cityId', $cityId)->pluck('postId')->toArray();
                if(count($postsId) < 5){
                    $state = Cities::find($cityId);
                    if($state != null){
                        $psId = PostCityRelation::where('stateId', $state->id)->where('cityId', 0)->pluck('postId')->toArray();
                        $postsId = array_merge($postsId, $psId);
                    }
                }

                $allPosts = array();

                if(count($postsId) != 0) {
                    $allPosts = Post::join('users', 'users.id', 'post.creator')
                        ->whereRaw('(post.date <= ' . $today . ' OR (post.date = ' . $today . ' AND (post.time < ' . $nowTime . ' || post.time IS NULL)))')
                        ->whereRaw('post.release <> "draft"')
                        ->whereIn('post.id', $postsId)
                        ->select('username', 'post.id', 'post.title', 'post.meta', 'post.slug', 'post.seen', 'post.date', 'post.created_at', 'post.pic', 'post.keyword')
                        ->orderBy('post.date', 'DESC')->get();
                }

                if(count($allPosts) < 5){
                    $alP = Post::join('users', 'users.id', 'post.creator')
                        ->whereRaw('(post.date <= ' . $today . ' OR (post.date = ' . $today . ' AND (post.time < ' . $nowTime . ' || post.time IS NULL)))')
                        ->whereRaw('post.release <> "draft"')
                        ->whereNotIn('post.id', $postsId)
                        ->select('username', 'post.id', 'post.title', 'post.meta', 'post.slug', 'post.seen', 'post.date', 'post.created_at', 'post.pic', 'post.keyword')
                        ->orderBy('post.date', 'DESC')->get();

                    if(count($allPosts) == 0)
                        $allPosts = $alP;
                    else
                        $allPosts = array_merge($allPosts, $alP);

                    foreach ($allPosts as $item) {
                        $item->msgs = PostComment::wherePostId($item->id)->whereStatus(true)->count();
                        $item->pic = \URL::asset('_images/posts/' . $item->id . '/' . $item->pic);
                        if ($item->date == null)
                            $item->date = \verta($item->created_at)->format('Ym%d');
                        $item->date = convertJalaliToText($item->date);
                        $mainCategory = PostCategoryRelation::where('postId', $item->id)->where('isMain', 1)->first();
                        $item->category = PostCategory::find($mainCategory->categoryId)->name;
                        $item->url = route('article.show', ['slug' => $item->slug]);
                    }

                }

                $places = $this->getNearbies($place->C, $place->D, $count);

                echo json_encode([$places, $allPosts]);
                return;
            }
        }

        echo \GuzzleHttp\json_encode([]);
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

    public function bookMark()
    {
        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"])) {

            $uId = Auth::user()->id;
            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);

            $condition = ['visitorId' => $uId, 'activityId' => Activity::whereName("نشانه گذاری")->first()->id,
                'placeId' => $placeId, 'kindPlaceId' => $kindPlaceId];

            $log = LogModel::where($condition)->first();

            if ($log != null) {
                $log->delete();
                echo "ok";
                return;
            }

            $log = new LogModel();
            $log->placeId = $placeId;
            $log->time = getToday()["time"];
            $log->kindPlaceId = $kindPlaceId;
            $log->visitorId = $uId;
            $log->date = date('Y-m-d');
            $log->activityId = Activity::whereName('نشانه گذاری')->first()->id;
            try {
                $log->save();
                echo "ok";
            } catch (Exception $x) {
            }
        }
    }

    function getCommentsCount()
    {

        if (isset($_POST["filters"]) && isset($_POST["placeId"]) && isset($_POST["kindPlaceId"]) &&
            isset($_POST["tag"])) {

            $filters = $_POST["filters"];
            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $activityId = Activity::whereName('نظر')->first()->id;
            $tag = makeValidInput($_POST["tag"]);
            $season = [];
            $rate = [];
            $placeStyle = [];
            $srcCity = [];

            $total = DB::select("select count(*) as countNum from log, comment WHERE confirm = 1 and log.id = logId and placeId = " . $placeId . " and kindPlaceId = " . $kindPlaceId . " and activityId = " . $activityId . " and status = 1")[0]->countNum;

            if ($filters != -1) {

                for ($i = 0; $i < count($filters); $i++) {

                    $filter = makeValidInput($filters[$i]);

                    $subStr = explode('_', $filter);
                    if (count($subStr) == 2) {
                        switch ($subStr[0]) {
                            case "season":
                                $season[count($season)] = $subStr[1];
                                break;
                            case "rate":
                                $rate[count($rate)] = $subStr[1];
                                break;
                            case "placeStyle":
                                $placeStyle[count($placeStyle)] = $subStr[1];
                                break;
                            case "srcCity":
                                $srcCity[count($srcCity)] = $subStr[1];
                                break;
                        }
                    }

                }
            }

            $sql = "";

            if (count($season) > 0)
                $sql .= " and (";

            for ($i = 0; $i < count($season) - 1; $i++) {
                $sql .= "seasonTrip = " . $season[$i] . " OR ";
            }

            if (count($season) > 0)
                $sql .= "seasonTrip = " . $season[count($season) - 1] . ')';

            if (count($placeStyle) > 0)
                $sql .= " and (";

            for ($i = 0; $i < count($placeStyle) - 1; $i++) {
                $sql .= "placeStyleId = " . $placeStyle[$i] . " OR ";
            }

            if (count($placeStyle) > 0)
                $sql .= "placeStyleId = " . $placeStyle[count($placeStyle) - 1] . ')';

            if (count($srcCity) > 0)
                $sql .= " and (";

            for ($i = 0; $i < count($srcCity) - 1; $i++) {
                $sql .= "src = '" . $srcCity[$i] . "' OR ";
            }

            if (count($srcCity) > 0)
                $sql .= "src = '" . $srcCity[count($srcCity) - 1] . "')";

            if (count($rate) > 0) {

                $sql .= ' and visitorId in (';

                $rates = DB::select('select avg(rate) as AVGRATE, logId from log, userOpinions WHERE log.id = logId and placeId = ' . $placeId . " and kindPlaceId = " . $kindPlaceId . " and activityId = " . Activity::whereName('امتیاز')->first()->id . " group by(visitorId)");
                $first = true;
                foreach ($rates as $itr) {
                    $itr->AVGRATE = ceil($itr->AVGRATE);
                    if (in_array($itr->AVGRATE, $rate)) {
                        if (!$first)
                            $sql .= ', ';
                        else
                            $first = false;

                        $sql .= LogModel::whereId($itr->logId)->visitorId;
                    }
                }

                if ($first == true) {
                    $sql .= ' -1 ';
                }

                $sql .= ')';
            }

            if ($tag != -1)
                $sql .= " and text LIKE '%$tag%'";

            $sql .= " and status = 1 and confirm = 1";

            $logs = DB::select('select count(*) as countNum from log, comment WHERE log.id = logId and placeId = ' . $placeId .
                " and kindPlaceId = " . $kindPlaceId . " and ActivityId = " . $activityId .
                $sql);

            echo json_encode([$logs[0]->countNum, $total]);
        }
    }

    function opOnComment()
    {

        if (isset($_POST["logId"]) && isset($_POST["mode"])) {

            $uId = Auth::user()->id;
            $logId = makeValidInput($_POST["logId"]);
            $mode = makeValidInput($_POST["mode"]);

            $tmp = LogModel::whereId($logId);
            if ($tmp == null || $tmp->confirm != 1)
                return;

            if ($mode == "like")
                echo $this->likeComment($uId, $logId);
            else if ($mode == "dislike")
                echo $this->dislikeComment($uId, $logId);

        }

    }

    private function likeComment($uId, $logId)
    {

        $out = 1;
        $condition = ['logId' => $logId, 'uId' => $uId, 'like_' => 1];

        if (OpOnActivity::where($condition)->count() > 0) {
            echo 0;
            return;
        }

        $condition = ['logId' => $logId, 'uId' => $uId, 'dislike' => 1];

        $opOnActivity = OpOnActivity::where($condition)->first();
        if ($opOnActivity != null) {
            $out = 2;
            $opOnActivity->dislike = 0;
        } else {
            $opOnActivity = new OpOnActivity();
            $opOnActivity->uId = $uId;
            $opOnActivity->logId = $logId;
        }

        $log = LogModel::whereId($logId);
        $log->date = date('Y-m-d');
        $log->time = getToday()["time"];
        $log->save();

        $opOnActivity->time = time();
        $opOnActivity->like_ = 1;
        $opOnActivity->save();
        echo $out;
    }

    private function dislikeComment($uId, $logId)
    {

        $out = 1;
        $condition = ['logId' => $logId, 'uId' => $uId, 'dislike' => 1];

        if (OpOnActivity::where($condition)->count() > 0) {
            echo 0;
            return;
        }

        $condition = ['logId' => $logId, 'uId' => $uId, 'like_' => 1];

        $opOnActivity = OpOnActivity::where($condition)->first();
        if ($opOnActivity != null) {
            $out = 2;
            $opOnActivity->like_ = 0;
        } else {
            $opOnActivity = new OpOnActivity();
            $opOnActivity->uId = $uId;
            $opOnActivity->logId = $logId;
        }

        $log = LogModel::whereId($logId);
        $log->date = date('Y-m-d');
        $log->time = getToday()["time"];
        $log->save();

        $opOnActivity->time = time();
        $opOnActivity->dislike = 1;
        $opOnActivity->save();
        echo $out;
    }

    function getOpinionRate()
    {

        if (isset($_POST["opinionId"]) && isset($_POST["kindPlaceId"]) && isset($_POST["placeId"])) {

            $uId = Auth::user()->id;
            $condition = ['placeId' => makeValidInput($_POST["placeId"]), 'confirm' => 1,
                'kindPlaceId' => makeValidInput($_POST["kindPlaceId"]), 'visitorId' => $uId,
                'activityId' => Activity::whereName('امتیاز')->first()->id];

            try {
                $logId = LogModel::where($condition)->first()->id;

                $condition = ['logId' => $logId, 'opinionId' => makeValidInput($_POST["opinionId"])];
                echo UserOpinion::where($condition)->first()->rate;
            } catch (Exception $x) {
                echo 0;
            }
        }
    }

    function setPlaceRate()
    {
        if (isset($_POST["opinionId"]) && isset($_POST["rate"]) && isset($_POST["kindPlaceId"]) && isset($_POST["placeId"])) {

            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $uId = Auth::user()->id;
            $activityId = Activity::whereName('امتیاز')->first()->id;

            $condition = ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId, 'visitorId' => $uId, 'activityId' => $activityId];

            $log = LogModel::where($condition)->first();

            if ($log == null) {

                $log = new LogModel();
                $log->visitorId = $uId;
                $log->time = getToday()["time"];
                $log->activityId = $activityId;
                $log->placeId = $placeId;
                $log->kindPlaceId = $kindPlaceId;
                $log->date = date('Y-m-d');
                $log->confirm = 1;
                $log->save();

                $opinion = new UserOpinion();
                $opinion->logId = $log->id;
                $opinion->opinionId = makeValidInput($_POST["opinionId"]);
                $opinion->rate = makeValidInput($_POST["rate"]);

                try {
                    $opinion->save();
                } catch (Exception $x) {
                    echo $x->getMessage();
                }

            } else {

                $condition = ['logId' => $log->id, 'opinionId' => makeValidInput($_POST["opinionId"])];
                $opinion = UserOpinion::where($condition)->first();
                if ($opinion == null) {
                    $opinion = new UserOpinion();
                    $opinion->logId = $log->id;
                    $opinion->opinionId = makeValidInput($_POST["opinionId"]);
                    $opinion->rate = makeValidInput($_POST["rate"]);

                    try {
                        $opinion->save();
                    } catch (Exception $x) {
                        echo $x->getMessage();
                    }

                } else {
                    $opinion->rate = makeValidInput($_POST["rate"]);

                    try {
                        $opinion->save();
                    } catch (Exception $x) {
                        echo $x->getMessage();
                    }
                }
            }
        }
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

    function sendComment()
    {

        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"]) && isset($_POST["placeStyle"]) &&
            isset($_POST["reviewTitle"]) && isset($_POST["reviewText"]) && isset($_POST["src"]) &&
            isset($_POST["seasonTrip"]) && isset($_POST["status"])) {

            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $placeStyle = makeValidInput($_POST["placeStyle"]);
            $reviewText = makeValidInput($_POST["reviewText"]);
            $reviewTitle = makeValidInput($_POST["reviewTitle"]);
            $src = makeValidInput($_POST["src"]);
            $seasonTrip = makeValidInput($_POST["seasonTrip"]);
            $status = makeValidInput($_POST["status"]);
            $uId = Auth::user()->id;

            $condition = ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId, 'visitorId' => $uId,
                'activityId' => Activity::whereName('امتیاز')->first()->id];
            $log = LogModel::where($condition)->first();

            if ($log == null) {
                echo "-1";
                return;
            }

            if (empty($reviewTitle)) {
                echo "-2";
                return;
            }

            if (empty($reviewText)) {
                echo "-3";
                return;
            }

            if (empty($placeStyle)) {
                echo "-4";
                return;
            }

            if (empty($src)) {
                echo "-5";
                return;
            }

            if (empty($seasonTrip)) {
                echo "-6";
                return;
            }

            if (Cities::whereName($src)->count() == 0) {
                echo "-7";
                return;
            }

            if ($status == 1)
                $status = true;
            else
                $status = false;

            $activityId = Activity::whereName('نظر')->first()->id;

            $condition = ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId, 'visitorId' => $uId,
                'activityId' => $activityId];

            $log = LogModel::where($condition)->first();

            if ($log == null) {
                $log = new LogModel();
                $log->visitorId = $uId;
                $log->time = getToday()["time"];
                $log->activityId = Activity::whereName('نظر')->first()->id;
                $log->placeId = $placeId;
                $log->kindPlaceId = $kindPlaceId;
                $log->date = date('Y-m-d');
                $log->text = $reviewText;
                $log->subject = $reviewTitle;

                $log->save();

                $comment = new Comment();
                $comment->status = $status;
                $comment->src = $src;
                $comment->logId = $log->id;
                $comment->placeStyleId = $placeStyle;
                $comment->seasonTrip = $seasonTrip;
                $comment->save();

            } else {

                $log->text = $reviewText;
                $log->subject = $reviewTitle;
                $log->confirm = 0;
                $log->save();

                $comment = Comment::whereLogId($log->id)->first();

                if ($comment != null) {
                    $comment->status = $status;
                    $comment->src = $src;
                    $comment->logId = $log->id;
                    $comment->placeStyleId = $placeStyle;
                    $comment->seasonTrip = $seasonTrip;
                    $comment->save();
                }

            }

            echo "ok";

        }

    }

    function getComment()
    {

        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"])) {

            $uId = Auth::user()->id;
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);

            $condition = ['placeId' => makeValidInput($_POST["placeId"]),
                'kindPlaceId' => $kindPlaceId, 'confirm' => 1,
                'visitorId' => $uId, 'activityId' => Activity::whereName('نظر')->first()->id];

            $log = LogModel::where($condition)->first();

            if ($log != null) {
                $out = [];
                $out["reviewText"] = $log->text;
                $out["reviewTitle"] = $log->subject;

                if ($log->pic != "")
                    $out["reviewPic"] = URL::asset('userPhoto/comments/' . $kindPlaceId . '/' . $log->pic);
                else
                    $out["reviewPic"] = -1;

                $comment = Comment::whereLogId($log->id)->first();
                if ($comment != null) {
                    $out["src"] = $comment->src;
                    $out["placeStyle"] = $comment->placeStyleId;
                    $out["seasonTrip"] = $comment->seasonTrip;
                    echo json_encode($out);
                }
            }
        }
    }

    function filterComments()
    {

        if (isset($_POST["filters"]) && isset($_POST["placeId"]) && isset($_POST["kindPlaceId"]) &&
            isset($_POST["tag"]) && isset($_POST["page"])) {

            $filters = $_POST["filters"];
            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $activityId = Activity::whereName('نظر')->first()->id;
            $rateActivityId = Activity::whereName('امتیاز')->first()->id;
            $tag = makeValidInput($_POST["tag"]);
            $season = [];
            $rate = [];
            $placeStyle = [];
            $srcCity = [];

            if ($filters != -1) {

                for ($i = 0; $i < count($filters); $i++) {

                    $filter = makeValidInput($filters[$i]);

                    $subStr = explode('_', $filter);
                    if (count($subStr) == 2) {
                        switch ($subStr[0]) {
                            case "season":
                                $season[count($season)] = $subStr[1];
                                break;
                            case "rate":
                                $rate[count($rate)] = $subStr[1];
                                break;
                            case "placeStyle":
                                $placeStyle[count($placeStyle)] = $subStr[1];
                                break;
                            case "srcCity":
                                $srcCity[count($srcCity)] = $subStr[1];
                                break;
                        }
                    }

                }
            }

            $sql = "";

            if (count($season) > 0)
                $sql .= " and (";

            for ($i = 0; $i < count($season) - 1; $i++) {
                $sql .= "seasonTrip = " . $season[$i] . " OR ";
            }

            if (count($season) > 0)
                $sql .= "seasonTrip = " . $season[count($season) - 1] . ')';

            if (count($placeStyle) > 0)
                $sql .= " and (";

            for ($i = 0; $i < count($placeStyle) - 1; $i++) {
                $sql .= "placeStyleId = " . $placeStyle[$i] . " OR ";
            }

            if (count($placeStyle) > 0)
                $sql .= "placeStyleId = " . $placeStyle[count($placeStyle) - 1] . ')';

            if (count($srcCity) > 0)
                $sql .= " and (";

            for ($i = 0; $i < count($srcCity) - 1; $i++) {
                $sql .= "src = '" . $srcCity[$i] . "' OR ";
            }

            if (count($srcCity) > 0)
                $sql .= "src = '" . $srcCity[count($srcCity) - 1] . "')";

            if (count($rate) > 0) {

                $sql .= ' and visitorId in (';

                $rates = DB::select('select avg(rate) as AVGRATE, logId from log, userOpinions WHERE log.id = logId and placeId = ' . $placeId . " and kindPlaceId = " . $kindPlaceId . " and activityId = " . Activity::whereName('امتیاز')->first()->id . " group by(visitorId)");
                $first = true;
                foreach ($rates as $itr) {
                    $itr->AVGRATE = ceil($itr->AVGRATE);
                    if (in_array($itr->AVGRATE, $rate)) {
                        if (!$first)
                            $sql .= ', ';
                        else
                            $first = false;

                        $sql .= LogModel::whereId($itr->logId)->visitorId;
                    }
                }

                if ($first == true) {
                    $sql .= ' -1 ';
                }

                $sql .= ')';
            }

            if ($tag != -1)
                $sql .= " and text LIKE '%$tag%'";

            $sql .= " and status = 1 and confirm = 1";

            $page = makeValidInput($_POST["page"]);
            $sql .= " limit 6 offset " . (($page - 1) * 6);

            $logs = DB::select('select log.id, visitorId, pic, text, subject, date from log, comment WHERE log.id = logId and placeId = ' . $placeId .
                " and kindPlaceId = " . $kindPlaceId . " and ActivityId = " . $activityId .
                $sql);

            foreach ($logs as $log) {
                $condition = ["activityId" => $activityId, 'visitorId' => $log->visitorId];
                $log->comments = LogModel::where($condition)->count();

                $condition = ["activityId" => $rateActivityId, 'visitorId' => $log->visitorId,
                    'placeId' => $placeId, 'kindPlaceId' => $kindPlaceId];

                $logId = LogModel::where($condition)->first()->id;
                $log->rate = ceil(DB::select('Select AVG(rate) as avgRate from userOpinions WHERE logId = ' . $logId)[0]->avgRate);
                $user = User::whereId($log->visitorId);
                $log->visitorId = $user->username;

                $userPic = $user->picture;

                if (count(explode('.', $userPic)) == 2) {
                    $log->visitorPic = URL::asset('userPhoto/' . $userPic);
                } else {
                    $defaultPic = DefaultPic::whereId($userPic);
                    if ($defaultPic == null)
                        $defaultPic = DefaultPic::first();
                    $log->visitorPic = URL::asset('defaultPic/' . $defaultPic->name);
                }

                $condition = ["logId" => $log->id, "like_" => 1];
                $log->likes = OpOnActivity::where($condition)->count();
                $condition = ["logId" => $log->id, "dislike" => 1];
                $log->dislikes = OpOnActivity::where($condition)->count();

                if (!empty($log->pic))
                    $log->pic = URL::asset('userPhoto/comments/' . $kindPlaceId . '/' . $log->pic);
                else
                    $log->pic = -1;

                $log->date = convertDate($log->date);

            }

            echo json_encode($logs);
        }

    }

    public function report()
    {

        if (isset($_POST["logId"])) {

            $logId = makeValidInput($_POST["logId"]);

            $logTmp = LogModel::whereId($logId);
            $uId = Auth::user()->id;
            $activityId = Activity::whereName('گزارش')->first()->id;
            $condition = ["visitorId" => $uId, 'relatedTo' => $logId, 'activityId' => $activityId];

            if (LogModel::where($condition)->count() == 0) {

                $log = new LogModel();
                $log->placeId = $logTmp->placeId;
                $log->time = getToday()["time"];
                $log->kindPlaceId = $logTmp->kindPlaceId;
                $log->visitorId = $uId;
                $log->date = date('Y-m-d');
                $log->relatedTo = $logId;
                $log->activityId = $activityId;

                try {
                    $log->save();
                } catch (Exception $x) {
                };
            }
        }
    }

    public function sendReport()
    {

        if (isset($_POST["logId"]) && isset($_POST["reports"]) && isset($_POST["customMsg"])) {

            $logId = makeValidInput($_POST["logId"]);
            $logTmp = LogModel::whereId($logId);
            $reports = $_POST["reports"];
            $customMsg = makeValidInput($_POST["customMsg"]);
            $uId = Auth::user()->id;
            $activityId = Activity::whereName('گزارش')->first()->id;
            $condition = ["visitorId" => $uId, "activityId" => $activityId,
                "relatedTo" => $logId, 'subject' => ''];
            $log = LogModel::where($condition)->first();

            if ($log == null) {
                $log = new LogModel();
                $log->visitorId = $uId;
                $log->time = getToday()["time"];
                $log->placeId = $logTmp->placeId;
                $log->kindPlaceId = $logTmp->kindPlaceId;
                $log->activityId = $activityId;
                $log->relatedTo = $logId;
                $log->date = date('Y-m-d');
                $log->save();
            }

            $log->text = "";
            $log->save();

            $tmpLog = LogModel::whereId($logId);
            $tmpLog->date = date('Y-m-d');
            $tmpLog->save();

            Report::whereLogId($log->id)->delete();

            for ($i = 0; $i < count($reports); $i++) {
                $report = makeValidInput($reports[$i]);

                if ($report == -1) {
                    $log->text = $customMsg;
                    $log->save();
                } else {
                    $newReport = new Report();
                    $newReport->logId = $log->id;
                    $newReport->reportKind = $report;
                    $newReport->save();
                }
            }
            echo "ok";
        }

    }

    public function seeAllAns($questionId, $mode = "", $logId = -1)
    {

        $hasLogin = true;
        if (!Auth::check())
            $hasLogin = false;

        $log = LogModel::whereId($questionId);
        if ($log == null || $log->confirm != 1)
            return Redirect::to('profile');

        $placeId = $log->placeId;
        $kindPlaceId = $log->kindPlaceId;

        switch ($kindPlaceId) {
            case 1:
            default:
                $place = Amaken::whereId($placeId);
                if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/' . $place->pic_1)))
                    $placePic = URL::asset('_images/amaken/' . $place->file . '/' . $place->pic_1);
                else
                    $placePic = URL::asset('_images/nopic/blank.jpg');
                $placeMode = "amaken";
                break;
            case 3:
                $place = Restaurant::whereId($placeId);
                if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/' . $place->pic_1)))
                    $placePic = URL::asset('_images/restaurant/' . $place->file . '/' . $place->pic_1);
                else
                    $placePic = URL::asset('_images/nopic/blank.jpg');
                $placeMode = "restaurant";
                break;
            case 4:
                $place = Hotel::whereId($placeId);
                if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/' . $place->pic_1)))
                    $placePic = URL::asset('_images/hotels/' . $place->file . '/' . $place->pic_1);
                else
                    $placePic = URL::asset('_images/nopic/blank.jpg');
                $placeMode = "hotel";
                break;
            case 6:
                $place = Majara::whereId($placeId);
                if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/' . $place->pic_1)))
                    $placePic = URL::asset('_images/majara/' . $place->file . '/' . $place->pic_1);
                else
                    $placePic = URL::asset('_images/nopic/blank.jpg');
                $placeMode = "majara";
                break;
            case 8:
                $place = Adab::whereId($placeId);
                if ($place->category == 3) {
                    if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/' . $place->pic_1)))
                        $placePic = URL::asset('_images/adab/ghazamahali/' . $place->file . '/' . $place->pic_1);
                    else
                        $placePic = URL::asset('_images/nopic/blank.jpg');
                } else {
                    if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/' . $place->pic_1)))
                        $placePic = URL::asset('_images/adab/soghat/' . $place->file . '/' . $place->pic_1);
                    else
                        $placePic = URL::asset('_images/nopic/blank.jpg');
                }
                $placeMode = "adab";
                break;
        }

        $city = Cities::whereId($place->cityId);
        $condition = ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId,
            'activityId' => Activity::whereName('پاسخ')->first()->id,
            'relatedTo' => $questionId];

        $answers = LogModel::where($condition)->get();

        foreach ($answers as $answer) {

            $user = User::whereId($answer->visitorId);
            $pic = $user->picture;

            if (count(explode('.', $pic)) != 2) {
                $defaultPic = DefaultPic::whereId($pic);
                if ($defaultPic == null)
                    $pic = URL::asset('defaultPic/' . $defaultPic->name);
                else
                    $pic = URL::asset('defaultPic/' . DefaultPic::first()->name);
            } else {
                $pic = URL::asset('userPhoto/' . $pic);
            }

            $condition = ['logId' => $answer->id, 'like_' => 1];
            $answer->rate = OpOnActivity::where($condition)->count();
            $condition = ['logId' => $answer->id, 'dislike' => 1];
            $answer->rate -= OpOnActivity::where($condition)->count();

            $answer->userPhoto = $pic;
            $city = Cities::whereId($user->cityId);
            $answer->city = $city->name;
            $answer->state = State::whereId($city->stateId)->name;
            $answer->visitorId = $user->username;
            $answer->date = convertDate($answer->date);
        }

        $condition = ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId,
            'activityId' => Activity::whereName('نظر')->first()->id];
        $reviews = LogModel::where($condition)->count();

        $question = LogModel::whereId($questionId);
        if ($question != null) {

            $user = User::whereId($question->visitorId);
            $pic = $user->picture;

            if (count(explode('.', $pic)) != 2) {
                $defaultPic = DefaultPic::whereId($pic);
                if ($defaultPic == null)
                    $pic = URL::asset('defaultPic/' . $defaultPic->name);
                else
                    $pic = URL::asset('defaultPic/' . DefaultPic::first()->name);
            } else {
                $pic = URL::asset('userPhoto/' . $pic);
            }

            $question->userPhoto = $pic;

            $city = Cities::whereId($user->cityId);
            $question->city = $city->name;
            $question->state = State::whereId($city->stateId)->name;
            $question->visitorId = $user->username;
            $question->date = convertDate($question->date);
        }

        return view('questionList', array('placePic' => $placePic, 'city' => $city->name,
            'state' => State::whereId($city->stateId)->name, 'placeId' => $placeId, 'placeName' => $place->name,
            'kindPlaceId' => $kindPlaceId, 'answers' => $answers, 'mode' => $mode, 'logId' => $logId,
            'rate' => getRate($placeId, $kindPlaceId)[1], 'hasLogin' => $hasLogin,
            'reviews' => $reviews, 'question' => $question, 'placeMode' => $placeMode));
    }

    public function getPlaceStyles()
    {
        if (isset($_POST["kindPlaceId"]))
            echo \GuzzleHttp\json_encode(PlaceStyle::whereKindPlaceId(makeValidInput($_POST["kindPlaceId"]))->get());
    }

    public function getSrcCities()
    {

        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"])) {
            echo \GuzzleHttp\json_encode(DB::select("select DISTINCT(src) from log, comment WHERE log.placeId = " . makeValidInput($_POST["placeId"]) . ' and ' .
                'kindPlaceId = ' . makeValidInput($_POST["kindPlaceId"]) . ' and activityId = ' . Activity::whereName('نظر')->first()->id .
                ' and logId = log.id and status = 1'));
        }
    }

    public function getTags()
    {
        if (isset($_POST["kindPlaceId"]))
            echo \GuzzleHttp\json_encode(Tag::where('kindPlaceId', '=', makeValidInput($_POST["kindPlaceId"]))->get());
    }

    public function showAllPlaces($placeId1, $kindPlaceId1, $placeId2 = "", $kindPlaceId2 = "", $placeId3 = "", $kindPlaceId3 = "", $placeId4 = "", $kindPlaceId4 = "", $mode = "", $err = "")
    {

        $hasLogin = true;
        $kindPlaceIds = [$kindPlaceId1, $kindPlaceId2, $kindPlaceId3, $kindPlaceId4];

        $placeIds = [$placeId1, $placeId2, $placeId3, $placeId4];
        $uId = -1;
        $bookMarks = [];
        $ratesArr = [];
        $saves = [];
        $places = [];
        $cityNames = [];
        $stateNames = [];
        $tagsArr = [];
        $sitePhotosArr = [];
        $placeModes = [];
        $photosArr = [];
        $validate = [true, true, true, true];
        $nearbiesArr = [];

        if (Auth::check())
            $uId = Auth::user()->id;
        else
            $hasLogin = false;

        for ($i = 0; $i < 4; $i++) {

            if ($kindPlaceIds[$i] == "") {
                $validate[$i] = false;
                continue;
            }

            if ($kindPlaceIds[$i] != 1 && $kindPlaceIds[$i] != 3 && $kindPlaceIds[$i] != 4 &&
                $kindPlaceIds[$i] != 8 && $kindPlaceIds[$i] != 6)
                return Redirect::route('main');

            switch ($kindPlaceIds[$i]) {
                case 1:
                default:
                    $place = Amaken::whereId($placeIds[$i]);
                    $imgPath = "amaken";
                    $imgPath2 = "amaken";
                    break;
                case 3:
                    $place = Restaurant::whereId($placeIds[$i]);
                    $imgPath = "restaurant";
                    $imgPath2 = "restaurant";
                    break;
                case 4:
                    $place = Hotel::whereId($placeIds[$i]);
                    $imgPath = "hotels";
                    $imgPath2 = "hotel";
                    break;
                case 6:
                    $place = Majara::whereId($placeIds[$i]);
                    $imgPath = "majara";
                    $imgPath2 = "majara";
                    break;
                case 8:
                    $place = Adab::whereId($placeIds[$i]);
                    if ($place->category == 3) {
                        $imgPath = "adab/ghazamahali";
                        $imgPath2 = "ghazamahali";
                    } else {
                        $imgPath = "adab/soghat";
                        if ($place->category == 1)
                            $imgPath2 = "soghat";
                        else
                            $imgPath2 = "sanaye";
                    }
                    break;
            }

            if ($place == null)
                return Redirect::route('main');

            $kindPlaceId = $kindPlaceIds[$i];

            if ($hasLogin) {

                $activityId = Activity::whereName('مشاهده')->first()->id;

                $condition = ['visitorId' => $uId, 'placeId' => $placeIds[$i], 'kindPlaceId' => $kindPlaceId,
                    'activityId' => $activityId];
                $log = LogModel::where($condition)->first();
                if ($log == null) {
                    $log = new LogModel();
                    $log->activityId = $activityId;
                    $log->time = getToday()["time"];
                    $log->placeId = $placeIds[$i];
                    $log->kindPlaceId = $kindPlaceId;
                    $log->visitorId = $uId;
                    $log->date = date('Y-m-d');
                    $log->save();
                } else {
                    $log->date = date('Y-m-d');
                    $log->save();
                }
            }

            $placeModes[$i] = $imgPath2;

            $bookMark = false;
            $condition = ['visitorId' => $uId, 'activityId' => Activity::whereName("نشانه گذاری")->first()->id,
                'placeId' => $placeIds[$i], 'kindPlaceId' => $kindPlaceId];

            if (LogModel::where($condition)->count() > 0)
                $bookMark = true;

            $bookMarks[$i] = $bookMark;

            $ratesArr[$i] = getRate($placeIds[$i], $kindPlaceId);

            $save = false;
            $count = DB::select("select count(*) as tripPlaceNum from trip, tripPlace WHERE tripPlace.placeId = " . $placeIds[$i] . " and tripPlace.kindPlaceId = " . $kindPlaceId . " and tripPlace.tripId = trip.id and trip.uId = " . $uId);
            if ($count[0]->tripPlaceNum > 0)
                $save = true;

            $saves[$i] = $save;

            if ($kindPlaceId != 8) {
                $city = Cities::whereId($place->cityId);
                $state = State::whereId($city->stateId)->name;
            } else {
                $city = State::whereId($place->stateId);
                $state = $city;
            }

            $cityNames[$i] = $city->name;
            $stateNames[$i] = $state;

            $photos = [];
            if (!empty($place->pic_1)) {
                if (file_exists((__DIR__ . '/../../../../assets/_images/' . $imgPath . '/' . $place->file . '/' . $place->pic_1)))
                    $photos[count($photos)] = URL::asset('_images/' . $imgPath . '/' . $place->file . '/' . $place->pic_1);
                else
                    $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
            } else
                $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');

            if (!empty($place->pic_2)) {
                if (file_exists((__DIR__ . '/../../../../assets/_images/' . $imgPath . '/' . $place->file . '/' . $place->pic_2)))
                    $photos[count($photos)] = URL::asset('_images/' . $imgPath . '/' . $place->file . '/' . $place->pic_2);
                else
                    $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
            }

            if (!empty($place->pic_3)) {
                if (file_exists((__DIR__ . '/../../../../assets/_images/' . $imgPath . '/' . $place->file . '/' . $place->pic_3)))
                    $photos[count($photos)] = URL::asset('_images/' . $imgPath . '/' . $place->file . '/' . $place->pic_3);
                else
                    $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
            }

            if (!empty($place->pic_4)) {
                if (file_exists((__DIR__ . '/../../../../assets/_images/' . $imgPath . '/' . $place->file . '/' . $place->pic_4)))
                    $photos[count($photos)] = URL::asset('_images/' . $imgPath . '/' . $place->file . '/' . $place->pic_4);
                else
                    $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
            }

            if (!empty($place->pic_5)) {
                if (file_exists((__DIR__ . '/../../../../assets/_images/' . $imgPath . '/' . $place->file . '/' . $place->pic_5)))
                    $photos[count($photos)] = URL::asset('_images/' . $imgPath . '/' . $place->file . '/' . $place->pic_5);
                else
                    $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
            }

            $sitePhotosArr[$i] = count($photos);

            $activityId = Activity::whereName('عکس')->first()->id;
            $tmp = DB::select("select text from log WHERE confirm = 1 and activityId = " . $activityId . " and placeId = " . $placeIds[$i] . " and kindPlaceId = " . $kindPlaceId . " and pic <> 0");
            foreach ($tmp as $itr)
                $photos[count($photos)] = URL::asset('userPhoto/' . $imgPath2 . '/l-' . $itr->text);

            $photosArr[$i] = $photos;
            $places[$i] = $place;

            if ($kindPlaceId == 8) {
                $brands = [];

                if (!empty($place->brand_name_1)) {
                    $brands[count($brands)] = $place->brand_name_1 . "<br/>" . $place->des_name_1;
                }
                if (!empty($place->brand_name_2)) {
                    $brands[count($brands)] = $place->brand_name_2 . "<br/>" . $place->des_name_2;
                }
                if (!empty($place->brand_name_3)) {
                    $brands[count($brands)] = $place->brand_name_3 . "<br/>" . $place->des_name_3;
                }
                if (!empty($place->brand_name_4)) {
                    $brands[count($brands)] = $place->brand_name_4 . "<br/>" . $place->des_name_4;
                }
                if (!empty($place->brand_name_5)) {
                    $brands[count($brands)] = $place->brand_name_5 . "<br/>" . $place->des_name_5;
                }
                if (!empty($place->brand_name_6)) {
                    $brands[count($brands)] = $place->brand_name_6 . "<br/>" . $place->des_name_6;
                }

                $nearbiesArr[$i] = $brands;
            } else {
                $nearbiesArr[$i] = [];
            }

        }

        return view('showAllPlaces', array('places' => $places, 'saves' => $saves, 'cityNames' => $cityNames, 'nearbies' => $nearbiesArr,
            'tags' => $tagsArr, 'stateNames' => $stateNames, 'avgRates' => $ratesArr, 'photos' => $photosArr,
            'kindPlaceIds' => $kindPlaceIds, 'mode' => $mode, 'rates' => $ratesArr, 'sitePhotos' => $sitePhotosArr,
            'hasLogin' => $hasLogin, 'bookMarks' => $bookMarks, 'childAge' => ConfigModel::first()->childAge, 'err' => $err,
            'validate' => $validate, 'placeMode' => 'policies', 'placeModes' => $placeModes));
    }

    public function showUserBriefDetail()
    {

        if (isset($_POST["username"])) {

            $username = makeValidInput($_POST['username']);

            if ($username == 'سایت')
                return;

            $user = User::whereUserName($username)->first();

            $city = Cities::whereId($user->cityId);
            if ($city == null) {
                $out["city"] = "نامشخص";
                $out["state"] = "نامشخص";
            } else {
                $out["city"] = $city->name;
                $out["state"] = State::whereId($city->stateId)->name;
            }

            $rateActivity = Activity::whereName('امتیاز')->first()->id;
            $condition = ['visitorId' => $user->id, 'activityId' => $rateActivity];
            $out["rates"] = LogModel::where($condition)->count();

            $condition = ['visitorId' => $user->id, 'activityId' => Activity::whereName('مشاهده')->first()->id];
            $out["seen"] = LogModel::where($condition)->count();

            $activityId = Activity::whereName('پاسخ')->first()->id;
            $out["likes"] = DB::select('select count(*) as countNum from log, opOnActivity WHERE logId = log.id and visitorId = ' . $user->id . ' and activityId = ' . $activityId . ' and like_ = 1')[0]->countNum;

            $out["dislikes"] = DB::select('select count(*) as countNum from log, opOnActivity WHERE logId = log.id and visitorId = ' . $user->id . ' and activityId = ' . $activityId . ' and dislike = 1')[0]->countNum;

            $out["excellent"] = DB::select("SELECT COUNT(*) as countNum FROM log WHERE visitorId = " . $user->id . " and activityId = " . $rateActivity . " and (SELECT AVG(rate) FROM userOpinions WHERE logId = log.id) > 4")[0]->countNum;
            $out["veryGood"] = DB::select("SELECT COUNT(*) as countNum FROM log WHERE visitorId = " . $user->id . " and activityId = " . $rateActivity . " and (SELECT AVG(rate) FROM userOpinions WHERE logId = log.id) > 3")[0]->countNum - $out["excellent"];
            $out["average"] = DB::select("SELECT COUNT(*) as countNum FROM log WHERE visitorId = " . $user->id . " and activityId = " . $rateActivity . " and (SELECT AVG(rate) FROM userOpinions WHERE logId = log.id) > 2")[0]->countNum - $out["veryGood"] - $out["excellent"];
            $out["bad"] = DB::select("SELECT COUNT(*) as countNum FROM log WHERE visitorId = " . $user->id . " and activityId = " . $rateActivity . " and (SELECT AVG(rate) FROM userOpinions WHERE logId = log.id) > 1")[0]->countNum - $out["veryGood"] - $out["average"] - $out["excellent"];
            $out["veryBad"] = DB::select("SELECT COUNT(*) as countNum FROM log WHERE visitorId = " . $user->id . " and activityId = " . $rateActivity . " and (SELECT AVG(rate) FROM userOpinions WHERE logId = log.id) > 0")[0]->countNum - $out["veryGood"] - $out["average"] - $out["excellent"] - $out["bad"];

            $out["level"] = nearestLevel($user->id)[0]->name;

            $out["created"] = convertDate($user->created_at);

            echo json_encode($out);

        }

    }

    public function showReview($logId)
    {

        $log = LogModel::whereId($logId);

        if ($log == null || $log->confirm != 1)
            return Redirect::to('profile');

        $address = "";
        $phone = "";
        $site = "";
        $hasLogin = true;
        $placePhotosCount = 0;

        if (Auth::check())
            $hasLogin = false;

        $comment = Comment::whereLogId($logId)->first();

        switch ($log->kindPlaceId) {
            case 1:
            default:
                $place = Amaken::whereId($log->placeId);
                $address = $place->address;
                if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/' . $place->pic_1)))
                    $placePic = URL::asset('_images/amaken/' . $place->file . '/' . $place->pic_1);
                else
                    $placePic = URL::asset('_images/nopic/blank.jpg');
                $placeMode = "amaken";
                $state = State::whereId(Cities::whereId($place->cityId)->stateId)->name;
                break;
            case 3:
                $place = Restaurant::whereId($log->placeId);
                $address = $place->address;
                if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/' . $place->pic_1)))
                    $placePic = URL::asset('_images/restaurant/' . $place->file . '/' . $place->pic_1);
                else
                    $placePic = URL::asset('_images/nopic/blank.jpg');
                $placeMode = "restaurant";
                $state = State::whereId(Cities::whereId($place->cityId)->stateId)->name;
                break;
            case 4:
                $place = Hotel::whereId($log->placeId);
                $address = $place->address;
                if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/' . $place->pic_1)))
                    $placePic = URL::asset('_images/hotels/' . $place->file . '/' . $place->pic_1);
                else
                    $placePic = URL::asset('_images/nopic/blank.jpg');
                $placeMode = "hotel";
                $state = State::whereId(Cities::whereId($place->cityId)->stateId)->name;
                break;
            case 6:
                $place = Majara::whereId($log->placeId);
                $address = $place->address;
                if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/' . $place->pic_1)))
                    $placePic = URL::asset('_images/majara/' . $place->file . '/' . $place->pic_1);
                else
                    $placePic = URL::asset('_images/nopic/blank.jpg');
                $placeMode = "majara";
                $state = State::whereId($place->cityId)->name;
                break;
            case 8:
                $place = Adab::whereId($log->placeId);
                if ($place->category == 3) {
                    if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/' . $place->pic_1)))
                        $placePic = URL::asset('_images/adab/ghazamahali/' . $place->file . '/' . $place->pic_1);
                    else
                        $placePic = URL::asset('_images/nopic/blank.jpg');
                } else {
                    if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/' . $place->pic_1)))
                        $placePic = URL::asset('_images/adab/soghat/' . $place->file . '/' . $place->pic_1);
                    else
                        $placePic = URL::asset('_images/nopic/blank.jpg');
                }
                $placeMode = "adab";
                $state = State::whereId($place->stateId)->name;
                break;
        }

        if ($place->pic_1 != "")
            $placePhotosCount++;
        if ($place->pic_2 != "")
            $placePhotosCount++;
        if ($place->pic_3 != "")
            $placePhotosCount++;
        if ($place->pic_4 != "")
            $placePhotosCount++;
        if ($place->pic_5 != "")
            $placePhotosCount++;

        $condition = ['placeId' => $log->placeId, 'kindPlaceId' => $log->kindPlaceId, 'confirm' => 1,
            'activityId' => Activity::whereName('عکس')->first()->id];
        $userPhotosCount = LogModel::where($condition)->count();

        $condition = ['placeId' => $log->placeId, 'kindPlaceId' => $log->kindPlaceId,
            'activityId' => Activity::whereName('امتیاز')->first()->id,
            'visitorId' => $log->visitorId];
        $logId = LogModel::where($condition)->first()->id;
        $log->rate = ceil(DB::select('select avg(rate) as avgRate from userOpinions where logId = ' . $logId)[0]->avgRate);

        $condition = ['activityId' => Activity::whereName('نظر')->first()->id,
            'visitorId' => $log->visitorId, 'confirm' => 1];
        $log->commentsCount = LogModel::where($condition)->count();

        $user = User::whereId($log->visitorId);
        $log->visitorId = $user->username;
        $city = Cities::whereId($user->cityId);

        if (!empty($log->pic) && file_exists(__DIR__ . '/../../../../assets/userPhoto/comments/' . $log->kindPlaceId . '/' . $log->pic)) {
            $log->userPic = URL::asset('userPhoto/comments/' . $log->kindPlaceId . '/' . $log->pic);
        }

        $log->city = $city->name;
        $log->date = convertDate($log->date);
        $log->state = State::whereId($city->stateId)->name;

        $log->visitorPic = $user->picture;
        if (count(explode('.', $log->visitorPic)) == 1) {
            if (!empty(DefaultPic::whereId($log->visitorPic)))
                $log->visitorPic = URL::asset('defaultPic/' . DefaultPic::whereId($log->visitorPic)->name);
            else
                $log->visitorPic = URL::asset('defaultPic/' . DefaultPic::first()->name);
        } else {
            $log->visitorPic = URL::asset('userPhoto/' . $log->visitorPic);
        }

        $condition = ['logId' => $log->id, 'like_' => 1];
        $likes = OpOnActivity::where($condition)->count();

        $condition = ['logId' => $log->id, 'dislike' => 1];
        $dislikes = OpOnActivity::where($condition)->count();

        $activityId = Activity::whereName('نظر')->first()->id;
        $tags = DB::select('SELECT DISTINCT(subject), id FROM log WHERE confirm = 1 and activityId = ' . $activityId . ' and placeId = ' . $log->placeId . ' and kindPlaceId = ' . $log->kindPlaceId . ' ORDER BY date DESC LIMIT 0, 10');

        return view('showReview', array('log' => $log, 'comment' => $comment, 'hasLogin' => $hasLogin, 'state' => $state,
            'placeName' => $place->name, 'placePic' => $placePic, 'address' => $address, 'phone' => $phone, 'site' => $site, 'userPhotosCount' => $userPhotosCount, 'sitePhotosCount' => $placePhotosCount, 'likes' => $likes, 'dislikes' => $dislikes, 'rate' => getRate($log->placeId, $log->kindPlaceId)[1], 'tags' => $tags, 'placeMode' => $placeMode));
    }

    public function getPhotos()
    {

        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"]) && isset($_POST["picItemId"])) {

            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $picItemId = makeValidInput($_POST["picItemId"]);

            $activityId = Activity::whereName('عکس')->first()->id;

            $logs = [];

            if ($picItemId != -2) {
                if ($picItemId == -1) {
                    $condition = ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId,
                        'activityId' => $activityId];
                    $logs = LogModel::where($condition)->select('text', 'visitorId')->get();
                } else if ($picItemId == -3) {
                    $logs = DB::select("select text, visitorId FROM log WHERE placeId = " . $placeId . " and kindPlaceId = " . $kindPlaceId . " and activityId = " . $activityId);
                } else
                    $logs = DB::select("select text, visitorId FROM log WHERE placeId = " . $placeId . " and kindPlaceId = " . $kindPlaceId . " and activityId = " . $activityId . " and pic = " . $picItemId);
            }

            $arr = [];
            $count = 0;

            $photoFilters = DB::select("select name, id, (SELECT count(*) FROM log WHERE placeId = " . $placeId . " and log.kindPlaceId = " . $kindPlaceId . " and activityId = " . $activityId . " and pic = picItems.id) as countNum FROM picItems WHERE kindPlaceId = " . $kindPlaceId);

            $userPic = URL::asset('images/icons/mainIcon.svg');

            switch ($kindPlaceId) {
                case 1:
                default:

                    if ($picItemId == -1 || $picItemId == -2) {
                        $place = Amaken::whereId($placeId);
                        if ($place->pic_1 != "") {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/s-1.jpg')))
                                $arr[$count]['pic'] = URL::asset('_images/amaken/' . $place->file . '/s-1.jpg');
                            else
                                $arr[$count]['pic'] = URL::asset('_images/nopic/blank.jpg');
                            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/t-1.jpg')))
                                $arr[$count]['picT'] = URL::asset('_images/amaken/' . $place->file . '/t-1.jpg');
                            else
                                $arr[$count]['picT'] = URL::asset('_images/nopic/blank.jpg');

                            $arr[$count]['alt'] = $place->alt1;
                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_2 != "") {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/s-2.jpg' )))
                                $arr[$count]['pic'] = URL::asset('_images/amaken/' . $place->file . '/s-2.jpg' );
                            else
                                $arr[$count]['pic'] = URL::asset('_images/nopic/blank.jpg');
                            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/t-2.jpg')))
                                $arr[$count]['picT'] = URL::asset('_images/amaken/' . $place->file . '/t-2.jpg');
                            else
                                $arr[$count]['picT'] = URL::asset('_images/nopic/blank.jpg');
                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count]['alt'] = $place->alt2;
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_3 != "") {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/s-3.jpg' )))
                                $arr[$count]['pic'] = URL::asset('_images/amaken/' . $place->file . '/s-3.jpg' );
                            else
                                $arr[$count]['pic'] = URL::asset('_images/nopic/blank.jpg');
                            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/t-3.jpg')))
                                $arr[$count]['picT'] = URL::asset('_images/amaken/' . $place->file . '/t-3.jpg');
                            else
                                $arr[$count]['picT'] = URL::asset('_images/nopic/blank.jpg');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]['alt'] = $place->alt3;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_4 != "") {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/s-4.jpg')))
                                $arr[$count]['pic'] = URL::asset('_images/amaken/' . $place->file . '/s-4.jpg');
                            else
                                $arr[$count]['pic'] = URL::asset('_images/nopic/blank.jpg');
                            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/t-4.jpg')))
                                $arr[$count]['picT'] = URL::asset('_images/amaken/' . $place->file . '/t-4.jpg');
                            else
                                $arr[$count]['picT'] = URL::asset('_images/nopic/blank.jpg');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]['alt'] = $place->alt4;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_5 != "") {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/s-5.jpg')))
                                $arr[$count]['pic'] = URL::asset('_images/amaken/' . $place->file . '/s-5.jpg');
                            else
                                $arr[$count]['pic'] = URL::asset('_images/nopic/blank.jpg');
                            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/t-5.jpg')))
                                $arr[$count]['picT'] = URL::asset('_images/amaken/' . $place->file . '/t-5.jpg');
                            else
                                $arr[$count]['picT'] = URL::asset('_images/nopic/blank.jpg');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count]['alt'] = $place->alt5;
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                    }

                    foreach ($logs as $log) {

                        if (file_exists(__DIR__ . '/../../../../assets/userPhoto/amaken/l-' . $log->text))
                            $arr[$count]["pic"] = URL::asset("userPhoto/amaken/l-" . $log->text);
                        else
                            $arr[$count]["pic"] = URL::asset("_images/nopic/blank.jpg");

                        if (file_exists(__DIR__ . '/../../../../assets/userPhoto/amaken/s-' . $log->text))
                            $arr[$count]["picT"] = URL::asset("userPhoto/amaken/s-" . $log->text);
                        else
                            $arr[$count]["picT"] = URL::asset("_images/nopic/blank.jpg");

                        $user = User::whereId($log->visitorId);
                        $arr[$count]["owner"] = $user->username;
                        $userPic = $user->picture;
                        if (count(explode('.', $userPic)) == 2)
                            $userPic = URL::asset("userPhoto/" . $userPic);
                        else {
                            $defaultPic = DefaultPic::whereId($userPic);
                            if ($defaultPic == null || count($defaultPic) == 0)
                                $defaultPic = DefaultPic::first();
                            $userPic = URL::asset('defaultPic/' . $defaultPic->name);
                        }
                        $arr[$count++]["ownerPic"] = $userPic;
                    }
                    break;

                case 3:

                    if ($picItemId == -1 || $picItemId == -2) {
                        $place = Restaurant::whereId($placeId);
                        if ($place->pic_1) {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/s-1.jpg')))
                                $arr[$count]['pic'] = URL::asset('_images/restaurant/' . $place->file . '/s-1.jpg');
                            else
                                $arr[$count]['pic'] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/t-1.jpg')))
                                $arr[$count]['picT'] = URL::asset('_images/restaurant/' . $place->file . '/t-1.jpg');
                            else
                                $arr[$count]['picT'] = URL::asset('_images/restaurant');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count]['alt'] = $place->alt1;
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_2) {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/s-2.jpg' )))
                                $arr[$count]['pic'] = URL::asset('_images/restaurant/' . $place->file . '/s-2.jpg' );
                            else
                                $arr[$count]['pic'] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/t-2.jpg')))
                                $arr[$count]['picT'] = URL::asset('_images/restaurant/' . $place->file . '/t-2.jpg');
                            else
                                $arr[$count]['picT'] = URL::asset('_images/restaurant');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]['alt'] = $place->alt2;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_3) {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/s-3.jpg' )))
                                $arr[$count]['pic'] = URL::asset('_images/restaurant/' . $place->file . '/s-3.jpg' );
                            else
                                $arr[$count]['pic'] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/t-3.jpg')))
                                $arr[$count]['picT'] = URL::asset('_images/restaurant/' . $place->file . '/t-3.jpg');
                            else
                                $arr[$count]['picT'] = URL::asset('_images/restaurant');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]['alt'] = $place->alt3;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_4) {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/s-4.jpg')))
                                $arr[$count]['pic'] = URL::asset('_images/restaurant/' . $place->file . '/s-4.jpg');
                            else
                                $arr[$count]['pic'] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/t-4.jpg')))
                                $arr[$count]['picT'] = URL::asset('_images/restaurant/' . $place->file . '/t-4.jpg');
                            else
                                $arr[$count]['picT'] = URL::asset('_images/restaurant');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]['alt'] = $place->alt4;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_5) {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/s-5.jpg')))
                                $arr[$count]['pic'] = URL::asset('_images/restaurant/' . $place->file . '/s-5.jpg');
                            else
                                $arr[$count]['pic'] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place->file . '/t-5.jpg')))
                                $arr[$count]['picT'] = URL::asset('_images/restaurant/' . $place->file . '/t-5.jpg');
                            else
                                $arr[$count]['picT'] = URL::asset('_images/restaurant');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count]['alt'] = $place->alt5;
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                    }

                    foreach ($logs as $log) {

                        if (file_exists(__DIR__ . '/../../../../assets/userPhoto/restaurant/l-' . $log->text))
                            $arr[$count]["pic"] = URL::asset("userPhoto/restaurant/l-" . $log->text);
                        else
                            $arr[$count]["pic"] = URL::asset("_images/nopic/blank.jpg");

                        if (file_exists(__DIR__ . '/../../../../assets/userPhoto/restaurant/s-' . $log->text))
                            $arr[$count]["picT"] = URL::asset("userPhoto/restaurant/s-" . $log->text);
                        else
                            $arr[$count]["picT"] = URL::asset("_images/nopic/blank.jpg");

                        $user = User::whereId($log->visitorId);
                        $arr[$count]["owner"] = $user->username;
                        $userPic = $user->picture;
                        if (count(explode('.', $userPic)) == 2)
                            $userPic = URL::asset("userPhoto/" . $userPic);
                        else {
                            $defaultPic = DefaultPic::whereId($userPic);
                            if ($defaultPic == null || count($defaultPic) == 0)
                                $defaultPic = DefaultPic::first();
                            $userPic = URL::asset('defaultPic/' . $defaultPic->name);
                        }
                        $arr[$count++]["ownerPic"] = $userPic;
                    }
                    break;

                case 4:

                    if ($picItemId == -1 || $picItemId == -2) {
                        $place = Hotel::whereId($placeId);
                        if ($place->pic_1 != "") {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/s-1.jpg')))
                                $arr[$count]["pic"] = URL::asset('_images/hotels/' . $place->file . '/s-1.jpg');
                            else
                                $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/t-1.jpg')))
                                $arr[$count]["picT"] = URL::asset('_images/hotels/' . $place->file . '/t-1.jpg');
                            else
                                $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count]['alt'] = $place->alt1;
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_2 != "") {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/s-2.jpg' )))
                                $arr[$count]["pic"] = URL::asset('_images/hotels/' . $place->file . '/s-2.jpg' );
                            else
                                $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/t-2.jpg')))
                                $arr[$count]["picT"] = URL::asset('_images/hotels/' . $place->file . '/t-2.jpg');
                            else
                                $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            $arr[$count]["filter"] = -1;
                            $arr[$count]['alt'] = $place->alt2;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_3 != "") {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/s-3.jpg' )))
                                $arr[$count]["pic"] = URL::asset('_images/hotels/' . $place->file . '/s-3.jpg' );
                            else
                                $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/t-3.jpg')))
                                $arr[$count]["picT"] = URL::asset('_images/hotels/' . $place->file . '/t-3.jpg');
                            else
                                $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count]['alt'] = $place->alt3;
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_4 != "") {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/s-4.jpg')))
                                $arr[$count]["pic"] = URL::asset('_images/hotels/' . $place->file . '/s-4.jpg');
                            else
                                $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/t-4.jpg')))
                                $arr[$count]["picT"] = URL::asset('_images/hotels/' . $place->file . '/t-4.jpg');
                            else
                                $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count]['alt'] = $place->alt4;
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_5 != "") {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/s-5.jpg')))
                                $arr[$count]["pic"] = URL::asset('_images/hotels/' . $place->file . '/s-5.jpg');
                            else
                                $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/t-5.jpg')))
                                $arr[$count]["picT"] = URL::asset('_images/hotels/' . $place->file . '/t-5.jpg');
                            else
                                $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count]['alt'] = $place->alt5;
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                    }

                    foreach ($logs as $log) {

                        if (file_exists(__DIR__ . '/../../../../assets/userPhoto/hotels/l-' . $log->text))
                            $arr[$count]["pic"] = URL::asset("userPhoto/hotels/l-" . $log->text);
                        else
                            $arr[$count]["pic"] = URL::asset("_images/nopic/blank.jpg");

                        if (file_exists(__DIR__ . '/../../../../assets/userPhoto/hotels/s-' . $log->text))
                            $arr[$count]["picT"] = URL::asset("userPhoto/hotels/s-" . $log->text);
                        else
                            $arr[$count]["picT"] = URL::asset("_images/nopic/blank.jpg");

                        $user = User::whereId($log->visitorId);
                        $arr[$count]["owner"] = $user->username;
                        $userPic = $user->picture;
                        if (count(explode('.', $userPic)) == 2)
                            $userPic = URL::asset("userPhoto/" . $userPic);
                        else {
                            $defaultPic = DefaultPic::whereId($userPic);
                            if ($defaultPic == null)
                                $defaultPic = DefaultPic::first();
                            $userPic = URL::asset('defaultPic/' . $defaultPic->name);
                        }
                        $arr[$count++]["ownerPic"] = $userPic;
                    }
                    break;

                case 6:

                    if ($picItemId == -1 || $picItemId == -2) {
                        $place = Majara::whereId($placeId);
                        if ($place->pic_1 != "") {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/s-1.jpg')))
                                $arr[$count]["pic"] = URL::asset('_images/majara/' . $place->file . '/s-1.jpg');
                            else
                                $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/t-1.jpg')))
                                $arr[$count]["picT"] = URL::asset('_images/majara/' . $place->file . '/t-1.jpg');
                            else
                                $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]['alt'] = $place->alt1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_1 != "") {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/s-2.jpg' )))
                                $arr[$count]["pic"] = URL::asset('_images/majara/' . $place->file . '/s-2.jpg' );
                            else
                                $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/t-2.jpg')))
                                $arr[$count]["picT"] = URL::asset('_images/majara/' . $place->file . '/t-2.jpg');
                            else
                                $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count]['alt'] = $place->alt2;
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_1 != "") {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/s-3.jpg' )))
                                $arr[$count]["pic"] = URL::asset('_images/majara/' . $place->file . '/s-3.jpg' );
                            else
                                $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/t-3.jpg')))
                                $arr[$count]["picT"] = URL::asset('_images/majara/' . $place->file . '/t-3.jpg');
                            else
                                $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]['alt'] = $place->alt3;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_1 != "") {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/s-4.jpg')))
                                $arr[$count]["pic"] = URL::asset('_images/majara/' . $place->file . '/s-4.jpg');
                            else
                                $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/t-4.jpg')))
                                $arr[$count]["picT"] = URL::asset('_images/majara/' . $place->file . '/t-4.jpg');
                            else
                                $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count]['alt'] = $place->alt4;
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_1 != "") {

                            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/s-5.jpg')))
                                $arr[$count]["pic"] = URL::asset('_images/majara/' . $place->file . '/s-5.jpg');
                            else
                                $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                            if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place->file . '/t-5.jpg')))
                                $arr[$count]["picT"] = URL::asset('_images/majara/' . $place->file . '/t-5.jpg');
                            else
                                $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');

                            $arr[$count]["filter"] = -1;
                            $arr[$count]['alt'] = $place->alt5;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                    }

                    foreach ($logs as $log) {

                        if (file_exists(__DIR__ . '/../../../../assets/userPhoto/majara/l-' . $log->text))
                            $arr[$count]["pic"] = URL::asset("userPhoto/majara/l-" . $log->text);
                        else
                            $arr[$count]["pic"] = URL::asset("_images/nopic/blank.jpg");

                        if (file_exists(__DIR__ . '/../../../../assets/userPhoto/majara/s-' . $log->text))
                            $arr[$count]["picT"] = URL::asset("userPhoto/majara/s-" . $log->text);
                        else
                            $arr[$count]["picT"] = URL::asset("_images/nopic/blank.jpg");

                        $user = User::whereId($log->visitorId);
                        $arr[$count]["owner"] = $user->username;
                        $userPic = $user->picture;
                        if (count(explode('.', $userPic)) == 2)
                            $userPic = URL::asset("userPhoto/" . $userPic);
                        else {
                            $defaultPic = DefaultPic::whereId($userPic);
                            if ($defaultPic == null || count($defaultPic) == 0)
                                $defaultPic = DefaultPic::first();
                            $userPic = URL::asset('defaultPic/' . $defaultPic->name);
                        }
                        $arr[$count++]["ownerPic"] = $userPic;
                    }
                    break;

                case 8:

                    if ($picItemId == -1 || $picItemId == -2) {
                        $place = Adab::whereId($placeId);
                        if ($place->pic_1 != "") {
                            if ($place->category == 3) {
                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/s-1.jpg')))
                                    $arr[$count]["pic"] = URL::asset('_images/adab/ghazamahali/' . $place->file . '/s-1.jpg');
                                else
                                    $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/t-1.jpg')))
                                    $arr[$count]["picT"] = URL::asset('_images/adab/ghazamahali/' . $place->file . '/t-1.jpg');
                                else
                                    $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            } else {

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/s-1.jpg')))
                                    $arr[$count]["pic"] = URL::asset('_images/adab/soghat/' . $place->file . '/s-1.jpg');
                                else
                                    $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/t-1.jpg')))
                                    $arr[$count]["picT"] = URL::asset('_images/adab/soghat/' . $place->file . '/t-1.jpg');
                                else
                                    $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            }
                            $arr[$count]['alt'] = $place->alt1;
                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_2 != "") {
                            if ($place->category == 3) {
                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/s-2.jpg' )))
                                    $arr[$count]["pic"] = URL::asset('_images/adab/ghazamahali/' . $place->file . '/s-2.jpg' );
                                else
                                    $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/t-2.jpg')))
                                    $arr[$count]["picT"] = URL::asset('_images/adab/ghazamahali/' . $place->file . '/t-2.jpg');
                                else
                                    $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            } else {

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/s-2.jpg' )))
                                    $arr[$count]["pic"] = URL::asset('_images/adab/soghat/' . $place->file . '/s-2.jpg' );
                                else
                                    $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/t-2.jpg')))
                                    $arr[$count]["picT"] = URL::asset('_images/adab/soghat/' . $place->file . '/t-2.jpg');
                                else
                                    $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            }
                            $arr[$count]['alt'] = $place->alt2;
                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_3 != "") {
                            if ($place->category == 3) {
                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/s-3.jpg' )))
                                    $arr[$count]["pic"] = URL::asset('_images/adab/ghazamahali/' . $place->file . '/s-3.jpg' );
                                else
                                    $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/t-3.jpg')))
                                    $arr[$count]["picT"] = URL::asset('_images/adab/ghazamahali/' . $place->file . '/t-3.jpg');
                                else
                                    $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            } else {

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/s-3.jpg' )))
                                    $arr[$count]["pic"] = URL::asset('_images/adab/soghat/' . $place->file . '/s-3.jpg' );
                                else
                                    $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/t-3.jpg')))
                                    $arr[$count]["picT"] = URL::asset('_images/adab/soghat/' . $place->file . '/t-3.jpg');
                                else
                                    $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            }
                            $arr[$count]["filter"] = -1;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count]['alt'] = $place->alt3;
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_4 != "") {
                            if ($place->category == 3) {
                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/s-4.jpg')))
                                    $arr[$count]["pic"] = URL::asset('_images/adab/ghazamahali/' . $place->file . '/s-4.jpg');
                                else
                                    $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/t-4.jpg')))
                                    $arr[$count]["picT"] = URL::asset('_images/adab/ghazamahali/' . $place->file . '/t-4.jpg');
                                else
                                    $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            } else {

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/s-4.jpg')))
                                    $arr[$count]["pic"] = URL::asset('_images/adab/soghat/' . $place->file . '/s-4.jpg');
                                else
                                    $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/t-4.jpg')))
                                    $arr[$count]["picT"] = URL::asset('_images/adab/soghat/' . $place->file . '/t-4.jpg');
                                else
                                    $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            }
                            $arr[$count]["filter"] = -1;
                            $arr[$count]['alt'] = $place->alt4;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                        if ($place->pic_5 != "") {
                            if ($place->category == 3) {
                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/s-5.jpg')))
                                    $arr[$count]["pic"] = URL::asset('_images/adab/ghazamahali/' . $place->file . '/s-5.jpg');
                                else
                                    $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place->file . '/t-5.jpg')))
                                    $arr[$count]["picT"] = URL::asset('_images/adab/ghazamahali/' . $place->file . '/t-5.jpg');
                                else
                                    $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            } else {

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/s-5.jpg')))
                                    $arr[$count]["pic"] = URL::asset('_images/adab/soghat/' . $place->file . '/s-5.jpg');
                                else
                                    $arr[$count]["pic"] = URL::asset('_images/nopic/blank.jpg');

                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place->file . '/t-5.jpg')))
                                    $arr[$count]["picT"] = URL::asset('_images/adab/soghat/' . $place->file . '/t-5.jpg');
                                else
                                    $arr[$count]["picT"] = URL::asset('_images/nopic/blank.jpg');
                            }
                            $arr[$count]["filter"] = -1;
                            $arr[$count]['alt'] = $place->alt5;
                            $arr[$count]["owner"] = "سایت";
                            $arr[$count++]["ownerPic"] = $userPic;
                        }
                    }

                    foreach ($logs as $log) {


                        if (file_exists(__DIR__ . '/../../../../assets/userPhoto/adab/l-' . $log->text))
                            $arr[$count]["pic"] = URL::asset("userPhoto/adab/l-" . $log->text);
                        else
                            $arr[$count]["pic"] = URL::asset("_images/nopic/blank.jpg");

                        if (file_exists(__DIR__ . '/../../../../assets/userPhoto/adab/s-' . $log->text))
                            $arr[$count]["picT"] = URL::asset("userPhoto/adab/s-" . $log->text);
                        else
                            $arr[$count]["picT"] = URL::asset("_images/nopic/blank.jpg");

                        $user = User::whereId($log->visitorId);
                        $arr[$count]["owner"] = $user->username;
                        $userPic = $user->picture;
                        if (count(explode('.', $userPic)) == 2)
                            $userPic = URL::asset("userPhoto/" . $userPic);
                        else {
                            $defaultPic = DefaultPic::whereId($userPic);
                            if ($defaultPic == null || count($defaultPic) == 0)
                                $defaultPic = DefaultPic::first();
                            $userPic = URL::asset('defaultPic/' . $defaultPic->name);
                        }
                        $arr[$count++]["ownerPic"] = $userPic;
                    }
                    break;
            }

            echo json_encode(["pics" => $arr, "filters" => $photoFilters]);
        }

    }

    public function addPhotoToPlace(Request $request)
    {
        $placeId = $request->placeId;
        $kindPlaceId = $request->kindPlaceId;

        if( isset($_FILES['pic']) && $_FILES['pic']['error'] == 0 &&
            isset($request->name) && isset($request->alt) && isset($placeId) && isset($kindPlaceId)){

            $valid_ext = array('image/jpeg','image/png');
            if(in_array($_FILES['pic']['type'], $valid_ext)){
                if($_FILES['pic']['size'] < 2000000){
                    $id = $placeId;

                    $kindPlace = Place::find($kindPlaceId);
                    if($kindPlace == null){
                        echo 'nok9';
                        return;
                    }
                    $kindPlaceName = $kindPlace->fileName;
                    $place = DB::table($kindPlace->tableName)->find($id);

                    if($place != null) {

                        $location = __DIR__ . '/../../../../assets/userPhoto/' . $kindPlaceName . '/' . $place->file;

                        if(!file_exists($location))
                            mkdir($location);

                        if($request->fileKind == 'mainFile'){
                            $filename = time() . '_' . str_random(3) . '.jpg';
                            $destination = $location . '/' . $filename;
                            $result = compressImage($_FILES['pic']['tmp_name'], $destination, 80);

                            if($result) {
                                $photographer = new PhotographersPic();
                                $photographer->userId = Auth::user()->id;
                                $photographer->name = $request->name;
                                $photographer->pic = $filename;
                                $photographer->kindPlaceId = $kindPlaceId;
                                $photographer->placeId = $placeId;
                                $photographer->alt = $request->alt;
                                $photographer->description = $request->description;
                                $photographer->like = 0;
                                $photographer->dislike = 0;
                                $photographer->isSitePic = 0;
                                $photographer->isPostPic = 0;
                                $photographer->status = 0;
                                $photographer->save();

                                echo json_encode(['ok', $filename]);
                            }
                            else
                                echo json_encode(['nok4']);
                        }
                        else{
                            $filename = $request->fileName;
                            $destination = $location . '/' . $request->fileKind . '-' . $filename;
                            $result = compressImage($_FILES['pic']['tmp_name'], $destination, 60);
                            if($result)
                                echo json_encode(['ok', $filename]);
                            else
                                echo json_encode(['nok5']);
                        }
                    }
                    else
                        echo json_encode(['nok3']);
                }
                else
                    echo json_encode(['sizeError']);
            }
            else
                echo json_encode(['nok2']);
        }
        else
            echo json_encode(['nok1']);

        return;
    }

    public function addPhotoToComment($placeId, $kindPlaceId)
    {

        if (!Auth::check())
            return Redirect::to(route('hotelDetails', ['placeId' => $placeId, 'placeName' => Hotel::whereId($placeId)->name]));

        $uId = Auth::user()->id;
        $err = "";

        if (isset($_FILES["photo"]) && !empty($_FILES["photo"]["name"])) {

            $condition = ["visitorId" => $uId, 'activityId' => Activity::whereName('نظر')->first()->id,
                'placeId' => $placeId, 'kindPlaceId' => $kindPlaceId];

            $log = LogModel::where($condition)->first();

            if ($log == null) {
                return $this->writeReview($placeId, $kindPlaceId, "شما باید ابتدا نقد خود را ارسال کرده و سپس به آن عکس اضافه کنید");
            }

            if (!file_exists(__DIR__ . "/../../../../assets/userPhoto/comments/" . $kindPlaceId)) {
                mkdir(__DIR__ . "/../../../../assets/userPhoto/comments/" . $kindPlaceId, 0777, true);
            }

            $file = $_FILES["photo"];
            $targetFile = __DIR__ . "/../../../../assets/userPhoto/comments/" . $kindPlaceId . "/" . $file["name"];
            $fileName = $file["name"];

            if (file_exists($targetFile)) {
                $count = 2;
                $targetFile = __DIR__ . "/../../../../assets/userPhoto/comments/" . $kindPlaceId . "/" . $count . $file["name"];
                $fileName = $count . $file["name"];
                while (file_exists($targetFile)) {
                    $count++;
                    $targetFile = __DIR__ . "/../../../../assets/userPhoto/comments/" . $kindPlaceId . "/" . $count . $file["name"];
                    $fileName = $count . $file["name"];
                }
            }

            $err = uploadCheck($targetFile, "photo", "افزودن تصویر", 3000000, "jpg");
            if (empty($err)) {
                $err = upload($targetFile, "photo", "افزودن تصویر");
            }

            if (empty($err)) {

                $allow = true;
                if ($log->pic == "")
                    $allow = false;

                $oldFileName = __DIR__ . "/../../../../assets/userPhoto/comments/" . $kindPlaceId . "/" . $log->pic;
                $log->confirm = 0;
                $log->pic = $fileName;

                try {
                    if ($allow && file_exists($oldFileName))
                        unlink($oldFileName);
                    $log->save();
                    return Redirect::to(route('review', ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId, 'mode' => 'success']));
                } catch (Exception $e) {
                };
            }
        }

        if (empty($err)) {
            $err = 'لطفا تصویر مورد نظر خود را انتخاب نمایید';
        }
        return $this->writeReview($placeId, $kindPlaceId, $err);
    }

    public function deleteUserPicFromComment()
    {

        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"])) {

            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);

            $condition = ['visitorId' => Auth::user()->id, 'placeId' => makeValidInput($_POST["placeId"]),
                'kindPlaceId' => $kindPlaceId,
                'activityId' => Activity::whereName('نظر')->first()->id];

            $log = LogModel::where($condition)->first();
            if ($log != null) {
                $target = __DIR__ . "/../../../../assets/userPhoto/comments/" . $kindPlaceId . '/' . $log->pic;
                if (file_exists($target))
                    unlink($target);
                $log->pic = "";
                $log->save();
                echo "ok";
                return;
            }
        }

        echo "nok";

    }

    public function getPhotoFilter()
    {

        if (isset($_POST["kindPlaceId"])) {
            echo json_encode(PicItem::where('kindPlaceId', '=', makeValidInput($_POST["kindPlaceId"]))->get());
        }

    }

    public function getAdviceMain() {

//        if (Cache::has('suggestedPlaces')) {
//            echo \GuzzleHttp\json_encode(Cache::get('suggestedPlaces'));
//            return;
//        }

        $activityId = Activity::whereName('نظر')->first()->id;
        $places = SpecialAdvice::where('cityId', 0)->get();

        for ($i = 0; $i < count($places); $i++) {
            $kindPlaceIdTmp = $places[$i]->kindPlaceId;
            switch ($kindPlaceIdTmp) {
                case 1:
                default:
                    $places[$i] = Amaken::whereId($places[$i]->placeId);

                    if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $places[$i]->file . '/f-1.jpg')))
                        $places[$i]->pic = URL::asset('_images/amaken/' . $places[$i]->file . '/f-1.jpg');
                    else
                        $places[$i]->pic = URL::asset('_images/nopic/blank.jpg');

                    $places[$i]->url = route('amakenDetails', ['placeId' => $places[$i]->id, 'placeName' => $places[$i]->name]);
                    break;
                case 3:
                    $places[$i] = Restaurant::whereId($places[$i]->placeId);

                    if (file_exists(__DIR__ . '/../../../../assets/_images/restaurant/' . $places[$i]->file . '/f-1.jpg'))
                        $places[$i]->pic = URL::asset('_images/restaurant/' . $places[$i]->file . '/f-1.jpg');
                    else
                        $places[$i]->pic = URL::asset('_images/nopic/blank.jpg');

                    $places[$i]->url = route('restaurantDetails', ['placeId' => $places[$i]->id, 'placeName' => $places[$i]->name]);
                    break;
                case 4:
                    $places[$i] = Hotel::whereId($places[$i]->placeId);
                    if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $places[$i]->file . '/f-1.jpg')))
                        $places[$i]->pic = URL::asset('_images/hotels/' . $places[$i]->file . '/f-1.jpg');
                    else
                        $places[$i]->pic = URL::asset('_images/nopic/blank.jpg');

                    $places[$i]->url = route('hotelDetails', ['placeId' => $places[$i]->id, 'placeName' => $places[$i]->name]);
                    break;
            }

            $places[$i]->rate = getRate($places[$i]->id, $kindPlaceIdTmp)[1];
            $condition = ['placeId' => $places[$i]->id, 'kindPlaceId' => $kindPlaceIdTmp,
                'confirm' => 1, 'activityId' => $activityId];
            $places[$i]->reviews = LogModel::where($condition)->count();
        }
        foreach ($places as $itr) {

            if ($itr == null) {
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

        Cache::add('suggestedPlaces', $places, 60 * 24 * 30);

        echo json_encode($places);
    }

    public function getAdviceCity()
    {
        $city = Cities::find($_POST['cityId']);
        $special = SpecialAdvice::where('cityId', $city->id)->get();
        $place1 = array();

        foreach ($special as $item) {

            $kindPlaceId = $item->kindPlaceId;
            $kindPlace = Place::find($kindPlaceId);

            if($kindPlace->name == 'اماکن'){
                $fileName = 'amaken';
                $urlKind = 'amakenDetails';
                $place = Amaken::select(['name', 'id', 'cityId', 'file', 'pic_1'])->find($item->placeId);
            }
            elseif($kindPlace->name == 'هتل'){
                $fileName = 'hotels';
                $urlKind = 'hotelDetails';
                $place = Hotel::select(['name', 'id', 'cityId', 'file', 'pic_1'])->find($item->placeId);
            }
            elseif($kindPlace->name == 'رستوران'){
                $fileName = 'restaurant';
                $urlKind = 'restaurantDetails';
                $place = Restaurant::select(['name', 'id', 'cityId', 'file', 'pic_1'])->find($item->placeId);
            }
            $activityId = Activity::whereName('نظر')->first()->id;

            $condition = ['activityId' => $activityId, 'placeId' => $place->id, 'kindPlaceId' => $kindPlaceId];
            $match = LogModel::where($condition)->count();

            if (file_exists((__DIR__ . '/../../../../assets/_images/' . $fileName . '/' . $place->file . '/f-1.jpg')))
                $place->pic = URL::asset('_images/' . $fileName . '/' . $place->file . '/f-1.jpg');
            else
                $place->pic = URL::asset('_images/nopic/blank.jpg');

            $place->reviews = $match;
            $place->rate = getRate($place->id, $kindPlaceId)[1];
            $place->url = route($urlKind, ['placeId' => $place->id, 'placeName' => $place->name]);
            $place->kindPlaceId = $kindPlaceId;

            if ($place == null) {
                $place = null;
                continue;
            }

            $place->present = true;

            if ($place->kindPlaceId != 8) {
                $city = Cities::whereId($place->cityId);
                if ($city == null) {
                    $place->present = false;
                    continue;

                }

                $place->city = $city->name;
                $place->state = State::whereId($city->stateId)->name;
            } else {
                $city = State::whereId($place->stateId);
                if ($city == null) {
                    $itr = null;
                    continue;
                }
                $place->state = $place->city = $city->name;
            }

            array_push($place1, $place);
        }

        echo json_encode($place1);
    }

    public function showMainPage($mode = "mainPage") {

        switch ($mode) {
            case "amaken":
                $kindPlaceId = 1;
                break;
            case "restaurant":
                $kindPlaceId = 3;
                break;
            case "hotel":
                $kindPlaceId = 4;
                break;
            case "majara":
                $kindPlaceId = 6;
                break;
            case "sogatsanaie":
                $kindPlaceId = 10;
                break;
            case "mahaliFood":
                $kindPlaceId = 11;
                break;
            default:
                $kindPlaceId= 0;
                break;
        }

        $sliderPic = MainSliderPic::all();
        foreach ($sliderPic as $item)
            $item->pic = URL::asset('_images/sliderPic/'. $item->pic);

        $today = getToday()['date'];
        $hotelCount = Hotel::all()->count();
        $retCount = Restaurant::all()->count();
        $amakenCount = Amaken::all()->count();
        $sogatSanaie = SogatSanaie::all()->count();
        $mahaliFoodCount = MahaliFood::all()->count();
        $postCount = Post::where('date', '<=', $today)->where('release', '!=', 'draft')->count();

        $activityId1 = Activity::where('name', 'نظر')->first()->id;
        $activityId2 = Activity::where('name', 'پاسخ')->first()->id;

        $commentCount = 0;
        $commentCount += LogModel::where('activityId', $activityId1)->where('confirm', 1)->count();
        $commentCount += LogModel::where('activityId', $activityId2)->where('confirm', 1)->count();
        $commentCount += PostComment::where('status', 1)->count();
        $userCount = User::all()->count();

        $counts = [ 'hotel' => $hotelCount,
                    'restaurant' => $retCount,
                    'amaken' => $amakenCount,
                    'sogatSanaie' => $sogatSanaie,
                    'mahaliFood' => $mahaliFoodCount,
                    'article' => $postCount,
                    'comment' => $commentCount,
                    'userCount' => $userCount];

        $articleBannerId = DB::table('bannerPosts')->pluck('postId')->toArray();
        $articleBanner = Post::whereIn('id', $articleBannerId)->get();
        foreach ($articleBanner as $item){
            $item->url = createUrl(0, 0, 0, 0, $item->id);
            $item->pic = createPicUrl($item->id);
        }

        $middleBan = [];

        $middleBan1 = BannerPics::where('page', 'mainPage')->where('section', 1)->get();
        foreach ($middleBan1 as $item){
            $item->pic = URL::asset('_images/bannerPic/' . $item->page . '/' . $item->pic);
            if($item->text == null)
                $item->text = '';
            if($item->link == 'https://')
                $item->link = '';
        }
        $middleBan['1']  = $middleBan1;

        $middleBan4 = BannerPics::where('page', 'mainPage')->where('section', 4)->get();
        foreach ($middleBan4 as $item){
            $item->pic = URL::asset('_images/bannerPic/' . $item->page . '/' . $item->pic);
            if($item->text == null)
                $item->text = '';
            if($item->link == 'https://')
                $item->link = '';
        }
        $middleBan['4']  = $middleBan4;

        $middleBan5 = BannerPics::where('page', 'mainPage')->where('section', 5)->get();
        foreach ($middleBan5 as $item){
            $item->pic = URL::asset('_images/bannerPic/' . $item->page . '/' . $item->pic);
            if($item->text == null)
                $item->text = '';
            if($item->link == 'https://')
                $item->link = '';
        }
        $middleBan['5']  = $middleBan5;

        $middleBan6 = BannerPics::where('page', 'mainPage')->where('section', 6)->first();
        if($middleBan6 != null){
            $middleBan6->pic = URL::asset('_images/bannerPic/' . $middleBan6->page . '/' . $middleBan6->pic);
            if($middleBan6->text == null)
                $middleBan6->text = '';
            if($middleBan6->link == 'https://')
                $middleBan6->link = '';
        }
        $middleBan['6']  = $middleBan6;

        return view('main', array('placeMode' => $mode, 'kindPlaceId' => $kindPlaceId, 'sliderPic' => $sliderPic, 'count' => $counts,
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get(),  'articleBanner' => $articleBanner, 'middleBan' => $middleBan
        ));
    }

    public function fillMyDivWithAdv() {

        if (isset($_POST["state"]) && isset($_POST["sectionId"])) {

            $state = makeValidInput($_POST["state"]);
            $sectionId = makeValidInput($_POST["sectionId"]);

            $today = getToday()["date"];

            if($state != -1) {
                $out = DB::select("select s.*, p.pic, p.url from publicity p, section s, sectionPublicity sep, statePublicity stp WHERE " .
                    "sep.publicityId = p.id and stp.publicityId = p.id and s.id = sep.sectionId and sep.sectionId = " . $sectionId . " and stp.stateId = '$state'" .
                    " and p.from_ <= " . $today . ' and p.to_ >= ' . $today
                );
            }
            else {
                $out = DB::select("select s.*, p.pic, p.url from publicity p, section s, sectionPublicity sep WHERE " .
                    "sep.publicityId = p.id and s.id = sep.sectionId and sep.sectionId = " . $sectionId .
                    " and p.from_ <= " . $today . ' and p.to_ >= ' . $today
                );
            }

            if($out != null && count($out) > 0) {
                $out = $out[0];
                $out->pic = URL::asset('ads/' . $out->pic);
                $out->backgroundSize = ($out->backgroundSize) ? 'contain' : 'cover';
            }

            echo \GuzzleHttp\json_encode($out);
        }
    }

    public function newPlaceForMap()
    {

        $hotelId = json_decode($_POST['hotelId']);
        $restId = json_decode($_POST['restId']);
        $majaraId = json_decode($_POST['majaraId']);
        $amakenId = json_decode($_POST['amakenId']);
        $swLat = makeValidInput($_POST['swLat']);
        $swLng = makeValidInput($_POST['swLng']);
        $neLat = makeValidInput($_POST['neLat']);
        $neLng = makeValidInput($_POST['neLng']);
        $C = makeValidInput($_POST['C']);
        $D = makeValidInput($_POST['D']);
        $D *= 3.14 / 180;
        $C *= 3.14 / 180;

        if ($majaraId == null) {
            $majaraNull = DB::table('majara')->select('id')->latest('id')->first();
            $majaraId[0] = $majaraNull->id + 1;
        }
        if ($hotelId == null) {
            $hotelNull = DB::table('hotels')->select('id')->latest('id')->first();
            $hotelId[0] = $hotelNull->id + 1;
        }
        if ($restId == null) {
            $restNull = DB::table('restaurant')->select('id')->latest('id')->first();
            $restId[0] = $restNull->id + 1;
        }
        if ($amakenId == null) {
            $amakenNull = DB::table('amaken')->select('id')->latest('id')->first();
            $amakenId[0] = $amakenNull->id + 1;
        }


        $nearbyHotels = DB::select("SELECT id, name, C, D, file, pic_1, alt1, address, acos(" . sin($D) . " * sin(D / 180 * 3.14) + " . cos($D) . " * cos(D / 180 * 3.14) * cos(C / 180 * 3.14 - " . $C . ")) * 6371 as distance FROM hotels WHERE C between " . $swLat . " and " . $neLat . " and D between " . $swLng . " and " . $neLng . " and NOT id IN(" . implode(",", $hotelId) . ")  order by distance ASC ");
        $majaras = DB::select("SELECT id, name, C, D, file, pic_1, alt1, dastresi, acos(" . sin($D) . " * sin(D / 180 * 3.14) + " . cos($D) . " * cos(D / 180 * 3.14) * cos(C / 180 * 3.14 - " . $C . ")) * 6371 as distance FROM majara WHERE C between " . $swLat . " and " . $neLat . " and D between " . $swLng . " and " . $neLng . " and NOT id IN(" . implode(",", $majaraId) . ")  order by distance ASC ");
        $nearbyRestaurants = DB::select("SELECT id, name, C, D, kind_id, file, address, pic_1, alt1, acos(" . sin($D) . " * sin(D / 180 * 3.14) + " . cos($D) . " * cos(D / 180 * 3.14) * cos(C / 180 * 3.14 - " . ($C) . ")) * 6371 as distance FROM restaurant WHERE C between " . $swLat . " and " . $neLat . " and D between " . $swLng . " and " . $neLng . "and NOT id IN(" . implode(",", $restId) . ")  order by distance ASC ");
        $nearbyAmakens = DB::select("SELECT id, name, address, mooze, tarikhi, tafrihi, tabiatgardi, markazkharid,  C, D, file, pic_1, alt1, acos(" . sin($D) . " * sin(D / 180 * 3.14) + " . cos($D) . " * cos(D / 180 * 3.14) * cos(C / 180 * 3.14 - " . ($C) . ")) * 6371 as distance FROM amaken WHERE C between " . $swLat . " and " . $neLat . " and D between " . $swLng . " and " . $neLng . " and NOT id IN(" . implode(",", $amakenId) . ")   order by distance ASC ");

        foreach ($nearbyHotels as $nearbyHotel) {

            $condition = ['placeId' => $nearbyHotel->id, 'kindPlaceId' => 4, 'confirm' => 1,
                'activityId' => Activity::whereName('نظر')->first()->id];
            $nearbyHotel->reviews = LogModel::where($condition)->count();
            $nearbyHotel->distance = round($nearbyHotel->distance, 2);
            $nearbyHotel->rate = getRate($nearbyHotel->id, 4)[1];

        }

        foreach ($majaras as $majara) {

            $condition = ['placeId' => $majara->id, 'kindPlaceId' => 6, 'confirm' => 1,
                'activityId' => Activity::whereName('نظر')->first()->id];
            $majara->reviews = LogModel::where($condition)->count();
            $majara->distance = round($majara->distance, 2);
            $majara->rate = getRate($majara->id, 6)[1];

        }

        $restaurantPlaceId = Place::whereName('رستوران')->first()->id;
        foreach ($nearbyRestaurants as $nearbyRestaurant) {

            $condition = ['placeId' => $nearbyRestaurant->id, 'kindPlaceId' => $restaurantPlaceId, 'confirm' => 1,
                'activityId' => Activity::whereName('نظر')->first()->id];
            $nearbyRestaurant->reviews = LogModel::where($condition)->count();
            $nearbyRestaurant->distance = round($nearbyRestaurant->distance, 2);
            $nearbyRestaurant->rate = getRate($nearbyRestaurant->id, $restaurantPlaceId)[1];
        }

        $amakenPlaceId = Place::whereName('اماکن')->first()->id;

        foreach ($nearbyAmakens as $nearbyAmaken) {

            $condition = ['placeId' => $nearbyAmaken->id, 'kindPlaceId' => $amakenPlaceId, 'confirm' => 1,
                'activityId' => Activity::whereName('نظر')->first()->id];
            $nearbyAmaken->reviews = LogModel::where($condition)->count();
            $nearbyAmaken->distance = round($nearbyAmaken->distance, 2);
            $nearbyAmaken->rate = getRate($nearbyAmaken->id, $amakenPlaceId)[1];
        }


        echo json_encode(array('hotel' => $nearbyHotels, 'rest' => $nearbyRestaurants, 'amaken' => $nearbyAmakens, 'majara' => $majaras));
        return;


    }

    public function getPlacePicture()
    {

        if (!isset($_POST["kindPlaceId"]) || !isset($_POST["placeId"]))
            return;

        $kindPlaceId = makeValidInput($_POST['kindPlaceId']);
        $placeId = makeValidInput($_POST['placeId']);

        switch ($kindPlaceId) {
            case 1:
            default:
                $tmp = Amaken::whereId($placeId);
                if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $tmp->file . "/f-1.jpg")))
                    echo URL::asset("_images/amaken/" . $tmp->file . "/f-1.jpg");
                else
                    echo URL::asset("_images/nopic/blank.jpg");
                return;
            case 3:
                $tmp = Restaurant::whereId($placeId);
                if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $tmp->file . "/f-1.jpg")))
                    echo URL::asset('_images/restaurant/' . $tmp->file . "/f-1.jpg");
                else
                    echo URL::asset('_images/nopic/blank.jpg');
                return;
            case 4:
                $tmp = Hotel::whereId($placeId);
                if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $tmp->file . "/f-1.jpg")))
                    echo URL::asset("_images/hotels/" . $tmp->file . "/f-1.jpg");
                else
                    echo URL::asset("_images/nopic/blank.jpg");
                return;
            case 6:
                $tmp = Majara::whereId($placeId);
                if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $tmp->file . "/f-1.jpg")))
                    echo URL::asset("_images/majara/" . $tmp->file . "/f-1.jpg");
                else
                    echo URL::asset("_images/nopic/blank.jpg");
                return;
        }
    }

    public function video360()
    {
        $videoSrc = '_images/movie.mp4';
        return view('video3602', array('videoSrc' => $videoSrc));
    }

    public function likePhotographer(Request $request)
    {
        if(Auth::check())
            $user = Auth::user();
        else {
            echo json_encode(['nok1']);
            return;
        }

        if(isset($request->id) && isset($request->like)){
            $photo = PhotographersPic::find($request->id);
            if($photo != null){
                $userStatus = PhotographersLog::where('picId', $photo->id)->where('userId', $user->id)->first();

                if($userStatus == null){
                    $log = new PhotographersLog();

                    if($request->like == 1) {
                        $log->like = 1;
                        $photo->like++;
                    }
                    else if($request->like == -1){
                        $log->like = -1;
                        $photo->dislike++;
                    }

                    $log->userId = $user->id;
                    $log->picId = $photo->id;

                    $log->save();
                    $photo->save();

                    echo json_encode(['ok', $photo->like, $photo->dislike]);
                }
                else{

                    if($userStatus->like == 1)
                        $photo->like--;
                    else if($userStatus->like == -1)
                        $photo->dislike--;

                    if($request->like == 1){
                        $userStatus->like = 1;
                        $photo->like++;
                    }
                    else if($request->like == -1){
                        $userStatus->like = -1;
                        $photo->dislike++;
                    }

                    $userStatus->save();
                    $photo->save();

                    echo json_encode(['ok', $photo->like, $photo->dislike]);
                }
            }
            else
                echo json_encode(['nok3']);
        }
        else
            echo json_encode(['nok4']);
        return;

    }

    public function sogatsanieDetials($placeId, $placeName = "", $mode = "", $err = "")
    {
        deleteReviewPic();

        $place = SogatSanaie::find($placeId);
        $city = Cities::whereId($place->cityId);
        $state = State::whereId($city->stateId);

        if ($place == null)
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

        if ($hasLogin) {

            $activityId = Activity::whereName('مشاهده')->first()->id;

            $condition = ['visitorId' => $uId, 'placeId' => $placeId, 'kindPlaceId' => $kindPlaceId,
                'activityId' => $activityId];
            $log = LogModel::where($condition)->first();
            if ($log == null) {
                $log = new LogModel();
                $log->activityId = $activityId;
                $log->time = getToday()["time"];
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

        $photos = [];

        if (!empty($place->picNumber)) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/sogatsanaie/' . $place->file . '/s-' . $place->picNumber))) {
                $photos[count($photos)] = URL::asset('_images') . '/sogatsanaie/' . $place->file . '/s-' . $place->picNumber;
                $thumbnail = URL::asset('_images') . '/sogatsanaie/' . $place->file . '/f-' . $place->picNumber;
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

    public function askQuestion()
    {
        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"]) && isset($_POST["text"])) {

            $text = makeValidInput($_POST["text"]);
            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $activityId = Activity::whereName('سوال')->first()->id;
            $uId = Auth::user()->id;

            $log = new LogModel();
            $log->visitorId = $uId;
            $log->time = getToday()["time"];
            $log->activityId = $activityId;
            $log->placeId = $placeId;
            $log->kindPlaceId = $kindPlaceId;
            $log->text = $text;
            $log->date = date("Y-m-d");
            $log->relatedTo = 0;
            $log->confirm = 0;
            $log->save();

            echo "ok";
        }
        else
            echo 'nok1';

        return;
    }
    public function getQuestions()
    {
        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"]) && isset($_POST["page"]) && isset($_POST["count"])) {

            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $page = makeValidInput($_POST["page"]);
            $count = makeValidInput($_POST["count"]);
            $activityId = Activity::whereName('سوال')->first()->id;
            $ansActivityId = Activity::whereName('پاسخ')->first()->id;

            if(\auth()->check())
                $uId = \auth()->user()->id;
            else
                $uId = 0;

            $sqlQuery = ' placeId = ' . $placeId . ' AND kindPlaceId = ' . $kindPlaceId . ' AND activityId = ' . $activityId . ' AND relatedTo = 0 AND (( visitorId = ' . $uId . ' AND confirm = 0) OR (confirm = 1))';
            $logs = LogModel::whereRaw($sqlQuery)->skip(($page - 1) * $count)->take($count)->get();

//            $condition = ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId, 'activityId' => $activityId, 'confirm' => 1, 'relatedTo' => 0];
//            $logs = LogModel::where($condition)->skip(($page - 1) * $count)->take($count)->get();

            $allCount = 0;
            $allAnswerCount = 0;

            if($_POST['isQuestionCount'])
                $allCount = LogModel::whereRaw($sqlQuery)->count();
//                $allCount = LogModel::where($condition)->count();

            foreach ($logs as $log) {

                if($_POST['isQuestionCount'])
                    $allAnswerCount += getAnsToComments($log->id)[1];

                $user = User::whereId($log->visitorId);
                if ($user->first_name != null)
                    $log->username = $user->first_name . ' ' . $user->last_name;
                else
                    $log->username = $user->username;
                
                if($user->uploadPhoto == 0){
                    $deffPic = DefaultPic::find($user->picture);
                    if($deffPic != null)
                        $log->userPic = URL::asset('defaultPic/' . $deffPic->name);
                    else
                        $log->userPic = URL::asset('_images/nopic/blank.jpg');
                }
                else
                    $log->userPic = URL::asset('userProfile/' . $user->picture);

                $anss = getAnsToComments($log->id);

                $log->comment = $anss[0];
                $log->ansNum = $anss[1];

                $kindPlace = Place::find($log->kindPlaceId);
                $log->mainFile = $kindPlace->fileName;
                $log->place = DB::table($kindPlace->tableName)->select(['id', 'name', 'cityId', 'file'])->find($log->placeId);
                $log->kindPlace = $kindPlace->name;

                $log->city = Cities::find($log->place->cityId);
                $log->state = State::find($log->city->stateId);

                $time = $log->date;
                $time .= ' ' . substr($log->time, 0, 2) . ':' . substr($log->time, 2, 2);
                $log->timeAgo = getDifferenceTimeString($time);

                $log->date = convertDate($log->date);
            }

            echo json_encode([$logs, $allCount, $allAnswerCount]);
        }
        else
            echo 'nok1';

        return;
    }
    public function sendAns()
    {
        if (isset($_POST["placeId"]) && isset($_POST["kindPlaceId"]) &&
            isset($_POST["text"]) && isset($_POST["relatedTo"])) {

            $text = makeValidInput($_POST["text"]);
            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $relatedTo = makeValidInput($_POST["relatedTo"]);
            $activityId = Activity::whereName('پاسخ')->first()->id;
            $uId = Auth::user()->id;

            $tmp = LogModel::whereId($relatedTo);
            if ($tmp == null || $tmp->confirm != 1) {
                echo 'nok2';
                return;
            }

            $log = new LogModel();
            $log->visitorId = $uId;
            $log->time = getToday()["time"];
            $log->activityId = $activityId;
            $log->placeId = $placeId;
            $log->kindPlaceId = $kindPlaceId;
            $log->text = $text;
            $log->relatedTo = $relatedTo;
            $log->date = date("Y-m-d");
            $log->confirm = 0;
            $log->save();

            if($relatedTo != 0){
                $tmp->subject = 'ans';
                $tmp->save();
            }

            echo "ok";
        }
        else
            echo 'nok1';

        return;
    }
    public function sendAns2()
    {

        if (isset($_POST["text"]) && isset($_POST["relatedTo"])) {
            $text = makeValidInput($_POST["text"]);
            $relatedTo = makeValidInput($_POST["relatedTo"]);

            $logTmp = LogModel::whereId($relatedTo);
            if ($logTmp == null || $logTmp->confirm != 1)
                return;

            $activityId = Activity::whereName('پاسخ')->first()->id;
            $uId = Auth::user()->id;

            $condition = ['visitorId' => $uId, 'relatedTo' => $relatedTo, 'activityId' => $activityId];
            if (LogModel::where($condition)->count() == 0) {

                $log = new LogModel();
                $log->visitorId = $uId;
                $log->time = getToday()["time"];
                $log->activityId = $activityId;
                $log->placeId = $logTmp->placeId;
                $log->kindPlaceId = $logTmp->kindPlaceId;
                $log->text = $text;
                $log->relatedTo = $relatedTo;
                $log->date = date("Y-m-d");
                $log->save();

                echo "ok";
            } else {
                echo "nok";
            }
        }
    }
    public function showAllAns()
    {

        if (isset($_POST["logId"]) && isset($_POST["num"])) {

            $num = makeValidInput($_POST["num"]);
            $logId = makeValidInput($_POST["logId"]);
            $ansActivityId = Activity::whereName('پاسخ')->first()->id;
            $condition = ["relatedTo" => $logId, 'activityId' => $ansActivityId, 'confirm' => 1];

            if ($num == -1)
                $logs = LogModel::where($condition)->get();
            else
                $logs = LogModel::where($condition)->take($num)->get();

            foreach ($logs as $log) {
                $log->visitorId = User::whereId($log->visitorId)->username;
                $condition = ['logId' => $log->id, 'like_' => 1];
                $log->rate = OpOnActivity::where($condition)->count();
                $condition = ['logId' => $log->id, 'dislike' => 1];
                $log->rate -= OpOnActivity::where($condition)->count();
            }

            echo json_encode($logs);
        }

    }

    public function showPlaceList($kindPlaceId, $mode, $city = '')
    {
        $kindPlace = Place::find($kindPlaceId);
        if($kindPlace != null){
            $meta = [];
            $mode = strtolower($mode);

            switch ($kindPlaceId){
                case 1:
                    $placeMode = 'amaken';
                    $kindPlace->title = 'جاذبه های';
                    $meta['title'] = 'کوچیتا';
                    $meta['keyword'] = 'کوچیتا';
                    $meta['description'] = 'کوچیتا';
                    break;
                case 3:
                    $placeMode = 'restaurant';
                    $kindPlace->title = 'رستوران های';
                    $meta['title'] = 'رستوران ها | لیست رستوران های ایران - نقد و بررسی به همراه عکس از کاربران | کوچیتا';
                    $meta['keyword'] = 'رستوران های ایران، رتبه بندی رستوران های ایران، نقد و بررسی رستوران های ایران، غذا در سفر';
                    $meta['description'] = 'رستوران های ایران رو تو مسافرتت بشناس و برای رستورانایی که رفتی نقد بنویس و نظر بده. منوی رستورانا رو ببین و از الان رزروشون کن. ساعات کاری و قیمتاشون رو ببین. ';
                    break;
                case 4:
                    $placeMode = 'hotel';
                    $kindPlace->title = 'مراکز اقامتی ';
                    $meta['title'] = 'هتل ها | لیست قیمت – نقد و بررسی به همراه عکس از کاربران - بوم گردی ها | کوچیتا';
                    $meta['keyword'] = 'لیست هتل های ایران، لیست قیمت هتل های ایران، نقد و بررسی هتل های ایران ، هتل های ارزان ایران، مقایسه ی هتل ها';
                    $meta['description'] = 'آخرین وضعبت قیمت و رزور هتل ها را ببینید، نظرات و نقد های مشتریان هتل ها را همراه عکس ببینید و هتل ها را مقایسه کنید.بهترین قیمت رزرو در کوچیتا';
                    break;
                case 6:
                    $placeMode = 'majara';
                    $kindPlace->title = ' طبیعت گردی در';
                    $meta['title'] = 'ماجرا | لیست اماکن ماجرا جویی ایران– تجهیزات مورد نیاز | ماجراجویی خودتو آغاز کن';
                    $meta['keyword'] = 'ماجراجویی در ایران، مکان های خاص ایران، گردشگری در ایران، می خوام برم سفر';
                    $meta['description'] = 'اماکن ماجراجویی رو بشناس، سختی سفرشون رو ببین و تججهیزاتتو آماده کن. کوچیتا بهترین';
                    break;
                case 10:
                    $placeMode = 'sogatSanaies';
                    $kindPlace->title = 'صنایع دستی و سوغات';
                    $meta['title'] = 'کوچیتا';
                    $meta['keyword'] = 'کوچیتا';
                    $meta['description'] = 'کوچیتا';
                    break;
                case 11:
                    $placeMode = 'mahaliFood';
                    $kindPlace->title = 'غذاهای محلی';
                    $meta['title'] = 'کوچیتا';
                    $meta['keyword'] = 'کوچیتا';
                    $meta['description'] = 'کوچیتا';
                    break;
            }
            $kindPlaceId = $kindPlace->id;

            if($mode == 'country'){
                $state = '';
                $city = '';
                $articleUrl = \url('/mainArticle');
                $n = 'لیست ' . $kindPlace->title . ' ایران';
                $locationName = ["name" => $n, 'state' => '',  'cityName' => 'ایران من', 'cityNameUrl' => '', 'articleUrl' => $articleUrl, 'kindState' => 'country', 'kindPage' => 'list'];
            }
            else if ($mode == "state") {
                $state = State::whereName($city)->first();
                $city = $state;
                if ($state == null)
                    return "نتیجه ای یافت نشد";

                $articleUrl = \url('/article/list/city/' . $state->name);
                $n = ' استان ' . $state->name;
                $locationName = ["name" => $n, 'state' => $state->name, 'cityName' => $n, 'cityNameUrl' => $state->name, 'articleUrl' => $articleUrl, 'kindState' => 'state', 'kindPage' => 'list'];
            }
            else if ($mode == "city") {
                $city = Cities::whereName($city)->first();
                if ($city == null)
                    return "نتیجه ای یافت نشد";

                $state = State::whereId($city->stateId);
                if ($state == null)
                    return "نتیجه ای یافت نشد";

                $articleUrl = \url('/article/list/city/' . $city->name);
                $n = ' شهر ' . $city->name;
                $locationName = ["name" => $n, 'state' => $state->name, 'cityName' => $n, 'cityNameUrl' => $city->name, 'articleUrl' => $articleUrl, 'kindState' => 'city', 'kindPage' => 'list'];
            }

            $features = PlaceFeatures::where('kindPlaceId', $kindPlaceId)->where('parent', 0)->get();
            foreach ($features as $feature)
                $feature->subFeat = PlaceFeatures::where('parent', $feature->id)->where('type', 'YN')->get();
            $kind = $mode;

            return view('places.list.list', compact(['features', 'meta', 'locationName', 'kindPlace', 'kind', 'kindPlaceId', 'mode', 'city', 'placeMode', 'state']));
        }
        else
            return \redirect(\url('/'));
    }

    public function getPlaceListElems(Request $request)
    {
        $page = (int)$request->pageNum;
        $take = (int)$request->take;
        $reqFilter = $request->featureFilter;
        $sort = $request->sort;
        $rateFilter = $request->rateFilter;
        $specialFilters = $request->specialFilters;
        $nameFilter = $request->nameFilter;
        $nearPlaceIdFilter = $request->nearPlaceIdFilter;
        $nearKindPlaceIdFilter = $request->nearKindPlaceIdFilter;
        $featureFilters = array();
        $placeIds = array();
        $places = array();

        $kindPlace = Place::find($request->kindPlaceId);
        $file = $kindPlace->fileName;
        $table = $kindPlace->tableName;

        $activityId = Activity::whereName('نظر')->first()->id;
        $ansActivityId = Activity::whereName('پاسخ')->first()->id;
        $quesActivityId = Activity::whereName('سوال')->first()->id;
        $seenActivityId = Activity::whereName('مشاهده')->first()->id;
        $rateActivityId = Activity::whereName('امتیاز')->first()->id;

        //first get all places in state or city
        if($request->mode == 'country')
            $placeIds = DB::table($table)->where('name', 'LIKE', '%'.$nameFilter.'%')->pluck('id')->toArray();
        else if($request->mode == 'state'){
            $cities = Cities::where('stateId', $request->city)->pluck('id')->toArray();
            $placeIds = DB::table($table)->whereIn('cityId', $cities)->where('name', 'LIKE', '%'.$nameFilter.'%')->pluck('id')->toArray();
        }
        else
            $placeIds = DB::table($table)->where('cityId', $request->city)->where('name', 'LIKE', '%'.$nameFilter.'%')->pluck('id')->toArray();

        if(count($placeIds) == 0){
            echo json_encode(['places' => array()]);
            return;
        }

        //special filters for each kind place

        if($specialFilters != null) {
            $kindValues = [];
            $kindName = [];
            if(is_array($specialFilters) && count($specialFilters) > 0) {
                foreach ($specialFilters as $item){
                    if($item != 0) {
                        $index = array_search($item['kind'], $kindName);
                        if ($index === false) {
                            array_push($kindName, $item['kind']);
                            array_push($kindValues, [$item['value']]);
                        } else
                            array_push($kindValues[$index], $item['value']);
                    }
                }

                foreach ($kindName as $index => $value){
                    $placeIds = DB::table($kindPlace->tableName)->whereIn($value, $kindValues[$index])->whereIn('id', $placeIds)->pluck('id')->toArray();
                }
            }
        }
        if(count($placeIds) == 0){
            echo json_encode(['places' => array()]);
            return;
        }

        // second get places have selected features
        if($reqFilter != null && count($reqFilter) > 0){
            foreach ($reqFilter as $item){
                if($item != 0)
                    array_push($featureFilters, $item);
            }

            if(count($featureFilters) != 0) {
                $pIds = DB::select('SELECT placeId, COUNT(id) AS count FROM placeFeatureRelations WHERE featureId IN (' . implode(",", $featureFilters) . ') AND placeId IN (' . implode(",", $placeIds) . ') GROUP BY placeId');
                $placeIds = array();
                foreach ($pIds as $p){
                    if($p->count == count($featureFilters))
                        array_push($placeIds, $p->placeId);
                }
            }
        }
        if(count($placeIds) == 0){
            echo json_encode(['places' => array()]);
            return;
        }

        // if have rate filter
        if($rateFilter != 0){
            $questionRate = Question::where('ansType', 'rate')->pluck('id')->toArray();
            $p = DB::select('SELECT log.placeId as placeId, AVG(qua.ans) as rate FROM log INNER JOIN questionUserAns AS qua ON log.kindPlaceId = ' . $kindPlace->id . ' AND log.placeId IN (' . implode(",", $placeIds) . ') AND qua.questionId IN (' . implode(",", $questionRate) . ') AND qua.logId = log.id GROUP BY log.placeId ORDER BY rate DESC');

            $rateFP = array();
            foreach ($placeIds as $item){
                array_push($rateFP, ['id' => $item, 'rate' => 2]);
                foreach ($p as $item2){
                    if($item2->placeId == $item){
                        $rateFP[count($rateFP)-1]['rate'] = $item2->rate;
                    }
                }
            }

            $placeIds = array();
            foreach ($rateFP as $item){
                if($item['rate'] > ($rateFilter-1))
                    array_push($placeIds, $item['id']);
            }
        }
        if(count($placeIds) == 0){
            echo json_encode(['places' => array()]);
            return;
        }

        // and sort results by kind
        if($sort == 'alphabet')
            $places = DB::table($table)->whereIn('id', $placeIds)->orderBy('name')->skip(($page - 1) * $take)->take($take)->get();
        else if($sort == 'distance' && $nearPlaceIdFilter != 0 && $nearKindPlaceIdFilter != 0){
            $nearKind = Place::find($nearKindPlaceIdFilter);
            $nearPlace = DB::table($nearKind->tableName)->find($nearPlaceIdFilter);
            $C1 = (float)$nearPlace->C;
            $D1 = (float)$nearPlace->D;

            $D = $D1 * 3.14 / 180;
            $C = $C1 * 3.14 / 180;

            $places = \DB::select('SELECT *, acos(' . sin($D) . ' * sin(D / 180 * 3.14) + ' . cos($D) . ' * cos(D / 180 * 3.14) * cos(C / 180 * 3.14 - ' . ($C) . ')) * 6371 as distance FROM ' . $table . ' WHERE id IN (' . implode(",", $placeIds) . ') ORDER BY distance LIMIT ' . $take . ' OFFSET ' . ($page-1) * $take);
        }
        else{
            if($sort == 'review')
                $p = DB::select('SELECT log.placeId as placeId, COUNT(log.id) as `count` FROM log WHERE log.kindPlaceId = ' . $kindPlace->id . ' AND log.placeId IN (' . implode(",", $placeIds) . ') AND (log.activityId = '. $activityId . ' OR log.activityId = ' . $ansActivityId . ' OR log.activityId = ' . $quesActivityId . ') GROUP BY log.placeId ORDER BY `count` DESC');
            else if($sort == 'seen')
                $p = DB::select('SELECT log.placeId as placeId, COUNT(log.id) as `count` FROM log WHERE log.kindPlaceId = ' . $kindPlace->id . ' AND log.placeId IN (' . implode(",", $placeIds) . ') AND log.activityId = '. $seenActivityId . ' GROUP BY log.placeId ORDER BY `count` DESC');
            else{
                $questionRate = Question::where('ansType', 'rate')->pluck('id')->toArray();
                $p = DB::select('SELECT log.placeId as placeId, AVG(qua.ans) as rate FROM log INNER JOIN questionUserAns AS qua ON log.kindPlaceId = ' . $kindPlace->id . ' AND log.placeId IN (' . implode(",", $placeIds) . ') AND qua.questionId IN (' . implode(",", $questionRate) . ') AND qua.logId = log.id GROUP BY log.placeId ORDER BY rate DESC');
            }

            $qpId = array();
            foreach ($p as $item)
                array_push($qpId, $item->placeId);

            if(($page * $take) >= count($qpId)){
                $less = ($page * $take) - count($qpId);
                if($less/$take < 1){
                    $skip = 0;
                    $nTake = $less;
                }
                else{
                    $skip = $less - $take;
                    $nTake = $take;
                }

                $npId = DB::table($table)->whereIn('id', $placeIds)->whereNotIn('id', $qpId)->skip($skip)->take($nTake)->pluck('id')->toArray();

                $placeIds = array();
                if(count($npId) < $take){
                    for($i = (($page-1)*$take); $i < ($page*$take) && $i < count($qpId); $i++)
                        array_push($placeIds, $qpId[$i]);

                    if(count($placeIds) < 4) {
                        for($i = 0; $i < count($npId); $i++)
                            array_push($placeIds, $npId[$i]);
                    }
                }
                else
                    $placeIds = $npId;
            }
            else{
                $placeIds = array();
                for ($i = (($page - 1) * $take); $i < ($page * $take); $i++)
                    array_push($placeIds, $qpId[$i]);
            }

            $places = array();
            foreach ($placeIds as $item){
                $place = DB::table($table)->find($item);
                array_push($places, $place);
            }
        }

        foreach ($places as $place) {

            if (file_exists((__DIR__ . '/../../../../assets/_images/' . $file . '/' . $place->file . '/f-' . $place->picNumber)))
                $place->pic = URL::asset('_images/' . $file .'/' . $place->file . '/f-' . $place->picNumber);
            else
                $place->pic = URL::asset('_images/nopic/blank.jpg');

            $condition = ['placeId' => $place->id, 'kindPlaceId' => $request->kindPlaceId,
                'activityId' => $activityId, 'confirm' => 1];
            $place->reviews = LogModel::where($condition)->count();
            $cityObj = Cities::whereId($place->cityId);
            $place->city = $cityObj->name;
            $place->state = State::whereId($cityObj->stateId)->name;
            $place->avgRate = getRate($place->id, $request->kindPlaceId)[1];
            $place->inTrip = 0;
            $place->redirect = createUrl($kindPlace->id, $place->id, 0, 0);
            if(\auth()->check()){
                $u = \auth()->user();
                $trips = DB::select('SELECT trip.id FROM tripPlace, trip WHERE trip.uId = ' . $u->id . ' AND trip.id = tripPlace.tripId AND tripPlace.placeId = ' . $place->id . ' AND tripPlace.kindPlaceId = ' . $request->kindPlaceId);
                if(count($trips) != 0)
                    $place->inTrip = 1;
            }
        }

        echo json_encode(['places' => $places]);
        return;
    }

}