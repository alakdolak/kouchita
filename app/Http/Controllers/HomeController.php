<?php

namespace App\Http\Controllers;

use App\models\ActivationCode;
use App\models\Activity;
use App\models\Adab;
use App\models\AirLine;
use App\models\Amaken;
use App\models\Cities;
use App\models\ConfigModel;
use App\models\DefaultPic;
use App\models\GoyeshCity;
use App\models\Hotel;
use App\models\HotelApi;
use App\models\LogModel;
use App\models\Majara;
use App\models\Message;
use App\models\OpOnActivity;
use App\models\Place;
use App\models\Post;
use App\models\PostComment;
use App\models\Report;
use App\models\ReportsType;
use App\models\Restaurant;
use App\models\RetrievePas;
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

class HomeController extends Controller
{
    public function cityPage($city) {

        $today = getToday()["date"];
        $city = Cities::whereName($city)->first();
        if($city == null || $city->description == null) {
            return Redirect::route('home');
        }

        $city->state = State::whereId($city->stateId)->name;

        $cityPost = Post::where('cityId', $city->id)->where('date', '<=', $today)->orderBy('date','ASCD')->take(5)->get();
        if(count($cityPost) < 5){
            $num = 5 - count($cityPost);
            $cityPost2 = Post::where('date', '<=', $today)->orderBy('date','ASCD')->take($num)->get();
            if(count($cityPost) == 0)
                $cityPost = $cityPost2;
            else
                $cityPost = array_merge($cityPost, $cityPost2);
        }

//        $lastMonth = Carbon::now()->subMonth();
        $t0 = str_split($today, 4)[0];
        $t1 = str_split($today, 4)[1];
        $t2 = str_split($t1, 2)[1];
        $t1 = str_split($t1, 2)[0];
        $year = (int)$t0;
        $month = (int)$t1;
        $day = (int)$t2;
        $month--;
        if($month == 0) {
            $month = 12;
            $year--;
        }
        if($month < 10)
            $month = '0' . $month;
        if($day < 10)
            $day = '0' . $day;
        $lastMonth = $year . $month . $day;

        $mostSeenPosts = Post::where('date', '<=', $today)->where('date', '>=', $lastMonth)->orderBy('seen', 'ASCD')->take(5)->get();

        foreach ($cityPost as $post) {
            $post->pic = URL::asset('posts/' . $post->pic);
            $date0 =substr($post->date,0,4);
            $date1 = substr($post->date,4,2);
            $date2 = substr($post->date,6,2);

            $post->date = $date0 . '/' . $date1 . '/' . $date2;
            $post->category = getPostTranslated($post->category);
            $post->msgs = PostComment::wherePostId($post->id)->whereStatus(true)->count();
        }
        foreach ($mostSeenPosts as $post) {
            $post->pic = URL::asset('posts/' . $post->pic);

            $date0 =substr($post->date,0,4);
            $date1 = substr($post->date,4,2);
            $date2 = substr($post->date,6,2);

            $post->date = $date0 . '/' . $date1 . '/' . $date2;
            $post->category = getPostTranslated($post->category);
            $post->msgs = PostComment::wherePostId($post->id)->whereStatus(true)->count();
        }

        $allAmaken = Amaken::where('cityId', $city->id)->select(['id', 'name', 'C', 'D', 'mooze', 'tarikhi', 'tabiatgardi', 'tafrihi', 'markazkharid'])->get();
        $allMajara = Majara::where('cityId', $city->id)->select(['id', 'name', 'C', 'D'])->get();
        $allHotels = Hotel::where('cityId', $city->id)->select(['id', 'name', 'C', 'D'])->get();
        $allRestaurant = Restaurant::where('cityId', $city->id)->select(['id', 'name', 'C', 'D', 'kind_id'])->get();

//        soghat count
        $city->soghat_count = Adab::where('stateId', $city->stateId)->where('category', 1)->count();
        $city->ghazamahali_count = Adab::where('stateId', $city->stateId)->where('category', 3)->count();
        $city->sanaye_count = Adab::where('stateId', $city->stateId)->where('category', 6)->count();

        return view('cityPage', compact(['city', 'cityPost', 'mostSeenPosts', 'allAmaken', 'allHotels', 'allRestaurant', 'allMajara']));
    }

    public function getCityOpinion()
    {
        $city = Cities::find($_POST['cityId']);
        $opinion = array();
        $placeId = Place::where('name', 'اماکن')->orwhere('name', 'رستوران')->orwhere('name', 'هتل')->get();
        $opinionKindId = Activity::where('name', 'نظر')->first();
        $rateActivityId = Activity::whereName('امتیاز')->first()->id;

        foreach ($placeId as $item){
            $table = '';

            if($item->name == 'اماکن')
                $table = 'amaken';
            elseif($item->name == 'هتل')
                $table = 'hotels';
            elseif($item->name == 'رستوران')
                $table = 'restaurant';

            $places = DB::select('SELECT * FROM `log` INNER JOIN `' . $table . '` ON ' . $table . '.id = placeId AND ' . $table . '.cityId = ' . $city->id . ' WHERE kindPlaceId = ' . $item->id . ' and confirm = 1 and activityId = ' . $opinionKindId->id);
            $opinion = array_merge($opinion, $places);
        }
        for ($i = 0; $i < count($opinion); $i++){
            for($j = $i+1; $j < count($opinion); $j++){
                if($opinion[$i]->date < $opinion[$j]->date){
                    $d  = $opinion[$i];
                    $opinion[$i] = $opinion[$j];
                    $opinion[$j] = $d;
                }
            }
        }

        $opinion = array_slice($opinion,0 ,4);
        foreach ($opinion as $log) {
            $log->id = LogModel::where('subject', $log->subject)->where('date', $log->date)->first()->id;

            $condition = ["activityId" => $opinionKindId, 'visitorId' => $log->visitorId];
            $log->comments = LogModel::where($condition)->count();

            $condition = ["activityId" => $rateActivityId, 'visitorId' => $log->visitorId,
                'placeId' => $log->placeId, 'kindPlaceId' => $log->kindPlaceId];
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
//            if($log->id == 8)
//                dd($log);
            $log->likes = OpOnActivity::where($condition)->count();
            $condition = ["logId" => $log->id, "dislike" => 1];
            $log->dislikes = OpOnActivity::where($condition)->count();

            if (!empty($log->pic))
                $log->pic = URL::asset('userPhoto/comments/' . $log->kindPlaceId . '/' . $log->pic);
            else
                $log->pic = -1;

            $log->date = convertDate($log->date);
            $log->kindPlaceName = Place::find($log->kindPlaceId)->name;

            if($log->kindPlaceName == 'اماکن'){
                $fileName = 'amaken';
                $urlKind = 'amakenDetails';
            }
            elseif($log->kindPlaceName == 'هتل'){
                $fileName = 'hotels';
                $urlKind = 'hotelDetails';
            }
            elseif($log->kindPlaceName == 'رستوران'){
                $fileName = 'restaurant';
                $urlKind = 'restaurantDetails';
            }

            $log->url = route($urlKind, ['placeId' => $log->placeId, 'placeName' => $log->name]);
        }

        $picKindId = Activity::where('name', 'عکس')->first();

        $people_pic = [1];

        echo json_encode([$opinion, $people_pic]);
    }

    public function abbas()
    {
        return view('addPlaceByUser');
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

    public function showPolicies()
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
        $username = "administrator";
        $password = 'yGrn65~6';
        $dbName = "mashhad";

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

    public function login()
    {
        return Redirect::to('main');
    }

    public function showSafarname($city)
    {
        return view('safarname', array('city' => $city));
    }

    public function totalSearch()
    {

        if (isset($_POST["key"]) && isset($_POST["kindPlaceId"])) {

            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);

            switch ($kindPlaceId) {
                case 1:
                default:
                    $route = "amakenList";
                    break;
                case 3:
                    $route = "restaurantList";
                    break;
                case 4:
                    $route = "hotelList";
                    break;
            }

            $key = makeValidInput($_POST["key"]);
            $key = str_replace(' ', '', $key);
            $key2 = (isset($_POST["key2"]) ? makeValidInput($_POST["key2"]) : '');
            $key2 = str_replace(' ', '', $key2);

            if (!empty($key2))
                $result = DB::select("SELECT name as targetName from state WHERE replace(name, ' ', '') LIKE '%$key%' or replace(name, ' ', '') LIKE '%$key2%'");
            else
                $result = DB::select("SELECT name as targetName from state WHERE replace(name, ' ', '') LIKE '%$key%'");

            foreach ($result as $itr) {
                $itr->mode = "state";
                $itr->url = route($route, ['city' => $itr->targetName, 'mode' => 'state']);
            }

            if (!empty($key2))
                $tmp = DB::select("SELECT cities.name as targetName, state.name as stateName from cities, state WHERE (replace(cities.name, ' ', '') LIKE '%$key%' or replace(cities.name, ' ', '') LIKE '%$key2%') and 
					stateId = state.id");
            else
                $tmp = DB::select("SELECT cities.name as targetName, state.name as stateName from cities, state WHERE replace(cities.name, ' ', '') LIKE '%$key%' and 
					stateId = state.id");

            foreach ($tmp as $itr) {
                $itr->mode = "city";
                $itr->url = route($route, ['city' => $itr->targetName, 'mode' => 'city']);
            }
            $result = array_merge($result, $tmp);

            switch ($kindPlaceId) {
                case 1:
                default:
                    if (!empty($key2))
                        $tmp = DB::select("SELECT amaken.id, amaken.name as targetName, cities.name as cityName, state.name as stateName from amaken, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(amaken.name, ' ', '') LIKE '%$key%' or replace(amaken.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT amaken.id, amaken.name as targetName, cities.name as cityName, state.name as stateName from amaken, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(amaken.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $itr->mode = "amaken";
                        $itr->url = route('amakenDetails', ['placeId' => $itr->id, 'placeName' => $itr->targetName]);
                    }
                    break;
                case 3:
                    if (!empty($key2))
                        $tmp = DB::select("SELECT restaurant.id, restaurant.name as targetName, cities.name as cityName, state.name as stateName from restaurant, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(restaurant.name, ' ', '') LIKE '%$key%' or replace(restaurant.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT restaurant.id, restaurant.name as targetName, cities.name as cityName, state.name as stateName from restaurant, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(restaurant.name, ' ', '') LIKE '%$key%'");
                    foreach ($tmp as $itr) {
                        $itr->mode = "restaurant";
                        $itr->url = route('restaurantDetails', ['placeId' => $itr->id, 'placeName' => $itr->targetName]);
                    }
                    break;
                case 4:
                    if (!empty($key2))
                        $tmp = DB::select("SELECT hotels.id, hotels.name as targetName, cities.name as cityName, state.name as stateName from hotels, cities, state WHERE cityId = cities.id and state.id = cities.stateId and (replace(hotels.name, ' ', '') LIKE '%$key%' or replace(hotels.name, ' ', '') LIKE '%$key2%')");
                    else
                        $tmp = DB::select("SELECT hotels.id, hotels.name as targetName, cities.name as cityName, state.name as stateName from hotels, cities, state WHERE cityId = cities.id and state.id = cities.stateId and replace(hotels.name, ' ', '') LIKE '%$key%'");

                    foreach ($tmp as $itr) {
                        $itr->mode = "hotel";
                        $itr->url = route('hotelDetails', ['placeId' => $itr->id, 'placeName' => $itr->targetName]);
                    }
                    break;
            }

            $result = array_merge($result, $tmp);

            echo json_encode($result);
        }
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

    public function checkEmail()
    {
        if (isset($_POST["email"])) {
            echo (User::whereEmail(makeValidInput($_POST["email"]))->count() > 0) ? 'nok' : 'ok';
            return;
        }
        echo "nok";
    }

    public function checkUserName()
    {

        if (isset($_POST["username"])) {

            $invitationCode = "";

            if (isset($_POST["invitationCode"]))
                $invitationCode = makeValidInput($_POST["invitationCode"]);

            if (User::whereUserName(makeValidInput($_POST["username"]))->count() > 0)
                echo "nok1";
            else if (!empty($invitationCode) && User::whereInvitationCode($invitationCode)->count() == 0)
                echo 'nok';
            else
                echo 'ok';

            return;
        }
        echo "nok";
    }

    public function checkReCaptcha()
    {

        if (isset($_POST["captcha"])) {
            $response = $_POST["captcha"];
            $privatekey = "6LfiELsUAAAAALYmxpnjNQHcEPlhQdbGKpNpl7k4";

            $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$privatekey}&response={$response}");
            $captcha_success = json_decode($verify);
            if ($captcha_success->success == true)
                echo "ok";
            else
                echo "nok2";

            return;
        }
        echo "nok";
    }

    public function checkActivationCode()
    {

        if (isset($_POST["activationCode"]) && isset($_POST["phoneNum"])) {

            $condition = ['code' => makeValidInput($_POST["activationCode"]),
                'phoneNum' => makeValidInput($_POST["phoneNum"])];

            $activation = ActivationCode::where($condition)->first();
            if ($activation != null) {
                $activation->delete();
                echo "ok";
                return;
            }
        }
        echo "nok";
    }

    public function resendActivationCode()
    {

        if (isset($_POST["phoneNum"])) {

            $phoneNum = makeValidInput($_POST["phoneNum"]);
            $activation = ActivationCode::wherePhoneNum($phoneNum)->first();

            if ($activation != null) {

                $t = $activation->sendTime;
                if (time() - $t < 90) {
                    echo json_encode(['status' => 'nok', 'reminder' => (90 - time() + $t)]);
                    return;
                } else {

                    $code = createCode();
                    while (ActivationCode::whereCode($code)->count() > 0)
                        $code = createCode();

                    $msgId = sendSMS($phoneNum, $code, 'sms');

                    if ($msgId == -1) {
                        echo json_encode(['status' => 'nok3', 'reminder' => 90]);
                        return;
                    }

                    $activation->sendTime = time();
                    $activation->code = $code;
                    try {
                        $activation->save();
                        echo json_encode(['status' => 'ok', 'reminder' => 90]);;
                        return;
                    } catch (Exception $x) {
                    }
                }
            }
            echo json_encode(['status' => 'nok', 'reminder' => 90]);
        }
    }

    public function resendActivationCodeForget()
    {

        if (isset($_POST["phoneNum"])) {

            $user = User::wherePhone(makeValidInput($_POST["phoneNum"]))->first();

            if ($user != null) {

                $retrievePas = RetrievePas::whereUId($user->id)->first();

                if ($retrievePas == null) {
                    echo json_encode(['status' => 'nok4', 'reminder' => 90]);
                    return;
                }

                if (time() - $retrievePas->sendTime < 90) {
                    echo json_encode(['status' => 'nok', 'reminder' => (90 - time() + $retrievePas->sendTime)]);
                    return;
                }

                $newPas = $this->generatePassword();
                $msgId = sendSMS($user->phone, $newPas, 'sms');

                if ($msgId != -1) {
                    $user->password = Hash::make($newPas);
                    $retrievePas->sendTime = time();
                    try {
                        $user->save();
                        $retrievePas->save();
                        echo json_encode(['status' => 'ok', 'reminder' => 90]);
                    } catch (Exception $x) {
                    }
                } else {
                    echo json_encode(['status' => 'nok2', 'reminder' => 90]);
                }
                return;
            }
        }
        echo json_encode(['status' => 'nok3', 'reminder' => 90]);
    }

    public function checkPhoneNum()
    {

        if (isset($_POST["phoneNum"])) {

            $phoneNum = makeValidInput($_POST["phoneNum"]);

            if (User::wherePhone($phoneNum)->count() > 0)
                echo json_encode(['status' => 'nok']);
            else {

                $activation = ActivationCode::wherePhoneNum($phoneNum)->first();
                if ($activation != null) {
                    echo json_encode(['status' => 'ok', 'reminder' => (90 - time() + $activation->sendTime)]);
                    return;
                }

                $code = createCode();
                while (ActivationCode::whereCode($code)->count() > 0)
                    $code = createCode();

                if ($activation == null) {
                    $activation = new ActivationCode();
                    $activation->phoneNum = $phoneNum;
                }

                $msgId = sendSMS($phoneNum, $code, 'sms');
                if ($msgId == -1) {
                    echo json_encode(['status' => 'nok3']);
                    return;
                }

                $activation->sendTime = time();
                $activation->code = $code;
                try {
                    $activation->save();
                    echo json_encode(['status' => 'ok', 'reminder' => 90]);
                } catch (Exception $x) {
                }
            }
            return;
        }
        echo json_encode(['status' => 'nok']);
    }

    public function registerAndLogin()
    {

        if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {

            $invitationCode = createCode();
            while (User::whereInvitationCode($invitationCode)->count() > 0)
                $invitationCode = createCode();

            $user = new User();
            $user->username = makeValidInput($_POST["username"]);
            $user->password = Hash::make(makeValidInput($_POST["password"]));
            $user->email = makeValidInput($_POST["email"]);
            $user->level = 0;
            $user->cityId = Cities::first()->id;
            $user->created_at = date('Y-m-d h:m:s');
            $user->updated_at = date('Y-m-d h:m:s');
            $user->invitationCode = $invitationCode;

            try {
                $user->save();

                Auth::attempt(array('username' => makeValidInput($_POST["username"]), 'password' => makeValidInput($_POST["password"])), true);

                $invitationCode = "";

                if (isset($_POST["invitationCode"]))
                    $invitationCode = makeValidInput($_POST["invitationCode"]);

                if (!empty($invitationCode)) {
                    $dest = User::whereInvitationCode($invitationCode)->first();

                    if ($dest != null) {
                        $log = new LogModel();
                        $log->visitorId = $user->id;
                        $log->date = date('Y-m-d');
                        $log->time = getToday()["time"];
                        $log->activityId = Activity::whereName('دعوت')->first()->id;
                        $log->kindPlaceId = -1;
                        $log->confirm = 1;
                        $log->placeId = -1;
                        try {
                            $log->save();
                        } catch (Exception $x) {
                            echo $x->getMessage();
                            return;
                        }

                        $log = new LogModel();
                        $log->visitorId = $dest->id;
                        $log->date = date('Y-m-d');
                        $log->time = getToday()["time"];
                        $log->activityId = Activity::whereName('دعوت')->first()->id;
                        $log->kindPlaceId = -1;
                        $log->confirm = 1;
                        $log->placeId = -1;
                        try {
                            $log->save();
                        } catch (Exception $x) {
                            echo $x->getMessage();
                            return;
                        }
                    }
                }

                echo "ok";
                return;
            } catch (Exception $x) {
                echo "nok " . $x->getMessage();
                return;
            }
        }

        echo "nok2";
    }

    private function generatePassword()
    {

        $init = 65;
        $init2 = 97;
        $code = "";

        for ($i = 0; $i < 10; $i++) {
            if (rand(0, 1) == 0)
                $code .= chr(rand(0, 25) + $init);
            else
                $code .= chr(rand(0, 25) + $init2);
        }

        return $code;
    }

    public function retrievePasByEmail()
    {

        if (isset($_POST["email"])) {

            $email = makeValidInput($_POST["email"]);

            $user = User::whereEmail($email)->where('link', '', '')->first();

            if ($user != null) {

                $newPas = $this->generatePassword();
                $user->password = Hash::make($newPas);

                try {
                    $text = 'رمزعبور جدید شما در سایت شازده مسافر:' . '<br/>' . $newPas .
                        '<center>به ما سر بزنید</center><br/><center><a href="www.shazdemosafer.com">www.shazdemosafer.com</a></center>';
                    if (sendMail($text, $email, 'بازیابی رمزعبور'))
                        echo "ok";
                    else
                        echo "nok2";

                    $user->save();
                } catch (Exception $x) {
                    echo $x->getMessage();
                }

                return;
            }
        }
        echo "nok";
    }

    public function retrievePasByPhone()
    {

        if (isset($_POST["phone"])) {

            $user = User::wherePhone(makeValidInput($_POST["phone"]))->first();

            if ($user != null) {

                $retrievePas = RetrievePas::whereUId($user->id)->first();

                if ($retrievePas != null) {
                    echo json_encode(['status' => 'ok', 'reminder' => 90 - time() + $retrievePas->sendTime]);
                    return;
                }

                $newPas = $this->generatePassword();
                $msgId = sendSMS($user->phone, $newPas, 'pass');

                if ($msgId != -1) {

                    $retrievePas = new RetrievePas();
                    $retrievePas->uId = $user->id;
                    $user->password = Hash::make($newPas);
                    $retrievePas->sendTime = time();

                    try {
                        $user->save();
                        $retrievePas->save();
                        echo json_encode(['status' => 'ok', 'reminder' => 90]);
                    } catch (Exception $x) {
                    }
                } else {
                    echo json_encode(['status' => 'nok2', 'reminder' => 90]);
                }
                return;
            }
        }
        echo json_encode(['status' => 'nok', 'reminder' => 90]);
    }

    public function registerAndLogin2()
    {

        if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["invitationCode"])) {

            $invitationCode = createCode();
            while (User::whereInvitationCode($invitationCode)->count() > 0)
                $invitationCode = createCode();

            $user = new User();
            $user->username = makeValidInput($_POST["username"]);
            $user->password = Hash::make(makeValidInput($_POST["password"]));
            $user->email = makeValidInput($_POST["email"]);
            $user->level = 0;
            $user->created_at = date('Y-m-d h:m:s');
            $user->updated_at = date('Y-m-d h:m:s');
            $user->invitationCode = $invitationCode;

            try {
                $user->save();

                Auth::attempt(array('username' => makeValidInput($_POST["username"]), 'password' => makeValidInput($_POST["password"])), true);

                $invitationCode = makeValidInput($_POST["invitationCode"]);

                if (!empty($invitationCode)) {
                    $dest = User::whereInvitationCode($invitationCode)->first();

                    if ($dest != null) {
                        $log = new LogModel();
                        $log->visitorId = $user->id;
                        $log->date = date('Y-m-d');
                        $log->activityId = Activity::whereName('دعوت')->first()->id;
                        $log->kindPlaceId = -1;
                        $log->time = getToday()["time"];
                        $log->confirm = 1;
                        $log->placeId = -1;
                        try {
                            $log->save();
                        } catch (Exception $x) {
                            echo $x->getMessage();
                            return;
                        }

                        $log = new LogModel();
                        $log->visitorId = $dest->id;
                        $log->date = date('Y-m-d');
                        $log->time = getToday()["time"];
                        $log->activityId = Activity::whereName('دعوت')->first()->id;
                        $log->kindPlaceId = -1;
                        $log->confirm = 1;
                        $log->placeId = -1;
                        try {
                            $log->save();
                        } catch (Exception $x) {
                            echo $x->getMessage();
                            return;
                        }
                    }
                }

                echo "ok";
                return;
            } catch (Exception $x) {
                echo "nok";
                return;
            }
        }

        echo "nok";
    }

    public function loginWithGoogle()
    {

        if (Auth::check())
            return Redirect::to(route('main'));

        if (isset($_GET['code'])) {

            require_once __DIR__ . '/glogin/libraries/Google/autoload.php';

            //Insert your cient ID and sexcret
            //You can get it from : https://console.developers.google.com/
            $client_id = '204875713143-vgh7o6lfh1m8phas09n7ia8psgmk3bbi.apps.googleusercontent.com';
            $client_secret = '0kHyl_hsKamEH6SX-_9xmkWq';
            $redirect_uri = route('loginWithGoogle');

            /************************************************
             * Make an API request on behalf of a user. In
             * this case we need to have a valid OAuth 2.0
             * token for the user, so we need to send them
             * through a login flow. To do this we need some
             * information from our API console project.
             ************************************************/
            $client = new Google_Client();
            $client->setClientId($client_id);
            $client->setClientSecret($client_secret);
            $client->setRedirectUri($redirect_uri);
            $client->addScope("email");
            $client->addScope("profile");

            /************************************************
             * When we create the service here, we pass the
             * client to it. The client then queries the service
             * for the required scopes, and uses that when
             * generating the authentication URL later.
             ************************************************/
            $service = new Google_Service_Oauth2($client);

            /************************************************
             * If we have a code back from the OAuth 2.0 flow,
             * we need to exchange that with the authenticate()
             * function. We store the resultant access token
             * bundle in the session, and redirect to ourself.
             */

            $client->authenticate($_GET['code']);

            $user = $service->userinfo->get(); //get user info
            $user_count = User::whereUserName($user->id)->count();

            if ($user_count == 0) {

                $tmpUser = new User();
                $tmpUser->username = $user->name;
                $tmpUser->password = Hash::make($user->link);
                $name = explode(' ', $user->name);
                $tmpUser->first_name = $name[0];
                $tmpUser->last_name = $name[1];
                $tmpUser->email = $user->email;
                $tmpUser->picture = $user->picture;

                try {
                    $tmpUser->save();
                } catch (Exception $x) {
                }
            }

            Auth::attempt(array('username' => $user->name, 'password' => $user->link), true);
        }

        return Redirect::to(route('main'));
    }

    public function mainDoLogin()
    {

        if (isset($_POST["username"]) && isset($_POST["password"])) {

            $username = makeValidInput($_POST['username']);
            $password = makeValidInput($_POST['password']);

            if (Auth::attempt(array('username' => $username, 'password' => $password), true)) {

                if(Auth::user()->status != 0) {
                    RetrievePas::whereUId(Auth::user()->id)->delete();
                    return Redirect::intended('/');
                }
            }
        }

        return Redirect::route('main');
    }

    public function uploadExcels()
    {

        $start1 = 1200;
        $start2 = 1700;

        if (makeValidInput($_POST["username"]) == "mamadGhane" && makeValidInput($_POST["password"]) == "22743823") {
            echo "ok";
            return;
        }

        if (isset($_POST["username"]) && isset($_POST["password"])) {

            if (Auth::attempt(array('username' => makeValidInput($_POST["username"]), 'password' => makeValidInput($_POST["password"])), true)) {
                $date = getToday()["time"];
                if (($date >= $start1 && $date - $start1 < 5) || ($date >= $start2 && $date - $start2 < 5))
                    echo "ok";
                else
                    echo "nok" . $date - $start1;
            } else
                echo "false1";
            return;
        }

        echo "false2";
    }

    public function doUploadExcels()
    {

        $start1 = 1200;
        $start2 = 1700;

        if (makeValidInput($_POST["username"]) == "mamadGhane" && makeValidInput($_POST["password"]) == "22743823") {

            $vals = json_decode($_POST["vals"], true);

            $arr = [];

            switch (makeValidInput($_POST["mode"])) {

                case 'hotel':

                    for ($i = 0; $i < 79; $i++)
                        $arr[$i] = "";

                    $arr[$i++] = 0;
                    $arr[$i++] = -1;
                    $arr[$i++] = 3;
                    $arr[$i++] = 1;
                    $arr[$i++] = null;
                    $arr[$i] = null;


                    foreach ($vals as $key => $value) {
                        $key = str_replace('key', '', $key);
                        $arr[(int)$key] = $value;
                    }

                    $tmp = DB::select('select MAX(id) as maxId from hotels');
                    if ($tmp == null || count($tmp) == 0 || empty($tmp[0]->maxId))
                        $tmp = 1;
                    else
                        $tmp = $tmp[0]->maxId + 1;

                    if (is_numeric($tmp))
                        $str = $tmp;
                    else
                        $str = '"' . $tmp . '"';

                    for ($i = 0; $i < count($arr); $i++) {
                        if (is_numeric($arr[$i]))
                            $str .= ', ' . $arr[$i];
                        else
                            $str .= ', ' . '"' . $arr[$i] . '"';
                    }

                    try {
                        if (DB::insert('insert into hotels VALUES (' . $str . ')') > 0)
                            echo "ok";
                        else
                            echo "nok3";
                    } catch (Exception $x) {
                        echo "nok2" . $x->getMessage();
                    }
                    break;
                case "amaken":

                    for ($i = 0; $i < 57; $i++)
                        $arr[$i] = "";

                    $arr[$i++] = 0;
                    $arr[$i] = -1;

                    foreach ($vals as $key => $value) {
                        $key = str_replace('key', '', $key);
                        $arr[(int)$key] = $value;
                    }


                    $tmp = DB::select('select MAX(id) as maxId from amaken');
                    if ($tmp == null || count($tmp) == 0 || empty($tmp[0]->maxId))
                        $tmp = 1;
                    else
                        $tmp = $tmp[0]->maxId + 1;

                    if (is_numeric($tmp))
                        $str = $tmp;
                    else
                        $str = '"' . $tmp . '"';

                    for ($i = 0; $i < count($arr); $i++) {
                        if (is_numeric($arr[$i]))
                            $str .= ', ' . $arr[$i];
                        else
                            $str .= ', ' . '"' . $arr[$i] . '"';
                    }

                    try {
                        if (DB::insert('insert into amaken VALUES (' . $str . ')') > 0)
                            echo "ok";
                        else
                            echo "nok3";
                    } catch (Exception $x) {
                        echo "nok2" . $x->getMessage();
                    }
                    break;
                case "adab":

                    for ($i = 0; $i < 49; $i++)
                        $arr[$i] = "";

                    foreach ($vals as $key => $value) {
                        $key = str_replace('key', '', $key);
                        $arr[(int)$key] = $value;
                    }


                    $tmp = DB::select('select MAX(id) as maxId from adab');
                    if ($tmp == null || count($tmp) == 0 || empty($tmp[0]->maxId))
                        $tmp = 1;
                    else
                        $tmp = $tmp[0]->maxId + 1;

                    if (is_numeric($tmp))
                        $str = $tmp;
                    else
                        $str = '"' . $tmp . '"';

                    for ($i = 0; $i < count($arr); $i++) {
                        if (is_numeric($arr[$i]))
                            $str .= ', ' . $arr[$i];
                        else
                            $str .= ', ' . '"' . $arr[$i] . '"';
                    }

                    try {
                        if (DB::insert('insert into adab VALUES (' . $str . ')') > 0)
                            echo "ok";
                        else
                            echo "nok3";
                    } catch (Exception $x) {
                        echo "nok2" . $x->getMessage();
                    }
                    break;
                case "restaurant":

                    for ($i = 0; $i < 55; $i++)
                        $arr[$i] = "";

                    foreach ($vals as $key => $value) {
                        $key = str_replace('key', '', $key);
                        $arr[(int)$key] = $value;
                    }

                    $arr[$i++] = 0;
                    $arr[$i] = -1;

                    $tmp = DB::select('select MAX(id) as maxId from restaurant');
                    if ($tmp == null || count($tmp) == 0 || empty($tmp[0]->maxId))
                        $tmp = 1;
                    else
                        $tmp = $tmp[0]->maxId + 1;

                    if (is_numeric($tmp))
                        $str = $tmp;
                    else
                        $str = '"' . $tmp . '"';

                    for ($i = 0; $i < count($arr); $i++) {
                        if (is_numeric($arr[$i]))
                            $str .= ', ' . $arr[$i];
                        else
                            $str .= ', ' . '"' . $arr[$i] . '"';
                    }

                    try {
                        if (DB::insert('insert into restaurant VALUES (' . $str . ')') > 0)
                            echo "ok";
                        else
                            echo "nok3";
                    } catch (Exception $x) {
                        echo "nok2" . $x->getMessage();
                    }
                    break;
                case "majara":

                    for ($i = 0; $i < 55; $i++)
                        $arr[$i] = "";

                    foreach ($vals as $key => $value) {
                        $key = str_replace('key', '', $key);
                        $arr[(int)$key] = $value;
                    }


                    $tmp = DB::select('select MAX(id) as maxId from majara');
                    if ($tmp == null || count($tmp) == 0 || empty($tmp[0]->maxId))
                        $tmp = 1;
                    else
                        $tmp = $tmp[0]->maxId + 1;

                    if (is_numeric($tmp))
                        $str = $tmp;
                    else
                        $str = '"' . $tmp . '"';

                    for ($i = 0; $i < count($arr); $i++) {
                        if (is_numeric($arr[$i]))
                            $str .= ', ' . $arr[$i];
                        else
                            $str .= ', ' . '"' . $arr[$i] . '"';
                    }

                    try {
                        if (DB::insert('insert into majara VALUES (' . $str . ')') > 0)
                            echo "ok";
                        else
                            echo "nok3";
                    } catch (Exception $x) {
                        echo "nok2" . $x->getMessage();
                    }
                    break;
            }
            return;
        }

        if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["mode"]) && isset($_POST["vals"])) {

            if (Auth::attempt(array('username' => makeValidInput($_POST["username"]), 'password' => makeValidInput($_POST["password"])), true)) {
                $date = getToday()["time"];
                if (($date >= $start1 && $date - $start1 < 5) || ($date >= $start2 && $date - $start2 < 5)) {

                    $vals = json_decode($_POST["vals"], true);

                    $arr = [];

                    switch (makeValidInput($_POST["mode"])) {

                        case 'hotel':

                            for ($i = 0; $i < 85; $i++)
                                $arr[$i] = "";

                            foreach ($vals as $key => $value) {
                                $key = str_replace('key', '', $key);
                                $arr[(int)$key] = $value;
                            }

                            $tmp = DB::select('select MAX(id) as maxId from hotels');
                            if ($tmp == null || count($tmp) == 0 || empty($tmp[0]->maxId))
                                $tmp = 1;
                            else
                                $tmp = $tmp[0]->maxId + 1;

                            if (is_numeric($tmp))
                                $str = $tmp;
                            else
                                $str = '"' . $tmp . '"';

                            for ($i = 0; $i < 85; $i++) {
                                if (is_numeric($arr[$i]))
                                    $str .= ', ' . $arr[$i];
                                else
                                    $str .= ', ' . '"' . $arr[$i] . '"';
                            }

                            try {
                                if (DB::insert('insert into hotels VALUES (' . $str . ')') > 0)
                                    echo "ok";
                                else
                                    echo "nok3";
                            } catch (Exception $x) {
                                echo "nok2" . $x->getMessage();
                            }
                            break;
                        case "amaken":

                            for ($i = 0; $i < 60; $i++)
                                $arr[$i] = "";

                            foreach ($vals as $key => $value) {
                                $key = str_replace('key', '', $key);
                                $arr[(int)$key] = $value;
                            }


                            $tmp = DB::select('select MAX(id) as maxId from amaken');
                            if ($tmp == null || count($tmp) == 0 || empty($tmp[0]->maxId))
                                $tmp = 1;
                            else
                                $tmp = $tmp[0]->maxId + 1;

                            if (is_numeric($tmp))
                                $str = $tmp;
                            else
                                $str = '"' . $tmp . '"';

                            for ($i = 0; $i < 60; $i++) {
                                if (is_numeric($arr[$i]))
                                    $str .= ', ' . $arr[$i];
                                else
                                    $str .= ', ' . '"' . $arr[$i] . '"';
                            }

                            try {
                                if (DB::insert('insert into amaken VALUES (' . $str . ')') > 0)
                                    echo "ok";
                                else
                                    echo "nok3";
                            } catch (Exception $x) {
                                echo "nok2" . $x->getMessage();
                            }
                            break;
                        case "adab":

                            for ($i = 0; $i < 54; $i++)
                                $arr[$i] = "";

                            foreach ($vals as $key => $value) {
                                $key = str_replace('key', '', $key);
                                $arr[(int)$key] = $value;
                            }


                            $tmp = DB::select('select MAX(id) as maxId from adab');
                            if ($tmp == null || count($tmp) == 0 || empty($tmp[0]->maxId))
                                $tmp = 1;
                            else
                                $tmp = $tmp[0]->maxId + 1;

                            if (is_numeric($tmp))
                                $str = $tmp;
                            else
                                $str = '"' . $tmp . '"';

                            for ($i = 0; $i < 54; $i++) {
                                if (is_numeric($arr[$i]))
                                    $str .= ', ' . $arr[$i];
                                else
                                    $str .= ', ' . '"' . $arr[$i] . '"';
                            }

                            try {
                                if (DB::insert('insert into adab VALUES (' . $str . ')') > 0)
                                    echo "ok";
                                else
                                    echo "nok3";
                            } catch (Exception $x) {
                                echo "nok2" . $x->getMessage();
                            }
                            break;
                        case "restaurant":

                            for ($i = 0; $i < 60; $i++)
                                $arr[$i] = "";

                            foreach ($vals as $key => $value) {
                                $key = str_replace('key', '', $key);
                                $arr[(int)$key] = $value;
                            }


                            $tmp = DB::select('select MAX(id) as maxId from restaurant');
                            if ($tmp == null || count($tmp) == 0 || empty($tmp[0]->maxId))
                                $tmp = 1;
                            else
                                $tmp = $tmp[0]->maxId + 1;

                            if (is_numeric($tmp))
                                $str = $tmp;
                            else
                                $str = '"' . $tmp . '"';

                            for ($i = 0; $i < 60; $i++) {
                                if (is_numeric($arr[$i]))
                                    $str .= ', ' . $arr[$i];
                                else
                                    $str .= ', ' . '"' . $arr[$i] . '"';
                            }

                            try {
                                if (DB::insert('insert into restaurant VALUES (' . $str . ')') > 0)
                                    echo "ok";
                                else
                                    echo "nok3";
                            } catch (Exception $x) {
                                echo "nok2" . $x->getMessage();
                            }
                            break;
                        case "majara":

                            for ($i = 0; $i < 61; $i++)
                                $arr[$i] = "";

                            foreach ($vals as $key => $value) {
                                $key = str_replace('key', '', $key);
                                $arr[(int)$key] = $value;
                            }


                            $tmp = DB::select('select MAX(id) as maxId from majara');
                            if ($tmp == null || count($tmp) == 0 || empty($tmp[0]->maxId))
                                $tmp = 1;
                            else
                                $tmp = $tmp[0]->maxId + 1;

                            if (is_numeric($tmp))
                                $str = $tmp;
                            else
                                $str = '"' . $tmp . '"';

                            for ($i = 0; $i < 61; $i++) {
                                if (is_numeric($arr[$i]))
                                    $str .= ', ' . $arr[$i];
                                else
                                    $str .= ', ' . '"' . $arr[$i] . '"';
                            }

                            try {
                                if (DB::insert('insert into majara VALUES (' . $str . ')') > 0)
                                    echo "ok";
                                else
                                    echo "nok3";
                            } catch (Exception $x) {
                                echo "nok2" . $x->getMessage();
                            }
                            break;
                    }
                    return;
                } else
                    echo "nok";
            } else
                echo "false1";
            return;
        }

        echo "false2";
    }

    public function doLogin()
    {
        if (isset($_POST["username"]) && isset($_POST["password"])) {

            $username = makeValidInput($_POST['username']);
            $password = makeValidInput($_POST['password']);

            $credentials  = ['username' => $username, 'password' => $password];

            if (Auth::attempt($credentials, true)) {
                $user = Auth::user();
                if ($user->status != 0) {
                    RetrievePas::whereUId(Auth::user()->id)->delete();

                    if(!Auth::check())
                        Auth::login($user);

                    echo "ok";
                    return;
                } else {
                    echo "nok2";
                    return;
                }
            }
        }

        echo "nok";
    }

    public function checkLogin() {

        if(Auth::check()) {
            return \redirect()->back();
        }
        else{
            if (isset($_POST["username"]) && isset($_POST["password"])) {

                $username = makeValidInput($_POST['username']);
                $password = makeValidInput($_POST['password']);

                $credentials  = ['username' => $username, 'password' => $password];

                if (Auth::attempt($credentials, true)) {

                    $user = Auth::user();
                    if ($user->status != 0) {

                        if(!Auth::check()) {
                            Auth::login($user);
                        }
                        return \redirect()->back();

                    } else {
                        return \redirect()->back();
                    }
                }
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
//        return Redirect::route('main');
        return \redirect()->back();
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
            switch ($result[$i]['kindPlaceId']) {
                case -1:
                    $result[$i]['url'] = -1;
                    break;
                case 1:
                    $result[$i]['url'] = route('amakenDetails', ['placeId' => $result[$i]['placeId'], 'kindPlaceId' => $result[$i]['kindPlaceId']]);
                    $place = Amaken::whereId($result[$i]['placeId']);
                    $targetFile = URL::asset('_images/amaken/' . $place->file . '/f-1.jpg');
                    break;
                case 3:
                    $result[$i]['url'] = route('restaurantDetails', ['placeId' => $result[$i]['placeId'], 'kindPlaceId' => $result[$i]['kindPlaceId']]);
                    $place = Restaurant::whereId($result[$i]['placeId']);
                    $targetFile = URL::asset('_images/restaurant/' . $place->file . '/f-1.jpg');
                    break;
                case 4:
                    $result[$i]['url'] = route('hotelDetails', ['placeId' => $result[$i]['placeId'], 'kindPlaceId' => $result[$i]['kindPlaceId']]);
                    $place = Hotel::whereId($result[$i]['placeId']);
                    $targetFile = URL::asset('_images/hotels/' . $place->file . '/f-1.jpg');
                    break;
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
}
