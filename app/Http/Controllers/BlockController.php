<?php

namespace App\Http\Controllers;

use App\models\ReportsType;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class BlockController extends Controller {

    public function showDescriptions() {
        $descriptions = ReportsType::all();
        return view('descriptions', array('descriptions' => $descriptions, 'mode2' => 'see', 'user' => Auth::user()));
    }

    public function addDescription() {

        $msg = "";

        if(isset($_POST["addDesc"]) && isset($_POST["desc"])) {
            $desc = new ReportsType();
            $desc->description = makeValidInput($_POST["desc"]);
            try {
                $desc->save();
                return Redirect::to('descriptions');
            }
            catch (Exception $e) {
                $msg = "این توضیح در سامانه موجود است";
            }
        }

        $descriptions = ReportsType::all();
        return view('descriptions', array('descriptions' => $descriptions, 'msg' => $msg,
            'mode2' => 'add', 'user' => Auth::user()));
    }

    public function opOnDescription() {

        if(isset($_POST["deleteDesc"])) {
            $descriptionId = makeValidInput($_POST["deleteDesc"]);
            ReportsType::destroy($descriptionId);
            return Redirect::to('descriptions');
        }

        if(isset($_POST["editDesc"])) {
            $descriptionId = makeValidInput($_POST["editDesc"]);
            $selectedDescription = ReportsType::whereId($descriptionId);
            $descriptions = ReportsType::all();
            return view('descriptions', array('descriptions' => $descriptions, 'selectedDesc' => $selectedDescription,
                'mode2' => 'edit', 'msg' => '', 'user' => Auth::user()));
        }

        if(isset($_POST["doEditDesc"])) {
            $descriptionId = makeValidInput($_POST["descId"]);
            $description = ReportsType::whereId($descriptionId);
            $description->description = makeValidInput($_POST["desc"]);
            try {
                $description->save();
                return Redirect::to('descriptions');
            }
            catch (Exception $e) {
                $descriptions = ReportsType::all();
                return view('descriptions', array('descriptions' => $descriptions, 'selectedDescription' => $description,
                    'mode2' => 'edit', 'msg' => 'توضیح مورد نظر در سامانه موجود است', 'user' => Auth::user()));
            }
        }

        return Redirect::to('descriptions');

    }

}