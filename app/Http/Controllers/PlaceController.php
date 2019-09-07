<?php

namespace App\Http\Controllers;

use App\models\Place;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PlaceController extends Controller {

    public function showPlaces() {

        $places = Place::all();

        return view('places', array('places' => $places, 'mode2' => 'see'));
    }

    public function addPlace() {

        $msg = "";

        if(isset($_POST["addPlace"]) && isset($_POST["placeName"])) {
            $place = new Place();
            $place->name = makeValidInput($_POST["placeName"]);
            try {
                $place->save();
                return $this->showPlaces();
            }
            catch (Exception $e) {
                $msg = "مکان مورد نظر در سامانه موجود است";
            }
        }

        $places = Place::all();

        return view('places', array('places' => $places, 'mode2' => 'add', 'msg' => $msg));
    }

    public function opOnPlace() {

        if(isset($_POST["deletePlace"])) {
            $placeId = makeValidInput($_POST["deletePlace"]);
            Place::destroy($placeId);
            return $this->showPlaces();
        }

        if(isset($_POST["editPlace"])) {
            $placeId = makeValidInput($_POST["editPlace"]);
            $selectedPlace = Place::whereId($placeId);
            $places = Place::all();
            return view('places', array('places' => $places, 'selectedPlace' => $selectedPlace,
                'mode2' => 'edit', 'msg' => ''));
        }

        if(isset($_POST["doEditPlace"])) {
            $placeId = makeValidInput($_POST["placeId"]);
            $place = Place::whereId($placeId);
            $place->name = makeValidInput($_POST["placeName"]);
            try {
                $place->save();
                return $this->showPlaces();
            }
            catch (Exception $e) {
                $places = Place::all();
                return view('places', array('places' => $places, 'selectedPlace' => $place,
                    'mode2' => 'edit', 'msg' => 'مکان مورد نظر در سامانه موجود است'));
            }
        }

        return $this->showPlaces();

    }
}