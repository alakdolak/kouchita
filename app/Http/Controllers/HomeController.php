<?php

namespace App\Http\Controllers;

use App\models\ActivationCode;
use App\models\Activity;
use App\models\Adab;
use App\models\AirLine;
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
use function Sodium\crypto_box_publickey_from_secretkey;


class HomeController extends Controller
{
    public function setPlaceDetailsURL($kindPlaceId, $placeId)
    {
        $kindPlace = Place::find($kindPlaceId);
        if($kindPlaceId == null)
            return \redirect(\url('/'));
        else
            $place = DB::table($kindPlace->tableName)->select(['id', 'name'])->find($placeId);

        if($place == null)
            return \redirect(\url('/'));

        return \redirect(url('show-place-details/' . $kindPlace->fileName . '/' . $place->id));
    }

    public function mainSliderStore(Request $request)
    {
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

                        if (file_exists($location . '/' . $slider->pic))
                            unlink($location . '/' . $slider->pic);

                        $fileName =  time() . $_FILES['pic']['name'];
                        $destinationPic = $location . '/' . $fileName;
                        move_uploaded_file( $_FILES['pic']['tmp_name'], $destinationPic);
                        $slider->pic = $fileName;
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
            $allAmaken = Amaken::where('cityId', $place->id)->get();
            $allMajara = Majara::where('cityId', $place->id)->get();
            $allHotels = Hotel::where('cityId', $place->id)->get();
            $allRestaurant = Restaurant::where('cityId', $place->id)->get();
            $allMahaliFood = MahaliFood::where('cityId', $place->id)->get();
            $allSogatSanaie = SogatSanaie::where('cityId', $place->id)->get();
            $allBoomgardy = Boomgardy::where('cityId', $place->id)->get();

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

            $topAmaken = $this->getTopPlaces(1, 'city', $place->id);
            $topRestaurant = $this->getTopPlaces(3, 'city', $place->id);
            $topHotel = $this->getTopPlaces(4, 'city', $place->id);
            $topMajra = $this->getTopPlaces(6, 'city', $place->id);
            $topSogatSanaies = $this->getTopPlaces(10, 'city', $place->id);
            $topMahaliFood = $this->getTopPlaces(11, 'city', $place->id);
        }
        else {
            $place->listName = $place->name;
            $place->name = 'استان ' . $place->name;
            $articleUrl = \url('/article/list/state/' . $place->listName);
            $locationName = ["name" => $place->name, 'cityName' => $place->name, 'cityNameUrl' => $place->listName, 'articleUrl' => $articleUrl, 'kindState' => 'state', 'state' => $place->name];

            $allCities = Cities::where('stateId', $place->id)->where('isVillage',0)->pluck('id')->toArray();

            $allAmakenId = Amaken::whereIn('cityId', $allCities)->pluck('id')->toArray();
            $allAmaken = Amaken::whereIn('cityId', $allCities)->get();
            $allMajara = Majara::whereIn('cityId', $allCities)->get();
            $allHotels = Hotel::whereIn('cityId', $allCities)->get();
            $allRestaurant = Restaurant::whereIn('cityId', $allCities)->get();
            $allMahaliFood = MahaliFood::whereIn('cityId', $allCities)->get();
            $allSogatSanaie = SogatSanaie::whereIn('cityId', $allCities)->get();
            $allBoomgardy = Boomgardy::whereIn('cityId', $allCities)->get();

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

            $topAmaken = $this->getTopPlaces(1, 'state', $place->id);
            $topRestaurant = $this->getTopPlaces(3, 'state', $place->id);
            $topHotel = $this->getTopPlaces(4, 'state', $place->id);
            $topMajra = $this->getTopPlaces(6, 'state', $place->id);
            $topSogatSanaies = $this->getTopPlaces(10, 'state', $place->id);
            $topMahaliFood = $this->getTopPlaces(11, 'state', $place->id);
        }

        $topPlaces = ['amaken' => $topAmaken, 'restaurant' => $topRestaurant, 'hotels' => $topHotel, 'majara' => $topMajra, 'sogatSanaie' => $topSogatSanaies, 'mahaliFood' => $topMahaliFood];
        $allPlaces = [$allAmaken, $allHotels, $allRestaurant, $allMajara];

        $take = 15;
        $reviews = $this->getCityReviews($kind, $place->id, $take);
        if(count($reviews) != $take){
            $lessReview = [];
            $notIn = [];
            foreach ($reviews as $item)
                array_push($notIn, $item->id);

            if($kind == 'city'){
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

        foreach ($reviews as $item) {
            $item->like = LogFeedBack::where('logId', $item->id)->where('like', 1)->count();
            $item->disLike = LogFeedBack::where('logId', $item->id)->where('like', -1)->count();
            $item->comments = getAnsToComments($item->id)[1];

            $item->user = User::select(['first_name', 'last_name', 'username', 'picture', 'uploadPhoto'])->find($item->visitorId);

            if($item->user->uploadPhoto == 0){
                $deffPic = DefaultPic::find($item->user->picture);
                if($deffPic != null)
                    $item->userPic = URL::asset('defaultPic/' . $deffPic->name);
                else
                    $item->userPic = URL::asset('_images/nopic/blank.jpg');
            }
            else
                $item->userPic = URL::asset('userProfile/' . $item->user->picture);

            $kindPlace = Place::find($item->kindPlaceId);
            $item->mainFile = $kindPlace->fileName;
            $item->place = DB::table($kindPlace->tableName)->select(['id', 'name', 'cityId', 'file'])->find($item->placeId);
            $item->kindPlace = $kindPlace->name;
            $item->url = createUrl($kindPlace->id, $item->place->id, 0, 0);

            $item->pics = ReviewPic::where('logId', $item->id)->get();
            $item = getReviewPicsURL($item);

            $item->city = Cities::find($item->place->cityId);
            $item->state = State::find($item->city->stateId);


            $time = $item->date . '';
            if(strlen($item->time) == 1)
                $item->time = '000' . $item->time;
            else if(strlen($item->time) == 2)
                $item->time = '00' . $item->time;
            else if(strlen($item->time) == 3)
                $item->time = '0' . $item->time;

            if(strlen($item->time) == 4) {
                $time .= ' ' . substr($item->time, 0, 2) . ':' . substr($item->time, 2, 2);
                $item->timeAgo = getDifferenceTimeString($time);
            }
            else
                $item->timeAgo = '';

            if(strlen($item->text) > 80)
                $item->summery = mb_substr($item->text, 0, 80, 'utf-8');

        }

        $count = 0;
        $C = 0;
        $D = 0;
        $minLat = 0;
        $minLng = 0;
        $maxLat = 0;
        $maxLng = 0;
        foreach ($allPlaces as $key => $plac){
            switch ($key){
                case 0:
                    $kP = 1;
                    break;
                case 1:
                    $kP = 4;
                    break;
                case 2:
                    $kP = 3;
                    break;
                case 3:
                    $kP = 6;
                    break;

            }
            foreach ($plac as $item){
                $item->url = route('placeDetails', ['kindPlaceId' => $kP, 'placeId' => $item->id]);

                $C += (float)$item->C;
                $D += (float)$item->D;
                if($minLat == 0 || $item->C < $minLat)
                    $minLat = (float)$item->C;

                if($maxLat == 0 || $item->C > $maxLat)
                    $maxLat = (float)$item->C;

                if($minLng == 0 || $item->D < $minLng)
                    $minLng = (float)$item->D;

                if($maxLng == 0 || $item->D > $maxLng)
                    $maxLng = (float)$item->D;
            }
            $count += count($plac);
        }
        if($count > 0) {
            $C /= $count;
            $D /= $count;
        }
        $map = ['C' => $C, 'D' => $D, 'maxLat' => $maxLat, 'maxLng' => $maxLng, 'minLng' => $minLng, 'minLat' => $minLat];

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
            $localStorageData = ['kind' => 'state', 'name' => $place->name , 'city' => '', 'state' => '', 'mainPic' => $place->image, 'redirect' => $mainWebSiteUrl];
        else
            $localStorageData = ['kind' => 'city', 'name' => $place->name , 'city' => '', 'state' => $place->state, 'mainPic' => $place->image, 'redirect' => $mainWebSiteUrl];

//        dd($locationName);
        return view('cityPage', compact(['place', 'kind', 'localStorageData', 'locationName', 'post', 'map', 'allPlaces', 'allAmaken', 'allHotels', 'allRestaurant', 'allMajara', 'allMahaliFood', 'allSogatSanaie', 'allBoomgardy', 'reviews', 'topPlaces']));
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
        return view('policies');
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

    public function totalSearch()
    {

        if (isset($_POST["key"]) && isset($_POST["kindPlaceId"])) {
            $time = time();
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);

            $key = makeValidInput($_POST["key"]);
            $key = str_replace(' ', '', $key);
            $key2 = (isset($_POST["key2"]) ? makeValidInput($_POST["key2"]) : '');
            $key2 = str_replace(' ', '', $key2);

            if (!empty($key2))
                $result = DB::select("SELECT name as targetName, id from state WHERE replace(name, ' ', '') LIKE '%$key%' or replace(name, ' ', '') LIKE '%$key2%'");
            else
                $result = DB::select("SELECT name as targetName, id from state WHERE replace(name, ' ', '') LIKE '%$key%'");

            foreach ($result as $itr) {
                $itr->mode = "state";
                $itr->url = createUrl(0, 0, $itr->id, 0, 0);
            }

            if (!empty($key2))
                $tmp = DB::select("SELECT cities.name as targetName, state.name as stateName, cities.id as id from cities, state WHERE (replace(cities.name, ' ', '') LIKE '%$key%' or replace(cities.name, ' ', '') LIKE '%$key2%') and stateId = state.id and isVillage = 0");
            else
                $tmp = DB::select("SELECT cities.name as targetName, state.name as stateName, cities.id as id from cities, state WHERE replace(cities.name, ' ', '') LIKE '%$key%' and  stateId = state.id and isVillage = 0");

            foreach ($tmp as $itr) {
                $itr->amakenCount = Amaken::where('cityId', $itr->id)->count();
                $itr->mode = "city";
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

            switch ($kindPlaceId) {
                case 1:
                    if (!empty($key2))
                        $tmp = DB::select("SELECT amaken.id, amaken.name as targetName, cities.name as cityName, state.name as stateName from amaken, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(amaken.name, ' ', '') LIKE '%$key%' or replace(amaken.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT amaken.id, amaken.name as targetName, cities.name as cityName, state.name as stateName from amaken, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(amaken.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $itr->mode = "amaken";
                        $itr->url = createUrl($kindPlaceId, $itr->id, 0,  0, 0);
                    }
                    $result = array();
                    break;
                case 3:
                    if (!empty($key2))
                        $tmp = DB::select("SELECT restaurant.id, restaurant.name as targetName, cities.name as cityName, state.name as stateName from restaurant, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(restaurant.name, ' ', '') LIKE '%$key%' or replace(restaurant.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT restaurant.id, restaurant.name as targetName, cities.name as cityName, state.name as stateName from restaurant, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(restaurant.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $itr->mode = "restaurant";
                        $itr->url = createUrl($kindPlaceId, $itr->id, 0,  0, 0);
                    }
                    $result = array();
                    break;
                case 4:
                    if (!empty($key2))
                        $tmp = DB::select("SELECT hotels.id, hotels.name as targetName, cities.name as cityName, state.name as stateName from hotels, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(hotels.name, ' ', '') LIKE '%$key%' or replace(hotels.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT hotels.id, hotels.name as targetName, cities.name as cityName, state.name as stateName from hotels, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(hotels.name, ' ', '') LIKE '%$key%'");

                    foreach ($tmp as $itr) {
                        $itr->mode = "hotel";
                        $itr->url = createUrl($kindPlaceId, $itr->id, 0,  0, 0);
                    }
                    $result = array();
                    break;
                case 6:
                    if (!empty($key2))
                        $tmp = DB::select("SELECT majara.id, majara.name as targetName, cities.name as cityName, state.name as stateName from majara, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(majara.name, ' ', '') LIKE '%$key%' or replace(majara.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT majara.id, majara.name as targetName, cities.name as cityName, state.name as stateName from majara, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(majara.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $itr->mode = "majara";
                        $itr->url = createUrl($kindPlaceId, $itr->id, 0,  0, 0);
                    }
                    $result = array();
                    break;
                case 10:
                    if (!empty($key2))
                        $tmp = DB::select("SELECT sogatSanaies.id, sogatSanaies.name as targetName, cities.name as cityName, state.name as stateName from sogatSanaies, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(sogatSanaies.name, ' ', '') LIKE '%$key%' or replace(sogatSanaies.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT sogatSanaies.id, sogatSanaies.name as targetName, cities.name as cityName, state.name as stateName from sogatSanaies, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(sogatSanaies.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $itr->mode = "sogatSanaies";
                        $itr->url = createUrl($kindPlaceId, $itr->id, 0,  0, 0);
                    }
                    $result = array();
                    break;
                case 11:
                    if (!empty($key2))
                        $tmp = DB::select("SELECT mahaliFood.id, mahaliFood.name as targetName, cities.name as cityName, state.name as stateName from mahaliFood, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(mahaliFood.name, ' ', '') LIKE '%$key%' or replace(mahaliFood.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT mahaliFood.id, mahaliFood.name as targetName, cities.name as cityName, state.name as stateName from mahaliFood, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(mahaliFood.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $itr->mode = "mahaliFood";
                        $itr->url = createUrl($kindPlaceId, $itr->id, 0,  0, 0);
                    }
                    $result = array();
                    break;
                case 0:
                default:
                    $acitivityId = Activity::where('name', 'مشاهده')->first();
                    if (!empty($key2))
                        $tmp = DB::select("SELECT amaken.id, amaken.name as targetName, cities.name as cityName, state.name as stateName from amaken, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(amaken.name, ' ', '') LIKE '%$key%' or replace(amaken.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT amaken.id, amaken.name as targetName, cities.name as cityName, state.name as stateName from amaken, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(amaken.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $condition = ['activityId' => $acitivityId->id, 'placeId' => $itr->id, 'kindPlaceId' => 1];
                        $itr->see = LogModel::where($condition)->count();
                        $itr->mode = "amaken";
                        $itr->url = createUrl(1, $itr->id, 0,  0, 0);
                    }
                    $tmp = $this->sortSearchBySee($tmp);
                    $result = array_merge($result, $tmp);

                    if (!empty($key2))
                        $tmp = DB::select("SELECT restaurant.id, restaurant.name as targetName, cities.name as cityName, state.name as stateName from restaurant, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(restaurant.name, ' ', '') LIKE '%$key%' or replace(restaurant.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT restaurant.id, restaurant.name as targetName, cities.name as cityName, state.name as stateName from restaurant, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(restaurant.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $condition = ['activityId' => $acitivityId->id, 'placeId' => $itr->id, 'kindPlaceId' => 3];
                        $itr->see = LogModel::where($condition)->count();
                        $itr->mode = "restaurant";
                        $itr->url = createUrl(3, $itr->id, 0,  0, 0);
                    }
                    $tmp = $this->sortSearchBySee($tmp);
                    $result = array_merge($result, $tmp);

                    if (!empty($key2))
                        $tmp = DB::select("SELECT hotels.id, hotels.name as targetName, cities.name as cityName, state.name as stateName from hotels, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(hotels.name, ' ', '') LIKE '%$key%' or replace(hotels.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT hotels.id, hotels.name as targetName, cities.name as cityName, state.name as stateName from hotels, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(hotels.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $condition = ['activityId' => $acitivityId->id, 'placeId' => $itr->id, 'kindPlaceId' => 4];
                        $itr->see = LogModel::where($condition)->count();
                        $itr->mode = "hotel";
                        $itr->url = createUrl(4, $itr->id, 0,  0, 0);
                    }
                    $tmp = $this->sortSearchBySee($tmp);
                    $result = array_merge($result, $tmp);

                    if (!empty($key2))
                        $tmp = DB::select("SELECT majara.id, majara.name as targetName, cities.name as cityName, state.name as stateName from majara, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(majara.name, ' ', '') LIKE '%$key%' or replace(majara.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT majara.id, majara.name as targetName, cities.name as cityName, state.name as stateName from majara, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(majara.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $condition = ['activityId' => $acitivityId->id, 'placeId' => $itr->id, 'kindPlaceId' => 6];
                        $itr->see = LogModel::where($condition)->count();
                        $itr->mode = "majara";
                        $itr->url = createUrl(6, $itr->id, 0,  0, 0);
                    }
                    $tmp = $this->sortSearchBySee($tmp);
                    $result = array_merge($result, $tmp);

                    if (!empty($key2))
                        $tmp = DB::select("SELECT sogatSanaies.id, sogatSanaies.name as targetName, cities.name as cityName, state.name as stateName from sogatSanaies, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(sogatSanaies.name, ' ', '') LIKE '%$key%' or replace(sogatSanaies.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT sogatSanaies.id, sogatSanaies.name as targetName, cities.name as cityName, state.name as stateName from sogatSanaies, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(sogatSanaies.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $condition = ['activityId' => $acitivityId->id, 'placeId' => $itr->id, 'kindPlaceId' => 10];
                        $itr->see = LogModel::where($condition)->count();
                        $itr->mode = "sogatSanaies";
                        $itr->url = createUrl(10, $itr->id, 0,  0, 0);
                    }
                    $tmp = $this->sortSearchBySee($tmp);
                    $result = array_merge($result, $tmp);

                    if (!empty($key2))
                        $tmp = DB::select("SELECT mahaliFood.id, mahaliFood.name as targetName, cities.name as cityName, state.name as stateName from mahaliFood, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(mahaliFood.name, ' ', '') LIKE '%$key%' or replace(mahaliFood.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT mahaliFood.id, mahaliFood.name as targetName, cities.name as cityName, state.name as stateName from mahaliFood, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(mahaliFood.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $condition = ['activityId' => $acitivityId->id, 'placeId' => $itr->id, 'kindPlaceId' => 11];
                        $itr->see = LogModel::where($condition)->count();
                        $itr->mode = "mahaliFood";
                        $itr->url = createUrl(11, $itr->id, 0,  0, 0);
                    }
                    $tmp = $this->sortSearchBySee($tmp);
                    break;
            }

            $result = array_merge($result, $tmp);

            echo json_encode([$time, $result]);
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

        $uId = Auth::user()->id;
        $sum = 0;
        $sum += Message::whereSenderId($uId)->whereSeenSender(0)->orderBy('date', 'DESC')->count();
        $sum += Message::whereReceiverId($uId)->whereSeenReceiver(0)->orderBy('date', 'DESC')->count();

        $ansActivity = Activity::whereName('پاسخ')->first();
        $commentActivity = Activity::whereName('نظر')->first();
        $reportActivity = Activity::whereName('گزارش')->first();
        $questionActivity = Activity::whereName('سوال')->first();

        $logs = DB::select('select DISTINCT l.id, l.activityId, l.placeId, l.kindPlaceId, l.seen, l.text from log l, activity a WHERE a.id = l.activityId and confirm = 1 and (a.id = ' . $ansActivity->id . ' or a.id = ' . $commentActivity->id . ' or a.id = ' . $reportActivity->id . ' or a.id = ' . $questionActivity->id . ') and (a.visibility = 1 or a.id = ' . $reportActivity->id . ') and visitorId = ' . $uId . ' and seen = 0 or ' .
            '((select count(*) from opOnActivity o where l.id = o.logId and seen = 0) > 0 or (select count(*) from log l2 where l2.activityId = ' . $reportActivity->id . ' and l2.relatedTo = l.id and l2.seen = 0) > 0)'
        );

        if ($logs != null && count($logs) > 0) {

            foreach ($logs as $log) {
                switch ($log->activityId) {

                    case $ansActivity->id:
                        if ($log->seen == 0)
                            $sum++;
                        break;

                    case $questionActivity->id:
                        if ($log->seen == 0)
                            $sum++;
                        break;

                    case $commentActivity->id:
                        if ($log->seen == 0)
                            $sum++;
                        break;

                    case $reportActivity->id:
                        $sum++;
                        break;
                }

                $sum += OpOnActivity::whereLogId($log->id)->whereSeen(0)->orderBy('time', 'DESC')->count();
                $sum += LogModel::whereActivityId($reportActivity->id)->whereRelatedTo($log->id)->whereSeen(0)->count();

            }
        }
        echo $sum;
    }

    public function getAlerts()
    {

        $uId = Auth::user()->id;
        $result = [];
        $counter = 0;

        $msgs = Message::whereSenderId($uId)->whereSeenSender(0)->orderBy('date', 'DESC')->take(5)->get();
        foreach ($msgs as $msg) {
            $result[$counter]["customText"] = "پیام شما به " . User::whereId($msg->receiverId)->username . " ارسال شد";
            $result[$counter]["placeId"] = -1;
            $result[$counter++]["kindPlaceId"] = -1;

            $msg->seenSender = 1;
            $msg->save();
        }

        if ($counter < 5) {
            $msgs = Message::whereReceiverId($uId)->whereSeenReceiver(0)->orderBy('date', 'DESC')->take(5 - $counter)->get();
            foreach ($msgs as $msg) {
                $result[$counter]["customText"] = "شما یک پیام جدید از " . User::whereId($msg->senderId)->username . " دریافت نموده اید";
                $result[$counter]["placeId"] = -1;
                $result[$counter++]["kindPlaceId"] = -1;

                $msg->seenReceiver = 1;
                $msg->save();
            }
        }

        if ($counter < 5) {

            $ansActivity = Activity::whereName('پاسخ')->first();
            $commentActivity = Activity::whereName('نظر')->first();
            $reportActivity = Activity::whereName('گزارش')->first();
            $questionActivity = Activity::whereName('سوال')->first();


            $logs = DB::select('select DISTINCT l.id, l.activityId, l.placeId, l.kindPlaceId, l.seen, l.text from log l, activity a WHERE a.id = l.activityId and confirm = 1 and (a.id = ' . $ansActivity->id . ' or a.id = ' . $commentActivity->id . ' or a.id = ' . $reportActivity->id . ' or a.id = ' . $questionActivity->id . ') and (a.visibility = 1 or a.id = ' . $reportActivity->id . ') and visitorId = ' . $uId . ' and seen = 0 or ' .
                '((select count(*) from opOnActivity o where l.id = o.logId and seen = 0) > 0 or (select count(*) from log l2 where l2.activityId = ' . $reportActivity->id . ' and l2.relatedTo = l.id and l2.seen = 0) > 0)'
                . ' order by l.date desc limit ' . (4 - $counter));

            if ($logs != null && count($logs) > 0) {

                foreach ($logs as $log) {

                    if ($reportActivity->id != $log->activityId)
                        $log->text = (strlen($log->text) > 50) ? substr($log->text, 0, 50) . '...' : $log->text;

                    switch ($log->activityId) {

                        case $ansActivity->id:

                            if ($log->seen == 0) {
                                if ($ansActivity->rate == 0)
                                    $result[$counter]["customText"] = " پاسخ " . $log->text . " شما توسط ادمین تایید گردید ";
                                else
                                    $result[$counter]["customText"] = " پاسخ " . $log->text . " شما توسط ادمین تایید گردید و  " . $ansActivity->rate . " امتیاز بابت آن دریافت کردید";

                                $result[$counter]["placeId"] = $log->placeId;
                                $result[$counter++]["kindPlaceId"] = $log->kindPlaceId;
                                $log = LogModel::whereId($log->id);
                                $log->seen = 1;
                                $log->save();
                            }

                            $key = "پاسخ";
                            break;

                        case $questionActivity->id:

                            if ($log->seen == 0) {
                                if ($questionActivity->rate == 0)
                                    $result[$counter]["customText"] = " سوال " . $log->text . " شما توسط ادمین تایید گردید ";
                                else
                                    $result[$counter]["customText"] = " سوال " . $log->text . " شما توسط ادمین تایید گردید و  " . $questionActivity->rate . " امتیاز بابت آن دریافت کردید";

                                $result[$counter]["placeId"] = $log->placeId;
                                $result[$counter++]["kindPlaceId"] = $log->kindPlaceId;
                                $log = LogModel::whereId($log->id);
                                $log->seen = 1;
                                $log->save();
                            }

                            $key = "سوال";
                            break;

                        case $commentActivity->id:

                            if ($log->seen == 0) {

                                if ($commentActivity->rate == 0)
                                    $result[$counter]["customText"] = " نقد " . $log->text . " شما توسط ادمین تایید گردید ";
                                else
                                    $result[$counter]["customText"] = " نقد " . $log->text . " شما توسط ادمین تایید گردید و " . $commentActivity->rate . " امتیاز بابت آن دریافت کردید ";

                                $result[$counter]["placeId"] = $log->placeId;
                                $result[$counter++]["kindPlaceId"] = $log->kindPlaceId;
                                $log = LogModel::whereId($log->id);
                                $log->seen = 1;
                                $log->save();
                            }

                            $key = "نقد";
                            break;

                        case $reportActivity->id:

                            $log = LogModel::whereId($log->id);
                            $log->seen = 1;
                            $log->save();

                            $reports = Report::whereLogId($log->id)->get();

                            if (!empty($log->text))
                                $log->text .= ' و ';
                            $first = true;

                            if ($reports != null && count($reports) > 0) {
                                foreach ($reports as $report) {
                                    if ($first) {
                                        $log->text .= ReportsType::whereId($report->reportKind)->description;
                                        $first = false;
                                    } else
                                        $log->text .= ' و ' . ReportsType::whereId($report->reportKind)->description;
                                }
                            }

                            if ($reportActivity->rate == 0)
                                $result[$counter]["customText"] = " گزارش " . $log->text . " شما توسط ادمین تایید گردید ";
                            else
                                $result[$counter]["customText"] = " گزارش " . $log->text . " شما توسط ادمین تایید گردید و " . $reportActivity->rate . " امتیاز بابت آن دریافت کردید ";

                            $result[$counter]["placeId"] = $log->placeId;
                            $result[$counter++]["kindPlaceId"] = $log->kindPlaceId;
                            break;
                    }

                    if ($counter < 5) {
                        $tmp = OpOnActivity::whereLogId($log->id)->whereSeen(0)->orderBy('time', 'DESC')->take(4 - $counter)->get();
                        if ($tmp != null && count($tmp) > 0) {

                            foreach ($tmp as $itr) {

                                $itr->seen = 1;
                                $itr->save();

                                if ($itr->like_ == 1)
                                    $result[$counter]["customText"] = User::whereId($itr->uId)->username . " از شما بابت " . $key . ' ' . $log->text . " تشکر کرد ";
                                else
                                    $result[$counter]["customText"] = User::whereId($itr->uId)->username . " از " . $key . ' ' . $log->text . " شما راضی نبود ";

                                $result[$counter]["placeId"] = $log->placeId;
                                $result[$counter++]["kindPlaceId"] = $log->kindPlaceId;
                            }
                        }
                    }

                    if ($counter < 5 && isset($key)) {
                        $reportLogs = LogModel::whereActivityId($reportActivity->id)->whereRelatedTo($log->id)->whereSeen(0)->take(4 - $counter)->get();
                        if ($reportLogs != null && count($reportLogs) > 0) {
                            foreach ($reportLogs as $reportLog) {

                                $reportLog->seen = 1;
                                $reportLog->save();

                                $reports = Report::whereLogId($reportLog->id)->get();

                                if (!empty($reportLog->text))
                                    $reportLog->text .= ' و ';
                                $first = true;

                                if ($reports != null && count($reports) > 0) {
                                    foreach ($reports as $report) {
                                        if ($first) {
                                            $reportLog->text .= ReportsType::whereId($report->reportKind)->description;
                                            $first = false;
                                        } else
                                            $reportLog->text .= ' و ' . ReportsType::whereId($report->reportKind)->description;
                                    }
                                }

                                $result[$counter]["customText"] = $key . " شما به دلیل  " . $reportLog->text . " گزارش گردید ";
                                $result[$counter]["placeId"] = $log->placeId;
                                $result[$counter++]["kindPlaceId"] = $log->kindPlaceId;
                            }
                        }
                    }
                }
            }
        }

        for ($i = 0; $i < count($result); $i++) {
            if($result[$i]['kindPlaceId'] == -1)
                $result[$i]['url'] = -1;
            else{
                $kindPlace = Place::find($result[$i]['kindPlaceId']);
                $place = \DB::table($kindPlace->tableName)->find($result[$i]['placeId']);
                $result[$i]['url'] = route('show.place.details', ['kindPlaceName' => $kindPlace->fileName, 'slug' => $place->slug]);
                $targetFile = URL::asset('_images/' . $kindPlace->fileName . '/' . $place->file . '/f-1.jpg');
            }

            if (isset($targetFile) && $targetFile != "") {
                if (@file_get_contents($targetFile))
                    $result[$i]['pic'] = $targetFile;
                else
                    $result[$i]['pic'] = URL::asset('_images/nopic/blank.jpg');
            }
        }

        echo \GuzzleHttp\json_encode($result);

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

    public function emailtest()
    {
        $text = '<h1>welcome to koochita</h1>';
        $to = 'kiavashbc@gmail.com';
        $subject = 'welcome massage';
        sendEmail($text, $subject, $to);
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
                $item->pic = URL::asset('_images/' . $kindPlace->fileName .'/' . $item->file . '/f-' . $item->picNumber);
                $item->url = createUrl($kindPlace->id, $item->id, 0, 0);
                $item->rate = getRate($item->id, $kindPlace->id)[1];
                $item->city = Cities::find($item->cityId);
                $item->state = State::find($item->city->stateId);

                $condition = ['activityId' => $activityId, 'placeId' => $item->id, 'kindPlaceId' => $kindPlace->id, 'confirm' => 1, 'relatedTo' => 0];
                $item->reviews = LogModel::where($condition)->count();
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