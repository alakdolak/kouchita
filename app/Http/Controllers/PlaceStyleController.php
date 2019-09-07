<?php

namespace App\Http\Controllers;

use App\models\Place;
use App\models\PlaceStyle;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class PlaceStyleController extends Controller {

    public function placeStyles($mode = "") {

        if($mode == "")
            return view("placeStyles", array('kindPlaceIds' => Place::all(),
                'user' => Auth::user()));

        return view("placeStyles", array('placeStyles' => PlaceStyle::whereKindPlaceId($mode)->get(),
            'kindPlaceId' => $mode, 'mode2' => 'see'));
    }

    public function addPlaceStyle($mode) {

        $msg = "";

        if(isset($_POST["addPlaceStyle"]) && isset($_POST["placeStyleName"])) {

            $placeStyle = new PlaceStyle();
            $placeStyle->name = makeValidInput($_POST["placeStyleName"]);
            $placeStyle->kindPlaceId = $mode;

            try {
                $placeStyle->save();
                return Redirect::to(route('placeStyles', ['mode2' => $mode]));
            }
            catch (Exception $e) {
                $msg = "سبک مکان مورد نظر در سامانه موجود است";
            }
        }

        return view("placeStyles", array('placeStyles' => PlaceStyle::whereKindPlaceId($mode)->get(),
            'kindPlaceId' => $mode, 'mode2' => 'add', 'msg' => $msg));
    }

    public function opOnPlaceStyle($mode) {

        if(isset($_POST["placeStyleId"])) {
            $placeStyleId = makeValidInput($_POST["placeStyleId"]);
            PlaceStyle::destroy($placeStyleId);
            return Redirect::to(route('placeStyles', ['mode2' => $mode]));
        }

        return Redirect::to(route('placeStyles', ['mode2' => $mode]));
    }
}