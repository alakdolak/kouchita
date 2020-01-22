<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Adab;
use App\models\Amaken;
use App\models\Comment;
use App\models\Hotel;
use App\models\LogModel;
use App\models\Majara;
use App\models\PicItem;
use App\models\Place;
use App\models\PlaceStyle;
use App\models\Restaurant;
use App\models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class ContentController extends Controller {

    public function removeReview() {

        if(isset($_POST["logId"])) {

            $logId = makeValidInput($_POST["logId"]);
            $log = LogModel::whereId($logId);

            if($log != null && (Auth::user()->level == 1 || Auth::user()->id == $log->visitorId)) {

                LogModel::whereRelatedTo($logId)->delete();
                LogModel::destroy($logId);

                echo "ok";
            }

        }

    }

}