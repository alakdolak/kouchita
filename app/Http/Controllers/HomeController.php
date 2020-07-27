<?php

namespace App\Http\Controllers;

use App\Events\CommentBroadCast;
use App\models\ActivationCode;
use App\models\Activity;
use App\models\Adab;
use App\models\AirLine;
use App\models\Alert;
use App\models\Amaken;
use App\models\BannerPics;
use App\models\Boomgardy;
use App\models\Cities;
use App\models\CityPic;
use App\models\ConfigModel;
use App\models\DefaultPic;
use App\models\GoyeshCity;
use App\models\Hotel;
use App\models\HotelApi;
use App\models\LogFeedBack;
use App\models\LogModel;
use App\models\MahaliFood;
use App\models\MainSliderPic;
use App\models\Majara;
use App\models\Message;
use App\models\OpOnActivity;
use App\models\Place;
use App\models\PlacePic;
use App\models\PlaceTag;
use App\models\Post;
use App\models\PostCategory;
use App\models\PostCategoryRelation;
use App\models\PostCityRelation;
use App\models\PostComment;
use App\models\Question;
use App\models\Report;
use App\models\ReportsType;
use App\models\Restaurant;
use App\models\RetrievePas;
use App\models\ReviewPic;
use App\models\ReviewUserAssigned;
use App\models\SogatSanaie;
use App\models\State;
use App\models\Train;
use App\models\User;
use App\models\saveApiInfo;
use Carbon\Carbon;
use Exception;
use Google_Client;
use Google_Service_Oauth2;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PHPMailer\PHPMailer\PHPMailer;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Assign;
use function Sodium\crypto_box_publickey_from_secretkey;


class HomeController extends Controller
{
    public function setPlaceDetailsURL($kindPlaceId, $placeId)
    {
        $kindPlace = Place::find($kindPlaceId);
        if($kindPlaceId == null)
            return \redirect(\url('/'));
        else
            $place = DB::table($kindPlace->tableName)->select(['id', 'name', 'slug'])->find($placeId);

        if($place == null)
            return \redirect(\url('/'));

        if($place->slug != null)
            return \redirect(url('show-place-details/' . $kindPlace->fileName . '/' . $place->slug));
        else
            return \redirect(url('show-place-details/' . $kindPlace->fileName . '/' . $place->id));
    }

    public function mainSliderStore(Request $request)
    {
//        dd($request->all());
        if(\auth()->check() && \auth()->user()->level == 1) {
            $location = __DIR__ . '/../../../../assets/_images/sliderPic';

            if(!file_exists($location))
                mkdir($location);

            if(isset($request->id) && $request->id != 0){
                $slider = MainSliderPic::find($request->id);
                if($slider != null){
                    $slider->text = $request->text;
                    $slider->textBackground = $request->color;
                    $slider->textColor = $request->textColor;
                    $slider->alt = 'کوچیتا';

                    if (isset($_FILES['pic']) && $_FILES['pic']['error'] == 0){
                        if (is_file($location . '/' . $slider->pic))
                            unlink($location . '/' . $slider->pic);
                        $fileName =  time() . $_FILES['pic']['name'];
                        $destinationPic = $location . '/' . $fileName;
                        move_uploaded_file( $_FILES['pic']['tmp_name'], $destinationPic);
                        $slider->pic = $fileName;
                    }

                    if (isset($_FILES['backPic']) && $_FILES['backPic']['error'] == 0){
                        if (is_file($location . '/' . $slider->backgroundPic))
                            unlink($location . '/' . $slider->backgroundPic);
                        $fileName =  (time()+1) . $_FILES['backPic']['name'];
                        $destinationPic = $location . '/' . $fileName;
                        move_uploaded_file( $_FILES['backPic']['tmp_name'], $destinationPic);
                        $slider->backgroundPic = $fileName;
                    }
                    $slider->save();
                    echo json_encode(['ok', $slider->id]);
                }
                else
                    echo json_encode(['nok1']);

            }
            else if(isset($request->id) && $request->id == 0){
                if (isset($_FILES['pic']) && $_FILES['pic']['error'] == 0){
                    $slider = new MainSliderPic();
                    $slider->text = $request->text;
                    $slider->textBackground = $request->color;
                    $slider->textColor = $request->textColor;
                    $slider->alt = 'کوچیتا';

                    $fileName =  time() . $_FILES['pic']['name'];
                    $destinationPic = $location . '/' . $fileName;
                    compressImage($_FILES['pic']['tmp_name'], $destinationPic, 80);
                    $slider->pic = $fileName;

                    if (isset($_FILES['backPic']) && $_FILES['backPic']['error'] == 0){
                        $fileName =  (time()+1) . $_FILES['backPic']['name'];
                        $destinationPic = $location . '/' . $fileName;
                        move_uploaded_file( $_FILES['backPic']['tmp_name'], $destinationPic);
                        $slider->backgroundPic = $fileName;
                    }

                    $slider->save();

                    echo json_encode(['ok', $slider->id]);
                }

            }
            else
                echo json_encode(['nok2']);
        }
        else
            echo json_encode(['nok3']);

        return;
    }

    public function mainSliderImagesDelete(Request $request){
        if(isset($request->id) && $request->id != 0){
            $slider = MainSliderPic::find($request->id);
            if($slider != null){
                $location = __DIR__ . '/../../../../assets/_images/sliderPic';

                if (file_exists($location . '/' . $slider->pic))
                    unlink($location . '/' . $slider->pic);

                if (file_exists($location . '/' . $slider->backgroundPic))
                    unlink($location . '/' . $slider->backgroundPic);

                $slider->delete();
                echo 'ok';
            }
            else
                echo 'nok2';
        }
        else
            echo 'nok1';

        return;
    }

    public function middleBannerImages(Request $request)
    {
        if(\auth()->check() && \auth()->user()->level == 1){
            $location = __DIR__ . '/../../../../assets/_images/bannerPic';

            if(!file_exists($location))
                mkdir($location);

            $location .= '/' . $request->page;

            if(!file_exists($location))
                mkdir($location);

            if(isset($request->id) && $request->id != 0){
                $pic = BannerPics::find($request->id);
                if($pic != null){
                    $link = $request->link;
                    if (strpos($link, 'http') === false)
                        $link = 'https://' . $link;

                    $pic->link = $link;
                    $pic->text = $request->text;
                    if (isset($_FILES['pic']) && $_FILES['pic']['error'] == 0){
                        if (file_exists($location . '/' . $pic->pic))
                            unlink($location . '/' . $pic->pic);

                        $fileName =  time() . $_FILES['pic']['name'];
                        $destinationPic = $location . '/' . $fileName;

                        compressImage($_FILES['pic']['tmp_name'], $destinationPic, 80);
                        $pic->pic = $fileName;
                    }
                    $pic->save();
                    echo json_encode(['ok', $pic->id]);
                }
                else
                    echo 'nok5';

                return;
            }
            else {
                if (isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {

                    $pic = new BannerPics();
                    $pic->page = $request->page;
                    $pic->section = $request->section;
                    $pic->number = $request->number;
                    $fileName =  time() . $_FILES['pic']['name'];
                    $destinationPic = $location . '/' . $fileName;

                    compressImage($_FILES['pic']['tmp_name'], $destinationPic, 80);
                    $pic->pic = $fileName;

                    $link = $request->link;
                    if (strpos($link, 'http') === false)
                        $link = 'https://' . $link;

                    $pic->link = $link;
                    $pic->userId = \auth()->user()->id;
                    $pic->text = $request->text;

                    $pic->save();

                    echo json_encode(['ok', $pic->id]);
                }
                else if (isset($request->link) && isset($request->id)) {
                    $pic = BannerPics::find($request->id);
                    if ($pic != null) {
                        $link = $request->link;
                        if (strpos($link, 'http') === false)
                            $link = 'https://' . $link;
                        $pic->link = $link;
                        $pic->text = $request->text;

                        $pic->save();
                    } else
                        echo json_encode(['nok2']);

                    echo json_encode(['ok', $pic->id]);
                }
                else
                    echo json_encode(['nok3']);
            }

        }
        else
            echo json_encode(['nok1']);

        return;
    }

    public function middleBannerImagesDelete(Request $request)
    {
        if(isset($request->id) && \auth()->check() && \auth()->user()->level == 1){
            $location = __DIR__ . '/../../../../assets/_images/bannerPic';
            $pic = BannerPics::find($request->id);
            if($pic != null){
                $location .= '/' . $pic->page;
                if (file_exists($location . '/' . $pic->pic))
                    unlink($location . '/' . $pic->pic);
                $pic->delete();
                echo 'ok';
            }
            else
                echo 'nok2';
        }
        else
            echo 'nok1';

        return;
    }

    public function cityPage($kind, $city, Request $request) {

        $today = getToday()["date"];
        $nowTime = getToday()["time"];
        if($kind == 'state')
            $place = State::whereName($city)->first();
        else
            $place = Cities::whereName($city)->first();

        if($place == null)
            return Redirect::route('home');

        $locationPic = __DIR__ . '/../../../../assets/_images/city';

        if($kind == 'city') {
            $place->state = State::whereId($place->stateId)->name;
            $place->listName = $place->name;
            $place->name = 'شهر ' . $place->name;
            $articleUrl = \url('/article/list/city/' . $place->listName);
            $locationName = ["name" => $place->name, 'state' => $place->state, 'cityName' => $place->name, 'cityNameUrl' => $place->listName, 'articleUrl' => $articleUrl, 'kindState' => 'city'];

            $allAmakenId = Amaken::where('cityId', $place->id)->pluck('id')->toArray();
            $allAmaken = Amaken::where('cityId', $place->id)->count();
            $allMajara = Majara::where('cityId', $place->id)->count();
            $allHotels = Hotel::where('cityId', $place->id)->count();
            $allRestaurant = Restaurant::where('cityId', $place->id)->count();
            $allMahaliFood = MahaliFood::where('cityId', $place->id)->count();
            $allSogatSanaie = SogatSanaie::where('cityId', $place->id)->count();
            $allBoomgardy = Boomgardy::where('cityId', $place->id)->count();

            $pics = CityPic::where('cityId', $place->id)->get();
            if(count($pics) == 0){
                $seenActivity = Activity::whereName('مشاهده')->first();
                $ala = Amaken::where('cityId', $place->id)->pluck('id')->toArray();
                $mostSeen = [];
                if(count($ala) != 0)
                    $mostSeen = DB::select('SELECT placeId, COUNT(id) as seen FROM log WHERE activityId = ' .$seenActivity->id. ' AND kindPlaceId = 1 AND placeId IN (' . implode(",", $ala) . ') GROUP BY placeId ORDER BY seen DESC');

                if(count($mostSeen) != 0){
                    foreach ($mostSeen as $item){
                        $p = Amaken::find($item->placeId);
                        $location = __DIR__ . '/../../../../assets/_images/amaken/' . $p->file . '/s-' . $p->picNumber;
                        if(file_exists($location)) {
                            $place->image = URL::asset('_images/amaken/' . $p->file . '/s-' . $p->picNumber);
                            break;
                        }
                    }
                    if($place->image == null || $place->image == '')
                        $place->image = URL::asset('_images/nopic/blank.jpg');
                }
                else
                    $place->image = URL::asset('_images/nopic/blank.jpg');
            }
            else{
                foreach ($pics as $pic)
                    $pic->pic = URL::asset('_images/city/' . $place->id  . '/' . $pic->pic);

                $place->pic = $pics;
                if($place->image != null){
                    $locationPic1 = $locationPic .'/' . $place->id . '/' . $place->image;
                    if(is_file($locationPic1))
                        $place->image = URL::asset('_images/city/' . $place->id  . '/' . $place->image);
                    else
                        $place->image = $place->pic[0]->pic;
                }
                    $place->image = $place->pic[0]->pic;

            }
        }
        else {
            $place->listName = $place->name;
            $place->name = 'استان ' . $place->name;
            $articleUrl = \url('/article/list/state/' . $place->listName);
            $locationName = ["name" => $place->name, 'cityName' => $place->name, 'cityNameUrl' => $place->listName, 'articleUrl' => $articleUrl, 'kindState' => 'state', 'state' => $place->name];

            $allCities = Cities::where('stateId', $place->id)->where('isVillage',0)->pluck('id')->toArray();

            $allAmakenId = Amaken::whereIn('cityId', $allCities)->pluck('id')->toArray();
            $allAmaken = Amaken::whereIn('cityId', $allCities)->count();
            $allMajara = Majara::whereIn('cityId', $allCities)->count();
            $allHotels = Hotel::whereIn('cityId', $allCities)->count();
            $allRestaurant = Restaurant::whereIn('cityId', $allCities)->count();
            $allMahaliFood = MahaliFood::whereIn('cityId', $allCities)->count();
            $allSogatSanaie = SogatSanaie::whereIn('cityId', $allCities)->count();
            $allBoomgardy = Boomgardy::whereIn('cityId', $allCities)->count();

            if($place->image == null){
                $seenActivity = Activity::whereName('مشاهده')->first();
                $mostSeen = [];
                if($allAmakenId != null)
                    $mostSeen = DB::select('SELECT placeId, COUNT(id) as seen FROM log WHERE activityId = ' .$seenActivity->id. ' AND kindPlaceId = 1 AND placeId IN (' . implode(",", $allAmakenId) . ') GROUP BY placeId ORDER BY seen DESC');
                else
                    $place->image = URL::asset('_images/nopic/blank.jpg');
                if(count($mostSeen) != 0){
                    foreach ($mostSeen as $item){
                        $p = Amaken::find($item->placeId);
                        $location = __DIR__ . '/../../../../assets/_images/amaken/' . $p->file . '/s-' . $p->picNumber;
                        if(file_exists($location)) {
                            $place->image = URL::asset('_images/amaken/' . $p->file . '/s-' . $p->picNumber);
                            break;
                        }
                    }
                    if($place->image == null || $place->image == '')
                        $place->image = URL::asset('_images/nopic/blank.jpg');
                }
                else
                    $place->image = URL::asset('_images/nopic/blank.jpg');
            }
            else
                $place->image = URL::asset('_images/city/' . $place->id . '/'.$place->image);
        }
        $placeCounts = [
            'amaken' => $allAmaken,
            'majara' => $allMajara,
            'hotel' => $allHotels,
            'restaurant' => $allRestaurant,
            'mahaliFood' => $allMahaliFood,
            'sogatSanaie' => $allSogatSanaie,
            'boomgardy' => $allBoomgardy,
        ];

        $post = [];
        $postId = [];
        $postTake = 7;
        if($kind == 'state')
            $postId = PostCityRelation::where('stateId', $place->id)->pluck('postId')->toArray();
        else{
            $postId = PostCityRelation::where('cityId', $place->id)->pluck('postId')->toArray();
            if(count($postId) < $postTake){
                $less = $postTake - count($postId);
                $pId = PostCityRelation::where('stateId', $place->stateId)->take($less)->pluck('postId')->toArray();
                $postId = array_merge($postId, $pId);
            }
        }
        if(count($postId) != 0){
            $pt = Post::whereIn('id', $postId)->where('release', '!=', 'draft')->whereRaw('date < ' .$today. ' OR (date = ' . $today . ' AND time < ' . $nowTime . ' )')->take($postTake)->orderBy('date', 'DESC')->get();
            foreach ($pt as $item)
                array_push($post, $item);

            if(count($pt) < $postTake){
                $less = $postTake - count($pt);
                $postInRel = PostCityRelation::all()->pluck('postId')->toArray();
                $p = Post::whereNotIn('id', $postId)->whereNotIn('id', $postInRel)->where('release', '!=', 'draft')->whereRaw('date < ' .$today. ' OR (date = ' . $today . ' AND time < ' . $nowTime . ' )')->take($less)->orderBy('date', 'DESC')->get();
                foreach ($p as $item)
                    array_push($post, $item);
            }
        }
        else
            $post = Post::where('release', '!=', 'draft')->whereRaw('date < ' .$today. ' OR (date = ' . $today . ' AND time < ' . $nowTime . ' )')->take($postTake)->orderBy('date', 'DESC')->get();
        foreach ($post as $item){
            $item->pic = \URL::asset('_images/posts/' . $item->id . '/' . $item->pic);
            if($item->date == null)
                $item->date = \verta($item->created_at)->format('Y/m/%d');

            $item->date = convertJalaliToText($item->date);
            $item->msgs = PostComment::wherePostId($item->id)->whereStatus(true)->count();
            $item->username = User::whereId($item->creator)->username;
            $mainCategory = PostCategoryRelation::where('postId', $item->id)->where('isMain', 1)->first();
            $item->category = PostCategory::find($mainCategory->categoryId)->name;
            $item->url = route('article.show', ['slug' => $item->slug]);
            $item->catURL = route('article.list', ['type' => 'category', 'search' => $item->category]);
        }

        $mainWebSiteUrl = \url('/');
        $mainWebSiteUrl .= '/' . $request->path();
        if($kind == 'state')
            $localStorageData = ['kind' => 'state', 'name' => $place->name , 'city' => '', 'state' => $place->listName, 'mainPic' => $place->image, 'redirect' => $mainWebSiteUrl];
        else
            $localStorageData = ['kind' => 'city', 'name' => $place->name , 'city' => $place->listName, 'state' => $place->state, 'mainPic' => $place->image, 'redirect' => $mainWebSiteUrl];

        return view('cityPage', compact(['place', 'kind', 'localStorageData', 'locationName', 'post', 'placeCounts']));
    }

    public function getCityPageReview(Request $request)
    {
        $take = 15;
        $reviews = $this->getCityReviews($request->kind, $request->placeId, $take);
        if(count($reviews) != $take){
            $lessReview = [];
            $notIn = [];
            foreach ($reviews as $item)
                array_push($notIn, $item->id);

            if($request->kind == 'city'){
                $place = Cities::find($request->placeId);
                $less = $take - count($reviews);
                $lessReview = $this->getCityReviews('state', $place->stateId, $less, $notIn);
                foreach ($lessReview as $item)
                    array_push($reviews, $item);
            }

            $less = $take - count($reviews);
            if($less != 0){
                $notIn = [];
                foreach ($reviews as $item)
                    array_push($notIn, $item->id);

                $lessReview = $this->getCityReviews('country', 0, $less, $notIn);
                foreach ($lessReview as $item)
                    array_push($reviews, $item);
            }
        }

        foreach ($reviews as $item)
            $item = reviewTrueType($item); // in common.php

        echo json_encode($reviews);
        return;
    }

    public function getCityPageTopPlace(Request $request)
    {
        $topAmaken = $this->getTopPlaces(1, $request->kind, $request->id);
        $topRestaurant = $this->getTopPlaces(3, $request->kind, $request->id);
        $topHotel = $this->getTopPlaces(4, $request->kind, $request->id);
        $topMajra = $this->getTopPlaces(6, $request->kind, $request->id);
        $topSogatSanaies = $this->getTopPlaces(10, $request->kind, $request->id);
        $topMahaliFood = $this->getTopPlaces(11, $request->kind, $request->id);
        $topBoomgardy = $this->getTopPlaces(12, $request->kind, $request->id);
        $topPlaces = [  'topBoomgardyCityPage' => $topBoomgardy,
                        'topAmakenCityPage' => $topAmaken,
                        'topRestaurantInCity' => $topRestaurant,
                        'topHotelCityPage' => $topHotel,
                        'topMajaraCityPage' => $topMajra,
                        'topSogatCityPage' => $topSogatSanaies,
                        'topFoodCityPage' => $topMahaliFood];

        echo json_encode($topPlaces);
        return;
    }

    public function getCityAllPlaces(Request $request)
    {
        $activityId = Activity::whereName('نظر')->first()->id;

        if($request->kind == 'city'){
            $allAmaken = Amaken::where('cityId', $request->id)->select(['id', 'name', 'slug', 'C', 'D', 'address', 'picNumber', 'file', 'keyword', 'cityId', 'phone', 'reviewCount', 'fullRate'])->get();
            $allMajara = Majara::where('cityId', $request->id)->select(['id', 'name', 'slug', 'C', 'D', 'dastresi', 'picNumber', 'file', 'keyword', 'cityId', 'reviewCount', 'fullRate'])->get();
            $allHotels = Hotel::where('cityId', $request->id)->select(['id', 'name', 'slug', 'C', 'D', 'address', 'picNumber', 'file', 'keyword', 'cityId', 'phone', 'reviewCount', 'fullRate'])->get();
            $allRestaurant = Restaurant::where('cityId', $request->id)->select(['id', 'name', 'slug', 'C', 'D', 'address', 'picNumber', 'file', 'keyword', 'cityId', 'phone', 'reviewCount', 'fullRate'])->get();
            $allBoomgardy = Boomgardy::where('cityId', $request->id)->select(['id', 'name', 'slug', 'C', 'D', 'address', 'picNumber', 'file', 'keyword', 'cityId', 'phone', 'reviewCount', 'fullRate'])->get();
        }
        else{
            $allCities = Cities::where('stateId', $request->id)->where('isVillage',0)->pluck('id')->toArray();

            $allAmaken = Amaken::whereIn('cityId', $allCities)->select(['id', 'name', 'slug', 'C', 'D', 'address', 'picNumber', 'file', 'keyword', 'cityId', 'phone', 'reviewCount', 'fullRate'])->get();
            $allMajara = Majara::whereIn('cityId', $allCities)->select(['id', 'name', 'slug', 'C', 'D', 'dastresi', 'picNumber', 'file', 'keyword', 'cityId', 'reviewCount', 'fullRate'])->get();
            $allHotels = Hotel::whereIn('cityId', $allCities)->select(['id', 'name', 'slug', 'C', 'D', 'address', 'picNumber', 'file', 'keyword', 'cityId', 'phone', 'reviewCount', 'fullRate'])->get();
            $allRestaurant = Restaurant::whereIn('cityId', $allCities)->select(['id', 'name', 'slug', 'C', 'D', 'address', 'picNumber', 'file', 'keyword', 'cityId', 'phone', 'reviewCount', 'fullRate'])->get();
            $allBoomgardy = Boomgardy::whereIn('cityId', $allCities)->select(['id', 'name', 'slug', 'C', 'D', 'address', 'picNumber', 'file', 'keyword', 'cityId', 'phone', 'reviewCount', 'fullRate'])->get();
        }
        $allPlaces = ['amaken' => $allAmaken, 'hotels' => $allHotels, 'restaurant' => $allRestaurant, 'majara' => $allMajara, 'boomgardy' => $allBoomgardy];

        $count = 0;
        $C = 0;
        $D = 0;
        foreach ($allPlaces as $key => $plac){
            switch ($key){
                case 'amaken':
                    $kindPlace = Place::find(1);
                    $kP = 1;
                    break;
                case 'hotels':
                    $kindPlace = Place::find(4);
                    $kP = 4;
                    break;
                case 'restaurant':
                    $kindPlace = Place::find(3);
                    $kP = 3;
                    break;
                case 'majara':
                    $kindPlace = Place::find(6);
                    $kP = 6;
                    break;
                case 'boomgardy':
                    $kindPlace = Place::find(12);
                    $kP = 12;
                    break;
            }
            foreach ($plac as $item){
                if($item->C > 39.817043976810254 || $item->D > 62.148940583173776 || $item->C < 24.337168697512585 || $item->D < 43.75341666481935){
                    $item->C = 37.404470200738906;
                    $item->D = 51.81568255996895;
                    $item->save();
                }

                $location = __DIR__ .'/../../../../assets/_images/' . $kindPlace->fileName . '/' . $item->file;
                $item->pic = null;
                if(is_file($location . '/f-' . $item->picNumber))
                    $item->pic = URL::asset('_images/' . $kindPlace->fileName . '/' . $item->file . '/f-' . $item->picNumber);
                else{
                    $placePics = PlacePic::where('placeId', $item->id)->where('kindPlaceId', $kP)->get();
                    foreach ($placePics as $pp){
                        if(is_file($location . '/f-' . $pp->picNumber)) {
                            $item->pic = URL::asset('_images/' . $kindPlace->fileName . '/' . $item->file . '/f-' . $pp->picNumber);
                            $getPic = true;
                            break;
                        }
                    }
                }
                if($item->pic == null)
                    $item->pic = URL::asset('images/mainPics/nopicv01.jpg');

                $item->url = route('placeDetails', ['kindPlaceId' => $kP, 'placeId' => $item->id]);
                $cit = Cities::find($item->cityId);
                $item->cityName = $cit->name;
                $item->stateName = State::whereId($cit->stateId)->name;
                $item->rate = $item->fullRate;
                if($item->rate == 0)
                    $item->rate = 2;
                $item->review = $item->reviewCount;

                $C += (float)$item->C;
                $D += (float)$item->D;
                $count++;
            }
        }
        if($count > 0) {
            $C /= $count;
            $D /= $count;
        }
        else{
            $C = 32.681757;
            $D = 53.498319;
        }

        $map = ['C' => $C, 'D' => $D];

        echo json_encode(['map' => $map, 'allPlaces' => $allPlaces]);
        return;
    }

    public function checkUserNameAndPass()
    {

        if (isset($_POST["username"]) && isset($_POST["pass"]) && isset($_POST["rPass"])) {

            $username = makeValidInput($_POST["username"]);
            $pass = makeValidInput($_POST["pass"]);
            $rPass = makeValidInput($_POST["rPass"]);

            if (User::whereUserName($username)->count() > 0) {
                echo "nok1";
                return;
            }

            if ($pass != $rPass) {
                echo "nok2";
                return;
            }

            $user = new User();
            $user->username = $username;
            $user->password = Hash::make($pass);
            $user->cityId = Cities::first()->id;
            if(request('email') != null && request('phone') != null){
                $user->email = request('email');
                $user->phone = request('phone');
            }
            if(request('firstName') != null && request('lastName') != null){
                $user->first_name = request('firstName');
                $user-> last_name  = request('lastName');
            }

            try {
                $user->save();
                echo "ok";
            } catch (\Exception $x) {
                dd($x);
            }
        }

    }

    public function searchForStates()
    {
        if (isset($_POST["key"])) {
            $key = makeValidInput($_POST["key"]);
            echo json_encode(DB::select("select * from states WHERE name LIKE '%$key%'"));
        }
    }

    public function testHotel()
    {

        $hotels = DB::select('select h.name as hotelName, c.name as cityName from hotels h, cities c WHERE h.cityId = c.id limit 0, 20');

        $data = array(
            'request' => 'getHotelsPrices',
            'username' => 'mohammad',
            'password' => '22743823',
            'hotels' => json_encode($hotels)
        );


        $this->sendPostRequest('http://localhost:8080/proxy/', $data);
    }

    function sendPostRequest($url, $data)
    {
        //open connection
        $ch = curl_init();

        $postString = http_build_query($data, '', '&');

//set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute post
        $result = curl_exec($ch);
        print $result;
        curl_close($ch);
    }

    public function showPoliciess()
    {
        return view('policies2');
    }

    public function removeDuplicate($key)
    {

        $hotels = DB::select('select h2.id from ' . $key . ' h1, ' . $key . ' h2 WHERE h2.id > h1.id and h1.name = h2.name');

        echo count($hotels);

        switch ($key) {
            case "hotels":
                foreach ($hotels as $hotel)
                    Hotel::destroy($hotel->id);
                break;
            case "amaken":
                foreach ($hotels as $hotel)
                    Amaken::destroy($hotel->id);
                break;
            case "restaurant":
                foreach ($hotels as $hotel)
                    Restaurant::destroy($hotel->id);
                break;
            case "adab":
                foreach ($hotels as $hotel)
                    Adab::destroy($hotel->id);
                break;
            case "majara":
                foreach ($hotels as $hotel)
                    Majara::destroy($hotel->id);
                break;
        }

        return;
    }

    public function export($mode)
    {

        $serverName = "localhost";
        $username = "root";
        $password = '';
        $dbName = "admin_shazde";

        $conn = mysqli_connect($serverName, $username, $password);

        $conn->set_charset("utf8");
        mysqli_select_db($conn, $dbName) or die("Connection failed: ");

        $dbLink = $conn;

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Gachesefid");
        $objPHPExcel->getProperties()->setLastModifiedBy("Gachesefid");
        $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");

        $objPHPExcel->setActiveSheetIndex(0);

        if ($mode == "hotel")
            $query = "select * from hotels";
        else if ($mode == "amaken")
            $query = "select * from amaken";
        else if ($mode == "majara")
            $query = "select * from majara";
        else if ($mode == "adab")
            $query = "select * from majara";
        else if ($mode == "restaurant")
            $query = "select * from restaurant";

        $result = mysqli_query($dbLink, $query);

        $counter = 1;

        $cols = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'AA', 'BB', 'CC', 'DD', 'EE', 'FF', 'GG', 'HH', 'II', 'JJ', 'KK', 'LL', 'MM', 'NN', 'OO', 'PP', 'QQ', 'RR', 'SS', 'TT', 'UU', 'VV', 'WW', 'XX', 'YY', 'ZZ'
        ];

        while ($row = mysqli_fetch_row($result)) {

            for ($i = 0; $i < count($row); $i++) {
                $objPHPExcel->getActiveSheet()->setCellValue($cols[$i] . ($counter), $row[$i]);
            }

            $counter++;

        }

        $fileName = __DIR__ . "/../../../public/" . $mode . ".xlsx";

        $objPHPExcel->getActiveSheet()->setTitle('گزارش گیری پایه تحصیلی');

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save($fileName);
    }

    public function fillState()
    {

        $path = __DIR__ . '/../../../../assets/alaki.xlsx';

        $excelReader = PHPExcel_IOFactory::createReaderForFile($path);
        $excelObj = $excelReader->load($path);
        $workSheet = $excelObj->getSheet(0);

        $lastRow = $workSheet->getHighestRow();

        for ($row = 1; $row <= $lastRow; $row++) {
            $tmp = $workSheet->getCell('A' . $row)->getValue();
            $alaki = new State();
            $str = explode(' ', $tmp);
            $tmp = "";
            for ($i = 1; $i < count($str); $i++) {
                if ($i != count($str) - 1)
                    $tmp .= $str[$i] . " ";
                else
                    $tmp .= $str[$i];
            }
            $alaki->name = $tmp;
            $alaki->save();
        }

    }

    public function fillTrain()
    {

        $path = __DIR__ . '/../../../../assets/alaki.xlsx';

        $excelReader = PHPExcel_IOFactory::createReaderForFile($path);
        $excelObj = $excelReader->load($path);
        $workSheet = $excelObj->getSheet(0);

        $lastRow = $workSheet->getHighestRow();

        for ($row = 1; $row <= $lastRow; $row++) {
            $name = $workSheet->getCell('A' . $row)->getValue();

            $alaki = new Train();

            $alaki->name = $name;
            try {
                $alaki->save();
            } catch (Exception $x) {
                echo $x->getMessage() . "<br/>";
            }
        }
    }

    public function fillAirLine()
    {

        $path = __DIR__ . '/../../../../assets/alaki.xlsx';

        $excelReader = PHPExcel_IOFactory::createReaderForFile($path);
        $excelObj = $excelReader->load($path);
        $workSheet = $excelObj->getSheet(0);

        $lastRow = $workSheet->getHighestRow();

        for ($row = 1; $row <= $lastRow; $row++) {
            $name = $workSheet->getCell('A' . $row)->getValue();
            $abbreviation = $workSheet->getCell('B' . $row)->getValue();

            $alaki = new AirLine();

            $alaki->name = $name;
            $alaki->abbreviation = $abbreviation;

            try {
                $alaki->save();
            } catch (Exception $x) {
                echo $x->getMessage() . "<br/>";
            }
        }
    }

    public function fillCity()
    {

        $path = __DIR__ . '/../../../../assets/alaki.xlsx';

        $excelReader = PHPExcel_IOFactory::createReaderForFile($path);
        $excelObj = $excelReader->load($path);
        $workSheet = $excelObj->getSheet(0);

        $lastRow = $workSheet->getHighestRow();

        for ($row = 1; $row <= $lastRow; $row++) {
            $name = $workSheet->getCell('A' . $row)->getValue();
            $C = $workSheet->getCell('B' . $row)->getValue();
            $D = $workSheet->getCell('C' . $row)->getValue();
            $stateId = $workSheet->getCell('D' . $row)->getValue();

            $alaki = new Cities();

            $alaki->name = $name;
            $alaki->x = $C;
            $alaki->y = $D;
            $alaki->stateId = $stateId;
            try {
                $alaki->save();
            } catch (Exception $x) {
                echo $x->getMessage() . "<br/>";
            }
        }

    }

    public function updateHotelsFile()
    {

        $hotels = Hotel::get();
        foreach ($hotels as $hotel) {

            $tmp = explode(' ', $hotel->file);

            $str = "";
            for ($i = 0; $i < count($tmp); $i++) {
                if (count($tmp) - 1 == $i)
                    $str .= $tmp[$i];
                else
                    $str .= $tmp[$i] . '_';
            }

            $hotel->file = $str;
            try {
                $hotel->save();
            } catch (Exception $x) {
                echo $x->getMessage();
            }
        }
    }

    public function updateAmakensFile()
    {

        $amakens = Amaken::get();
        foreach ($amakens as $hotel) {

            $tmp = explode(' ', $hotel->file);

            $str = "";
            for ($i = 0; $i < count($tmp); $i++) {
                if (count($tmp) - 1 == $i)
                    $str .= $tmp[$i];
                else
                    $str .= $tmp[$i] . '_';
            }

            $hotel->file = $str;
            try {
                $hotel->save();
            } catch (Exception $x) {
                echo $x->getMessage();
            }
        }
    }

    public function estelahat($goyesh)
    {

        $tags = DB::select('select DISTINCT goyeshTag.id, goyeshTag.name from goyeshTag, goyeshCity, estelahat WHERE goyeshCity.name = "' . $goyesh . '" and goyeshTag.id = tagId and goyeshId = goyeshCity.id');

        foreach ($tags as $tag) {
            $tag->words = DB::select('select estelah, talafoz, maani from goyeshCity, estelahat WHERE goyeshCity.name = "' . $goyesh . '" and tagId = ' . $tag->id . ' and goyeshId = goyeshCity.id');
        }

        return view('estelahat', array('goyesh' => $goyesh, 'tags' => $tags, 'goyeshCities' => GoyeshCity::all()));
    }

    public function soon()
    {
        return view('errors.underConstruction');
    }

    public function printPage($tripId)
    {
        return view('alaki', array('tripId' => $tripId));
    }


    public function showSafarname($city)
    {
        return view('safarname', array('city' => $city));
    }

    public function totalSearch(Request $request)
    {

        if ((isset($_POST["key"]) && isset($_POST["kindPlaceId"])) || (isset($request->key) && isset($request->kindPlaceId))) {

            $kindPlaceId = isset($_POST["kindPlaceId"]) ? makeValidInput($_POST["kindPlaceId"]) : makeValidInput($request->kindPlaceId);
            $key = isset($_POST["key"]) ? makeValidInput($_POST["key"]) : makeValidInput($request->key);
            $key2 = (isset($_POST["key2"]) ? makeValidInput($_POST["key2"]) : (isset($request->key2) ? makeValidInput($request->key2) : ''));

            $time = time();

            $key = str_replace(' ', '', $key);
            $key2 = str_replace(' ', '', $key2);

            if (!empty($key2))
                $result = DB::select("SELECT name as targetName, id from state WHERE replace(name, ' ', '') LIKE '%$key%' or replace(name, ' ', '') LIKE '%$key2%'");
            else
                $result = DB::select("SELECT name as targetName, id from state WHERE replace(name, ' ', '') LIKE '%$key%'");

            foreach ($result as $itr) {
                $itr->mode = "state";
                $itr->kindPlaceId = -1;
                $itr->url = createUrl(0, 0, $itr->id, 0, 0);
            }

            if (!empty($key2))
                $tmp = DB::select("SELECT cities.name as targetName, state.name as stateName, cities.id as id from cities, state WHERE (replace(cities.name, ' ', '') LIKE '%$key%' or replace(cities.name, ' ', '') LIKE '%$key2%') and stateId = state.id and isVillage = 0");
            else
                $tmp = DB::select("SELECT cities.name as targetName, state.name as stateName, cities.id as id from cities, state WHERE replace(cities.name, ' ', '') LIKE '%$key%' and  stateId = state.id and isVillage = 0");

            foreach ($tmp as $itr) {
                $itr->amakenCount = Amaken::where('cityId', $itr->id)->count();
                $itr->mode = "city";
                $itr->kindPlaceId = 0;
                $itr->url = createUrl(0, 0, 0,  $itr->id, 0);
            }
            for($i = 0; $i < count($tmp); $i++){
                for($j = 1; $j < count($tmp); $j++){
                    if($tmp[$i]->amakenCount < $tmp[$j]->amakenCount){
                        $t = $tmp[$i];
                        $tmp[$i] = $tmp[$j];
                        $tmp[$j] = $t;
                    }
                }
            }

            $result = array_merge($result, $tmp);

            $acitivityId = Activity::where('name', 'مشاهده')->first();
            $kinPlace = Place::whereNotNull('tableName')->get();
            foreach ($kinPlace as $kplace){
                if($kindPlaceId == 0 || $kplace->id == $kindPlaceId) {
                    if (!empty($key2))
                        $tmp = DB::select("SELECT tableName.id, tableName.name as targetName, cities.name as cityName, state.name as stateName from " . $kplace->tableName . " as tableName, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(tableName.name, ' ', '') LIKE '%$key%' or replace(tableName.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT tableName.id, tableName.name as targetName, cities.name as cityName, state.name as stateName from " . $kplace->tableName . " as tableName, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(tableName.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $condition = ['activityId' => $acitivityId->id, 'placeId' => $itr->id, 'kindPlaceId' => $kplace->id];
                        $itr->see = LogModel::where($condition)->count();
                        $itr->mode = $kplace->tableName;
                        $itr->kindPlaceId = $kplace->id;
                        $itr->url = createUrl($kplace->id, $itr->id, 0, 0, 0);
                    }
                    $tmp = $this->sortSearchBySee($tmp);
                    $result = array_merge($result, $tmp);
                }
            }

            echo json_encode([$time, $result, $request->num]);
        }
    }

    private function sortSearchBySee($tmp){

        for($i = 0; $i < count($tmp); $i++){
            for($j = 1; $j < count($tmp); $j++){
                if($tmp[$i]->see < $tmp[$j]->see){
                    $t = $tmp[$i];
                    $tmp[$i] = $tmp[$j];
                    $tmp[$j] = $t;
                }
            }
        }

        return $tmp;
    }

    public function findPlace()
    {

        if (isset($_POST["kindPlaceId"]) && isset($_POST["key"])) {
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $key = makeValidInput($_POST["key"]);
            switch ($kindPlaceId) {
                case 1:
                default:
                    echo json_encode(DB::select("select id, name from amaken WHERE name LIKE '%$key%'"));
                    break;
                case 3:
                    echo json_encode(DB::select("select id, name from restaurant WHERE name LIKE '%$key%'"));
                    break;
                case 4:
                    echo json_encode(DB::select("select id, name from hotels WHERE name LIKE '%$key%'"));
                    break;
            }
        }
    }

    public function alaki($tripId)
    {

        require_once __DIR__ . '/../../../vendor/autoload.php';

        $mail = new PHPMailer(true);                            // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output

//            $mail->IsSMTP();
//            $mail->Host = "https://shazdemosafer.com";
//            $mail->SMTPAuth = true;
//
//            $mail->Username = "support@shazdemosafer.com";
//            $mail->Password = " H+usZp5yVToI5xPb6yPDEfD3EwI=";
//            $mail->Port = 25;
//            $mail->SMTPSecure = "ssl";

            //Recipients
            $mail->setFrom('info@shazdemosafer.com', 'Mailer');
//    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            $mail->addAddress('mghaneh1375@yahoo.com');               // Name is optional
            $mail->addReplyTo('mghaneh1375@shazdemosafer.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

            //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

        return "Message has been sent";

        return view('alaki', array('tripId' => $tripId));
    }

    public function getAlertsCount()
    {
        $sum = Alert::where('userId', Auth::user()->id)->where('seen', 0)->count();
        echo $sum;
    }

    public function getAlerts()
    {
        $greenColor = '#4dc7bc26';
        $redColor = '#ffe1e1';
        $result = [];
        $alerts = Alert::where('userId', \auth()->user()->id)->orderByDesc('id')->get();

        foreach ($alerts as $item) {
            $item->time = getDifferenceTimeString($item->created_at);
            if($item->subject == 'deleteReview' || $item->subject == 'deleteAns' || $item->subject == 'deleteQues'){
                $reference = \DB::table($item->referenceTable)->find($item->referenceId);
                if($reference != null) {
                    $kindPlace = Place::where('tableName', $item->referenceTable)->first();
                    $placeId = $reference->id;
                    $place = \DB::table($kindPlace->tableName)->find($placeId);
                    $placeUrl = createUrl($kindPlace->id, $placeId, 0, 0, 0);

                    if($item->subject == 'deleteReview')
                        $refType = 'دیدگاه';
                    else if($item->subject == 'deleteAns')
                        $refType = 'پاسخ';
                    else if($item->subject == 'deleteQues')
                        $refType = 'سوال';

                    $alertText = $refType . ' شما برای ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a>' . ' بدلیل مغایرت با قوانین سایت حذف گردید.';

                    $item->color = $redColor;
                    $item->msg = $alertText;
                    $item->pic = getPlacePic($placeId, $kindPlace->id, 'l');
                    array_push($result, $item);
                }
                else
                    $item->delete();
            }
            else if($item->subject == 'assignedUserToReview'){
                $reference = ReviewUserAssigned::find($item->referenceId);
                if($reference != null){
                    $assigned = $reference;
                    $log = LogModel::find($assigned->logId);
                    if($log != null){
                        $kindPlace = Place::find($log->kindPlaceId);
                        $place = \DB::table($kindPlace->tableName)->find($log->placeId);;
                        $rUser = User::find($log->visitorId);
                        if($kindPlace != null && $place != null && $rUser != null){
                            $placeUrl = createUrl($kindPlace->id, $place->id, 0, 0, 0);
                            $alertText = $rUser->username . ' شما را در پست خود در ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a>' . 'تگ کرده است.';

                            $item->color = $greenColor;
                            $item->msg = $alertText;
                            $item->pic = getPlacePic($place->id, $kindPlace->id, 'l');
                            array_push($result, $item);
                        }
                        else
                            $item->delete();
                    }
                    else
                        $item->delete();
                }
                else
                    $item->delete();
            }
            else if($item->referenceTable == 'log'){
                $reference = LogModel::find($item->referenceId);
                if($reference != null) {
                    $kindPlaceId = $reference->kindPlaceId;
                    $placeId = $reference->placeId;
                    $kindPlace = Place::find($kindPlaceId);
                    $place = \DB::table($kindPlace->tableName)->find($placeId);
                    $placeUrl = createUrl($kindPlaceId, $placeId, 0, 0, 0);

                    if ($item->subject == 'addReview' || $item->subject == 'addQuestion' || $item->subject == 'addAns'){
                        if($item->subject == 'addReview')
                            $refName = 'دیدگاه';
                        else if($item->subject == 'addQuestion')
                            $refName = 'سوال';
                        else if($item->subject == 'addAns')
                            $refName = 'پاسخ';

                        $alertText = $refName . ' شما با موفقیت برای ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a>' . 'ثبت گردید.';
                        $item->color = $greenColor;
                    }
                    else if ($item->subject == 'deleteReviewPic') {
                        $alertText = 'عکسی از دیدگاه شما برای ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a>' . 'به دلیل مغایرت با قوانین سایت حذف گردید.';
                        $item->color = $redColor;
                    }
                    else if ($item->subject == 'deleteReviewVideo') {
                        $alertText = 'ویدیویی از دیدگاه شما برای ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a>' . 'به دلیل مغایرت با قوانین سایت حذف گردید.';
                        $item->color = $redColor;
                    }
                    else if ($item->subject == 'addReport') {
                        $alertText = 'گزارش شما برای پستی در ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a>' . ' با موفقیت ثبت شد.';
                        $item->color = $greenColor;
                    }
                    else if ($item->subject == 'confirmReport') {
                        $alertText = 'گزارش شما برای پستی در ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a>' . ' در حال بررسی می باشد. با تشکر از همکاری شما.';
                        $item->color = $greenColor;
                    }
                    else if($item->subject == 'ansAns'){
                        $uRef = User::find($reference->visitorId);
                        $reviewActivity = Activity::where('name', 'نظر')->first();
                        $ansActivity = Activity::where('name', 'پاسخ')->first();
                        $quesActivity = Activity::where('name', 'سوال')->first();
                        $releatedLog = LogModel::find($reference->relatedTo);

                        if($releatedLog->activityId == $reviewActivity->id)
                            $alertText = $uRef->username . ' برای دیدگاه شما در ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a> نظر نوشت.';
                        if($releatedLog->activityId == $quesActivity->id)
                            $alertText = $uRef->username . ' برای سوال شما در ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a> پاسخ نوشت.';
                        else if($releatedLog->activityId == $ansActivity->id){

                            $notAns = LogModel::find($releatedLog->relatedTo);
                            while(true){
                                if($notAns->activityId != $ansActivity->id)
                                    break;
                                $notAns = LogModel::find($notAns->relatedTo);
                            }

                            if($notAns->activityId == $reviewActivity->id) {
                                $refRefKind = ' دیدگاه ';
                                $refKind = 'نظر' ;
                            }
                            else if($notAns->activityId == $quesActivity->id) {
                                $refRefKind = ' سوال ';
                                $refKind = 'پاسخ' ;
                            }

                            $refrefUser = User::find($notAns->visitorId);

                            $alertText = $uRef->username . ' برای ' . $refKind . ' شما در ' . $refRefKind . $refrefUser->username . ' در '. '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a> .پاسخ نوشت.';
                        }

                        $item->color = $greenColor;
                    }

                    if(isset($alertText)) {
                        $item->msg = $alertText;
                        $item->pic = getPlacePic($placeId, $kindPlaceId, 'l');

                        array_push($result, $item);
                    }
                }
                else
                    $item->delete();
            }
            else if($item->referenceTable == 'logFeedBack'){
                $reference = LogFeedBack::find($item->referenceId);
                if($reference != null){
                    $referenceLog = LogModel::find($reference->logId);
                    if($referenceLog != null){

                        $kindPlaceId = $referenceLog->kindPlaceId;
                        $placeId = $referenceLog->placeId;
                        $kindPlace = Place::find($kindPlaceId);
                        $place = \DB::table($kindPlace->tableName)->find($placeId);
                        $placeUrl = createUrl($kindPlaceId, $placeId, 0, 0, 0);

                        if ($item->subject == 'likeReview' || $item->subject == 'dislikeReview') {
                            $uRef = User::find($reference->userId);
                            $alertText = $uRef->username . ' دیدگاه شما را در ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a>';
                            if(strpos($item->subject, 'dislike') !== false)
                                $alertText .= ' نپسندید.';
                            else
                                $alertText .= ' پسندید.';

                            $item->color = $greenColor;
                        }
                        else if ($item->subject == 'likeAns' || $item->subject == 'dislikeAns') {
                            $uRef = User::find($reference->userId);
                            $reviewActivity = Activity::where('name', 'نظر')->first();
                            $ansActivity = Activity::where('name', 'پاسخ')->first();
                            $quesActivity = Activity::where('name', 'سوال')->first();
                            $releatedLog = LogModel::find($reference->logId);

                            if ($releatedLog->activityId == $reviewActivity->id)
                                $alertText = $uRef->username . ' دیدگاه شما را در ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a> ';
                            if ($releatedLog->activityId == $quesActivity->id)
                                $alertText = $uRef->username . ' سوال شما را در ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a> ';
                            else if ($releatedLog->activityId == $ansActivity->id) {
                                $notAns = LogModel::find($releatedLog->relatedTo);
                                while (true) {
                                    if ($notAns->activityId != $ansActivity->id)
                                        break;
                                    $notAns = LogModel::find($notAns->relatedTo);
                                }

                                if ($notAns->activityId == $reviewActivity->id) {
                                    $refRefKind = ' دیدگاه ';
                                    $refKind = 'نظر';
                                } else if ($notAns->activityId == $quesActivity->id) {
                                    $refRefKind = ' سوال ';
                                    $refKind = 'پاسخ';
                                }

                                $refrefUser = User::find($notAns->visitorId);

                                $alertText = $uRef->username  . $refKind . ' شما را در ' . $refRefKind . $refrefUser->username . ' در ' . '<a href="' . $placeUrl . '" class="alertUrl">' . $place->name . '</a> ';
                            }
                            if (strpos($item->subject, 'dislike') !== false)
                                $alertText .= ' نپسندید.';
                            else
                                $alertText .= ' پسندید.';
                            $item->color = $greenColor;
                        }

                        if(isset($alertText)) {
                            $item->msg = $alertText;
                            $item->pic = getPlacePic($placeId, $kindPlaceId, 'l');

                            array_push($result, $item);
                        }
                    }
                    else
                        $item->delete();
                }
                else
                    $item->delete();
            }

            if(count($result) == 5)
                break;
        }

        echo \GuzzleHttp\json_encode($result);
        return;

    }

    public function seenAlerts(Request $request)
    {
        if(isset($request->id) && isset($request->kind)){
            if($request->kind == 'seen'){
                Alert::where('userId', \auth()->user()->id)->where('seen', 0)->update(['seen' => 1]);
                echo json_encode(['status' => 'ok']);
            }
            else{
                Alert::find($request->id)->update(['click' => 1]);
//                dd(Alert::find($request->id));
                echo json_encode(['status' => 'ok']);
            }
        }
        else
            echo json_encode(['status' => 'nok']);

        return;
    }



    public function getHotelDetailsApi()
    {
        $access_token = $this->getAccessTokenHotel();
        $city = $this->getCityCodeApi($access_token);

        for($i = 0; $i < count($city); $i++){
            $this->getHotelCity($city[$i]->id, $access_token, $city[$i]->persinaTitle);
        }

        dd("end");
    }
    private function getAccessTokenHotel()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.altrabo.com/api/v1/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "username=testapi&password=%40ltrab0Test&client_id=00000&grant_type=password&undefined=",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded",
                "Postman-Token: 30f7d799-43cc-4f98-bc59-74e794acb868",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $access_token_save = saveApiInfo::whereName('access_token_ali_baba')->first();
        if($access_token_save == null){
            $newSave = new saveApiInfo();
            $newSave->name = 'access_token_ali_baba';
            $newSave->array = $response;

            $newSave->save();
        }

        if ($err) {
            dd('err  = ' . $err);
        } else {
            $access_token = json_decode($response)->access_token;
        }
        return $access_token;
    }
    private function getCityCodeApi($access_token)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.altrabo.com/api/v1/HotelAvailable/AutoComplete?isDomestic=true&query=",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "Postman-Token: 226a3dda-b179-4c96-8bee-38bb92be81c9",
                "X-ZUMO-AUTH:" . $access_token,
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $response = json_decode($response);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $city = $response->data;
        }

        return $city;
    }
    private function getHotelCity($city_id, $access_token, $city_name){

        $nowDate = date("Y-m-d");
        $tomorrowDate = date("Y-m-d", strtotime("tomorrow"));
        $hotel_input = array('CheckIn' => $nowDate,
            'CheckOut' => $tomorrowDate,
            'CityIdOrHotelId' => $city_id,
            'Nationality' => 'IR',
            'IsDomestic' => 'true'
        );
        $hotel_input = json_encode($hotel_input);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.altrabo.com/api/v1/HotelAvailable/Get",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $hotel_input,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Postman-Token: ef3adb7f-0566-4267-b6ba-9ed839d7e91f",
                "X-ZUMO-AUTH:" . $access_token,
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $response = json_decode($response)->data;

        for($i = 0; $i < count($response); $i++){

            $hotel = HotelApi::whereUserName($response[$i]->userName)->first();
            if($hotel == null){
                $newHotel = new HotelApi;
                $newHotel->name = $response[$i]->hotelName;
                $newHotel->rph = $response[$i]->rph;
                $newHotel->userName = $response[$i]->userName;
                $newHotel->facility = $response[$i]->hotelFacility;
                $newHotel->cityName = $city_name;
                $newHotel->money = $response[$i]->startPrice;

                $newHotel->save();
            }
            else{
                $hotel->money = $response[$i]->startPrice;
                $hotel->save();
            }
        }

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return true;
        }
    }
    private function getHotelInfo($hotelName, $access_token){

        $hotel_input = array('CheckIn' => '2019-02-18',
            'CheckOut' => '2019-02-20',
            'CityIdOrHotelId' => $hotelName,
            'Nationality' => 'IR',
            'Type' => 1,
            'Categorykey' => 'hotel',
            'IsDomestic' => true
        );

        $hotel_input = json_encode($hotel_input);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.altrabo.com/api/v1/HotelAvailable/GetInfo",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $hotel_input,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Postman-Token: 3f4ae4f0-7cf6-4a3a-a29c-598cf2d7f8ee",
                "X-ZUMO-AUTH:" . $access_token,
                "cache-control: no-cache"
            ),
        ));


        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response)->data[0]->policy;
        }
    }

    public function emailtest($email)
    {
        $header = 'فراموشی رمز عبور';
        $userName = 'koochita';
        $link = 'https://kiavashzp.ir/newPass?code=dljfdlsfjlkd';
        $view = \View::make('emails.forgetPass', compact(['header', 'userName', 'link']));
        $html = $view->render();
        echo $html;
//        sendEmail($html, $header, $email);
//        dd('send to ' . $email);
    }

    private function getCityReviews($kind, $id, $take, $notIn = []){

        $reviewActivity = Activity::whereName('نظر')->first();

        if($kind == 'city') {
            $allAmaken = Amaken::where('cityId', $id)->pluck('id')->toArray();
            $allMajara = Majara::where('cityId', $id)->pluck('id')->toArray();
            $allHotels = Hotel::where('cityId', $id)->pluck('id')->toArray();
            $allRestaurant = Restaurant::where('cityId', $id)->pluck('id')->toArray();
            $allMahaliFood = MahaliFood::where('cityId', $id)->pluck('id')->toArray();
            $allSogatSanaie = SogatSanaie::where('cityId', $id)->pluck('id')->toArray();
            $allBoomgardy = Boomgardy::where('cityId', $id)->pluck('id')->toArray();
        }
        else if($kind == 'state'){
            $allCities = Cities::where('stateId', $id)->where('isVillage', 0)->pluck('id')->toArray();

            $allAmaken = Amaken::whereIn('cityId', $allCities)->pluck('id')->toArray();
            $allMajara = Majara::whereIn('cityId', $allCities)->pluck('id')->toArray();
            $allHotels = Hotel::whereIn('cityId', $allCities)->pluck('id')->toArray();
            $allRestaurant = Restaurant::whereIn('cityId', $allCities)->pluck('id')->toArray();
            $allMahaliFood = MahaliFood::whereIn('cityId', $allCities)->pluck('id')->toArray();
            $allSogatSanaie = SogatSanaie::whereIn('cityId', $allCities)->pluck('id')->toArray();
            $allBoomgardy = Boomgardy::whereIn('cityId', $allCities)->pluck('id')->toArray();
        }
        else{
            if(count($notIn) == 0)
                $lastReview = DB::select('SELECT * FROM log WHERE activityId = ' . $reviewActivity->id . ' AND confirm = 1 ORDER BY `date` DESC LIMIT ' . $take);
            else
                $lastReview = DB::select('SELECT * FROM log WHERE activityId = ' . $reviewActivity->id . ' AND confirm = 1 AND id NOT IN (' . implode(",", $notIn) . ') ORDER BY `date` DESC LIMIT ' . $take);

            return $lastReview;
        }


        $sqlQuery = '';
        if(count($allAmaken) != 0)
            $sqlQuery .= '( kindPlaceId = 1 AND placeId IN (' . implode(",", $allAmaken) . ') )';
        if(count($allRestaurant) != 0){
            if($sqlQuery != '')
                $sqlQuery .= ' OR ';
            $sqlQuery .= '( kindPlaceId = 3 AND placeId IN (' . implode(",", $allRestaurant) . ') )';
        }
        if(count($allHotels) != 0){
            if($sqlQuery != '')
                $sqlQuery .= ' OR ';
            $sqlQuery .= '( kindPlaceId = 4 AND placeId IN (' . implode(",", $allHotels) . ') )';
        }
        if(count($allMajara) != 0){
            if($sqlQuery != '')
                $sqlQuery .= ' OR ';
            $sqlQuery .= '( kindPlaceId = 6 AND placeId IN (' . implode(",", $allMajara) . ') )';
        }
        if(count($allSogatSanaie) != 0){
            if($sqlQuery != '')
                $sqlQuery .= ' OR ';
            $sqlQuery .= '( kindPlaceId = 10 AND placeId IN (' . implode(",", $allSogatSanaie) . ') )';
        }
        if(count($allMahaliFood) != 0){
            if($sqlQuery != '')
                $sqlQuery .= ' OR ';
            $sqlQuery .= '( kindPlaceId = 11 AND placeId IN (' . implode(",", $allMahaliFood) . ') )';
        }
        if(count($allBoomgardy) != 0){
            if($sqlQuery != '')
                $sqlQuery .= ' OR ';
            $sqlQuery .= '( kindPlaceId = 12 AND placeId IN (' . implode(",", $allBoomgardy) . ') )';
        }

        $lastReview = [];

        if($sqlQuery != '') {
            if (count($notIn) == 0)
                $lastReview = DB::select('SELECT * FROM log WHERE activityId = ' . $reviewActivity->id . ' AND confirm = 1 AND (' . $sqlQuery . ') ORDER BY `date` DESC LIMIT ' . $take);
            else
                $lastReview = DB::select('SELECT * FROM log WHERE activityId = ' . $reviewActivity->id . ' AND confirm = 1 AND (' . $sqlQuery . ') AND id NOT IN (' . implode(",", $notIn) . ') ORDER BY `date` DESC LIMIT ' . $take);
        }

        return $lastReview;
    }

    private function getTopPlaces($kindPlaceId, $kind, $cityId){
        $kindPlace = Place::find($kindPlaceId);
        $seenActivity = Activity::whereName('مشاهده')->first()->id;
        $activityId = Activity::whereName('نظر')->first()->id;
        $ansActivityId = Activity::whereName('پاسخ')->first()->id;
        $quesActivityId = Activity::whereName('سوال')->first()->id;

        $lastMonthDate = Carbon::now()->subMonth()->format('Y-m-d');

        $placeId = [];
        $places = [];

        $cId = [];
        if($kind == 'city')
            $cId[0] = $cityId;
        else
            $cId = Cities::where('stateId', $cityId)->where('isVillage',0)->pluck('id')->toArray();

        $allPlace = DB::table($kindPlace->tableName)->whereIn('cityId', $cId)->pluck('id')->toArray();

        if(count($allPlace) != 0){
            $commonQuery = 'log.kindPlaceId = ' .$kindPlaceId. ' AND log.placeId IN (' . implode(",", $allPlace) . ') AND log.date > ' .$lastMonthDate. ' GROUP BY log.placeId';

            $mostSeen = DB::select('SELECT log.placeId as placeId, COUNT(log.id) as `count` FROM log WHERE log.activityId = ' . $seenActivity . ' AND ' .$commonQuery. ' ORDER BY `count` DESC LIMIT 2');
            foreach ($mostSeen as $item)
                array_push($placeId, $item->placeId);
            if(count($placeId) == 0)
                $placeIdQuery = '0';
            else
                $placeIdQuery = implode(",", $placeId);

            $questionRate = Question::where('ansType', 'rate')->pluck('id')->toArray();
            $mostRate = DB::select('SELECT log.placeId as placeId, AVG(qua.ans) as rate FROM log INNER JOIN questionUserAns AS qua ON  qua.questionId IN (' . implode(",", $questionRate) . ') AND qua.logId = log.id AND log.placeId NOT IN (' . $placeIdQuery . ') AND ' . $commonQuery . ' ORDER BY rate DESC LIMIT 2');
            foreach ($mostRate as $item)
                array_push($placeId, $item->placeId);
            if(count($placeId) == 0)
                $placeIdQuery = '0';
            else
                $placeIdQuery = implode(",", $placeId);


            $mostComment = DB::select('SELECT log.placeId as placeId, COUNT(log.id) as `count` FROM log WHERE (log.activityId = '. $activityId . ' OR log.activityId = ' . $ansActivityId . ' OR log.activityId = ' . $quesActivityId . ') AND log.placeId NOT IN (' . $placeIdQuery . ') AND ' . $commonQuery . ' ORDER BY `count` DESC LIMIT 2');
            foreach ($mostComment as $item)
                array_push($placeId, $item->placeId);
            if(count($placeId) == 0)
                $placeIdQuery = '0';
            else
                $placeIdQuery = implode(",", $placeId);

            $less = 8 - count($placeId);
            $randomPlace = DB::table($kindPlace->tableName)->whereNotIn('id', $placeId)->whereIn('cityId', $cId)->inRandomOrder()->take($less)->pluck('id')->toArray();
            foreach ($randomPlace as $item)
                array_push($placeId, $item);

            $places = DB::table($kindPlace->tableName)->whereIn('id', $placeId)->select(['id', 'cityId','name', 'file', 'picNumber', 'keyword'])->get();
            foreach ($places as $item){

                $item->pic = getPlacePic($item->id, $kindPlace->id);
                $item->url = createUrl($kindPlace->id, $item->id, 0, 0);
                $item->rate = getRate($item->id, $kindPlace->id)[1];
                $item->cityV = Cities::find($item->cityId);
                $item->city =  $item->cityV->name;
                $item->state = State::find($item->cityV->stateId)->name;

                $condition = ['activityId' => $activityId, 'placeId' => $item->id, 'kindPlaceId' => $kindPlace->id, 'confirm' => 1, 'relatedTo' => 0];
                $item->review = LogModel::where($condition)->count();
            }
        }
        return $places;
    }


    public function exportExcel()
    {
//        $serverName = "localhost";
//        $username = "root";
//        $password = '';
//        $dbName = "admin_shazde";
//
//        $conn = mysqli_connect($serverName, $username, $password);
//
//        $conn->set_charset("utf8");
//        mysqli_select_db($conn, $dbName) or die("Connection failed: ");
//
//        $dbLink = $conn;
//        $start = 0;
//        $end = 50;

        $alpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        $cols = [];
        for($i = 0; $i < count($alpha); $i++){
            if($i == 0){
                $cols = $alpha;
            }
            for($j = 0; $j < count($alpha); $j++)
                array_push($cols, $alpha[$i].''.$alpha[$j]);
        }
        $rowNum = 1;
        $places = Amaken::all()->toArray();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        for ($i = 0; $i < count($places); $i++){
            if($i == 0){
                $j = 0;
                foreach ($places[$i] as $key => $value){
                    $cell = $cols[$j].(string)$rowNum;
                    $sheet->setCellValue($cell, $key);
                    $j++;
                }
                $rowNum++;
            }
            $j = 0;
            foreach ($places[$i] as $key => $value){
                $cell = $cols[$j].(string)$rowNum;
                $sheet->setCellValue($cell, $value);
                $j++;
            }
            $rowNum++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('exportAmaken.xlsx');

        dd('finniish');
    }
}