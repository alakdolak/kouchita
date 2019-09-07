<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Adab;
use App\models\Amaken;
use App\models\Hotel;
use App\models\LogModel;
use App\models\Majara;
use App\models\PicItem;
use App\models\Place;
use App\models\Report;
use App\models\ReportsType;
use App\models\Restaurant;
use App\models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class ReportController extends Controller {

    public function reports($mode = "") {

        if($mode == "")
            return view("reports", array('kindPlaceIds' => Place::all(),
                'user' => Auth::user()));

        return view("reports", array('reports' => ReportsType::whereKindPlaceId($mode)->get(), 'kindPlaceId' => $mode,
            'mode2' => 'see', 'user' => Auth::user()));
    }

    public function addReport($mode) {

        $msg = "";

        if(isset($_POST["addReport"]) && isset($_POST["reportDesc"])) {

            $report = new ReportsType();
            $report->description = makeValidInput($_POST["reportDesc"]);
            $report->kindPlaceId = $mode;

            try {
                $report->save();
                return Redirect::to(route('reports', ['mode2' => $mode]));
            }
            catch (Exception $e) {
                $msg = "گزارش مورد نظر در سامانه موجود است";
            }
        }

        return view("reports", array('reports' => ReportsType::whereKindPlaceId($mode)->get(), 'kindPlaceId' => $mode,
            'mode2' => 'add', 'user' => Auth::user(), 'msg' => $msg));
    }

    public function opOnReport($mode) {

        if(isset($_POST["reportId"])) {
            $reportId = makeValidInput($_POST["reportId"]);
            ReportsType::destroy($reportId);
            return Redirect::to(route('reports', ['mode2' => $mode]));
        }

        return Redirect::to(route('reports', ['mode2' => $mode]));
    }

    public function getReports($page = 1) {


        $pageTmp = ($page - 1) * 10;
        $logs = LogModel::whereActivityId(Activity::whereName('گزارش')->first()->id)->orderBy('date', 'DESC')->skip($pageTmp)->limit(10)->get();

        foreach ($logs as $log) {

            $delete = false;

            $reports = Report::whereLogId($log->id)->get();
            if($reports == null || count($reports) == 0) {
                $delete = true;
            }
            else {

                if(!empty($log->text))
                    $log->text .= ' - ';

                foreach ($reports as $itr) {
                    $text = ReportsType::whereId($itr->reportKind);
                    if($text == null) {
                        $delete = true;
                        break;
                    }
                    $log->text .= $text->description . " - ";
                }
            }

            if(!$delete) {

                $log->visitorId = User::whereId($log->visitorId)->username;

                switch ($log->kindPlaceId) {
                    case 1:
                    default:
                        $place = Amaken::whereId($log->placeId);
                        break;
                    case 3:
                        $place = Restaurant::whereId($log->placeId);
                        break;
                    case 4:
                        $place = Hotel::whereId($log->placeId);
                        break;
                    case 6:
                        $place = Majara::whereId($log->placeId);
                        break;
                    case 8:
                        $place = Adab::whereId($log->placeId);
                        break;
                }

                $log->name = $place->name;
                $log->date = convertDate($log->date);


                $tmp = LogModel::whereId($log->relatedTo);

                if ($tmp == null) {
                    $delete = true;
                } else {

                    $log->writer = User::whereId($tmp->visitorId)->username;
                    $log->publishDate = convertDate($tmp->date);
                    $log->activityName = Activity::whereId($tmp->activityId)->name;

                    if ($log->activityName == "عکس") {
                        switch ($log->kindPlaceId) {
                            case 1:
                            default:
                                $log->userPic = URL::asset('userPhoto/amaken/l-' . $log->text);
                                break;
                            case 3:
                                $log->userPic = URL::asset('userPhoto/restaurant/l-' . $log->text);
                                break;
                            case 4:
                                $log->userPic = URL::asset('userPhoto/hotels/l-' . $log->text);
                                break;
                            case 6:
                                $log->userPic = URL::asset('userPhoto/majara/l-' . $log->text);
                                break;
                            case 8:
                                $log->userPic = URL::asset('userPhoto/adab/l-' . $log->text);
                                break;
                        }

                        if (!file_exists($log->userPic))
                            $delete = true;

                        $log->photoCategory = PicItem::whereId($log->pic)->name;
                    } else {
                        $log->descText = $tmp->text;
                    }

                    if($log->activityName == "نظر")
                        $log->redirect = route('showReview', ['logId' => $tmp->id]);

                    $log->kindPlaceId = Place::whereId($log->kindPlaceId)->name;
                }
            }

            if($delete)
                $log->delete();
        }

        return view('reportControl', array('currPage' => $page, 'user' => Auth::user(), 'logs' => $logs, 'total' => LogModel::whereActivityId(Activity::whereName('گزارش')->first()->id)->count()));

    }
    

}