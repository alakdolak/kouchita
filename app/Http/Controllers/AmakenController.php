<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Amaken;
use App\models\Cities;
use App\models\ConfigModel;
use App\models\DefaultPic;
use App\models\LogModel;
use App\models\Place;
use App\models\PlaceFeatureRelation;
use App\models\PlaceFeatures;
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
        $url = createUrl(1, $placeId, 0, 0, 0);
        return Redirect::to($url);
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
