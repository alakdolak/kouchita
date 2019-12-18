<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Amaken;
use App\models\Cities;
use App\models\ConfigModel;
use App\models\LogModel;
use App\models\Place;
use App\models\PlacePic;
use App\models\PlaceStyle;
use App\models\SectionPage;
use App\models\State;
use App\models\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class AmakenController extends Controller {

    public function showAmakenDetail($placeId, $placeName = "", $mode = "", $err = "") {

        if (Amaken::whereId($placeId) == null)
            return Redirect::route('main');

        $hasLogin = true;
        $kindPlaceId = Place::whereName('اماکن')->first()->id;
        $uId = -1;

        if (Auth::check())
            $uId = Auth::user()->id;
        else
            $hasLogin = false;

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

        $place = Amaken::whereId($placeId);
        $city = Cities::whereId($place->cityId);
        $state = State::whereId($city->stateId);

        $photos = [];
        $sitePhotos = 1;

        if (!empty($place->pic_1)) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $place->file . '/s-1.jpg'))) {
                $photos[count($photos)] = URL::asset('_images/amaken/' . $place->file . '/s-1.jpg');
                $thumbnail = URL::asset('_images/amaken/' . $place->file . '/f-1.jpg');
            } else {
                $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
                $thumbnail = URL::asset('_images/nopic/blank.jpg');
            }
        } else {
            $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
            $thumbnail = URL::asset('_images/nopic/blank.jpg');
        }

        $aksActivityId = Activity::whereName('عکس')->first()->id;

        $userPhotos = 0;
        $logPhoto = '';

        $tmp = DB::select("select count(*) as countNum from log WHERE confirm = 1 and activityId = " . $aksActivityId . " and placeId = " . $placeId . " and kindPlaceId = " . $kindPlaceId . " and pic <> 0");
        if ($tmp != null && count($tmp) > 0)
            $userPhotos = $tmp[0]->countNum;

        if ($userPhotos > 0) {
            $tmp2 = DB::select("select picItems.id, picItems.name, count(*) as countNum, text from log, picItems WHERE confirm = 1 and activityId = " . $aksActivityId . " and placeId = " . $placeId . " and log.kindPlaceId = " . $kindPlaceId . " and pic <> 0 and picItems.id = log.pic group by(picItems.id)");
            if ($tmp2 != null && count($tmp2) > 0) {
                if (file_exists(__DIR__ . '/../../../../assets/userPhoto/amaken/l-' . $tmp2[0]->text))
                    $logPhoto['pic'] = URL::asset('userPhoto/amaken/l-' . $tmp2[0]->text);
                else
                    $logPhoto['pic'] = URL::asset('_images/nopic/blank.jpg');

                $logPhoto['id'] = $tmp2[0]->id;
            }
        }

        $srcCities = DB::select("select DISTINCT(src) from log, comment WHERE log.placeId = " . $placeId . ' and ' .
            'kindPlaceId = ' . $kindPlaceId . ' and activityId = ' . Activity::whereName('نظر')->first()->id .
            ' and logId = log.id and status = 1');

        $allState = State::all();

        $pics = getAllPlacePicsByKind($kindPlaceId, $placeId);
        $sitePics = $pics[0];
        $sitePicsJSON = $pics[1];
        $photographerPics = $pics[2];
        $photographerPicsJSON = $pics[3];

        return view('hotel-details', array('place' => $place, 'save' => $save, 'city' => $city, 'thumbnail' => $thumbnail,
            'tags' => Tag::whereKindPlaceId($kindPlaceId)->get(), 'state' => $state, 'avgRate' => $rates[1],
            'photographerPics' => $photographerPics, 'photographerPicsJSON' => $photographerPicsJSON,
            'sitePics' => $sitePics, 'sitePicsJSON' => $sitePicsJSON, 'allState' => $allState,
            'kindPlaceId' => $kindPlaceId, 'mode' => $mode, 'rates' => $rates[0], 'config' => ConfigModel::first(),
            'photos' => $photos, 'userPhotos' => $userPhotos, 'logPhoto' => $logPhoto,
            'hasLogin' => $hasLogin, 'bookMark' => $bookMark, 'err' => $err, 'srcCities' => $srcCities,
            'placeStyles' => PlaceStyle::whereKindPlaceId($kindPlaceId)->get(), 'placeMode' => 'amaken',
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));
    }

    private function getSimilarAmakens($place)
    {

        $stateId = State::whereId(Cities::whereId($place->cityId)->stateId)->id;

        $amakens = DB::Select('select * from amaken where cityId in (select cities.id from cities where stateId = ' . $stateId . ')');
        $arr = [];
        $count = 0;

        foreach ($amakens as $amaken) {

            if ($amaken->id == $place->id) {
                $amaken->point = -1;
                continue;
            }

            $point = 0;
            if ($amaken->tarikhibana == $place->tarikhibana)
                $point += 3;
            if ($amaken->modern == $place->modern)
                $point += 3;
            if ($amaken->mamooli == $place->mamooli)
                $point += 3;
            if ($amaken->tabiat == $place->tabiat)
                $point += 3;
            if ($amaken->kooh == $place->kooh)
                $point += 3;
            if ($amaken->darya == $place->darya)
                $point += 3;

            $arr[$count++] = [$count, $point];

        }

        usort($arr, function ($a, $b) {
            return $a[1] - $b[1];
        });

        $out = [$amakens[$arr[0][0]], $amakens[$arr[1][0]], $amakens[$arr[2][0]], $amakens[$arr[3][0]]];

        $kindPlaceId = Place::whereName('اماکن')->first()->id;
        for ($i = 0; $i < count($out); $i++) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $out[$i]->file . '/f-1.jpg')))
                $out[$i]->pic = URL::asset("_images/amaken/" . $out[$i]->file . '/f-1.jpg');
            else
                $out[$i]->pic = URL::asset("_images/nopic/blank.jpg");

            $condition = ['placeId' => $out[$i]->id, 'kindPlaceId' => $kindPlaceId, 'confirm' => 1,
                'activityId' => Activity::whereName('نظر')->first()->id];

            $out[$i]->reviews = LogModel::where($condition)->count();
            $out[$i]->rate = getRate($out[$i]->id, $kindPlaceId)[1];
        }

        return $out;
    }

    public function getSimilarsAmaken() {

        if (isset($_POST["placeId"])) {
            $place = Amaken::whereId(makeValidInput($_POST["placeId"]));
            if ($place != null) {
                echo \GuzzleHttp\json_encode($this->getSimilarAmakens($place));
                return;
            }
        }

        echo \GuzzleHttp\json_encode([]);
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

    public function getAmakensMain()
    {
        $activityId = Activity::whereName('نظر')->first()->id;
        $kindPlaceId = Place::whereName('اماکن')->first()->id;
        $place1 = DB::select("select amaken.id, amaken.name, amaken.cityId, amaken.file, amaken.pic_1, COUNT(*) as matches from amaken, log WHERE confirm = 1 and log.activityId = " . $activityId . " and log.placeId = amaken.id and log.kindPlaceId = " . $kindPlaceId . " GROUP BY(log.placeId) ORDER by matches limit 0, 4");
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
              amaken WHERE id not in ' . $z . 'limit 0, ' . $reminder));
        else
            $place1 = array_merge($place1, DB::select('select id, name, cityId, file, pic_1, 0 as matches from 
              amaken limit 0, ' . $reminder));

        foreach ($place1 as $itr) {
            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $itr->file . '/f-1.jpg')))
                $itr->pic = URL::asset('_images/amaken/' . $itr->file . '/f-1.jpg');
            else
                $itr->pic = URL::asset('_images/nopic/blank.jpg');

            $itr->reviews = $itr->matches;
            $itr->rate = getRate($itr->id, $kindPlaceId)[1];
            $itr->url = route('amakenDetails', ['placeId' => $itr->id, 'placeName' => $itr->name]);
            $itr->kindPlaceId = $kindPlaceId;
        }

        foreach ($place1 as $itr) {

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

        echo json_encode($place1);
    }

    public function getRandomAmaken()
    {
        if(isset($_POST['cityId']))
            $place1 = Amaken::where('cityId', $_POST['cityId'])->select(['name', 'id', 'cityId', 'file', 'pic_1'])->inRandomOrder()->limit(4)->get();
        else
            $place1 = Amaken::select(['name', 'id', 'cityId', 'file', 'pic_1'])->inRandomOrder()->limit(4)->get();

        $kindPlaceId = Place::whereName('اماکن')->first()->id;
        $activityId = Activity::whereName('نظر')->first()->id;

        foreach ($place1 as $itr) {
            $condition = ['activityId' => $activityId, 'placeId' => $itr->id, 'kindPlaceId' => $kindPlaceId];
            $match = LogModel::where($condition)->count();

            if (file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $itr->file . '/f-1.jpg')))
                $itr->pic = URL::asset('_images/amaken/' . $itr->file . '/f-1.jpg');
            else
                $itr->pic = URL::asset('_images/nopic/blank.jpg');

            $itr->reviews = $match;
            $itr->rate = getRate($itr->id, $kindPlaceId)[1];
            $itr->url = route('amakenDetails', ['placeId' => $itr->id, 'placeName' => $itr->name]);
            $itr->kindPlaceId = $kindPlaceId;
        }

        foreach ($place1 as $itr) {

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

        echo json_encode($place1);
    }
}
