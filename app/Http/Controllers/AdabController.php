<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Adab;
use App\models\ConfigModel;
use App\models\LogModel;
use App\models\Place;
use App\models\PlaceStyle;
use App\models\SectionPage;
use App\models\State;
use App\models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class AdabController extends Controller {

    public function getAdabListElems($city, $mode)
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
        $kindPlaceId = Place::whereName('آداب')->first()->id;


        $x = "";
        switch ($mode) {
            case "soghat":
            default:
                $x .= ' category = 1 AND ';
                break;
            case "sanaye":
                $x .= ' category = 6 AND ';
                break;
            case "ghazamahali":
                $x .= ' category = 3 AND ';
                break;
            case "":
                break;
        }

        $n = strlen($x);
        $z = substr($x, 0, $n - 4);

        $state = State::whereName($city)->first();
        if ($state == null)
            return "نتیجه ای یافت نشد";

        if (empty($z))
            $z = "1 = 1";

        if ($sort == "review")
            $adabs = DB::select("Select adab.id, adab.category, adab.name, adab.file, adab.pic_1, COUNT(*) as matches from adab, log, activity WHERE " . $z . " and stateId = " . $state->id . " and activity.id = " . $activityId . " and log.activityId = activity.id and log.placeId = adab.id and log.kindPlaceId = " . $kindPlaceId . " GROUP BY(log.placeId) ORDER by matches limit 4 offset " . (($currPage - 1) * 4));
        elseif ($sort == "rate")
            $adabs = DB::select("Select adab.id, adab.category, adab.name, adab.file, adab.pic_1, AVG(userOpinions.rate) as avgRate from adab, log, activity, userOpinions WHERE " . $z . " and stateId = " . $state->id . " and activity.id = " . $rateActivityId . " and log.activityId = activity.id and log.placeId = adab.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id GROUP BY(log.placeId) HAVING avgRate > 2 ORDER by avgRate DESC limit 4 offset " . (($currPage - 1) * 4));
        else
            $adabs = DB::select("Select adab.id, adab.category, adab.name, adab.file, adab.pic_1 from adab WHERE " . $z . " and stateId = " . $state->id . " ORDER by adab.name ASC limit 4 offset " . (($currPage - 1) * 4));

        $reminder = 4 - count($adabs);
        if ($reminder > 0) {
            if ($sort == "review")
                $adabs = array_merge($adabs, DB::select("select adab.id, adab.category, adab.name, adab.file, adab.pic_1 from adab where " . $z . " and not exists(Select * from log WHERE " . $z . " and stateId = " . $state->id . " and log.activityId = " . $activityId . " and log.placeId = adab.id and log.kindPlaceId = " . $kindPlaceId . ") and stateId = " . $state->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
            elseif ($sort == "rate")
                $adabs = array_merge($adabs, DB::select("select adab.id, adab.category, adab.name, adab.file, adab.pic_1 from adab where " . $z . " and not exists(Select * from log, userOpinions WHERE " . $z . " and stateId = " . $state->id . " and log.activityId = " . $rateActivityId . " and log.placeId = adab.id and log.kindPlaceId = " . $kindPlaceId . " and userOpinions.logId = log.id) and stateId = " . $state->id . " limit " . $reminder . " offset " . (($currPage - 1) * 4)));
        }

        foreach ($adabs as $adab) {
            if ($adab->category == 1 || $adab->category == 6) {
                if (file_exists((__DIR__ . '/../../../../static/_images/adab/soghat/' . $adab->file . '/f-1.jpg')))
                    $adab->pic = URL::asset('_images/adab/soghat/' . $adab->file . '/f-1.jpg');
                else
                    $adab->pic = URL::asset('_images/nopic/blank.jpg');
            } else if ($adab->category == 3) {
                if (file_exists((__DIR__ . '/../../../../static/_images/adab/ghazamahali/' . $adab->file . '/f-1.jpg')))
                    $adab->pic = URL::asset('_images/adab/ghazamahali/' . $adab->file . '/f-1.jpg');
                else
                    $adab->pic = URL::asset('_images/nopic/blank.jpg');
            }

            $condition = ['placeId' => $adab->id, 'kindPlaceId' => $kindPlaceId,
                'activityId' => $activityId];
            $adab->reviews = LogModel::where($condition)->count();
            $adab->avgRate = getRate($adab->id, $kindPlaceId)[1];
        }

        if ($sort == "rate") {
            usort($adabs, function ($a, $b) {
                return $b->avgRate - $a->avgRate;
            });
        }

        echo \GuzzleHttp\json_encode(['places' => $adabs]);
    }

    public function adabList($city, $mode = "") {
        return View::make('adab-list', array('selectedColor' => $mode, 'city' => $city, 'state' => State::whereName($city)->first(),
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));
    }

    public function showAdabDetail($placeId, $placeName = "", $mode = "", $err = "")
    {
        if (Adab::whereId($placeId) == null)
            return Redirect::route('main');

        $hasLogin = true;
        $kindPlaceId = Place::whereName('آداب')->first()->id;
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

        $place = Adab::whereId($placeId);
        $state = State::whereId($place->stateId);
        $photos = [];
        $sitePhotos = 1;

        if (!empty($place->pic_1)) {
            if ($place->category == 3) {
                if (file_exists((__DIR__ . '/../../../../static/_images/adab/ghazamahali/' . $place->file . '/s-1.jpg'))) {
                    $photos[count($photos)] = URL::asset('_images/adab/ghazamahali/' . $place->file . '/s-1.jpg');
                    $thumbnail = URL::asset('_images/adab/ghazamahali/' . $place->file . '/f-1.jpg');
                } else {
                    $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
                    $thumbnail = URL::asset('_images/nopic/blank.jpg');
                }
            } else {
                if (file_exists((__DIR__ . '/../../../../static/_images/adab/soghat/' . $place->file . '/s-1.jpg'))) {
                    $photos[count($photos)] = URL::asset('_images/adab/soghat/' . $place->file . '/s-1.jpg');
                    $thumbnail = URL::asset('_images/adab/soghat/' . $place->file . '/f-1.jpg');
                } else {
                    $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
                    $thumbnail = URL::asset('_images/nopic/blank.jpg');
                }
            }
        } else {
            $photos[count($photos)] = URL::asset('_images/nopic/blank.jpg');
            $thumbnail = URL::asset('_images/nopic/blank.jpg');
        }

        if (!empty($place->pic_2)) {
            $sitePhotos++;
        }

        if (!empty($place->pic_3)) {
            $sitePhotos++;
        }

        if (!empty($place->pic_4)) {
            $sitePhotos++;
        }

        if (!empty($place->pic_5)) {
            $sitePhotos++;
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

                if (file_exists(__DIR__ . '/../../../../static/userPhoto/adab/l-' . $tmp2[0]->text))
                    $logPhoto['pic'] = URL::asset('userPhoto/adab/l-' . $tmp2[0]->text);
                else
                    $logPhoto['pic'] = URL::asset('_images/nopic/blank.jpg');

                $logPhoto['id'] = $tmp2[0]->id;
            }
        }

        $srcCities = DB::select("select DISTINCT(src) from log, comment WHERE log.placeId = " . $placeId . ' and ' .
            'kindPlaceId = ' . $kindPlaceId . ' and activityId = ' . Activity::whereName('نظر')->first()->id .
            ' and logId = log.id and status = 1');

        $brands = [];

        if (!empty($place->brand_name_1)) {
            $brands[count($brands)] = [$place->brand_name_1, $place->des_name_1];
        }
        if (!empty($place->brand_name_2)) {
            $brands[count($brands)] = [$place->brand_name_2, $place->des_name_2];
        }
        if (!empty($place->brand_name_3)) {
            $brands[count($brands)] = [$place->brand_name_3, $place->des_name_3];
        }
        if (!empty($place->brand_name_4)) {
            $brands[count($brands)] = [$place->brand_name_4, $place->des_name_4];
        }
        if (!empty($place->brand_name_5)) {
            $brands[count($brands)] = [$place->brand_name_5, $place->des_name_5];
        }
        if (!empty($place->brand_name_6)) {
            $brands[count($brands)] = [$place->brand_name_6, $place->des_name_6];
        }
        if (!empty($place->brand_name_7)) {
            $brands[count($brands)] = [$place->brand_name_7, $place->des_name_7];
        }

        switch ($place->category) {
            case 1:
            default:
                $placeMode = 'soghat';
                break;
            case 3:
                $placeMode = 'ghazamahali';
                break;
            case 6:
                $placeMode = 'sanaye';
                break;
        }

        return view('adabDetails', array('place' => $place, 'mode' => $mode, 'brands' => $brands, 'thumbnail' => $thumbnail,
            'tags' => Tag::whereKindPlaceId($kindPlaceId)->get(), 'state' => $state, 'avgRate' => $rates[1],
            'kindPlaceId' => $kindPlaceId, 'rates' => $rates[0], 'config' => ConfigModel::first(),
            'photos' => $photos, 'userPhotos' => $userPhotos, 'sitePhotos' => $sitePhotos, 'logPhoto' => $logPhoto,
            'hasLogin' => $hasLogin, 'bookMark' => $bookMark, 'srcCities' => $srcCities, 'err' => $err,
            'placeStyles' => PlaceStyle::whereKindPlaceId($kindPlaceId)->get(), 'placeMode' => $placeMode,
            'sections' => SectionPage::wherePage(getValueInfo('hotel-detail'))->get()));
    }
}
