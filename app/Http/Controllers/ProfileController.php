<?php

namespace App\Http\Controllers;

use App\models\AboutMe;
use App\models\ActivationCode;
use App\models\Activity;
use App\models\Age;
use App\models\Cities;
use App\models\DefaultPic;
use App\models\InvitationCode;
use App\models\Level;
use App\models\LogModel;
use App\models\Medal;
use App\models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller {

    public function sendMyInvitationCode() {

        if(isset($_POST["phoneNum"])) {

            $user = Auth::user();

            $last = InvitationCode::whereUId($user->id)->orderBy('sendTime', 'DESC')->first();

            if($last != null) {
                if(time() - $last->sendTime < 90) {
                    echo "nok";
                    return;
                }
            }

            $send = new InvitationCode();
            $send->phoneNum = makeValidInput($_POST["phoneNum"]);
            $send->sendTime = time();
            $send->uId = $user->id;

            try {
                $send->save();
                sendSMS(makeValidInput($_POST["phoneNum"]), $user->username, 'invite', $user->invitationCode);
                echo "ok";
                return;
            }
            catch (Exception $x) {}
        }

        echo "nok";
    }

    public function showProfile() {

        $user = Auth::user();
        $uId = $user->id;

        $user->created = convertDate($user->created_at);

        $activities = Activity::whereVisibility(1)->orderBy('rate', 'ASC')->get();

        $counts = array();
        $counter = 0;

        foreach ($activities as $activity) {
            $activity->name = $activity->actualName;
            $condition = ["visitorId" => $user->id, "activityId" => $activity->id, 'confirm' => 1];
            $counts[$counter++] = LogModel::where($condition)->count();
        }

        $recentlyBadges = [['badgeId' => -1, 'badgeDate' => -1],
            ['badgeId' => -1, 'badgeDate' => -1],
            ['badgeId' => -1, 'badgeDate' => -1]];

        $badges = Medal::all();
        foreach ($badges as $badge) {
            $date = getBadgeDate($badge->activityId, $badge->floor, $uId, $badge->kindPlaceId);
            if($date != -1) {
                if($date > $recentlyBadges[0]['badgeDate']) {
                    $recentlyBadges[2]['badgeDate'] = $recentlyBadges[1]['badgeDate'];
                    $recentlyBadges[2]['badgeId'] = $recentlyBadges[1]['badgeId'];
                    $recentlyBadges[1]['badgeDate'] = $recentlyBadges[0]['badgeDate'];
                    $recentlyBadges[1]['badgeId'] = $recentlyBadges[0]['badgeId'];
                    $recentlyBadges[0]['badgeDate'] = $date;
                    $recentlyBadges[0]['badgeId'] = $badge->id;
                }
                else if($date > $recentlyBadges[1]['badgeDate']) {
                    $recentlyBadges[2]['badgeDate'] = $recentlyBadges[1]['badgeDate'];
                    $recentlyBadges[2]['badgeId'] = $recentlyBadges[1]['badgeId'];
                    $recentlyBadges[1]['badgeDate'] = $date;
                    $recentlyBadges[1]['badgeId'] = $badge->id;
                }
                else if($date > $recentlyBadges[2]['badgeDate']) {
                    $recentlyBadges[2]['badgeDate'] = $date;
                    $recentlyBadges[2]['badgeId'] = $badge->id;
                }
            }
        }

        $limit = (count($recentlyBadges) >= 3) ? 3 : count($recentlyBadges);
        array_splice($recentlyBadges, $limit);
        $outMedals = [];

        foreach ($recentlyBadges as $badge) {
            if($badge['badgeId'] != -1) {
                $badgeTmp = Medal::whereId($badge['badgeId']);
                $badgeTmp->activityId = Activity::whereId($badgeTmp->activityId)->name;
                $outMedals[count($outMedals)] = $badgeTmp;
            }
        }

        if(!$user->uploadPhoto) {
            $photo = DefaultPic::whereId($user->picture);
            if($photo == null)
                $user->picture = DefaultPic::first()->name;
            else
                $user->picture = $photo->name;
        }

        return view('profile', array('activities' => $activities,
            'counts' => $counts, 'totalPoint' => getUserPoints($user->id), 'levels' => Level::orderBy('floor', 'ASC')->get(),
            'userLevels' => nearestLevel($user->id), 'medals' => getMedals($user->id),
            'nearestMedals' => getNearestMedals($user->id), 'recentlyBadges' => $outMedals));

    }

    public function showOtherProfile($username, $mode = "") {

        $uId = User::whereUserName($username)->first();

        if($uId == null)
            return Redirect::to('profile');

        $uId = $uId->id;

        $user = User::whereId($uId);
        $user->created = convertDate($user->created_at);

        $activities = Activity::whereVisibility(1)->get();

        $counts = array();
        $counter = 0;

        foreach ($activities as $activity) {
            $activity->name = $activity->actualName;
            $condition = ["visitorId" => $user->id, "activityId" => $activity->id];
            $counts[$counter++] = LogModel::where($condition)->count();
        }

        if(!$user->uploadPhoto) {
            $photo = DefaultPic::whereId($user->picture);
            if($photo == null)
                $user->picture = DefaultPic::first()->name;
            else
                $user->picture = $photo->name;
        }

        $recentlyBadges = [['badgeId' => -1, 'badgeDate' => -1],
            ['badgeId' => -1, 'badgeDate' => -1],
            ['badgeId' => -1, 'badgeDate' => -1]];

        $badges = Medal::all();
        foreach ($badges as $badge) {
            $date = getBadgeDate($badge->activityId, $badge->floor, $uId, $badge->kindPlaceId);
            if($date != -1) {
                if($date > $recentlyBadges[0]['badgeDate']) {
                    $recentlyBadges[2]['badgeDate'] = $recentlyBadges[1]['badgeDate'];
                    $recentlyBadges[2]['badgeId'] = $recentlyBadges[1]['badgeId'];
                    $recentlyBadges[1]['badgeDate'] = $recentlyBadges[0]['badgeDate'];
                    $recentlyBadges[1]['badgeId'] = $recentlyBadges[0]['badgeId'];
                    $recentlyBadges[0]['badgeDate'] = $date;
                    $recentlyBadges[0]['badgeId'] = $badge->id;
                }
                else if($date > $recentlyBadges[1]['badgeDate']) {
                    $recentlyBadges[2]['badgeDate'] = $recentlyBadges[1]['badgeDate'];
                    $recentlyBadges[2]['badgeId'] = $recentlyBadges[1]['badgeId'];
                    $recentlyBadges[1]['badgeDate'] = $date;
                    $recentlyBadges[1]['badgeId'] = $badge->id;
                }
                else if($date > $recentlyBadges[2]['badgeDate']) {
                    $recentlyBadges[2]['badgeDate'] = $date;
                    $recentlyBadges[2]['badgeId'] = $badge->id;
                }
            }
        }

        $outMedals = [];

        foreach ($recentlyBadges as $badge) {
            if($badge['badgeId'] != -1) {
                $badgeTmp = Medal::whereId($badge['badgeId']);
                $badgeTmp->activityId = Activity::whereId($badgeTmp->activityId)->name;
                $outMedals[count($outMedals)] = $badgeTmp;
            }
        }

        return view('otherProfile', array('user' => $user, 'activities' => $activities,
            'counts' => $counts, 'totalPoint' => getUserPoints($user->id), 'levels' => Level::all(),
            'userLevels' => nearestLevel($user->id), 'recentlyBadges' => $outMedals, 'mode2' => $mode));

    }
    
    public function checkAuthCode() {

        if(isset($_POST["phoneNum"]) && isset($_POST["code"])) {

            $phoneNum = makeValidInput($_POST["phoneNum"]);
            $code = makeValidInput($_POST["code"]);

            $condition = ['phoneNum' => $phoneNum, 'code' => $code];
            $activation = ActivationCode::where($condition)->first();
            if($activation != null) {

                $user = Auth::user();
                $user->phone = $phoneNum;
                $user->save();

                $activation->delete();

                return "ok";
            }
        }

        return "nok";
    }

    public function resendAuthCode() {

        if(isset($_POST["phoneNum"])) {

            $phoneNum = makeValidInput($_POST["phoneNum"]);

            $condition = ['phoneNum' => $phoneNum];
            $activation = ActivationCode::where($condition)->first();
            if($activation != null) {

                if(time() - $activation->sendTime < 90) {
                    return json_encode(['msg' => 'err', 'reminder' => 90 - time() + $activation->sendTime]);
                }

                $activation->code = createCode();
                $activation->sendTime = time();
                $activation->save();

                sendSMS($phoneNum, $activation->code, 'sms');

                return json_encode(['msg' => 'ok', 'reminder' => 90]);
            }
        }

        return json_encode(['msg' => 'err', 'reminder' => 90]);
    }

    public function accountInfo($msg = "", $mode = 1, $reminder = "", $phoneNum = "") {

        $user = Auth::user();

        $aboutMe = AboutMe::whereUId($user->id)->first();

        $tmp = Cities::whereId($user->cityId);
        if($tmp != null)
            $user->cityId = $tmp->name;
        else
            $user->cityId = "";

        return view('accountInfo', array('msg' => $msg, 'mode2' => $mode, 'reminder' => $reminder,
            'ages' => Age::all(), 'aboutMe' => $aboutMe, 'phoneNum' => $phoneNum));
    }

    public function accountInfo2($status) {

        $uId = Auth::user()->id;

        $user = User::whereId($uId);

        $activities = Activity::all();

        $counts = array();
        $counter = 0;

        foreach ($activities as $activity) {
            $condition = ["visitorId" => $user->id, "activityId" => $activity->id];
            $counts[$counter++] = LogModel::where($condition)->count();
        }

        if(!$user->uploadPhoto) {

            $defaultPic = DefaultPic::whereId($user->picture);
            if($defaultPic == null)
                $defaultPic = DefaultPic::first();

            $user->picture = $defaultPic->name;
        }

        $aboutMe = AboutMe::whereUId($uId)->first();

        if($aboutMe == null) {
            $aboutMe = array();
        }

        $user->cityId = Cities::whereId($user->cityId)->name;

        $msg = "";
        if($status == "successPasChanged")
            $msg = "رمزعبور شما به درستی تغییر کرد";

        return view('accountInfo', array('user' => $user, 'msg' => $msg, 'mode2' => 0, 'reminder' => '',
            'ages' => Age::all(), 'cities' => Cities::all(), 'aboutMe' => $aboutMe, 'phoneNum' => ''));
    }

    public function updateProfile1() {

        $uId = Auth::user()->id;

        if(isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["username"]) &&
            isset($_POST["email"]) && isset($_POST["cityName"])) {

            if(empty($cityName)) {
                $msg = "لطفا شهر مورد نظر خود را وارد نمایید";
            }

            else {
                $username = makeValidInput($_POST["username"]);

                if (User::whereId($uId)->username != $username && User::whereUserName($username)->count() > 0) {
                    $msg = "نام کاربری وارد شده در سامانه موجود است";
                } else {

                    $user = User::whereId($uId);

                    $user->first_name = makeValidInput($_POST["firstName"]);
                    $user->last_name = makeValidInput($_POST["lastName"]);
                    $user->email = makeValidInput($_POST["email"]);
                    $user->cityId = Cities::whereName(makeValidInput($_POST["cityName"]))->first()->id;
                    $user->username = $username;

                    $user->save();

                    if (isset($_POST["phone"]) && makeValidInput($_POST["phone"]) != $user->phone) {

                        $phoneNum = makeValidInput($_POST["phone"]);
                        $activation = ActivationCode::wherePhoneNum($phoneNum)->first();

                        if ($activation == null) {
                            $activation = new ActivationCode();
                            $activation->phoneNum = $phoneNum;
                            $activation->code = createCode();
                            $activation->sendTime = time();
                            $activation->save();
                            sendSMS($phoneNum, $activation->code, 'sms');
                            return $this->accountInfo("sendActivation", 1, 90, $phoneNum);

                        }

                        if (time() - $activation->sendTime > 90) {
                            $activation->phoneNum = $phoneNum;
                            $activation->code = createCode();
                            $activation->sendTime = time();
                            $activation->save();
                            sendSMS($phoneNum, $activation->code, 'sms');
                            return $this->accountInfo("sendActivation", 1, 90, $phoneNum);
                        }

                        return $this->accountInfo("sendActivation", 1, 90 - time() + $activation->sendTime, $phoneNum);
                    }

                    return Redirect::to('accountInfo');
                }
            }
        }
        else {
            $msg = "اشکالی در برقراری ارتباط با سرور به وجود آمده است";
        }

        return $this->accountInfo($msg);
    }

    public function searchInCities() {
        if(isset($_POST["key"])) {
            $key = makeValidInput($_POST["key"]);

            echo json_encode(DB::select("select * from cities WHERE name LIKE '%$key%'"));

        }
    }

    public function updateProfile2() {

        $uId = Auth::user()->id;

        if(isset($_POST["introduction"]) && isset($_POST["sex"]) && isset($_POST["ageId"])) {

            if(AboutMe::whereUId($uId)->count() > 0)
                $aboutMe = AboutMe::whereUId($uId)->first();
            else {
                $aboutMe = new AboutMe();
                $aboutMe->uId = $uId;
            }

            $aboutMe->introduction = makeValidInput($_POST["introduction"]);
            $aboutMe->sex = (makeValidInput($_POST["sex"]) == "f") ? 0 :
                (makeValidInput($_POST["sex"]) == "m") ? 1 : 2;

            $aboutMe->ageId = makeValidInput($_POST["ageId"]);

            $aboutMe->save();

            return Redirect::to('accountInfo');
        }

        else
            $msg = "اشکالی در برقراری ارتباط با سرور به وجود آمده است";


        return $this->accountInfo($msg, 2);

    }

    public function updateProfile3() {

        $uId = Auth::user()->id;

        if(!empty(Auth::user()->link))
            $msg = "شما اجازه تغییر رمز عبور خود را ندارید";

        else if(isset($_POST["oldPassword"]) && isset($_POST["newPassword"]) && isset($_POST["repeatPassword"])) {
            if (Hash::check(makeValidInput($_POST["oldPassword"]), User::whereId($uId)->password)) {
                if (makeValidInput($_POST["newPassword"]) == makeValidInput($_POST["repeatPassword"])) {
                    $user = User::whereId($uId);
                    $user->password = Hash::make(makeValidInput($_POST["newPassword"]));
                    $user->save();

                    return Redirect::to(route('accountInfo2', ['status' => 'successPasChanged']));
                } else {
                    $msg = "پسورد جدید و تکرار آن یکی نیستند";
                }
            } else {
                $msg = "پسورد وارد شده معتبر نمی باشد";
            }
        }
        else {
            $msg = "اشکالی در برقراری ارتباط با سرور به وجود آمده است";
        }

        return $this->accountInfo($msg, 3);

    }

    public function editPhoto($msg = "") {
        $user = Auth::user();

        if($user->uploadPhoto) {
            $photo = "userProfile/" . $user->picture;
        }
        else {
            $photo = URL::asset("defaultPic/" . DefaultPic::whereId($user->picture)->name);
        }

        return view("editPhoto", array('msg' => $msg, 'photo' => $photo));

    }

    public function getDefaultPics() {

        $defaultPics = DefaultPic::all();

        foreach($defaultPics as $defaultPic) {
            $defaultPic->name = URL::asset("defaultPic/" . $defaultPic->name);
        }

        echo json_encode($defaultPics);

    }

    public function deleteAccount() {

        $uId = Auth::user()->id;

        if(!Auth::check()) {
            echo 'nok';
            return;
        }
        else {
            if($uId != User::whereLevel(1)->first()->id) {
                User::destroy($uId);
                echo 'ok';
                return;
            }
            echo 'nok';
        }
    }

    public function doEditPhoto() {

        $err = "";

        if(isset($_POST["cancel"]))
            return Redirect::to("editPhoto");

        if(isset($_FILES["newPic"])) {

            $uId = Auth::user()->id;

            $file = $_FILES["newPic"];
            $user = User::whereId($uId);

            if($user->uploadPhoto == 0 || $user->picture != $file["name"]) {

                $targetFile = __DIR__ . "/../../../../assets/userProfile/" . $file["name"];

                if (!file_exists($targetFile)) {
                    $err = uploadCheck($targetFile, "newPic", "تغییر تصویر کاربری", 3000000, -1);
                    if (empty($err)) {
                        $err = upload($targetFile, "newPic", "تغییر تصویر کاربری");
                        if(empty($err)) {
                            if($user->uploadPhoto == 1)
                                unlink(__DIR__ . "/../../../../assets/userProfile/" . $user->picture);
                            $user->picture = $file["name"];
                            $user->uploadPhoto = 1;
                            $user->save();
                        }
                    }
                }
            }
        }

        if(empty($err)) {
            return Redirect::to("editPhoto");
        }

        return $this->editPhoto($err);

    }

    public function submitPhoto() {

        $uId = Auth::user()->id;

        $pic = makeValidInput($_POST["pic"]);
        $mode = makeValidInput($_POST["mode"]);

        $user = User::whereId($uId);

        $pic = explode('/', $pic);

        if($mode == 0) {

            if($user->uploadPhoto == 1 && file_exists(__DIR__ . "/../../../../assets/userProfile/" . $user->picture))
                unlink(__DIR__ . "/../../../../assets/userProfile/" . $user->picture);

            $user->uploadPhoto = 0;
            $user->picture = DefaultPic::whereName($pic[count($pic) - 1])->first()->id;
            $user->save();
        }

        echo "ok";
    }
}