<?php

namespace App\Http\Controllers;

use App\models\PicItem;
use App\models\Place;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class  PicItemsController extends Controller {

    public function picItems($mode = "") {

        if($mode == "")
            return view("picItems", array('kindPlaceIds' => Place::all(),
                'user' => Auth::user()));

        return view("picItems", array('picItems' => PicItem::whereKindPlaceId($mode)->get(), 'kindPlaceId' => $mode,
            'mode2' => 'see'));
    }

    public function addPicItem($mode) {

        $msg = "";

        if(isset($_POST["addPicItem"]) && isset($_POST["picItemName"])) {

            $picItem = new PicItem();
            $picItem->name = makeValidInput($_POST["picItemName"]);
            $picItem->kindPlaceId = $mode;

            try {
                $picItem->save();
                return Redirect::to(route('picItems', ['mode2' => $mode]));
            }
            catch (Exception $e) {
                $msg = "آیتم مورد نظر در سامانه موجود است";
            }
        }
        
        return view("picItems", array('picItems' => PicItem::whereKindPlaceId($mode)->get(), 'kindPlaceId' => $mode,
            'mode2' => 'add', 'msg' => $msg));
    }

    public function opOnPicItem($mode) {

        if(isset($_POST["picItemId"])) {
            $picItemId = makeValidInput($_POST["picItemId"]);
            PicItem::destroy($picItemId);
            return Redirect::to(route('picItems', ['mode2' => $mode]));
        }

        return Redirect::to(route('picItems', ['mode2' => $mode]));
    }
}