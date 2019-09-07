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

    public function tripStyles() {

        $tripStyles = TripStyle::all();

        return view("tripStyles", array('tripStyles' => $tripStyles, 'mode2' => 'see'));

    }

    public function addTripStyle() {

        $msg = "";

        if(isset($_POST["addTripStyle"]) && isset($_POST["tripStyleName"])) {
            $tripStyle = new TripStyle();
            $tripStyle->name = makeValidInput($_POST["tripStyleName"]);

            try {
                $tripStyle->save();
                return Redirect::to('tripStyles');
            }
            catch (Exception $e) {
                $msg = "سبک سفر مورد نظر در سامانه موجود است" . $e->getMessage();
            }
        }

        $tripStyles = TripStyle::all();

        return view('tripStyles', array('tripStyles' => $tripStyles, 'mode2' => 'add', 'msg' => $msg));
    }

    public function opOnTripStyle() {

        if(isset($_POST["deleteTripStyle"])) {
            $tripStyleId = makeValidInput($_POST["deleteTripStyle"]);
            TripStyle::destroy($tripStyleId);
            return Redirect::to('tripStyles');
        }

        if(isset($_POST["editTripStyle"])) {

            $tripStyleId = makeValidInput($_POST["editTripStyle"]);
            $selectedTripStyle = TripStyle::whereId($tripStyleId);
            $tripStyles = TripStyle::all();

            return view('TripStyles', array('tripStyles' => $tripStyles, 'selectedTripStyle' => $selectedTripStyle,
                'mode2' => 'edit', 'msg' => ''));
        }

        if(isset($_POST["doEditTripStyle"])) {
            $tripStyleId = makeValidInput($_POST["tripStyleId"]);
            $tripStyle = TripStyle::whereId($tripStyleId);
            $tripStyle->name = makeValidInput($_POST["tripStyleName"]);
            try {
                $tripStyle->save();
                return Redirect::to('tripStyles');
            }
            catch (Exception $e) {
                $tripStyles = TripStyle::all();
                return view('tripStyles', array('tripStyles' => $tripStyles, 'selectedTripStyle' => $tripStyle,
                    'mode2' => 'edit', 'msg' => 'سبک سفر مورد نظر در سامانه موجود است'));
            }
        }

        return Redirect::to('tripStyles');

    }

}