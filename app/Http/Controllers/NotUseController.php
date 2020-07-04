<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Adab;
use App\models\Amaken;
use App\models\Hotel;
use App\models\LogModel;
use App\models\Majara;
use App\models\Restaurant;
use App\models\Survey;
use Illuminate\Http\Request;

class NotUseController extends Controller
{
    public function showHotelList($city, $mode) {
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

}
