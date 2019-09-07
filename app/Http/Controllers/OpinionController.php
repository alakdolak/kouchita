<?php

namespace App\Http\Controllers;

use App\models\Opinion;
use App\models\Place;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class OpinionController extends Controller {

    public function opinions($mode = "") {

        if($mode == "")
            return view("opinions", array('kindPlaceIds' => Place::all(),
                'user' => Auth::user()));

        return view("opinions", array('opinions' => Opinion::whereKindPlaceId($mode)->get(), 'kindPlaceId' => $mode,
            'mode2' => 'see'));
    }

    public function addOpinion($mode) {

        $msg = "";

        if(isset($_POST["addOpinion"]) && isset($_POST["opinionName"])) {

            $opinion = new Opinion();
            $opinion->name = makeValidInput($_POST["opinionName"]);
            $opinion->kindPlaceId = $mode;

            try {
                $opinion->save();
                return Redirect::to(route('opinions', ['mode2' => $mode]));
            }
            catch (Exception $e) {
                $msg = "نظر مورد نظر در سامانه موجود است";
            }
        }

        return view("opinions", array('opinions' => Opinion::whereKindPlaceId($mode)->get(), 'kindPlaceId' => $mode,
            'mode2' => 'add', 'msg' => $msg));
    }

    public function opOnOpinion($mode) {

        if(isset($_POST["opinionId"])) {
            $opinionId = makeValidInput($_POST["opinionId"]);
            Opinion::destroy($opinionId);
            return Redirect::to(route('opinions', ['mode2' => $mode]));
        }

        return Redirect::to(route('opinions', ['mode2' => $mode]));
    }
}