<?php

namespace App\Http\Controllers;

use App\models\Place;
use App\models\Question;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class QuestionController extends Controller {

    public function questions($mode = "") {

        if($mode == "")
            return view("questions", array('kindPlaceIds' => Place::all(),
                'user' => Auth::user()));

        return view("questions", array('questions' => Question::whereKindPlaceId($mode)->get(),
            'kindPlaceId' => $mode, 'mode2' => 'see'));
    }

    public function addQuestion($mode) {

        $msg = "";

        if(isset($_POST["addQuestion"]) && isset($_POST["description"])) {

            $question = new Question();
            $question->description = makeValidInput($_POST["description"]);
            $question->kindPlaceId = $mode;

            try {
                $question->save();
                return Redirect::to(route('questions', ['mode2' => $mode]));
            }
            catch (Exception $e) {
                $msg = "سوال مورد نظر در سامانه موجود است";
            }
        }

        return view("questions", array('questions' => Question::whereKindPlaceId($mode)->get(),
            'kindPlaceId' => $mode, 'mode2' => 'add', 'msg' => $msg));
    }

    public function opOnQuestion($mode) {

        if(isset($_POST["questionId"])) {
            $questionId = makeValidInput($_POST["questionId"]);
            Question::destroy($questionId);
            return Redirect::to(route('questions', ['mode2' => $mode]));
        }

        return Redirect::to(route('questions', ['mode2' => $mode]));
    }
}