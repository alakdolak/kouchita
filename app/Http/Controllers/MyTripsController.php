<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Adab;
use App\models\Amaken;
use App\models\Cities;
use App\models\Hotel;
use App\models\LogModel;
use App\models\Majara;
use App\models\Message;
use App\models\Restaurant;
use App\models\State;
use App\models\Trip;
use App\models\TripComments;
use App\models\TripMember;
use App\models\TripMembersLevelController;
use App\models\TripNote;
use App\models\TripPlace;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class MyTripsController extends Controller {

    public function myTrips() {

        $user = Auth::user();
        $uId = $user->id;

        $trips = Trip::whereUId($uId)->get();

        $condition = ['uId' => $uId, 'status' => 1];
        $invitedTrips = TripMember::where($condition)->select('tripId')->get();

        foreach ($invitedTrips as $invitedTrip) {
            $trips[count($trips)] = Trip::whereId($invitedTrip->tripId);
        }

        if($trips != null && count($trips) != 0) {
            foreach ($trips as $trip) {
                $trip->placeCount = TripPlace::whereTripId($trip->id)->count();
                $limit = ($trip->placeCount > 4) ? 4 : $trip->placeCount;
                $tripPlaces = TripPlace::whereTripId($trip->id)->take($limit)->get();
                if($trip->placeCount > 0) {
                    $kindPlaceId = $tripPlaces[0]->kindPlaceId;
                    switch ($kindPlaceId) {
                        case 1:
                            $amaken = Amaken::whereId($tripPlaces[0]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' .  $amaken->file . '/' . $amaken->pic_1)))
                                $trip->pic1 = URL::asset('_images/amaken/' . $amaken->file . '/' . $amaken->pic_1);
                            else
                                $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 3:
                            $restaurant = Restaurant::whereId($tripPlaces[0]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' .  $restaurant->file . '/' . $restaurant->pic_1)))
                                $trip->pic1 = URL::asset('_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1);
                            else
                                $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 4:
                            $hotel = Hotel::whereId($tripPlaces[0]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' .  $hotel->file . '/' . $hotel->pic_1)))
                                $trip->pic1 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                            else
                                $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 6:
                            $majara = Majara::whereId($tripPlaces[0]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' .  $majara->file . '/' . $majara->pic_1)))
                                $trip->pic1 = URL::asset('_images/majara/' . $majara->file . '/' . $majara->pic_1);
                            else
                                $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                            break;
                    }
                }
                if($trip->placeCount > 1) {
                    $kindPlaceId = $tripPlaces[1]->kindPlaceId;

                    switch ($kindPlaceId) {
                        case 1:
                            $amaken = Amaken::whereId($tripPlaces[1]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' .  $amaken->file . '/' . $amaken->pic_1)))
                                $trip->pic2 = URL::asset('_images/amaken/' . $amaken->file . '/' . $amaken->pic_1);
                            else
                                $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 3:
                            $restaurant = Restaurant::whereId($tripPlaces[1]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' .  $restaurant->file . '/' . $restaurant->pic_1)))
                                $trip->pic2 = URL::asset('_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1);
                            else
                                $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 4:
                            $hotel = Hotel::whereId($tripPlaces[1]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' .  $hotel->file . '/' . $hotel->pic_1)))
                                $trip->pic2 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                            else
                                $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 6:
                            $majara = Majara::whereId($tripPlaces[1]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' .  $majara->file . '/' . $majara->pic_1)))
                                $trip->pic2 = URL::asset('_images/majara/' . $majara->file . '/' . $majara->pic_1);
                            else
                                $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                            break;
                    }
                }
                if($trip->placeCount > 2) {
                    $kindPlaceId = $tripPlaces[2]->kindPlaceId;
                    switch ($kindPlaceId) {
                        case 1:
                            $amaken = Amaken::whereId($tripPlaces[2]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' .  $amaken->file . '/' . $amaken->pic_1)))
                                $trip->pic3 = URL::asset('_images/amaken/' . $amaken->file . '/' . $amaken->pic_1);
                            else
                                $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 3:
                            $restaurant = Restaurant::whereId($tripPlaces[2]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' .  $restaurant->file . '/' . $restaurant->pic_1)))
                                $trip->pic3 = URL::asset('_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1);
                            else
                                $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 4:
                            $hotel = Hotel::whereId($tripPlaces[2]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' .  $hotel->file . '/' . $hotel->pic_1)))
                                $trip->pic3 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                            else
                                $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 6:
                            $majara = Majara::whereId($tripPlaces[2]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' .  $majara->file . '/' . $majara->pic_1)))
                                $trip->pic3 = URL::asset('_images/majara/' . $majara->file . '/' . $majara->pic_1);
                            else
                                $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                            break;
                    }
                }
                if($trip->placeCount > 3) {
                    $kindPlaceId = $tripPlaces[3]->kindPlaceId;
                    switch ($kindPlaceId) {
                        case 1:
                            $amaken = Amaken::whereId($tripPlaces[3]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' .  $amaken->file . '/' . $amaken->pic_1)))
                                $trip->pic4 = URL::asset('_images/amaken/' . $amaken->file . '/' . $amaken->pic_1);
                            else
                                $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 3:
                            $restaurant = Restaurant::whereId($tripPlaces[3]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' .  $restaurant->file . '/' . $restaurant->pic_1)))
                                $trip->pic4 = URL::asset('_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1);
                            else
                                $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 4:
                            $hotel = Hotel::whereId($tripPlaces[3]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' .  $hotel->file . '/' . $hotel->pic_1)))
                                $trip->pic4 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                            else
                                $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 6:
                            $majara = Majara::whereId($tripPlaces[3]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' .  $majara->file . '/' . $majara->pic_1)))
                                $trip->pic4 = URL::asset('_images/majara/' . $majara->file . '/' . $majara->pic_1);
                            else
                                $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                            break;
                    }
                }
            }
        }

        return view('myTrip', array('trips' => $trips));
    }

    public function myTripsInner($tripId, $sortMode = "DESC") {

        $user = Auth::user();
        $uId = $user->id;

        $trip = Trip::whereId($tripId);

        $changePlaceDate = 1;
        $changeTripDate = 1;
        $addPlace = 1;
        $addFriend = 1;
        $owner = 1;

        if($trip->uId != $uId) {
            $condition = ["tripId" => $tripId, 'uId' => $uId];
            if(TripMember::where($condition)->count() == 0)
                return Redirect::to('myTrips');

            $condition = ["tripId" => $tripId, 'uId' => $uId];
            $config = TripMembersLevelController::where($condition)->first();

            $changePlaceDate = $config->changePlaceDate;
            $changeTripDate = $config->changeTripDate;
            $addPlace = $config->addPlace;
            $addFriend = $config->addFriend;
            $owner = 0;
        }

        if($trip->from_ != "")
            $trip->from_ = formatDate($trip->from_);

        if($trip->to_ != "")
            $trip->to_ = formatDate($trip->to_);

        $tripPlaces = TripPlace::whereTripId($tripId)->orderBy('date', $sortMode)->get();
        foreach ($tripPlaces as $tripPlace) {
            $kindPlaceId = $tripPlace->kindPlaceId;
            switch ($kindPlaceId) {
                case 1:
                    $amaken = Amaken::whereId($tripPlace->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $amaken->file . '/f-1.jpg')))
                        $tripPlace->pic = URL::asset('_images/amaken/' . $amaken->file . '/f-1.jpg');
                    else
                        $tripPlace->pic = URL::asset('_images/nopic/blank.jpg');
                    $tripPlace->x = $amaken->C;
                    $tripPlace->y = $amaken->D;
                    $tripPlace->url = route('amakenDetails', ['placeId' => $tripPlace->placeId, 'placeName' => Amaken::whereId($tripPlace->placeId)->name]);
                    break;
                case 3:
                    $restaurant = Restaurant::whereId($tripPlace->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $restaurant->file . '/f-1.jpg')))
                        $tripPlace->pic = URL::asset('_images/restaurant/' . $restaurant->file . '/f-1.jpg');
                    else
                        $tripPlace->pic = URL::asset('_images/nopic/blank.jpg');
                    $tripPlace->x = $restaurant->C;
                    $tripPlace->y = $restaurant->D;
                    $tripPlace->url = route('restaurantDetails', ['placeId' => $tripPlace->placeId, 'placeName' => Restaurant::whereId($tripPlace->placeId)->name]);
                    break;
                case 4:
                    $hotel = Hotel::whereId($tripPlace->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $hotel->file . '/f-1.jpg')))
                        $tripPlace->pic = URL::asset('_images/hotels/' . $hotel->file . '/f-1.jpg');
                    else
                        $tripPlace->pic = URL::asset('_images/nopic/blank.jpg');
                    $tripPlace->x = $hotel->C;
                    $tripPlace->y = $hotel->D;
                    $tripPlace->url = route('hotelDetails', ['placeId' => $tripPlace->placeId, 'placeName' => Hotel::whereId($tripPlace->placeId)->name]);
                    break;
                case 6:
                    $majara = Majara::whereId($tripPlace->placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $majara->file . '/f-1.jog')))
                        $tripPlace->pic = URL::asset('_images/majara/' . $majara->file . '/f-1.jpg');
                    else
                        $tripPlace->pic = URL::asset('_images/nopic/blank.jpg');
                    $tripPlace->x = $majara->C;
                    $tripPlace->y = $majara->D;
                    $tripPlace->url = route('majaraDetails', ['placeId' => $tripPlace->placeId, 'placeName' => Majara::whereId($tripPlace->placeId)->name]);
                    break;
            }

            if($tripPlace->date != "")
                $tripPlace->date = formatDate($tripPlace->date);
        }

        $tripNote = TripNote::whereTripId($trip->id)->first();
        if($tripNote == null)
            $tripNote = "";
        else
            $tripNote = $tripNote->note;

        return view('myTripInner', array('changePlaceDate' => $changePlaceDate, 'changeTripDate' => $changeTripDate,
                            'addPlace' => $addPlace, 'addFriend' => $addFriend, 'owner' => $owner,
                            'trip' => $trip, 'tripPlaces' => $tripPlaces, 'sortMode' => $sortMode, 'tripNote' => $tripNote));
    }

    public function addTripPlace() {

        if (isset($_POST["tripId"]) && isset($_POST["placeId"]) && isset($_POST["kindPlaceId"])) {

            $tripId = makeValidInput($_POST["tripId"]);
            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);
            
            $condition = ['tripId' => $tripId, 'placeId' => $placeId, 'kindPlaceId' => $kindPlaceId];

            if (TripPlace::where($condition)->count() == 0) {
                $tripPlace = new TripPlace();
                $tripPlace->tripId = $tripId;
                $tripPlace->placeId = $placeId;
                $tripPlace->kindPlaceId = $kindPlaceId;

                $tripPlace->save();

                $trip = Trip::whereId($tripId);
                $trip->lastSeen = time();
                $trip->save();

                echo 'ok';
            } else {
                echo "nok";
            }
        }
    }

    public function addTrip() {


        if(isset($_POST["tripName"])) {

            $tripName = makeValidInput($_POST["tripName"]);

            if (isset($_POST["dateInputEnd"]) && isset($_POST["dateInputStart"])) {
                $dateInputStart = makeValidInput($_POST["dateInputStart"]);
                $dateInputEnd = makeValidInput($_POST["dateInputEnd"]);

                $dateInputStart = explode('/', $dateInputStart);
                if(count($dateInputStart) == 3)
                    $dateInputStart = $dateInputStart[0] . $dateInputStart[1] . $dateInputStart[2];

                $dateInputEnd = explode('/', $dateInputEnd);
                if(count($dateInputEnd) == 3)
                    $dateInputEnd = $dateInputEnd[0] . $dateInputEnd[1] . $dateInputEnd[2];

                if($dateInputStart >= $dateInputEnd) {
                    echo "nok3";
                    return;
                }

                $trip = new Trip();
                $trip->name = $tripName;
                $trip->from_ = $dateInputStart;
                $trip->lastSeen = time();
                $trip->uId = Auth::user()->id;
                $trip->to_ = $dateInputEnd;

                $trip->save();

                echo "ok";
                return;
            }

            $trip = new Trip();
            $trip->name = $tripName;
            $trip->lastSeen = time();
            $trip->uId = Auth::user()->id;
            $trip->save();

            echo "ok";
        }
    }

    public function editTrip() {
        if(isset($_POST["tripName"]) && isset($_POST["tripId"])) {

            $tripName = makeValidInput($_POST["tripName"]);
            $tripId = makeValidInput($_POST["tripId"]);

            if (isset($_POST["dateInputEnd"]) && isset($_POST["dateInputStart"])) {
                $dateInputStart = makeValidInput($_POST["dateInputStart"]);
                $dateInputEnd = makeValidInput($_POST["dateInputEnd"]);

                $dateInputStart = explode('/', $dateInputStart);
                if(count($dateInputStart) == 3)
                    $dateInputStart = $dateInputStart[0] . $dateInputStart[1] . $dateInputStart[2];

                $dateInputEnd = explode('/', $dateInputEnd);
                if(count($dateInputEnd) == 3)
                    $dateInputEnd = $dateInputEnd[0] . $dateInputEnd[1] . $dateInputEnd[2];

                if($dateInputStart >= $dateInputEnd) {
                    echo "nok3";
                    return;
                }

                $trip = Trip::whereId($tripId);
                $trip->name = $tripName;
                $trip->from_ = $dateInputStart;
                $trip->lastSeen = time();
                $trip->to_ = $dateInputEnd;

                TripPlace::where('date', '<', $dateInputStart)->orwhere('date', '>', $dateInputEnd)->update(array('date' => ''));
                $trip->save();

                echo "ok";
                return;
            }

            $trip = Trip::whereId($tripId);
            $trip->name = $tripName;
            $trip->from_ = "";
            $trip->to_ = "";
            TripPlace::whereTripId($tripId)->update(array('date' => ''));
            $trip->lastSeen = time();
            $trip->save();

            echo "ok";
        }
    }

    public function placeTrips() {

        if(isset($_POST['placeId']) && isset($_POST["kindPlaceId"])) {

            $placeIdMain = makeValidInput($_POST['placeId']);
            $kindPlaceIdMain = makeValidInput($_POST["kindPlaceId"]);

            $uId = Auth::user()->id;

            $trips = Trip::whereUId($uId)->get();
            $condition = ['uId' => $uId, 'status' => 1];
            $tripIds = TripMember::where($condition)->select('tripId')->get();

            foreach ($tripIds as $tripId) {
                $trips[count($trips)] = Trip::whereId($tripId->tripId);
            }

            foreach ($trips as $trip) {
                
                $condition = ['tripId' => $trip->id, 'placeId' => $placeIdMain, 'kindPlaceId' => $kindPlaceIdMain];
                
                if (TripPlace::where($condition)->count() > 0)
                    $trip->select = "1";
                else
                    $trip->select = "0";
                
                $trip->placeCount = TripPlace::whereTripId($trip->id)->count();
                $limit = ($trip->placeCount > 4) ? 4 : $trip->placeCount;
                $tripPlaces = TripPlace::whereTripId($trip->id)->take($limit)->get();
                if($trip->placeCount > 0) {
                    $kindPlaceId = $tripPlaces[0]->kindPlaceId;
                    switch ($kindPlaceId) {
                        case 1:
                            $amaken = Amaken::whereId($tripPlaces[0]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $amaken->file . '/' . $amaken->pic_1)))
                                $trip->pic1 = URL::asset('_images/amaken/' . $amaken->file . '/' . $amaken->pic_1);
                            else
                                $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 3:
                            $restaurant = Restaurant::whereId($tripPlaces[0]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1)))
                                $trip->pic1 = URL::asset('_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1);
                            else
                                $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 4:
                            $hotel = Hotel::whereId($tripPlaces[0]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $hotel->file . '/' . $hotel->pic_1)))
                                $trip->pic1 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                            else
                                $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 6:
                            $majara = Majara::whereId($tripPlaces[0]->placeId);

                            if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $majara->file . '/' . $majara->pic_1)))
                                $trip->pic1 = URL::asset('_images/majara/' . $majara->file . '/' . $majara->pic_1);
                            else
                                $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                            break;
                    }
                }
                if($trip->placeCount > 1) {
                    $kindPlaceId = $tripPlaces[1]->kindPlaceId;
                    switch ($kindPlaceId) {
                        case 1:
                            $amaken = Amaken::whereId($tripPlaces[1]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $amaken->file . '/' . $amaken->pic_1)))
                                $trip->pic2 = URL::asset('_images/amaken/' . $amaken->file . '/' . $amaken->pic_1);
                            else
                                $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 3:
                            $restaurant = Restaurant::whereId($tripPlaces[1]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1)))
                                $trip->pic2 = URL::asset('_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1);
                            else
                                $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 4:
                            $hotel = Hotel::whereId($tripPlaces[1]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $hotel->file . '/' . $hotel->pic_1)))
                                $trip->pic2 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                            else
                                $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 6:
                            $majara = Majara::whereId($tripPlaces[1]->placeId);

                            if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $majara->file . '/' . $majara->pic_1)))
                                $trip->pic2 = URL::asset('_images/majara/' . $majara->file . '/' . $majara->pic_1);
                            else
                                $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                            break;
                    }
                }
                if($trip->placeCount > 2) {
                    $kindPlaceId = $tripPlaces[2]->kindPlaceId;
                    switch ($kindPlaceId) {
                        case 1:
                            $amaken = Amaken::whereId($tripPlaces[2]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $amaken->file . '/' . $amaken->pic_1)))
                                $trip->pic3 = URL::asset('_images/amaken/' . $amaken->file . '/' . $amaken->pic_1);
                            else
                                $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 3:
                            $restaurant = Restaurant::whereId($tripPlaces[2]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1)))
                                $trip->pic3 = URL::asset('_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1);
                            else
                                $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 4:
                            $hotel = Hotel::whereId($tripPlaces[2]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $hotel->file . '/' . $hotel->pic_1)))
                                $trip->pic3 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                            else
                                $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 6:
                            $majara = Majara::whereId($tripPlaces[2]->placeId);

                            if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $majara->file . '/' . $majara->pic_1)))
                                $trip->pic3 = URL::asset('_images/majara/' . $majara->file . '/' . $majara->pic_1);
                            else
                                $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                            break;
                    }
                }
                if($trip->placeCount > 3) {
                    $kindPlaceId = $tripPlaces[3]->kindPlaceId;
                    switch ($kindPlaceId) {
                        case 1:
                            $amaken = Amaken::whereId($tripPlaces[3]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $amaken->file . '/' . $amaken->pic_1)))
                                $trip->pic4 = URL::asset('_images/amaken/' . $amaken->file . '/' . $amaken->pic_1);
                            else
                                $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 3:
                            $restaurant = Restaurant::whereId($tripPlaces[3]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1)))
                                $trip->pic4 = URL::asset('_images/restaurant/' . $restaurant->file . '/' . $restaurant->pic_1);
                            else
                                $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 4:
                            $hotel = Hotel::whereId($tripPlaces[3]->placeId);
                            if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $hotel->file . '/' . $hotel->pic_1)))
                                $trip->pic4 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                            else
                                $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                            break;
                        case 6:
                            $majara = Majara::whereId($tripPlaces[3]->placeId);

                            if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $majara->file . '/' . $majara->pic_1)))
                                $trip->pic4 = URL::asset('_images/majara/' . $majara->file . '/' . $majara->pic_1);
                            else
                                $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                            break;
                    }
                }
            }

            echo json_encode($trips);
        }
    }

    public function assignPlaceToTrip() {

        $errors = [];

        if(isset($_POST["checkedValuesTrips"]) && isset($_POST["placeId"]) && isset($_POST["kindPlaceId"])) {

            $placeId = $_POST["placeId"];
            $kindPlaceId = $_POST["kindPlaceId"];
            $uId = Auth::user()->id;

            $selectedTrips = $_POST["checkedValuesTrips"];

            if($selectedTrips != 'empty') {

                for ($i = 0; $i < count($selectedTrips); $i++) {

                    $selectedTrips[$i] = makeValidInput($selectedTrips[$i]);

                    if(Trip::whereId($selectedTrips[$i])->uId != $uId) {
                        $condition = ["uId" => $uId, 'tripId' => $selectedTrips[$i]];
                        if(TripMembersLevelController::where($condition)->first()->addPlace == 0) {
                            $errors[count($errors)] = Trip::whereId($selectedTrips[$i])->name;
                            continue;
                        }
                    }

                    $condition = ["tripId" => $selectedTrips[$i], "placeId" => $placeId, 'kindPlaceId' => $kindPlaceId];
                    if(TripPlace::where($condition)->count() == 0) {
                        $tripPlaceTmp = new TripPlace();
                        $tripPlaceTmp->tripId = $selectedTrips[$i];
                        $tripPlaceTmp->placeId = $placeId;
                        $tripPlaceTmp->kindPlaceId = $kindPlaceId;
                        $tripPlaceTmp->save();

                        $tripTmp = Trip::whereId($selectedTrips[$i]);
                        $tripTmp->lastSeen = time();
                        $tripTmp->save();
                    }
                }
            }

            $tripPlaces = DB::select('select tripPlace.id, tripPlace.tripId from tripPlace, trip WHERE trip.id = tripPlace.tripId and trip.uId = ' . $uId . ' and  placeId = ' . $placeId . ' and tripPlace.kindPlaceId = ' . $kindPlaceId);

            foreach ($tripPlaces as $tripPlace) {
                $allow = true;
                for($i = 0; $i < count($selectedTrips); $i++) {
                    if($tripPlace->tripId == $selectedTrips[$i]) {
                        $allow = false;
                        break;
                    }
                }
                if($allow) {
                    TripPlace::destroy($tripPlace->id);
                    $tripTmp = Trip::whereId($tripPlace->tripId);
                    $tripTmp->lastSeen = time();
                    $tripTmp->save();
                }
            }
        }

        if(count($errors) == 0)
            echo "ok";
        else
            echo json_encode($errors);
    }

    public function placeInfo() {

        if(isset($_POST["placeId"]) && isset($_POST["kindPlaceId"]) && isset($_POST["tripPlaceId"])) {

            $placeId = makeValidInput($_POST["placeId"]);
            $kindPlaceId = makeValidInput($_POST["kindPlaceId"]);

            $out = [];

            switch ($kindPlaceId) {
                case 1:
                default:
                    $target = Amaken::whereId($placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $target->file . '/' . $target->pic_1)))
                        $out['pic'] = URL::asset('_images/amaken/' . $target->file . '/' . $target->pic_1);
                    else
                        $out['pic'] = URL::asset('_images/nopic/blank.jpg');
                    $out['phone'] = "";

                    $out['url'] = route('amakenDetails', ['placeId' => $placeId, 'placeName' => $target->name]);

                    break;
                case 3:
                    $target = Restaurant::whereId($placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $target->file . '/' . $target->pic_1)))
                        $out['pic'] = URL::asset('_images/restaurant/' . $target->file . '/' . $target->pic_1);
                    else
                        $out['pic'] = URL::asset('_images/nopic/blank.jpg');
                    $out['phone'] = "";
                    $out['url'] = route('restaurantDetails', ['placeId' => $placeId, 'placeName' => $target->name]);
                    break;
                case 4:
                    $target = Hotel::whereId($placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $target->file . '/' . $target->pic_1)))
                        $out['pic'] = URL::asset('_images/hotels/' . $target->file . '/' . $target->pic_1);
                    else
                        $out['pic'] = URL::asset('_images/nopic/blank.jpg');
                    $out['phone'] = $target->phone;
                    $out['url'] = route('hotelDetails', ['placeId' => $placeId, 'placeName' => $target->name]);
                    break;
                case 6:
                    $target = Majara::whereId($placeId);
                    if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $target->file . '/' . $target->pic_1)))
                        $out['pic'] = URL::asset('_images/majara/' . $target->file . '/' . $target->pic_1);
                    else
                        $out['pic'] = URL::asset('_images/nopic/blank.jpg');
                    $out['phone'] = "";
                    $out['url'] = route('majaraDetails', ['placeId' => $placeId, 'placeName' => $target->name]);
                    break;
            }

            $out['name'] = $target->name;
            $out['address'] = $target->address;
            $out['point'] = getRate($placeId, $kindPlaceId)[1];
            $city = Cities::whereId($target->cityId);
            $out['city'] = $city->name;
            $out['state'] = State::whereId($city->stateId)->name;

            $tripPlaceId = makeValidInput($_POST["tripPlaceId"]);
            if($tripPlaceId != -1) {
                $tripComments = TripComments::whereTripPlaceId($tripPlaceId)->get();
                foreach ($tripComments as $tripComment)
                    $tripComment->uId = User::whereId($tripComment->uId)->username;
                $out["comments"] = $tripComments;
            }
            else {
                $out["comments"] = [];
            }

            $tripPlaceDate = TripPlace::whereId($tripPlaceId);
            if($tripPlaceDate != null) {
                $tripPlaceDate = $tripPlaceDate->date;
                if ($tripPlaceDate == "")
                    $tripPlaceDate = "بدون تاریخ";
                else
                    $tripPlaceDate = convertStringToDate($tripPlaceDate);

                $out['date'] = $tripPlaceDate;
            }

            echo json_encode($out);

        }

    }

    public function addComment() {
        if(isset($_POST["tripPlaceId"]) && isset($_POST["comment"])) {

            $uId = Auth::user()->id;

            $comments = new TripComments();
            $comments->description = makeValidInput($_POST["comment"]);
            $comments->tripPlaceId = makeValidInput($_POST["tripPlaceId"]);
            $comments->uId = $uId;

            $comments->save();

            echo "ok";

        }
    }

    public function getRecentlyViewElems() {

        if(isset($_POST["pageNum"])) {

            $page = (makeValidInput($_POST["pageNum"]) - 1) * 4;

            $user = Auth::user();
            $uId = $user->id;

            $condition = ['visitorId' => $uId, 'activityId' => 1];
            $amakens = LogModel::where($condition)->skip($page)->take(4)->get();

            foreach ($amakens as $amaken) {
                $kindPlaceId = $amaken->kindPlaceId;
                switch ($kindPlaceId) {
                    case 1:
                        $target = Amaken::whereId($amaken->placeId);

                        if($target == null) {
                            $amaken->delete();
                            continue;
                        }

                        $amaken->name = $target->name;

                        if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $target->file . '/f-1.jpg')))
                            $amaken->placePic = URL::asset('_images/amaken/' . $target->file . '/f-1.jpg');
                        else
                            $amaken->placePic = URL::asset('_images/nopic/blank.jpg');

                        $amaken->x = $target->C;
                        $amaken->y = $target->D;
                        $amaken->url = route('amakenDetails', ['placeId' => $amaken->placeId, 'placeName' => $amaken->name]);
                        break;

                    case 3:
                        $target = Restaurant::whereId($amaken->placeId);

                        if($target == null) {
                            $amaken->delete();
                            continue;
                        }

                        $amaken->name = $target->name;

                        if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $target->file . '/f-1.jpg')))
                            $amaken->placePic = URL::asset('_images/restaurant/' . $target->file . '/f-1.jpg');
                        else
                            $amaken->placePic = URL::asset('_images/nopic/blank.jpg');

                        $amaken->x = $target->C;
                        $amaken->y = $target->D;
                        $amaken->url = route('restaurantDetails', ['placeId' => $amaken->placeId, 'placeName' => $amaken->name]);
                        break;
                    case 4:
                        $target = Hotel::whereId($amaken->placeId);

                        if($target == null) {
                            $amaken->delete();
                            continue;
                        }

                        $amaken->name = $target->name;

                        if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $target->file . '/f-1.jpg')))
                            $amaken->placePic = URL::asset('_images/hotels/' . $target->file . '/f-1.jpg');
                        else
                            $amaken->placePic = URL::asset('_images/nopic/blank.jpg');

                        $amaken->x = $target->C;
                        $amaken->y = $target->D;
                        $amaken->url = route('hotelDetails', ['placeId' => $amaken->placeId, 'placeName' => $amaken->name]);
                        break;
                    case 6:
                        $target = Majara::whereId($amaken->placeId);

                        if($target == null) {
                            $amaken->delete();
                            continue;
                        }

                        $amaken->name = $target->name;

                        if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $target->file . '/f-1.jpg')))
                            $amaken->placePic = URL::asset('_images/majara/' . $target->file . '/f-1.jpg');
                        else
                            $amaken->placePic = URL::asset('_images/nopic/blank.jpg');
                        $amaken->x = $target->C;
                        $amaken->y = $target->D;
                        $amaken->url = route('majaraDetails', ['placeId' => $amaken->placeId, 'placeName' => $amaken->name]);
                        break;
                    case 8:

                        $target = Adab::whereId($amaken->placeId);

                        if($target == null) {
                            $amaken->delete();
                            continue;
                        }

                        $amaken->name = $target->name;

                        if($target->category == 1 || $target->category == 6) {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $target->file . '/f-1.jpg')))
                                $amaken->placePic = URL::asset('_images/adab/soghat/' . $target->file . '/f-1.jpg');
                            else
                                $amaken->placePic = URL::asset('_images/nopic/blank.jpg');
                        }
                        else {
                            if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $target->file . '/f-1.jpg')))
                                $amaken->placePic = URL::asset('_images/adab/ghazamahali/' . $target->file . '/f-1.jpg');
                            else
                                $amaken->placePic = URL::asset('_images/nopic/blank.jpg');
                        }
                        $amaken->x = $target->C;
                        $amaken->y = $target->D;
                        $amaken->url = route('adabDetails', ['placeId' => $amaken->placeId, 'placeName' => $amaken->name]);
                        break;
                }
            }

            echo \GuzzleHttp\json_encode(['places' => $amakens]);
        }
    }

    public function recentlyViewTotal() {

        $condition = ['visitorId' => Auth::user()->id, 'activityId' => 1];

        return view('recentlyView', array('placesCount' => LogModel::where($condition)->count()));
    }

    public function getBookmarkElems() {

        $user = Auth::user();
        $uId = $user->id;

        $activityId  = Activity::whereName('نشانه گذاری')->first();
        if($activityId != null) {

            $activityId = $activityId->id;
            $condition = ['visitorId' => $uId, 'activityId' => $activityId];
            $amakens = LogModel::where($condition)->get();

            if($amakens != null) {
                foreach ($amakens as $amaken) {
                    $kindPlaceId = $amaken->kindPlaceId;
                    switch ($kindPlaceId) {
                        case 1:
                            $target = Amaken::whereId($amaken->placeId);

                            if($target == null) {
                                $amaken->delete();
                                continue;
                            }

                            $amaken->name = $target->name;

                            if(file_exists((__DIR__ . '/../../../../assets/_images/amaken/' . $target->file . '/f-1.jpg')))
                                $amaken->placePic = URL::asset('_images/amaken/' . $target->file . '/f-1.jpg');
                            else
                                $amaken->placePic = URL::asset('_images/nopic/blank.jpg');

                            $amaken->x = $target->C;
                            $amaken->y = $target->D;
                            $amaken->url = route('amakenDetails', ['placeId' => $amaken->placeId]);
                            break;

                        case 3:
                            $target = Restaurant::whereId($amaken->placeId);

                            if($target == null) {
                                $amaken->delete();
                                continue;
                            }

                            $amaken->name = $target->name;

                            if(file_exists((__DIR__ . '/../../../../assets/_images/restaurant/' . $target->file . '/f-1.jpg')))
                                $amaken->placePic = URL::asset('_images/restaurant/' . $target->file . '/f-1.jpg');
                            else
                                $amaken->placePic = URL::asset('_images/nopic/blank.jpg');

                            $amaken->x = $target->C;
                            $amaken->y = $target->D;
                            $amaken->url = route('restaurantDetails', ['placeId' => $amaken->placeId]);
                            break;
                        case 4:
                            $target = Hotel::whereId($amaken->placeId);

                            if($target == null) {
                                $amaken->delete();
                                continue;
                            }

                            $amaken->name = $target->name;

                            if(file_exists((__DIR__ . '/../../../../assets/_images/hotels/' . $target->file . '/f-1.jpg')))
                                $amaken->placePic = URL::asset('_images/hotels/' . $target->file . '/f-1.jpg');
                            else
                                $amaken->placePic = URL::asset('_images/nopic/blank.jpg');

                            $amaken->x = $target->C;
                            $amaken->y = $target->D;
                            $amaken->url = route('hotelDetails', ['placeId' => $amaken->placeId, 'placeName' => $target->name]);
                            break;
                        case 6:
                            $target = Majara::whereId($amaken->placeId);

                            if($target == null) {
                                $amaken->delete();
                                continue;
                            }

                            $amaken->name = $target->name;

                            if(file_exists((__DIR__ . '/../../../../assets/_images/majara/' . $target->file . '/f-1.jpg')))
                                $amaken->placePic = URL::asset('_images/majara/' . $target->file . '/f-1.jpg');
                            else
                                $amaken->placePic = URL::asset('_images/nopic/blank.jpg');
                            $amaken->x = $target->C;
                            $amaken->y = $target->D;
                            break;
                        case 8:

                            $target = Adab::whereId($amaken->placeId);

                            if($target == null) {
                                $amaken->delete();
                                continue;
                            }

                            $amaken->name = $target->name;

                            if($target->category == 1 || $target->category == 6) {
                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/soghat/' . $target->file . '/f-1.jpg')))
                                    $amaken->placePic = URL::asset('_images/adab/soghat/' . $target->file . '/f-1.jpg');
                                else
                                    $amaken->placePic = URL::asset('_images/nopic/blank.jpg');
                            }
                            else {
                                if (file_exists((__DIR__ . '/../../../../assets/_images/adab/ghazamahali/' . $target->file . '/f-1.jpg')))
                                    $amaken->placePic = URL::asset('_images/adab/ghazamahali/' . $target->file . '/f-1.jpg');
                                else
                                    $amaken->placePic = URL::asset('_images/nopic/blank.jpg');
                            }
                            $amaken->x = $target->C;
                            $amaken->y = $target->D;
                            break;
                    }
                }

                echo \GuzzleHttp\json_encode(['places' => $amakens]);
            }
        }
    }

    public function bookmark() {


        $user = Auth::user();
        $uId = $user->id;

        $activityId  = Activity::whereName('نشانه گذاری')->first();

        if($activityId != null) {

            $activityId = $activityId->id;
            $condition = ['visitorId' => $uId, 'activityId' => $activityId];
            return view('bookmark', ['placesCount' => LogModel::where($condition)->count()]);
        }

        return Redirect::to(route('profile'));
    }

    public function changeDateTrip() {

        if(isset($_POST["tripId"]) && isset($_POST["dateInputStart"]) && isset($_POST["dateInputEnd"])) {

            $tripId = makeValidInput($_POST["tripId"]);
            $dateInputStart = makeValidInput($_POST["dateInputStart"]);
            $dateInputEnd = makeValidInput($_POST["dateInputEnd"]);

            $trip = Trip::whereId($tripId);

            if($dateInputStart == "" || $dateInputEnd == "") {
                $trip->from_ = "";
                $trip->to_ = "";
                TripPlace::whereTripId($tripId)->update(array('date' => ''));
                $trip->save();
                echo "ok";
            }

            else {

                $dateInputStart = explode('/', $dateInputStart);

                if(count($dateInputStart) == 3) {
                    $dateInputStart = $dateInputStart[0] . $dateInputStart[1] . $dateInputStart[2];
                    $dateInputEnd = explode('/', $dateInputEnd);
                    if(count($dateInputEnd) == 3) {
                        $dateInputEnd = $dateInputEnd[0] . $dateInputEnd[1] . $dateInputEnd[2];

                        if($dateInputStart >= $dateInputEnd) {
                            echo "nok3";
                            return;
                        }

                        $trip->from_ = $dateInputStart;
                        $trip->to_ = $dateInputEnd;
                        $trip->save();
                        TripPlace::where('date', '<', $dateInputStart)->orwhere('date', '>', $dateInputEnd)->update(array('date' => ''));
                        echo "ok";
                    }
                }
            }
        }
    }

    public function deleteTrip() {

        if(isset($_POST["tripId"])) {
            $tripId = makeValidInput($_POST["tripId"]);
            Trip::destroy($tripId);

            echo "ok";
        }
    }

    public function getNotes() {

        if(isset($_POST["tripId"])) {

            $tripId = makeValidInput($_POST["tripId"]);

            if(TripNote::whereTripId($tripId)->count() > 0) {
                echo TripNote::whereTripId($tripId)->first()->note;
                return;
            }
        }
        echo 'empty';
    }
    
    public function addNote() {

        if(isset($_POST["tripId"]) && isset($_POST["note"])) {

            $tripId = makeValidInput($_POST["tripId"]);
            $note = makeValidInput($_POST["note"]);

            if(TripNote::whereTripId($tripId)->count() > 0) {
                if($note == "")
                    TripNote::whereTripId($tripId)->delete();
                else {
                    $tripNote = TripNote::whereTripId($tripId)->first();
                    $tripNote->note = $note;
                    $tripNote->save();
                }
            }
            else {
                if($note != "") {
                    $tripNote = new TripNote();
                    $tripNote->tripId = $tripId;
                    $tripNote->note = $note;
                    $tripNote->save();
                }
            }
            echo 'ok';
        }
    }

    public function assignDateToPlace() {

        if(isset($_POST["tripPlaceId"]) && isset($_POST["date"])) {

            $date = makeValidInput($_POST["date"]);
            $date = explode('/', $date);
            if(count($date) == 3) {

                $date = $date[0] . $date[1] . $date[2];
                $tripPlaceId = makeValidInput($_POST["tripPlaceId"]);

                $tripPlace = TripPlace::whereId($tripPlaceId);
                if($tripPlace != null) {
                    $trip = Trip::whereId($tripPlace->tripId);
                    if ($trip != null) {
                        if($trip->from_ <= $date && $date <= $trip->to_) {
                            $tripPlace->date = $date;
                            $tripPlace->save();
                            echo "ok";
                        }
                        else
                            echo "nok3";
                    }
                }
            }
        }

    }

    public function inviteFriend() {

        if(isset($_POST["friendId"]) && isset($_POST["nickName"]) && isset($_POST["tripId"])) {

            $friendId = makeValidInput($_POST["friendId"]);
            $uId = Auth::user()->id;

            if($friendId == $uId) {
                echo "err4";
                return;
            }

            $nickName = makeValidInput($_POST["nickName"]);
            $tripId = makeValidInput($_POST["tripId"]);

            if($uId != -1) {
                $user = User::whereUserName($friendId)->first();

                if ($user != null && !empty($user)) {

                    $tripMember = new TripMember();
                    $tripMember->uId = $user->id;
                    $tripMember->tripId = $tripId;
                    $tripMember->status = false;
                    $tripMember->save();

                    $tripLevel = new TripMembersLevelController();
                    $tripLevel->uId = $user->id;
                    $tripLevel->tripId = $tripId;
                    $tripLevel->save();

                    $msg = new Message();
                    $msg->senderId = $uId;
                    $msg->receiverId = $user->id;
                    $message = $nickName . " از شما برای سفر  " . Trip::whereId($tripId)->name . " دعوت کرده است ";
                    $message .= "<br/><a href='" . route('seeTrip', ['tripId' => $tripId]) . "'>لینک مشاهده</a>";
                    $message .= "<br/><a href='" . route('acceptTrip', ['tripId' => $tripId]) . "'>لینک تایید دعوت</a>";
                    $message .= "<br/><a href='" . route('rejectInvitation', ['tripId' => $tripId]) . "'>لینک رد دعوت</a>";
                    $msg->message = $message;
                    $msg->subject = "دعوت برای سفر";
                    $msg->date = getToday()["date"];
                    $msg->save();
                    echo "ok";
                }
                else
                    echo "nok";
            }

            else
                echo "err2";
            return;
        }

        echo "err3";

    }

    public function tripHistory($tripId) {

        $condition = ['uId' => Auth::user()->id, 'tripId' => $tripId];
        $tripMember = TripMember::where($condition)->first();

        if($tripMember == null)
            return Redirect::to(route('msgsErr', ['err' => 'لینک دعوت از بین رفته است']));
        
        return $this->myTripsInner($tripId);
    }

    public function acceptTrip($tripId) {

        $uId = Auth::user()->id;

        $condition = ['uId' => $uId, 'tripId' => $tripId];
        $tripMember = TripMember::where($condition)->first();
        if($tripMember != null) {
            if($tripMember->status == 0) {
                $msg = new Message();
                $msg->senderId = $uId;
                $msg->receiverId = Trip::whereId($tripId)->uId;
                $msg->message = User::whereId($uId)->username . " دعوت شما برای سفر  " . Trip::whereId($tripId)->name . " را قبول کرد ";
                $msg->subject = "دعوت برای سفر";
                $msg->date = getToday()["date"];
                $msg->save();

            }
            $tripMember->status = 1;
            $tripMember->save();
            return Redirect::to(route('msgs'));
        }
        return Redirect::to(route('msgsErr', ['err' => 'لینک دعوت از بین رفته است']));
    }
    
    public function rejectInvitation($tripId) {

        $uId = Auth::user()->id;

        $condition = ['uId' => $uId, 'tripId' => $tripId];
        $tripMember = TripMember::where($condition)->first();
        if($tripMember != null) {

            $msg = new Message();
            $msg->senderId = $uId;
            $msg->receiverId = Trip::whereId($tripId)->uId;
            $msg->message = User::whereId($uId)->username . " دعوت شما برای سفر  " . Trip::whereId($tripId)->name . " را رد کرد ";
            $msg->subject = "دعوت برای سفر";
            $msg->date = getToday()["date"];
            $msg->save();

            $tripMember->delete();
            TripMembersLevelController::where($condition)->delete();
        }
        return Redirect::to(route('msgs'));
    }

    public function getTripMembers() {
        if(isset($_POST["tripId"])) {

            $uId = Auth::user()->id;
            $tripId = makeValidInput($_POST["tripId"]);

            $counter = 0;
            $owner = Trip::whereId($tripId)->uId;

            $out[$counter]["delete"] = 0;
            $out[$counter++]["username"] = User::whereId(Trip::whereId($tripId)->uId)->username;

            $condition = ['tripId' => $tripId, 'status' => 1];
            $users = TripMember::where($condition)->select('uId')->get();

            foreach ($users as $user) {
                if($user->uId == $uId || $owner == $uId) {
                    $out[$counter]["delete"] = 1;
                }
                else
                    $out[$counter]["delete"] = 0;

                $out[$counter++]["username"] = User::whereId($user->uId)->username;
            }

            echo json_encode($out);
        }
    }

    public function deleteMember() {
        if(isset($_POST["username"]) && isset($_POST["tripId"])) {

            $username = makeValidInput($_POST["username"]);

            $currUser = Auth::user();
            $tripId = makeValidInput($_POST["tripId"]);
            $uId = User::whereUserName($username)->first()->id;

            $trip = Trip::whereId($tripId);

            if($trip == null) {
                echo "nok";
                return;
            }

            if($trip->uId != $currUser->id && $username != $currUser->username) {
                echo "nok";
                return;
            }

            $condition = ['tripId' => $tripId, 'uId' => $uId];
            $tripMember = TripMember::where($condition)->first();

            if($tripMember != null) {
                $tripMember->delete();
                $tripLevel = TripMembersLevelController::where($condition)->first();
                $tripLevel->delete();

                $trip = Trip::whereId($tripId);
                $ownerId = $trip->uId;
                $tripName = $trip->name;

                $msg = new Message();
                $msg->senderId = $uId;
                $msg->receiverId = $ownerId;
                $msg->message =  $username . " از سفر " . $tripName . " حذف شد ";
                $msg->subject = "حذف از سفر";
                $msg->date = getToday()["date"];
                $msg->save();


                $msg = new Message();
                $msg->senderId = $ownerId;
                $msg->receiverId = $uId;
                $msg->message =  "شما از سفر " . $tripName . " حذف شدید ";
                $msg->subject = "حذف از سفر";
                $msg->date = getToday()["date"];
                $msg->save();

                echo "ok";
            }
        }
    }

    public function getMemberAccessLevel() {

        if(isset($_POST["username"]) && isset($_POST["tripId"])) {

            $uId = User::whereUserName(makeValidInput($_POST["username"]))->first()->id;

            $condition = ['uId' => $uId, 'tripId' => makeValidInput($_POST["tripId"])];

            echo json_encode(TripMembersLevelController::where($condition)->first());

        }

    }

    public function changeAddPlace() {

        if(isset($_POST["username"]) && isset($_POST["tripId"])) {

            $uId = User::whereUserName(makeValidInput($_POST["username"]))->first()->id;
            
            $condition = ['uId' => $uId, 'tripId' => makeValidInput($_POST["tripId"])];
            $tripLevel = TripMembersLevelController::where($condition)->first();
            if($tripLevel->addPlace == 1)
                $tripLevel->addPlace = 0;
            else
                $tripLevel->addPlace = 1;

            $tripLevel->save();
        }
    }

    public function changePlaceDate() {

        if(isset($_POST["username"]) && isset($_POST["tripId"])) {

            $uId = User::whereUserName(makeValidInput($_POST["username"]))->first()->id;

            $condition = ['uId' => $uId, 'tripId' => makeValidInput($_POST["tripId"])];
            $tripLevel = TripMembersLevelController::where($condition)->first();
            if($tripLevel->changePlaceDate == 1)
                $tripLevel->changePlaceDate = 0;
            else
                $tripLevel->changePlaceDate = 1;

            $tripLevel->save();
        }
    }

    public function changeTripDate() {

        if(isset($_POST["username"]) && isset($_POST["tripId"])) {

            $uId = User::whereUserName(makeValidInput($_POST["username"]))->first()->id;

            $condition = ['uId' => $uId, 'tripId' => makeValidInput($_POST["tripId"])];
            $tripLevel = TripMembersLevelController::where($condition)->first();
            if($tripLevel->changeTripDate == 1)
                $tripLevel->changeTripDate = 0;
            else
                $tripLevel->changeTripDate = 1;

            $tripLevel->save();
        }
    }

    public function changeAddFriend() {

        if(isset($_POST["username"]) && isset($_POST["tripId"])) {

            $uId = User::whereUserName(makeValidInput($_POST["username"]))->first()->id;

            $condition = ['uId' => $uId, 'tripId' => makeValidInput($_POST["tripId"])];
            $tripLevel = TripMembersLevelController::where($condition)->first();
            if($tripLevel->addFriend == 1)
                $tripLevel->addFriend = 0;
            else
                $tripLevel->addFriend = 1;

            $tripLevel->save();
        }
    }

    public function deletePlace() {

        if(isset($_POST["tripPlaceId"])) {

            $tripPlaceId = makeValidInput($_POST["tripPlaceId"]);
            $uId = Auth::user()->id;
            $tripPlace = TripPlace::whereId($tripPlaceId);
            $tripId = $tripPlace->tripId;
            $condition = ['tripId' => $tripId, 'uId' => $uId];

            if(Trip::whereId($tripId)->uId == $uId ||
                (TripMember::where($condition)->count() > 0 && TripMembersLevelController::where($condition)->first()->addPlace)) {
                $tripPlace->delete();
                echo "ok";
            }
        }

    }
}