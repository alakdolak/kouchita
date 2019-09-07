<?php

namespace App\Http\Controllers;

use App\models\GoyeshTag;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class GoyeshTagController extends Controller {

    public function tags() {
        return view("goyeshTags", array('tags' => GoyeshTag::all(), 'mode2' => 'see'));
    }

    public function addTag() {

        $msg = "";

        if(isset($_POST["addTag"]) && isset($_POST["tagName"])) {

            $tag = new GoyeshTag();
            $tag->name = makeValidInput($_POST["tagName"]);

            try {
                $tag->save();
                return Redirect::to('goyeshTags');
            }
            catch (Exception $e) {
                $msg = "تگ مورد نظر در سامانه موجود است";
            }
        }

        return view("goyeshTags", array('tags' => GoyeshTag::all(), 'mode2' => 'add', 'msg' => $msg));
    }

    public function opOnTag() {

        if(isset($_POST["tagId"])) {
            $tagId = makeValidInput($_POST["tagId"]);
            GoyeshTag::destroy($tagId);
        }

        return Redirect::to('goyeshTags');

    }

}