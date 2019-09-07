<?php

namespace App\Http\Controllers;

use App\models\Adab;
use App\models\Amaken;
use App\models\Hotel;
use App\models\Majara;
use App\models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MetaController extends Controller {

    public function selectAddMeta($kind = "") {

        if ($kind != "") {
            $target = array();

            switch ($kind) {
                case "adab":
                    $target = Adab::select('id', 'name')->get();
                    break;
                case "majara":
                    $target = Majara::select('id', 'name')->get();
                    break;
                case "hotel":
                    $target = Hotel::select('id', 'name')->get();
                    break;
                case "restaurant":
                    $target = Restaurant::select('id', 'name')->get();
                    break;
                case "amaken":
                    $target = Amaken::select('id', 'name')->get();
                    break;
            }
            return view('addMeta', array('mode2' => 'select2', 'target' => $target, 'kind' => $kind));
        }

        return view('addMeta', array('mode2' => 'select1'));
    }

    public function addMeta($kind = "", $id = "") {

        if ($kind == "" || $id == "")
            return view("addMeta", array('mode2' => 'select1'));

        $target = array();

        switch ($kind) {
            case "adab":
                $target = Adab::whereId($id);
                break;
            case "majara":
                $target = Majara::whereId($id);
                break;
            case "hotel":
                $target = Hotel::whereId($id);
                break;
            case "restaurant":
                $target = Restaurant::whereId($id);
                break;
            case "amaken":
                $target = Amaken::whereId($id);
                break;
        }

        return view('addMeta', array('mode2' => 'addMeta', 'meta' => $target->meta, 'kind' => $kind, 'id' => $id));
    }

    public function changeMeta($kind = '', $id = '') {

        if ($kind == "" || $id == "")
            return view('addMeta', array('mode2' => 'select1'));

        $target = array();

        switch ($kind) {
            case "adab":
                $target = Adab::whereId($id);
                break;
            case "majara":
                $target = Majara::whereId($id);
                break;
            case "hotel":
                $target = Hotel::whereId($id);
                break;
            case "restaurant":
                $target = Restaurant::whereId($id);
                break;
            case "amaken":
                $target = Amaken::whereId($id);
                break;
        }

        $target->meta = makeValidInput($_POST["newMeta"]);
        $target->save();
        return $this->selectAddMeta($kind);
    }
}