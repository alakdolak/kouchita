<?phpnamespace App\Http\Controllers;use App\models\Activity;use App\models\Adab;use App\models\Amaken;use App\models\Cities;use App\models\ConfigModel;use App\models\Hotel;use App\models\HotelApi;use App\models\LogModel;use App\models\Majara;use App\models\PicItem;use App\models\Place;use App\models\PlaceStyle;use App\models\Restaurant;use App\models\SectionPage;use App\models\State;use App\models\Tag;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\DB;use Illuminate\Support\Facades\Redirect;use Illuminate\Support\Facades\URL;class HotelController extends Controller {    public function editor($placeId, $kindPlaceId)    {        switch ($kindPlaceId) {            case 4:            default:                $place = Hotel::whereId($placeId);                break;            case 1:                $place = Amaken::whereId($placeId);                break;            case 3:                $place = Restaurant::whereId($placeId);                break;            case 6:                $place = Majara::whereId($placeId);                break;            case 8:                $place = Adab::whereId($placeId);                break;        }        return view('editor', ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId, 'placeName' => $place->name,            'tags' => PicItem::whereKindPlaceId($kindPlaceId)->get()]);    }    private function getSimilarHotels($place)    {        $stateId = State::whereId(Cities::whereId($place->cityId)->stateId)->id;        $hotels = DB::Select('select * from hotels where cityId in (select cities.id from cities where stateId = ' . $stateId . ')');        $arr = [];        $count = 0;        foreach ($hotels as $hotel) {            if ($hotel->id == $place->id) {                $hotel->point = -1;                continue;            }            $point = 0;            if ($hotel->tarikhi == $place->tarikhi)                $point += 3;            if ($hotel->coffeeshop == $place->coffeeshop)                $point += 3;            if ($hotel->hoome == $place->hoome)                $point += 3;            if ($hotel->shologh == $place->shologh)                $point += 3;            if ($hotel->khalvat == $place->khalvat)                $point += 3;            if ($hotel->tabiat == $place->tabiat)                $point += 3;            if ($hotel->kooh == $place->kooh)                $point += 3;            if ($hotel->darya == $place->darya)                $point += 3;            if ($hotel->rate_int == $place->rate_int)                $point += 2;            $arr[$count++] = [$count, $point];        }        usort($arr, function ($a, $b) {            return $a[1] - $b[1];        });        if (count($hotels) < 4)            $out = Hotel::take(4)->get();        else            $out = [$hotels[$arr[0][0]], $hotels[$arr[1][0]], $hotels[$arr[2][0]], $hotels[$arr[3][0]]];        $kindPlaceId = Place::whereName('هتل')->first()->id;        for ($i = 0; $i < count($out); $i++) {            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $out[$i]->file . '/f-1.jpg')))                $out[$i]->pic = URL::asset("_images/hotels/" . $out[$i]->file . '/f-1.jpg');            else                $out[$i]->pic = URL::asset("_images/nopic/blank.jpg");            $condition = ['placeId' => $out[$i]->id, 'kindPlaceId' => $kindPlaceId, 'confirm' => 1,                'activityId' => Activity::whereName('نظر')->first()->id];            $out[$i]->reviews = LogModel::where($condition)->count();            $out[$i]->rate = getRate($out[$i]->id, $kindPlaceId)[1];        }        return $out;    }    public function getSimilarsHotel() {        if (isset($_POST["placeId"])) {            $place = Hotel::whereId(makeValidInput($_POST["placeId"]));            if ($place != null) {                echo \GuzzleHttp\json_encode($this->getSimilarHotels($place));                return;            }        }        echo \GuzzleHttp\json_encode([]);    }    public function getHotelsMain()    {        $activityId = Activity::whereName('نظر')->first()->id;        $kindPlaceId = Place::whereName('هتل')->first()->id;        $place1 = DB::select("select hotels.id, hotels.name, hotels.cityId, hotels.file, hotels.pic_1, COUNT(*) as matches from hotels, log WHERE confirm = 1 and log.activityId = " . $activityId . " and log.placeId = hotels.id and log.kindPlaceId = " . $kindPlaceId . " GROUP BY(log.placeId) ORDER by matches limit 0, 4");        $reminder = 4 - count($place1);        $z = "(";        $first = true;        foreach ($place1 as $itr) {            if ($first)                $first = false;            else                $z .= ',';            $z .= $itr->id;        }        $z .= ')';        if (!$first)            $place1 = array_merge($place1, DB::select('select id, name, cityId, file, pic_1, 0 as matches from                   hotels WHERE id not in ' . $z . 'limit 0, ' . $reminder));        else            $place1 = array_merge($place1, DB::select('select id, name, cityId, file, pic_1, 0 as matches from                   hotels limit 0, ' . $reminder));        foreach ($place1 as $itr) {            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $itr->file . '/f-1.jpg')))                $itr->pic = URL::asset('_images/hotels/' . $itr->file . '/f-1.jpg');            else                $itr->pic = URL::asset('_images/nopic/blank.jpg');            $itr->reviews = $itr->matches;            $itr->rate = getRate($itr->id, $kindPlaceId)[1];            $itr->url = route('hotelDetails', ['placeId' => $itr->id, 'placeName' => $itr->name]);            $itr->kindPlaceId = $kindPlaceId;        }        foreach ($place1 as $itr) {            if ($itr == null) {                $itr = null;                continue;            }            $itr->present = true;            if ($itr->kindPlaceId != 8) {                $city = Cities::whereId($itr->cityId);                if ($city == null) {                    $itr->present = false;                    continue;                }                $itr->city = $city->name;                $itr->state = State::whereId($city->stateId)->name;            } else {                $city = State::whereId($itr->stateId);                if ($city == null) {                    $itr = null;                    continue;                }                $itr->state = $itr->city = $city->name;            }        }        echo json_encode($place1);    }    public function searchPlaceHotelList2()    {        $cityId = DB::select('SELECT id FROM cities WHERE NAME ="'.request("city").'"');        $place = DB::select('SELECT * FROM amaken WHERE name LIKE "%'.request("name").'%" AND cityId = '.$cityId[0]->id);        echo json_encode($place);        return;    }    public function showHotelDetail($placeId, $placeName = "", $mode = "", $err = "") {        if (Hotel::whereId($placeId) == null)            return Redirect::route('main');        $hasLogin = true;        $kindPlaceId = Place::whereName('هتل')->first()->id;        $uId = -1;        if (Auth::check())            $uId = Auth::user()->id;        else            $hasLogin = false;        if ($hasLogin) {            $activityId = Activity::whereName('مشاهده')->first()->id;            $condition = ['visitorId' => $uId, 'placeId' => $placeId, 'kindPlaceId' => $kindPlaceId,                'activityId' => $activityId];            $log = LogModel::where($condition)->first();            if ($log == null) {                $log = new LogModel();                $log->time = getToday()["time"];                $log->activityId = $activityId;                $log->placeId = $placeId;                $log->kindPlaceId = $kindPlaceId;                $log->visitorId = $uId;                $log->date = date('Y-m-d');                $log->save();            } else {                $log->date = date('Y-m-d');                $log->save();            }        }        $bookMark = false;        $condition = ['visitorId' => $uId, 'activityId' => Activity::whereName("نشانه گذاری")->first()->id,            'placeId' => $placeId, 'kindPlaceId' => $kindPlaceId];        if (LogModel::where($condition)->count() > 0)            $bookMark = true;        $rates = getRate($placeId, $kindPlaceId);        $save = false;        $count = DB::select("select count(*) as tripPlaceNum from trip, tripPlace WHERE tripPlace.placeId = " . $placeId . " and tripPlace.kindPlaceId = " . $kindPlaceId . " and tripPlace.tripId = trip.id and trip.uId = " . $uId);        if ($count[0]->tripPlaceNum > 0)            $save = true;        $place = Hotel::whereId($placeId);        $city = Cities::whereId($place->cityId);        $state = State::whereId($city->stateId);        $photos = [];        $sitePhotos = 1;        if (!empty($place->pic_1)) {            if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place->file . '/s-1.jpg'))) {                $photos[count($photos)] = URL::asset('_images') . '/hotels/' . $place->file . '/s-1.jpg';                $thumbnail = URL::asset('_images') . '/hotels/' . $place->file . '/f-1.jpg';            } else {                $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');                $thumbnail = URL::asset('_images/nopic/blank.jpg');            }        } else {            $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');            $thumbnail = URL::asset('_images/nopic/blank.jpg');        }        if (!empty($place->pic_2)) {            $sitePhotos++;        }        if (!empty($place->pic_3)) {            $sitePhotos++;        }        if (!empty($place->pic_4)) {            $sitePhotos++;        }        if (!empty($place->pic_5)) {            $sitePhotos++;        }        $aksActivityId = Activity::whereName('عکس')->first()->id;        $userPhotos = 0;        $logPhoto = '';        $tmp = DB::select("select count(*) as countNum from log WHERE confirm = 1 and activityId = " . $aksActivityId . " and placeId = " . $placeId . " and kindPlaceId = " . $kindPlaceId . " and pic <> 0");        if ($tmp != null && count($tmp) > 0)            $userPhotos = $tmp[0]->countNum;        $srcCities = DB::select("select DISTINCT(src) from log, comment WHERE log.placeId = " . $placeId . ' and ' .            'kindPlaceId = ' . $kindPlaceId . ' and activityId = ' . Activity::whereName('نظر')->first()->id .            ' and logId = log.id and status = 1');        $rooms = null;        if (session('goDate') != null && $place->reserveId != null) {            session()->forget(['reserve_room']);            $goDate = jalaliToGregorian(session('goDate'));            $backDate = jalaliToGregorian(session('backDate'));            $go = $goDate[0] . '-' . $goDate[1] . '-' . $goDate[2];            $back = $backDate[0] . '-' . $backDate[1] . '-' . $backDate[2];            $access_token = $this->getAccessTokenHotel(1);            $hotelApi= HotelApi::whereId($place->reserveId);            $input = array('CheckIn' => $go,                'CheckOut' => $back,                'CityIdOrHotelId' => $hotelApi->userName,                'rph' => $hotelApi->rph,                'Nationality' => 'IR',                'Categorykey' => 'Hotel',                'IsDomestic' => true            );            $input = json_encode($input);            do{                $out_room = $this->getRoomDetails($input, $access_token);            }while($out_room == null);            if(session('room') == 0)                session('room', 1);            $passNumMin = floor(session('adult') / session('room'));            $passNumMax = ceil(session('adult') / session('room'));            $passNumMax = $passNumMax > 4 ? 4 : $passNumMax;            if ($out_room != null && $out_room->data != null) {                $room = $out_room->data->rooms;                $check = true;                $check_available = false;                $rooms = array();                $min = 0;                $minMaxPass = 0;                $max = 0;                for ($i = 0; $i < count($room); $i++) {                    if ($room[$i]->capacity->adultCount == $passNumMin ||  $room[$i]->capacity->adultCount == $passNumMax || $room[$i]->capacity->adultCount == $passNumMin-1) {                        for ($j = 0; $j < count($room[$i]->perDay); $j++) {                            if (!$room[$i]->perDay[$j]->availablity)                                $check = false;                        }                        if ($check) {                            if($room[$i]->capacity->adultCount == $passNumMax){                                if($minMaxPass = 0){                                    $maxNumPriceRoomId = $i;                                    $minMaxPass = $room[$i]->perDay[0]->price;                                }                                else if($minMaxPass > $room[$i]->perDay[0]->price){                                    $maxNumPriceRoomId = $i;                                    $minMaxPass = $room[$i]->perDay[0]->price;                                }                            }                            if($room[$i]->capacity->adultCount == $passNumMin-1){                                if ($min == 0) {                                    $place->minPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;                                    $place->maxPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;                                    $min = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;                                    $max = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;                                    $place->service = $room[$i]->roomService;                                    $check_available = true;                                }                                else if ($min > $room[$i]->perDay[0]->price) {                                    $place->minPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;                                    $min = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;                                    $place->service = $room[$i]->roomService;                                }                                else if ($max < $room[$i]->perDay[0]->price) {                                    $place->maxPrice = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;                                    $max = $room[$i]->perDay[0]->price + $room[$i]->priceExtraGuest;                                }                            }                            else{                                if ($min == 0) {                                    $place->minPrice = $room[$i]->perDay[0]->price;                                    $place->maxPrice = $room[$i]->perDay[0]->price;                                    $min = $room[$i]->perDay[0]->price;                                    $max = $room[$i]->perDay[0]->price;                                    $place->service = $room[$i]->roomService;                                    $check_available = true;                                }                                else if ($min > $room[$i]->perDay[0]->price) {                                    $place->minPrice = $room[$i]->perDay[0]->price;                                    $min = $room[$i]->perDay[0]->price;                                    $place->service = $room[$i]->roomService;                                }                                else if ($max < $room[$i]->perDay[0]->price) {                                    $place->maxPrice = $room[$i]->perDay[0]->price;                                    $max = $room[$i]->perDay[0]->price;                                }                            }                            $room[$i]->provider = $hotelApi->provider;                            $room[$i]->pic = URL::asset('/_images/nopic/blank.jpg');                            array_push($rooms, $room[$i]);                        }                    }                }                if ($check_available) {                    $place->otherRoom = count($rooms);                    $place->savePercent = ceil(($place->maxPrice - $place->minPrice) * 100 / $place->maxPrice);                    $place->minPrice = dotNumber($place->minPrice);                    $place->policy = $this->getHotelInfo($hotelApi->userName, $access_token, $go, $back, $hotelApi->rph);                    $place->hotel_name = $hotelApi->userName;                    $place->rph = $hotelApi->rph;                }            }        }        $jsonRoom = json_encode($rooms);        return view('hotel-details', array('place' => $place, 'save' => $save, 'city' => $city, 'thumbnail' => $thumbnail,            'tags' => Tag::whereKindPlaceId($kindPlaceId)->get(), 'state' => $state, 'avgRate' => $rates[1],            'kindPlaceId' => $kindPlaceId, 'mode' => $mode, 'rates' => $rates[0], 'logPhoto' => $logPhoto,            'photos' => $photos, 'userPhotos' => $userPhotos, 'sitePhotos' => $sitePhotos, 'config' => ConfigModel::first(),            'hasLogin' => $hasLogin, 'bookMark' => $bookMark, 'err' => $err,            'srcCities' => $srcCities, 'placeStyles' => PlaceStyle::whereKindPlaceId($kindPlaceId)->get(),            'placeMode' => 'hotel', 'rooms' => $rooms, 'jsonRoom' => $jsonRoom,            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));    }    public function showHotelList($city, $mode) {        session()->forget(['goDate', 'backDate', 'room', 'adult', 'children', 'ageOfChild', 'reserve_room']);        if ($mode == "state") {            $state = State::whereName($city)->first();            if ($state == null)                return "نتیجه ای یافت نشد";        } else {            $tmp = Cities::whereName($city)->first();            if ($tmp == null)                return "نتیجه ای یافت نشد";            $state = State::whereId($tmp->stateId);            if ($state == null)                return "نتیجه ای یافت نشد";        }        return view('hotel-list', array('mode' => $mode, 'placeMode' => 'hotel', 'city' => $city, 'state' => $state,            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));    }    public function getLastRecentlyMain()    {        $activityId = Activity::whereName('نظر')->first()->id;        $seenActivityId = Activity::whereName('مشاهده')->first()->id;        if (Auth::check()) {            $uId = Auth::user()->id;            $condition = ['visitorId' => $uId, 'activityId' => $seenActivityId];            $place2 = LogModel::where($condition)->orderBy('date', 'DESC')->take(4)->get();            for ($i = 0; $i < count($place2); $i++) {                $kindPlaceIdTmp = $place2[$i]->kindPlaceId;                switch ($kindPlaceIdTmp) {                    case 1:                    default:                        $tmp = Amaken::whereId($place2[$i]->placeId);                        if ($tmp == null) {                            $place2[$i]->delete();                            continue;                        }                        $place2[$i] = $tmp;                        if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place2[$i]->file . '/f-1.jpg')))                            $place2[$i]->pic = URL::asset('_images/amaken/' . $place2[$i]->file . '/f-1.jpg');                        else                            $place2[$i]->pic = URL::asset('_images/nopic/blank.jpg');                        $place2[$i]->url = route('amakenDetails', ['placeId' => $place2[$i]->id, 'placeName' => $place2[$i]->name]);                        break;                    case 3:                        $tmp = Restaurant::whereId($place2[$i]->placeId);                        if ($tmp == null) {                            $place2[$i]->delete();                            continue;                        }                        $place2[$i] = $tmp;                        if (file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $place2[$i]->file . '/f-1.jpg')))                            $place2[$i]->pic = URL::asset('_images/restaurant/' . $place2[$i]->file . '/f-1.jpg');                        else                            $place2[$i]->pic = URL::asset('_images/nopic/blank.jpg');                        $place2[$i]->url = route('restaurantDetails', ['placeId' => $place2[$i]->id, 'placeName' => $place2[$i]->name]);                        break;                    case 4:                        $tmp = Hotel::whereId($place2[$i]->placeId);                        if ($tmp == null) {                            $place2[$i]->delete();                            continue;                        }                        $place2[$i] = $tmp;                        if (file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $place2[$i]->file . '/f-1.jpg')))                            $place2[$i]->pic = URL::asset('_images/hotels/' . $place2[$i]->file . '/f-1.jpg');                        else                            $place2[$i]->pic = URL::asset('_images/nopic/blank.jpg');                        $place2[$i]->url = route('hotelDetails', ['placeId' => $place2[$i]->id, 'placeName' => $place2[$i]->name]);                        break;                    case 6:                        $tmp = Majara::whereId($place2[$i]->placeId);                        if ($tmp == null) {                            $place2[$i]->delete();                            continue;                        }                        $place2[$i] = $tmp;                        if (file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $place2[$i]->file . '/f-1.jpg')))                            $place2[$i]->pic = URL::asset('_images/majara/' . $place2[$i]->file . '/f-1.jpg');                        else                            $place2[$i]->pic = URL::asset('_images/nopic/blank.jpg');                        $place2[$i]->url = route('majaraDetails', ['placeId' => $place2[$i]->id, 'placeName' => $place2[$i]->name]);                        break;                    case 8:                        $tmp = Adab::whereId($place2[$i]->placeId);                        if ($tmp == null) {                            $place2[$i]->delete();                            continue;                        }                        $place2[$i] = $tmp;                        if ($place2[$i]->category == 3) {                            if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $place2[$i]->file . '/f-1.jpg')))                                $place2[$i]->pic = URL::asset('_images/adab/ghazamahali/' . $place2[$i]->file . '/f-1.jpg');                            else                                $place2[$i]->pic = URL::asset('_images/nopic/blank.jpg');                        } else {                            if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $place2[$i]->file . '/f-1.jpg')))                                $place2[$i]->pic = URL::asset('_images/adab/soghat/' . $place2[$i]->file . '/f-1.jpg');                            else                                $place2[$i]->pic = URL::asset('_images/nopic/blank.jpg');                        }                        $place2[$i]->url = route('majaraDetails', ['placeId' => $place2[$i]->id, 'placeName' => $place2[$i]->name]);                        break;                }                if ($tmp == null || $place2[$i] == null) {                    $place2[$i] = null;                    continue;                }                $place2[$i]->rate = getRate($place2[$i]->id, $kindPlaceIdTmp)[1];                $condition = ['placeId' => $place2[$i]->id, 'kindPlaceId' => $kindPlaceIdTmp,                    'confirm' => 1, 'activityId' => $activityId];                $place2[$i]->reviews = LogModel::where($condition)->count();                $place2[$i]->kindPlaceId = $kindPlaceIdTmp;            }            foreach ($place2 as $itr) {                if ($itr == null) {                    $itr = null;                    continue;                }                $itr->present = true;                if ($itr->kindPlaceId != 8) {                    $city = Cities::whereId($itr->cityId);                    if ($city == null) {                        $itr->present = false;                        continue;                    }                    $itr->city = $city->name;                    $itr->state = State::whereId($city->stateId)->name;                } else {                    $city = State::whereId($itr->stateId);                    if ($city == null) {                        $itr = null;                        continue;                    }                    $itr->state = $itr->city = $city->name;                }            }            echo json_encode($place2);        }    }}