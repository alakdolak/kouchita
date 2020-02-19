<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Adab;
use App\models\Amaken;
use App\models\Cities;
use App\models\ConfigModel;
use App\models\GoyeshCity;
use App\models\Hotel;
use App\models\LogModel;
use App\models\MahaliFood;
use App\models\MainSuggestion;
use App\models\Majara;
use App\models\Place;
use App\models\Post;
use App\models\PostComment;
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
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;


class AjaxController extends Controller {

    public function getPlacePic() {

        if(isset($_POST["placeId"]) && isset($_POST["kindPlaceId"])) {

            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            $placeId = makeValidInput($_POST["placeId"]);

            switch ($kindPlaceId) {
                case 1:
                    $target = Amaken::whereId($placeId);
                    break;
                case 3:
                    $target = Restaurant::whereId($placeId);
                    break;
                case 4:
                    $target = Hotel::whereId($placeId);
                    break;
                case 6:
                    $target = Majara::whereId($placeId);
                    break;
                case 8:
                    $target = Adab::whereId($placeId);
                    break;
                default:
                    return;
            }

            if($target == null)
                return;
            
            switch ($kindPlaceId) {
                case 1:
                    $target = 'amaken/' . $target->file . '/l-1.jpg';
                    break;
                case 3:
                    $target ='restaurant/' . $target->file . '/l-1.jpg';
                    break;
                case 4:
                    $target = 'hotels/' . $target->file . '/l-1.jpg';
                    break;
                case 6:
                    $target = 'majara/' . $target->file . '/l-1.jpg';
                    break;
                case 8:
                    if($target->category == 3)
                        $target = 'adab/ghazamahali/' . $target->file . '/l-1.jpg';
                    else
                        $target = 'adab/soghat/' . $target->file . '/l-1.jpg';;

                    break;
            }

            if(!file_exists((__DIR__ . '/../../../../assets/_images/' . $target)))
                echo URL::asset('_images/nopic/blank.jpg');
            else
                echo URL::asset('_images/' . $target);
        }

    }

    public function getReports() {

        $kindPlaceId = Place::whereName('پیام')->first()->id;

        echo json_encode(ReportsType::whereKindPlaceId($kindPlaceId)->get());

    }

    public function getReports2() {

        if(isset($_POST["logId"])) {

            $logId = makeValidInput($_POST["logId"]);
            $log = LogModel::whereId($logId);
            $reports = ReportsType::whereKindPlaceId($log->kindPlaceId)->get();
            
            $uId = Auth::user()->id;

            $condition = ['visitorId' => $uId, 'activityId' => Activity::whereName('گزارش')->first()->id,
                'relatedTo' => $logId, 'subject' => ''];
            $log = LogModel::where($condition)->first();

            if($log == null) {
                foreach ($reports as $report) {
                    $report->selected = false;
                }
                $reports[0]->text = "";
            }

            else {
                foreach ($reports as $report) {
                    $condition = ['logId' => $log->id, 'reportKind' => $report->id];
                    if(Report::where($condition)->count() > 0)
                        $report->selected = true;
                    else
                        $report->selected = false;
                }

                if($log->text != "")
                    $reports[0]->text = $log->text;
                else
                    $reports[0]->text = "";
            }

            echo json_encode($reports);

        }

    }

    public function getPlaceKinds() {
        echo json_encode(Place::whereVisibility(1)->get());
    }

    public function getStates() {
        echo json_encode(State::all());
    }

    public function getGoyesh() {
        echo json_encode(GoyeshCity::all());
    }

    public function searchEstelah() {
        
        if(isset($_POST["goyesh"]) && isset($_POST["key"]) && isset($_POST["mode"])) {

            $goyesh = makeValidInput($_POST["goyesh"]);
            $key = makeValidInput($_POST["key"]);
            $mode = makeValidInput($_POST["mode"]);

            if($mode == 1) {
                if ($goyesh != -1)
                    echo json_encode(DB::select("select estelah, talafoz, maani from estelahat WHERE goyeshId = " . $goyesh . " and estelah LIKE '%$key%'"));
                else
                    echo json_encode(DB::select("select estelah, talafoz, maani from estelahat WHERE estelah LIKE '%$key%'"));
            }
            else {
                if ($goyesh != -1)
                    echo json_encode(DB::select("select estelah, talafoz, maani from estelahat WHERE goyeshId = " . $goyesh . " and maani LIKE '%$key%'"));
                else
                    echo json_encode(DB::select("select estelah, talafoz, maani from estelahat WHERE maani LIKE '%$key%'"));
            }
        }
        
    }
    
    public function getCitiesDir() {

        $stateId = makeValidInput($_POST["stateId"]);

        echo json_encode(Cities::whereStateId($stateId)->get());
    }

    public function searchPlace() {

        $cityId = makeValidInput($_POST["cityId"]);
        $stateId = makeValidInput($_POST["stateId"]);
        $key = makeValidInput($_POST["key"]);
        $placeKind = makeValidInput($_POST["placeKind"]);

        $subQuery = "";

        if($cityId == -1 && $stateId != -1)
            $subQuery .= " ci.stateId = " . $stateId . " and ";
        else if($cityId != -1 && $stateId != -1)
            $subQuery .= " ci.id = " . $cityId . " and ci.stateId = " . $stateId . " and ";

        if($placeKind == 3) {
            $places = DB::select("SELECT target.name, address, target.id, ci.name as cityName, s.name as stateName FROM `restaurant` target, cities ci, state s WHERE " . $subQuery . " ci.stateId = s.id and ci.id = cityId and target.`name` LIKE '%$key%' ");
            echo json_encode($places);
            return;
        }

        else if($placeKind == 1) {
            $places = DB::select("SELECT target.name, address, target.id, ci.name as cityName, s.name as stateName FROM `amaken` target, cities ci, state s WHERE " . $subQuery ." ci.stateId = s.id and ci.id = cityId and target.`name` LIKE '%$key%' ");
            echo json_encode($places);
            return;
        }

        else if($placeKind == 4) { // hotel
            $places = DB::select("SELECT target.name, address, target.id, ci.name as cityName, s.name as stateName FROM `hotels` target, cities ci, state s WHERE " . $subQuery . " ci.stateId = s.id and ci.id = cityId and target.`name` LIKE '%$key%' ");
            echo json_encode($places);
            return;
        }

        else if($placeKind == 6) {
            $places = DB::select("SELECT target.name, address, target.id, ci.name as cityName, s.name as stateName FROM `majara` target, cities ci, state s WHERE " . $subQuery . " ci.stateId = s.id and ci.id = cityId and target.`name` LIKE '%$key%' ");
            echo json_encode($places);
            return;
        }


        else if($placeKind == 8) {
            $places = DB::select("SELECT target.name, address, target.id, ci.name as cityName, s.name as stateName FROM `adab` target, cities ci, state s WHERE " . $subQuery . " ci.stateId = s.id and ci.id = cityId and target.`name` LIKE '%$key%' ");
            echo json_encode($places);
            return;
        }
    }

    public function searchForCity(Request $request) {
        $key = $_POST["key"];
        $result = array();
        if(isset($request->state) && $request->state == 1)
            $result = DB::select("SELECT state.id, state.name as stateName FROM state WHERE state.name LIKE '%$key%' ");

        foreach ($result as $item)
            $item->kind = 'state';

        $cities = DB::select("SELECT cities.id, cities.name as cityName, state.name as stateName FROM cities, state WHERE cities.stateId = state.id and  cities.name LIKE '%$key%' ");

        foreach ($cities as $item) {
            $item->kind = 'city';
            array_push($result, $item);
        }

        echo json_encode($result);
    }

    public function searchForLine() {

        if(isset($_POST["key"]) && isset($_POST["mode"])) {

            $key = makeValidInput($_POST["key"]);
            $mode = makeValidInput($_POST["mode"]);

            $mode = explode(',', $mode)[0];

            if($mode == "train" || $mode == "train_phone") {
                $results = DB::select("select name from train WHERE name LIKE '%$key%'");

                if($results == null || count($results) == 0) {

                    $city = DB::select("select x, y from cities WHERE name LIKE '$key'");

                    if($city != null && count($city) > 0) {
                        $C = $city[0]->x * 3.14 / 180;
                        $D = $city[0]->y * 3.14 / 180;

                        $results = DB::select("select 'near' as mode, 'راه آهن' as place, t.name, acos(" . sin($D) . " * sin(c.y / 180 * 3.14) + " . cos($D) . " * cos(c.y / 180 * 3.14) * cos(c.x / 180 * 3.14 - " . $C . ")) * 6371 as distance from train t, cities c where c.id = t.cityId order by distance ASC limit 0, 5");
                    }
                }
            }
            elseif($mode == "internalFlight" || $mode == "internalFlight_phone") {
                $results = DB::select("select 'exact' as mode, concat(name, ' - ' ,abbreviation) as name from airLine WHERE name LIKE '%$key%'");
                if($results == null || count($results) == 0) {

                    $city = DB::select("select x, y from cities WHERE name LIKE '$key'");

                    if($city != null && count($city) > 0) {

                        $C = $city[0]->x * 3.14 / 180;
                        $D = $city[0]->y * 3.14 / 180;

                        $results = DB::select("select 'near' as mode, 'فرودگاه' as place, concat(a.name, ' - ' ,a.abbreviation) as name, acos(" . sin($D) . " * sin(c.y / 180 * 3.14) + " . cos($D) . " * cos(c.y / 180 * 3.14) * cos(c.x / 180 * 3.14 - " . $C . ")) * 6371 as distance from airLine a, cities c where c.id = a.cityId order by distance ASC limit 0, 5");
                    }
                }
            }

            echo json_encode($results);
        }

    }

    public function searchForMyContacts() {

        $key = makeValidInput($_POST["key"]);
        $uId = Auth::user()->id;

        $users = DB::select("SELECT DISTINCT(users.username) FROM users, messages WHERE (senderId = " . $uId . " or receiverId = " . $uId . ") and (users.id = messages.senderId or users.id = messages.receiverId) and users.username LIKE '%$key%' ");
        echo json_encode($users);
        return;
    }

    public function proSearch(Request $request) {

        if(isset($_POST["hotelFilter"]) && isset($_POST["amakenFilter"]) && isset($_POST["restaurantFilter"])
            && isset($_POST["majaraFilter"]) && isset($_POST["mahaliFoodFilter"])
            && isset($_POST["key"]) && isset($_POST["selectedCities"]) && isset($_POST["sogatSanaieFilter"])) {

            $cities = $_POST["selectedCities"];

            $cityConstraint = "";
            $allow = true;
            $key = $_POST["key"];
//            dd($request->all());
            if(isset($request->mode) && $request->mode == 'state'){
                $state = State::find($request->selectedCities);
                if($state != null){
                    $cities = Cities::where('stateId', $state->id)->get();
                    foreach ($cities as $city){
                        if ($city != null) {
                            if ($allow) {
                                $allow = false;
                                $cityConstraint .= $city->id;
                            } else
                                $cityConstraint .= "," . $city->id;
                        }
                    }
                }
            }
            elseif(isset($request->mode) && $request->mode == 'city') {
                if ($cities != -1) {
                    if(is_array($cities)) {
                        foreach ($cities as $city) {
                            $city = Cities::whereName($city)->first();

                            if ($city != null) {
                                if ($allow) {
                                    $allow = false;
                                    $cityConstraint .= $city->id;
                                } else
                                    $cityConstraint .= "," . $city->id;
                            }
                        }
                    }
                    else
                        $cityConstraint .= $cities;
                }
            }
            else{
                echo 'nok';
                return;
            }

            if($cityConstraint != '')
                $allow = false;
            else
                $allow = true;

            $target = [];
            if($_POST["hotelFilter"] == 1) {
                if($allow)
                    $target = DB::select("select hotels.name, hotels.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from hotels, cities, place, state WHERE place.name = 'هتل' and cities.id = cityId AND cities.stateId = state.id and hotels.name LIKE '%$key%'");
                else
                    $target = DB::select("select hotels.name, hotels.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from hotels, cities, place, state WHERE place.name = 'هتل' and cities.id = cityId  AND cities.stateId = state.id and hotels.name LIKE '%$key%' and cityId IN (" . $cityConstraint . ")");
            }
            if($_POST["amakenFilter"] == 1) {
                if($allow)
                    $target = array_merge($target, DB::select("select amaken.name, amaken.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from amaken, cities, place, state WHERE place.name = 'اماکن' and cities.id = cityId AND cities.stateId = state.id and amaken.name LIKE '%$key%'"));
                else
                    $target = array_merge($target, DB::select("select amaken.name, amaken.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from amaken, cities, place, state WHERE place.name = 'اماکن' and cities.id = cityId AND cities.stateId = state.id and amaken.name LIKE '%$key%' and cityId IN (" . $cityConstraint . ")"));
            }
            if($_POST["restaurantFilter"] == 1) {
                if($allow)
                    $target = array_merge($target, DB::select("select restaurant.name, restaurant.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from restaurant, cities, place, state WHERE place.name = 'رستوران' and cities.id = cityId AND cities.stateId = state.id and restaurant.name LIKE '%$key%'"));
                else
                    $target = array_merge($target, DB::select("select restaurant.name, restaurant.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from restaurant, cities, place, state WHERE place.name = 'رستوران' and cities.id = cityId AND cities.stateId = state.id and restaurant.name LIKE '%$key%' and cityId IN (" . $cityConstraint . ")"));
            }
            if($_POST["majaraFilter"] == 1) {
                if($allow)
                    $target = array_merge($target, DB::select("select majara.name, majara.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from majara, cities, place, state WHERE place.name = 'ماجرا' and cities.id = cityId AND cities.stateId = state.id and majara.name LIKE '%$key%'"));
                else
                    $target = array_merge($target, DB::select("select majara.name, majara.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from majara, cities, place, state WHERE place.name = 'ماجرا' and cities.id = cityId AND cities.stateId = state.id and majara.name LIKE '%$key%' and cityId IN (" . $cityConstraint . ")"));
            }
            if($_POST["sogatSanaieFilter"] == 1) {
                if($allow)
                    $target = array_merge($target, DB::select("select sogatSanaies.name, sogatSanaies.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from sogatSanaies, cities, place, state WHERE place.name = 'صنایع سوغات' and cities.id = cityId AND cities.stateId = state.id and sogatSanaies.name LIKE '%$key%'"));
                else
                    $target = array_merge($target, DB::select("select sogatSanaies.name, sogatSanaies.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from sogatSanaies, cities, place, state WHERE place.name = 'صنایع سوغات' and cities.id = cityId AND cities.stateId = state.id and  sogatSanaies.name LIKE '%$key%' and cityId IN (" . $cityConstraint . ")"));
            }
            if($_POST["mahaliFoodFilter"] == 1) {
                if($allow)
                    $target = array_merge($target, DB::select("select mahaliFood.name, mahaliFood.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from mahaliFood, cities, place, state WHERE place.name = 'غذای محلی' and cities.id = cityId AND cities.stateId = state.id and mahaliFood.name LIKE '%$key%'"));
                else
                    $target = array_merge($target, DB::select("select mahaliFood.name, mahaliFood.id, cities.name as cityName, state.name as stateName, place.id as kindPlaceId, place.name as kindPlace from mahaliFood, cities, place, state WHERE place.name = 'غذای محلی' and cities.id = cityId AND cities.stateId = state.id and mahaliFood.name LIKE '%$key%' and cityId IN (" . $cityConstraint . ")"));
            }


            foreach ($target as $item){
                switch ($item->kindPlaceId){
                    case 1:
                        $item->url = route('amakenDetails', ['placeId' => $item->id, 'placeName' => $item->name]);
                        break;
                    case 3:
                        $item->url = route('restaurantDetails', ['placeId' => $item->id, 'placeName' => $item->name]);
                        break;
                    case 4:
                        $item->url = route('hotelDetails', ['placeId' => $item->id, 'placeName' => $item->name]);
                        break;
                    case 6:
                        $item->url = route('majaraDetails', ['placeId' => $item->id, 'placeName' => $item->name]);
                        break;
                    case 10:
                        $item->url = route('sanaiesogatDetails', ['placeId' => $item->id, 'placeName' => $item->name]);
                        break;
                    case 11:
                        $item->url = route('mahaliFoodDetails', ['placeId' => $item->id, 'placeName' => $item->name]);
                        break;
                }
            }
//            dd($target);

            echo json_encode($target);
        }
    }

    public function findCityWithState(Request $request)
    {
        if(isset($request->stateId)){

            $city = Cities::where('stateId', $request->stateId)->get();

            foreach ($city as $item){
                if($item->image == null)
                    $item->pic = URL::asset('_images/nopic/blank.jpg');
                else
                    $item->pic = URL::asset('_images/city/'.$item->image);
            }

            echo json_encode($city);
            return;

        }
        echo 'nok';
        return;
    }

    public function findRestaurantWithCity(Request $request)
    {
        $placeId = Place::where('name', 'رستوران')->first()->id;
        if(isset($request->cityId)){

            $resturant = Restaurant::where('cityId', $request->cityId)->select(['name', 'address', 'C', 'D', 'food_irani', 'food_mahali', 'food_farangi', 'cityId', 'id', 'file'])->get();
            foreach ($resturant as $item){
                $item->rate = getRate($placeId, $item->id);


                if(file_exists(__DIR__ . '/../../../../assets/_images/restaurant/' . $item->file . '/l-1.jpg'))
                    $item->pic = URL::asset('_images/restaurant/' . $item->file . '/l-1.jpg');
                else
                    $item->pic = URL::asset('_images/nopic/blank.jpg');

            }
            echo json_encode($resturant);
            return;
        }
        echo 'nok';
        return;
    }

    public function findAmakenWithCity(Request $request)
    {
        $placeId = Place::where('name', 'اماکن')->first()->id;
        if(isset($request->cityId)){
            $amaken = Amaken::where('cityId', $request->cityId)->select(['name', 'address', 'C', 'D', 'cityId', 'id', 'file', 'pic_1'])->get();

            if(count($amaken) != 0){
                foreach ($amaken as $item){
                    $item->rate = getRate($placeId, $item->id);

                    if(file_exists(__DIR__ . '/../../../../assets/_images/amaken/' . $item->file . '/l-1.jpg'))
                        $item->pic = URL::asset('_images/amaken/' . $item->file . '/l-1.jpg');
                    else
                        $item->pic = URL::asset('_images/nopic/blank.jpg');
                }
            }

            echo json_encode($amaken);
            return;
        }
        echo 'nok';
        return;
    }

    public function findHotelWithCity(Request $request)
    {
        $placeId = Place::where('name', 'هتل')->first()->id;
        if(isset($request->cityId)){
            $hotel = Hotel::where('cityId', $request->cityId)->select(['name', 'address', 'C', 'D', 'cityId', 'id', 'file', 'pic_1', 'rate'])->get();

            if(count($hotel) != 0){
                foreach ($hotel as $item){
//                    $item->rate = getRate($placeId, $item->id);

                    if(file_exists(__DIR__ . '/../../../../assets/_images/hotels/' . $item->file . '/l-1.jpg'))
                        $item->pic = URL::asset('_images/hotels/' . $item->file . '/l-1.jpg');
                    else
                        $item->pic = URL::asset('_images/nopic/blank.jpg');
                }
            }

            echo json_encode($hotel);
            return;
        }
        echo 'nok';
        return;
    }

    public function findKoochitaAccount(Request $request)
    {
        if(isset($request->email)){
            $user = User::where('email', $request->email)->get();

            if($user != null && count($user) != 0)
                echo 'ok';
            else
                echo 'nok';

            return;
        }
    }

    public function findUser(Request $request)
    {
        if(Auth::check()) {
            if (isset($request->value)) {
                $value = $request->value;
                $userName = DB::select('SELECT id, username, email, first_name, last_name FROM users WHERE username LIKE "' . $value . '%"');
                $userEmail = DB::select('SELECT id, username, email, first_name, last_name FROM users WHERE email LIKE "' . $value . '%" ');
                if($userName == null && $userEmail == null)
                    echo 'nok3';
                else
                    echo json_encode([$userEmail, $userName]);
            }
            else
                echo 'nok2';
        }
        else
            echo 'nok1';

        return;
    }

    public function likeLog(Request $request)
    {
        if(\auth()->check()) {
            if (isset($request->logId) && isset($request->like)) {
                $u = Auth::user();
                $condition = ['userId' => $u->id, 'logId' => $request->logId];
                $like = LogFeedBack::where($condition)->first();

                if($like == null){
                    $like = new LogFeedBack();
                    $like->logId = $request->logId;
                    $like->userId = $u->id;
                    if($request->like == 1)
                        $like->like = 1;
                    else
                        $like->like = -1;
                    $like->save();
                }
                else{
                    if($request->like == 1)
                        $like->like = 1;
                    else
                        $like->like = -1;
                    $like->save();
                }

                $like = LogFeedBack::where('logId', $request->logId)->where('like', 1)->count();
                $dislike = LogFeedBack::where('logId', $request->logId)->where('like', -1)->count();

                echo json_encode(['ok', $like, $dislike]);
            }
            else
                echo json_encode(['nok2']);
        }
        else
            echo json_encode(['nok1']);

        return;
    }

    public function getMainPageSuggestion()
    {
        $activityId = Activity::whereName('نظر')->first()->id;
        $kindPlaceId = [1, 3, 4, 6, 10, 11];
        $result = array();
        for($i = 0; $i < 6; $i++){
            switch ($kindPlaceId[$i]){
                case 1:
                    $file = 'amaken';
                    $url = 'amakenDetails';
                    $place = Amaken::latest('id')->select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->first();
                    break;
                case 3:
                    $file = 'restaurant';
                    $url = 'restaurantDetails';
                    $place = Restaurant::latest('id')->select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->first();
                    break;
                case 4:
                    $file = 'hotels';
                    $url = 'hotelDetails';
                    $place = Hotel::latest('id')->select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->first();
                    break;
                case 6:
                    $file = 'majara';
                    $url = 'majaraDetails';
                    $place = Majara::latest('id')->select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->first();
                    break;
                case 10:
                    $file = 'sogatsanaie';
                    $url = 'sanaiesogatDetails';
                    $place = SogatSanaie::latest('id')->select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->first();
                    break;
                case 11:
                    $file = 'mahalifood';
                    $url = 'mahaliFoodDetails';
                    $place = MahaliFood::latest('id')->select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->first();
                    break;

            }

            if(file_exists((__DIR__ . '/../../../../assets/_images/' . $file . '/' . $place->file . '/f-' . $place->picNumber)))
                $place->placePic = URL::asset('_images/' . $file . '/' . $place->file . '/f-' . $place->picNumber);
            else
                $place->placePic = URL::asset("_images/nopic/blank.jpg");
            $place->url = route($url, ['placeId' => $place->id, 'placeName' => $place->name]);
            $city = Cities::whereId($place->cityId);
            $place->placeCity = $city->name;
            $place->placeState = State::whereId($city->stateId)->name;
            $place->placeRate = getRate($place->id, $kindPlaceId[$i])[1];
            $place->placeReviews = DB::select('select count(*) as countNum from log, comment WHERE logId = log.id and status = 1 and placeId = ' . $place->id .
                ' and kindPlaceId = ' . $kindPlaceId[$i] . ' and activityId = ' . $activityId)[0]->countNum;

            array_push($result, $place);
        }

        $suggest = MainSuggestion::all();
        $suggestions = array();
        foreach ($suggest as $item){
            switch ($item->kindPlaceId){
                case 1:
                default:
                    $file = 'amaken';
                    $kindPlaceId = 1;
                    $url = 'amakenDetails';
                    $place = Amaken::select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->find($item->placeId);
                    break;
                case 3:
                    $file = 'restaurant';
                    $kindPlaceId = 3;
                    $url = 'restaurantDetails';
                    $place = Restaurant::select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->find($item->placeId);
                    break;
                case 4:
                    $file = 'hotels';
                    $url = 'hotelDetails';
                    $kindPlaceId = 4;
                    $place = Hotel::select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->find($item->placeId);
                    break;
                case 6:
                    $file = 'majara';
                    $url = 'majaraDetails';
                    $kindPlaceId = 6;
                    $place = Majara::select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->find($item->placeId);
                    break;
                case 10:
                    $file = 'sogatsanaie';
                    $url = 'sanaiesogatDetails';
                    $kindPlaceId = 10;
                    $place = SogatSanaie::select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->find($item->placeId);
                    break;
                case 11:
                    $file = 'mahalifood';
                    $url = 'mahaliFoodDetails';
                    $kindPlaceId = 11;
                    $place = MahaliFood::select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->find($item->placeId);
                    break;
            }

            if($place != null && $file != null) {
                if (file_exists((__DIR__ . '/../../../../assets/_images/' . $file . '/' . $place->file . '/f-' . $place->picNumber)))
                    $place->placePic = URL::asset('_images/' . $file . '/' . $place->file . '/f-' . $place->picNumber);
                else
                    $place->placePic = URL::asset("_images/nopic/blank.jpg");
                $place->url = route($url, ['placeId' => $place->id, 'placeName' => $place->name]);
                $city = Cities::whereId($place->cityId);
                $place->placeCity = $city->name;
                $place->placeState = State::whereId($city->stateId)->name;
                $place->placeRate = getRate($place->id, $kindPlaceId)[1];
                $place->section = $item->section;
                $place->placeReviews = DB::select('select count(*) as countNum from log, comment WHERE logId = log.id and status = 1 and placeId = ' . $place->id .
                    ' and kindPlaceId = ' . $kindPlaceId . ' and activityId = ' . $activityId)[0]->countNum;

                array_push($suggestions, $place);
            }
        }

        $today = getToday()['date'];
        $post = Post::where('date', '<=', $today)->where('release', '!=', 'draft')->select(['id', 'title', 'slug', 'meta', 'pic', 'date', 'creator', 'keyword', 'seen'])->orderBy('date', 'DESC')->get();
        foreach ($post as $item){
            $item->url = route('article.show', ['slug' => $item->slug]);
            $item->placePic = URL::asset('_images/posts/' . $item->id . '/' . $item->pic);
            $item->msg = PostComment::where('status', 1)->where('postId', $item->id)->count();
            $item->section = 'مقالات';
            array_push($suggestions, $item);
        }

        echo json_encode([$result, $suggestions]);

        return;
    }
}