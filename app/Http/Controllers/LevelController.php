<?php

namespace App\Http\Controllers;

use App\models\Level;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class LevelController extends Controller {

    public function showLevels() {

        $levels = Level::all();

        return view("levels", array('levels' => $levels, 'mode2' => 'see'));
    }

    public function addLevel() {

        $msg = "";

        if(isset($_POST["addLevel"]) && isset($_POST["levelName"])) {
            $level = new Level();
            $level->name = makeValidInput($_POST["levelName"]);
            $level->floor = makeValidInput($_POST["floor"]);

            try {
                $level->save();
                return Redirect::to('levels');
            }
            catch (Exception $e) {
                $msg = "مدال مورد نظر در سامانه موجود است";
            }
        }

        $levels = Level::all();

        return view('levels', array('levels' => $levels, 'mode2' => 'add', 'msg' => $msg));
    }

    public function opOnLevel() {

        if(isset($_POST["deleteLevel"])) {
            $levelId = makeValidInput($_POST["deleteLevel"]);
            Level::destroy($levelId);
            return Redirect::to('levels');
        }

        if(isset($_POST["editLevel"])) {
            $levelId = makeValidInput($_POST["editLevel"]);
            $selectedLevel = Level::whereId($levelId);
            $levels = Level::all();
            return view('levels', array('levels' => $levels, 'selectedLevel' => $selectedLevel,
                'mode2' => 'edit', 'msg' => ''));
        }

        if(isset($_POST["doEditLevel"])) {
            $levelId = makeValidInput($_POST["levelId"]);
            $level = Level::whereId($levelId);
            $level->name = makeValidInput($_POST["levelName"]);
            $level->floor = makeValidInput($_POST["floor"]);
            try {
                $level->save();
                return Redirect::to('levels');
            }
            catch (Exception $e) {
                $levels = Level::all();
                return view('levels', array('levels' => $levels, 'selectedLevel' => $level,
                    'mode2' => 'edit', 'msg' => 'سطح مورد نظر در سامانه موجود است'));
            }
        }

        return Redirect::to('levels');

    }

}