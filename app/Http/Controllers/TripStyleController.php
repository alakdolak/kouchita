<?php

namespace App\Http\Controllers;

use App\models\TripStyle;
use App\models\UserTripStyles;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class TripStyleController extends Controller {

    public function getTripStyles() {

        $uId = makeValidInput($_POST['uId']);

        $trips = TripStyle::all();

        for($i = 0; $i < count($trips); $i++) {

            $condition = ["uId" => $uId, "tripStyleId" => $trips[$i]->id];

            $trips[$i]->selected = false;

            if(UserTripStyles::where($condition)->count() > 0) {
                $trips[$i]->selected = true;
            }

        }

        echo json_encode($trips);

    }

    public function updateTripStyles() {

        $uId = makeValidInput($_POST['uId']);
        $tripStyles = $_POST["tripStyles"];


        UserTripStyles::where('uId', '=', $uId)->delete();

        for($i = 0; $i < count($tripStyles); $i++) {

            $userTripStyle = new UserTripStyles();

            $userTripStyle->uId = $uId;
            $userTripStyle->tripStyleId = $tripStyles[$i];

            $userTripStyle->save();

        }

    }

}