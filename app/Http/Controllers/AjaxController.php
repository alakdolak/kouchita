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
use App\models\Majara;
use App\models\Place;
use App\models\QuestionAns;
use App\models\QuestionUserAns;
use App\models\Report;
use App\models\ReportsType;
use App\models\Restaurant;
use App\models\ReviewFeedBack;
use App\models\ReviewPic;
use App\models\ReviewUserAssigned;
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

    public function searchForCity() {

        $key = makeValidInput($_POST["key"]);
        $cities = DB::select("SELECT cities.id, cities.name as cityName, state.name as stateName FROM cities, state WHERE cities.stateId = state.id and  cities.name LIKE '%$key%' ");
        echo json_encode($cities);
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

    public function proSearch() {

        if(isset($_POST["hotelFilter"]) && isset($_POST["amakenFilter"]) && isset($_POST["restaurantFilter"])
            && isset($_POST["majaraFilter"]) && isset($_POST["soghatFilter"]) && isset($_POST["ghazamahaliFilter"])
            && isset($_POST["key"]) && isset($_POST["selectedCities"]) && isset($_POST["sanayeFilter"])) {

            $cities = $_POST["selectedCities"];

            $cityConstraint = "";
            $allow = true;
            $key = makeValidInput($_POST["key"]);


            if($cities != -1) {
                foreach ($cities as $city) {

                    $city = makeValidInput($city);
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

            $target = [];
            if(makeValidInput($_POST["hotelFilter"]) == 1) {
                if($allow)
                    $target = DB::select("select hotels.name, hotels.id, cities.name as cityName, place.id as kindPlaceId, place.name as kindPlace from hotels, cities, place WHERE place.name = 'هتل' and cities.id = cityId and hotels.name LIKE '%$key%'");
                else
                    $target = DB::select("select hotels.name, hotels.id, cities.name as cityName, place.id as kindPlaceId, place.name as kindPlace from hotels, cities, place WHERE place.name = 'هتل' and cities.id = cityId and hotels.name LIKE '%$key%' and cityId IN (" . $cityConstraint . ")");
            }
            if(makeValidInput($_POST["amakenFilter"]) == 1) {
                if($allow)
                    $target = array_merge($target, DB::select("select amaken.name, amaken.id, cities.name as cityName, place.id as kindPlaceId, place.name as kindPlace from amaken, cities, place WHERE place.name = 'اماکن' and cities.id = cityId and amaken.name LIKE '%$key%'"));
                else
                    $target = array_merge($target, DB::select("select amaken.name, amaken.id, cities.name as cityName, place.id as kindPlaceId, place.name as kindPlace from amaken, cities, place WHERE place.name = 'اماکن' and cities.id = cityId and amaken.name LIKE '%$key%' and cityId IN (" . $cityConstraint . ")"));
            }
            if(makeValidInput($_POST["restaurantFilter"]) == 1) {
                if($allow)
                    $target = array_merge($target, DB::select("select restaurant.name, restaurant.id, cities.name as cityName, place.id as kindPlaceId, place.name as kindPlace from restaurant, cities, place WHERE place.name = 'رستوران' and cities.id = cityId and restaurant.name LIKE '%$key%'"));
                else
                    $target = array_merge($target, DB::select("select restaurant.name, restaurant.id, cities.name as cityName, place.id as kindPlaceId, place.name as kindPlace from restaurant, cities, place WHERE place.name = 'رستوران' and cities.id = cityId and restaurant.name LIKE '%$key%' and cityId IN (" . $cityConstraint . ")"));
            }
            if(makeValidInput($_POST["majaraFilter"]) == 1) {
                if($allow)
                    $target = array_merge($target, DB::select("select majara.name, majara.id, cities.name as cityName, place.id as kindPlaceId, place.name as kindPlace from majara, cities, place WHERE place.name = 'ماجرا' and cities.id = cityId and majara.name LIKE '%$key%'"));
                else
                    $target = array_merge($target, DB::select("select majara.name, majara.id, cities.name as cityName, place.id as kindPlaceId, place.name as kindPlace from majara, cities, place WHERE place.name = 'ماجرا' and cities.id = cityId and majara.name LIKE '%$key%' and cityId IN (" . $cityConstraint . ")"));
            }
            if(makeValidInput($_POST["soghatFilter"]) == 1) {
                if($allow)
                    $target = array_merge($target, DB::select("select adab.name, adab.id, state.name as cityName, place.id as kindPlaceId, place.name as kindPlace from adab, state, place WHERE category = 1 and place.name = 'آداب' and state.id = stateId and adab.name LIKE '%$key%'"));
                else
                    $target = array_merge($target, DB::select("select adab.name, adab.id, state.name as cityName, place.id as kindPlaceId, place.name as kindPlace from adab, state, place WHERE category = 1 and place.name = 'آداب' and state.id = stateId and adab.name LIKE '%$key%' and stateId IN (" . $cityConstraint . ")"));
            }
            if(makeValidInput($_POST["ghazamahaliFilter"]) == 1) {
                if($allow)
                    $target = array_merge($target, DB::select("select adab.name, adab.id, state.name as cityName, place.id as kindPlaceId, place.name as kindPlace from adab, state, place WHERE category = 3 and place.name = 'آداب' and state.id = stateId and adab.name LIKE '%$key%'"));
                else
                    $target = array_merge($target, DB::select("select adab.name, adab.id, state.name as cityName, place.id as kindPlaceId, place.name as kindPlace from adab, state, place WHERE category = 3 and place.name = 'آداب' and state.id = stateId and adab.name LIKE '%$key%' and stateId IN (" . $cityConstraint . ")"));
            }
            if(makeValidInput($_POST["sanayeFilter"]) == 1) {
                if($allow)
                    $target = array_merge($target, DB::select("select adab.name, adab.id, state.name as cityName, place.id as kindPlaceId, place.name as kindPlace from adab, state, place WHERE category = 6 and place.name = 'آداب' and state.id = stateId and adab.name LIKE '%$key%'"));
                else
                    $target = array_merge($target, DB::select("select adab.name, adab.id, state.name as cityName, place.id as kindPlaceId, place.name as kindPlace from adab, state, place WHERE category = 6 and place.name = 'آداب' and state.id = stateId and adab.name LIKE '%$key%' and stateId IN (" . $cityConstraint . ")"));
            }
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

    public function reviewUploadPic(Request $request)
    {
        $location = __DIR__ . '/../../../../assets/limbo';

dd(file_exists($location));

        if(!file_exists($location))
            mkdir($location);

        if(isset($_FILES['pic']) && isset($request->code)){

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
            else{
                echo 'nok2';
            }
        }
        else{
            echo 'nok3';
        }
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
        else{
            echo 'nok3';
        }
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

            $id = $request->placeId;
            $kindPlaceId = $request->kindPlaceId;
            switch ($kindPlaceId){
                case 1:
                    $place = Amaken::find($id);
                    $kindPlaceName = 'amaken';
                    break;
                case 3:
                    $place = Restaurant::find($id);
                    $kindPlaceName = 'restaurant';
                    break;
                case 4:
                    $place = Hotel::find($id);
                    $kindPlaceName = 'hotels';
                    break;
                case 6:
                    $place = Majara::find($id);
                    $kindPlaceName = 'majara';
                    break;
                case 10:
                    $place = SogatSanaie::find($id);
                    $kindPlaceName = 'sogatsanaie';
                    break;
                case 11:
                    $place = MahaliFood::find($id);
                    $kindPlaceName = 'mahalifood';
                    break;
            }

            $log = new LogModel();
            $log->placeId = $request->placeId;
            $log->kindPlaceId = $kindPlaceId;
            $log->visitorId = \auth()->user()->id;
            $log->date = Carbon::now()->format('Y-m-d');
            $log->time = getToday()['time'];
            $log->activityId = $activity->id;
            $log->text = $request->text;
            $log->confirm = 1;
            $log->save();

            $reviewPic = ReviewPic::where('code', $request->code)->get();
            \DB::select('UPDATE `reviewPics` SET `logId`= ' . $log->id . ' WHERE code ="' . $request->code . '";');

            $location = __DIR__ . '/../../../../assets/userPhoto/' . $kindPlaceName;
            if(!file_exists($location))
                mkdir($location);
            $location .= '/' . $place->file;
            if(!file_exists($location))
                mkdir($location);

            $limboLocation = __DIR__ . '/../../../../assets/limbo/';
            foreach ($reviewPic as $item){
                $file = $limboLocation . $item->pic;
                $dest = $location . '/' .  $item->pic;
                if(file_exists($file))
                    rename( $file , $dest);

                if($item->isVideo == 1){
                    $videoArray = explode('.', $item->pic);
                    $videoName = '';
                    for($k = 0; $k < count($videoArray)-1; $k++)
                        $videoName .= $videoArray[$k] . '.';
                    $videoName .= 'png';

                    $file = $limboLocation . $videoName;
                    $dest = $location . '/' .  $videoName;
                    if(file_exists($file))
                        rename( $file , $dest);
                }
            }

            $assignedUser = json_decode($request->assignedUser);
            if($assignedUser != null) {
                foreach ($assignedUser as $item) {
                    $newAssigned = new ReviewUserAssigned();
                    $newAssigned->logId = $log->id;

                    $user = User::where('username', $item)->orWhere('email', $item)->first();
                    if ($user != null)
                        $newAssigned->userId = $user->id;
                    else
                        $newAssigned->email = $item;

                    $newAssigned->save();
                }
            }

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
        }
        return \redirect()->back();
    }

    public function getReviews(Request $request){

        if(isset($request->placeId) && isset($request->kindPlaceId)){

            $count = 0;
            $num = 0;

            if(isset($request->count))
                $count = $request->count;
            if(isset($request->num))
                $num = $request->num;


            $activity = Activity::where('name', 'نظر')->first();
            $a = Activity::where('name', 'پاسخ')->first();

            $condition = ['activityId' => $activity->id, 'placeId' => $request->placeId, 'kindPlaceId' => $request->kindPlaceId, 'confirm' => 1, 'relatedTo' => 0];

            if($num == 0 && $count == 0)
                $logs = LogModel::where($condition)->orderByDesc('date')->orderByDesc('time')->get();
            else
                $logs = LogModel::where($condition)->orderByDesc('date')->orderByDesc('time')->limit($count * $num)->get();

            if(count($logs) == 0)
                echo 'nok1';
            else{
                foreach ($logs as $key => $item){

                    if($key > (($num-1) * $count)-1) {

                        $ansToReview = getAnsToComments($item->id);

                        if(count($ansToReview) > 0)
                            $item->comment = $ansToReview;
                        else
                            $item->comment = array();

                        $item->user = User::select(['first_name', 'last_name', 'username', 'picture', 'uploadPhoto'])->find($item->visitorId);
                        if ($item->user->first_name != null)
                            $item->usernameReviewWriter = $item->user->first_name . ' ' . $item->user->last_name;
                        else
                            $item->usernameReviewWriter = $item->user->username;

                        if($item->user->uploadPhoto == 0){
                            $deffPic = \App\models\DefaultPic::find($item->user->picture);
                            if($deffPic != null)
                                $item->userPic = URL::asset('defaultPic/' . $deffPic->name);
                            else
                                $item->userPic = URL::asset('_images/nopic/blank.jpg');
                        }
                        else{
                            $item->userPic = URL::asset('userProfile/' . $item->user->picture);
                        }

                        $item->pics = ReviewPic::where('logId', $item->id)->get();
                        $item->assigned = ReviewUserAssigned::where('logId', $item->id)->get();

                        switch ($item->kindPlaceId) {
                            case 1:
                                $item->mainFile = 'amaken';
                                $item->place = Amaken::select(['id', 'name', 'cityId', 'file'])->find($item->placeId);
                                $item->kindPlace = 'اماکن';
                                break;
                            case 3:
                                $item->mainFile = 'restaurant';
                                $item->place = Restaurant::select(['id', 'name', 'cityId', 'file'])->find($item->placeId);
                                $item->kindPlace = 'رستوران';
                                break;
                            case 4:
                                $item->mainFile = 'hotels';
                                $item->place = Hotel::select(['id', 'name', 'cityId', 'file'])->find($item->placeId);
                                $item->kindPlace = 'هتل';
                                break;
                            case 6:
                                $item->mainFile = 'majara';
                                $item->place = Majara::select(['id', 'name', 'cityId', 'file'])->find($item->placeId);
                                $item->kindPlace = 'ماجرا';
                                break;
                            case 10:
                                $item->mainFile = 'sogatsanaie';
                                $item->place = SogatSanaie::select(['id', 'name', 'cityId', 'file'])->find($item->placeId);
                                $item->kindPlace = 'سوغات/صنایع';
                                break;
                            case 11:
                                $item->mainFile = 'mahalifood';
                                $item->place = MahaliFood::select(['id', 'name', 'cityId', 'file'])->find($item->placeId);
                                $item->kindPlace = 'غذای محلی';
                                break;
                        }

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
                            else{
                                $item2->url = URL::asset('userPhoto/' . $item->mainFile . '/' . $item->place->file . '/' . $item2->pic);
                            }
                        }

                        $item->city = Cities::find($item->place->cityId);
                        $item->state = State::find($item->city->stateId);

                        if (count($item->assigned) != 0) {
                            foreach ($item->assigned as $item2) {
                                if ($item2->userId != null) {
                                    $u = User::find($item2->userId);
                                    if ($u != null) {
                                        if ($u->first_name != null)
                                            $item2->name = $u->first_name . ' ' . $u->last_name;
                                        else
                                            $item2->name = $u->username;
                                    }
                                }
                            }
                        }

                        $item->ans = \DB::select('SELECT us.logId, us.questionId, us.ans, qus.id, qus.description, qus.ansType FROM questionAns AS us , questions AS qus WHERE us.logId = ' . $item->id . ' AND qus.id = us.questionId ORDER BY qus.ansType');
                        if (count($item->ans) != 0) {
                            foreach ($item->ans as $item2) {
                                if ($item2->ansType == 'multi') {
                                    $item2->ans = QuestionAns::where('questionId', $item2->id)->first()->ans;
                                }
                            }
                        }

                        $time = $item->date;
                        $time .= ' ' . substr($item->time, 0, 2) . ':' . substr($item->time, 2, 2);

                        $item->timeAgo = getDifferenceTimeString($time);

                        $item->like = ReviewFeedBack::where('logId', $item->id)->where('like', 1)->count();
                        $item->dislike = ReviewFeedBack::where('logId', $item->id)->where('like', -1)->count();

                        if (\auth()->check()) {
                            $u = \auth()->user();
                            $item->userLike = ReviewFeedBack::where('logId', $item->id)->where('userId', $u->id)->first();
                        } else
                            $item->userLike = null;
                    }
                }

                echo json_encode($logs);
            }
        }

        return;

    }

    public function likeReview(Request $request)
    {
        if(\auth()->check()) {
            if (isset($request->logId) && isset($request->like)) {
                $u = Auth::user();
                $condition = ['userId' => $u->id, 'logId' => $request->logId];
                $like = ReviewFeedBack::where($condition)->first();

                if($like == null){
                    $like = new ReviewFeedBack();
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

                echo 'ok';
            }
            else
                echo 'nok2';
        }
        else
            echo 'nok1';

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
                        $newLog->confirm = 1;
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

}