<?php

namespace App\Http\Controllers;

use App\models\ActivationCode;
use App\models\Activity;
use App\models\Age;
use App\models\Cities;
use App\models\DefaultPic;
use App\models\InvitationCode;
use App\models\Level;
use App\models\LogModel;
use App\models\Medal;
use App\models\PhotographersPic;
use App\models\Place;
use App\models\PlaceFeatures;
use App\models\State;
use App\models\User;
use App\models\UserTripStyles;
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

        $user->picture = getUserPic($user->id);

        $medals = getMedals($user->id);
        $nearestMedals = getNearestMedals($user->id);

        $user->tripStyle = UserTripStyles::join('tripStyle', 'tripStyle.id', 'userTripStyles.tripStyleId')->where('userTripStyles.uId', $user->id)->get();

        $userCount = $user->getUserActivityCount();

        return view('profile.profile', array('activities' => $activities, 'userCount' => $userCount,
            'counts' => $counts, 'totalPoint' => getUserPoints($user->id), 'levels' => Level::orderBy('floor', 'ASC')->get(),
            'userLevels' => nearestLevel($user->id), 'medals' => $medals,
            'nearestMedals' => $nearestMedals, 'recentlyBadges' => $outMedals));

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

        $user->picture = getUserPic($user->id);

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

            $condition = ['phoneNum' => $phoneNum, 'code' => $code, 'userId' => \auth()->user()->id];
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

            $condition = ['phoneNum' => $phoneNum, 'userId' =>  \auth()->user()->id];
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
        if(session('msg')) {
            $msg = session('msg');
            $mode = 0;
        }
        session()->forget('msg');

        $user = Auth::user();

        $tmp = Cities::whereId($user->cityId);
        if($tmp != null) {
            $user->cityName = $tmp->name;
            $user->cityId = $tmp->id;
        }
        else{
            $user->cityName = "";
            $user->cityId = 0;
        }

        $isAcitveCode = false;
        $activeCode = ActivationCode::where('userId', $user->id)->get();
        if($activeCode != null){
            foreach ($activeCode as $item){
                if(time() - $item->sendTime < 90){
                    $user->phone = $item->phoneNum;
                    $isAcitveCode = true;
                    break;
                }
            }
        }

        return view('accountInfo', array('msg' => $msg, 'mode2' => $mode, 'reminder' => $reminder,
            'ages' => Age::all(), 'phoneNum' => $phoneNum, 'isAcitveCode' => $isAcitveCode));
    }

    public function updateProfile1() {

        if(!isset($_POST['userName']) || strlen($_POST['userName']) < 4){
            echo json_encode(['status' => 'nok']);
            return;
        }

        $user = Auth::user();

        if(User::whereUserName($_POST['userName'])->where('id', '!=', $user->id)->count() == 0)
            $user->username = makeValidInput($_POST["userName"]);
        if(isset($_POST['firstName']))
            $user->first_name = $_POST['firstName'];
        if(isset($_POST['lastName']))
            $user->last_name = $_POST['lastName'];
        if(isset($_POST['email']) && strlen($_POST['email']) != 0 && User::whereUserName($_POST['email'])->where('id', '!=', $user->id)->count() == 0)
            $user->email = makeValidInput($_POST["email"]);
        if(isset($_POST['cityId']) && $_POST['cityId'] != 0)
            $user->cityId = makeValidInput($_POST['cityId']);
        $user->save();

        if (isset($_POST["phone"]) && makeValidInput($_POST["phone"]) != $user->phone && User::wherePhone($_POST['phone'])->count() == 0) {

            $phoneNum = makeValidInput($_POST["phone"]);
            $activation = ActivationCode::where('userId', $user->id)->first();

            if ($activation == null) {
                $activation = new ActivationCode();
                $activation->phoneNum = $phoneNum;
                $activation->code = createCode();
                $activation->sendTime = time();
                $activation->userId = $user->id;
                $activation->save();
                sendSMS($phoneNum, $activation->code, 'sms');

                echo json_encode(['status' => 'ok', 'time' => 90 , 'phoneNum' => $phoneNum]);
                return;
            }

            if (time() - $activation->sendTime > 90) {
                $activation->phoneNum = $phoneNum;
                $activation->code = createCode();
                $activation->sendTime = time();
                $activation->userId = $user->id;
                $activation->save();
                sendSMS($phoneNum, $activation->code, 'sms');
                echo json_encode(['status' => 'ok', 'time' => 90 , 'phoneNum' => $phoneNum]);
                return;
            }

            echo json_encode(['status' => 'ok', 'time' => 90 - time() + $activation->sendTime, 'phoneNum' => $phoneNum]);
            return;
        }

        echo json_encode(['status' => 'ok']);
        return;
    }

    public function searchInCities() {
        if(isset($_POST["key"])) {
            $key = makeValidInput($_POST["key"]);

            echo json_encode(DB::select("select * from cities WHERE name LIKE '%$key%'"));

        }
    }

    public function updateProfile2() {
        $user = Auth::user();
        if(isset($_POST["introduction"]) && isset($_POST["sex"]) && isset($_POST["ageId"])) {


            $user->introduction = makeValidInput($_POST["introduction"]);
            $user->sex = (makeValidInput($_POST["sex"]) == "f") ? 0 :
                (makeValidInput($_POST["sex"]) == "m") ? 1 : 2;

            $user->ageId = makeValidInput($_POST["ageId"]);

            $user->save();

            echo 'ok';
        }
        else
            echo 'nok';
        return;
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
                    Auth::login($user);
                    session(['msg' => 'رمز عبور با موفقیت تغییر یافت']);

                    return Redirect::to(route('accountInfo'));
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

        $photo = getUserPic($user->id);

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

                $fileName = time() . $file["name"];
                $targetFile = __DIR__ . "/../../../../assets/userProfile/" . $fileName;

                if (!file_exists($targetFile)) {
                    $err = uploadCheck($targetFile, "newPic", "تغییر تصویر کاربری", 3000000, -1);
                    if (empty($err)) {
                        $destinationMainPic = $targetFile;

                        $err = compressImage($_FILES['newPic']['tmp_name'], $destinationMainPic, 60);
                        if($err) {
                            if($user->uploadPhoto == 1 && file_exists(__DIR__ . "/../../../../assets/userProfile/" . $user->picture))
                                unlink(__DIR__ . "/../../../../assets/userProfile/" . $user->picture);
                            $user->picture = $fileName;
                            $user->uploadPhoto = 1;
                            $user->save();
                            $err = '';
                        }
                    }
                }
            }
        }

        if(empty($err) ) {
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

    public function addPlaceByUserPage()
    {
        $states = State::all();
        $kindPlace = [
            'amaken' => [
                'id' => 1,
            ],
            'restaurant' => [
                'id' => 3,
            ],
            'hotel' => [
                'id' => 4,
            ]
        ];

        foreach ($kindPlace as $key => $item2){
            $features = PlaceFeatures::where('kindPlaceId', $kindPlace[$key]['id'])->where('parent', 0)->get();
            foreach ($features as $item)
                $item->subFeat = PlaceFeatures::where('parent', $item->id)->get();
            $kindPlace[$key]['features'] = $features;
        }

        return view('profile.addPlaceByUser', compact(['states', 'kindPlace']));
    }

    public function storeAddPlaceByUser(\Request $request)
    {
        dd($request->all());
    }

    public function storeImgAddPlaceByUser(Request $request)
    {

    }
}