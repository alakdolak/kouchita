<?php

namespace App\Http\Controllers;

use App\models\Place;
use App\models\Tag;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class TagController extends Controller {

    public function tags($mode = "") {

        if($mode == "")
            return view("tags", array('kindPlaceIds' => Place::all()));

        return view("tags", array('tags' => Tag::whereKindPlaceId($mode)->get(), 'kindPlaceId' => $mode,
            'mode2' => 'see'));
    }

    public function addTag($mode) {

        $msg = "";

        if(isset($_POST["addTag"]) && isset($_POST["tagName"])) {

            $tag = new Tag();
            $tag->name = makeValidInput($_POST["tagName"]);
            $tag->kindPlaceId = $mode;

            try {
                $tag->save();
                return Redirect::to(route('tags', ['mode2' => $mode]));
            }
            catch (Exception $e) {
                $msg = "تگ مورد نظر در سامانه موجود است";
            }
        }

        return view("tags", array('tags' => Tag::whereKindPlaceId($mode)->get(), 'kindPlaceId' => $mode,
            'mode2' => 'add', 'msg' => $msg));
    }

    public function opOnTag($mode) {

        if(isset($_POST["tagId"])) {
            $tagId = makeValidInput($_POST["tagId"]);
            Tag::destroy($tagId);
            return Redirect::to(route('tags', ['mode2' => $mode]));
        }

        return Redirect::to(route('tags', ['mode2' => $mode]));
    }

}