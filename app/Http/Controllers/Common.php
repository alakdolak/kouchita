<?php

use App\models\ActivationCode;
use App\models\Activity;
use App\models\Amaken;
use App\models\Cities;
use App\models\CityPic;
use App\models\DefaultPic;
use App\models\Hotel;
use App\models\Level;
use App\models\LogFeedBack;
use App\models\LogModel;
use App\models\MahaliFood;
use App\models\Majara;
use App\models\Medal;
use App\models\Place;
use App\models\PlacePic;
use App\models\QuestionAns;
use App\models\Restaurant;
use App\models\ReviewPic;
use App\models\ReviewUserAssigned;
use App\models\SogatSanaie;
use App\models\State;
use App\models\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function getPostCategories() {

    return [
        [
            'super' => "اماکن گردشگری",
            'childs' => [
                ['id' => 1, 'key' => 'اماکن تاریخی'],
                ['id' => 2, 'key' => 'اماکن مذهبی'],
                ['id' => 3, 'key' => 'اماکن تفریحی'],
                ['id' => 4, 'key' => 'طبیعت گردی'],
                ['id' => 5, 'key' => 'مراکز خرید'],
                ['id' => 6, 'key' => 'موزه ها']
            ]
        ],
        [
            'super' => "هتل و رستوران",
            "childs" => [
                ['id' => 7, 'key' => 'هتل'],
                ['id' => 8, 'key' => 'رستوران'],
            ]
        ],
        [
            'super' => "حمل و نقل",
            'childs' => [
                ['id' => 9, 'key' => 'هواپیما'],
                ['id' => 10, 'key' => 'اتوبوس'],
                ['id' => 11, 'key' => 'سواری'],
                ['id' => 12, 'key' => 'فطار']
            ]
        ],
        [
            'super' => "آداب و رسوم",
            "childs" => [
                ['id' => 13, 'key' => 'سوغات محلی'],
                ['id' => 14, 'key' => 'صنایع دستی'],
                ['id' => 15, 'key' => 'اماکن تفریحی'],
                ['id' => 16, 'key' => 'غذای محلی'],
                ['id' => 17, 'key' => 'لباس محلی'],
                ['id' => 18, 'key' => 'گویش محلی'],
                ['id' => 19, 'key' => 'اصطلاحات محلی'],
            ]
        ],
        [
            'super' => "جشنواره و آیین",
            "childs" => [
                ['id' => 20, 'key' => 'رسوم محلی'],
                ['id' => 21, 'key' => 'جشنواره'],
                ['id' => 22, 'key' => 'تور'],
                ['id' => 23, 'key' => 'کنسرت']
            ]
        ]
    ];
}

function getValueInfo($key) {

    $values = [
        'hotel-detail' => 1, 'adab-detail' => 2, 'amaken-detail' => 3, 'majara-detail' => 4, 'restaurant-detail' => 5,
        'hotel-list' => 6, 'adab-list' => 7, 'amaken-list' => 8, 'majara-list' => 9, 'restaurant-list' => 10,
        'main_page' => 11
    ];

    return $values[$key];

}

function dotNumber($number){

    $number = round($number);
//    dd($number);
    $i = 1;
    $num = 0;

    while($i < $number) {
        $i *= 10;
        $num++;
    }

    $string_number = "";

    for($i = 0; $i < $num; $i++) {
        $string_number .= $number % 10;
        $number = (int)$number / 10;
        if($i % 3 == 2)
            $string_number .= ',';
    }

    $tmp = "";
    for($i = strlen($string_number) - 1; $i >= 0; $i--) {
        $tmp .= $string_number[$i];
    }

//    $mande = $num % 3;
//    $string_number = floor($number / (10**($num-$mande)));
//    $number = $number % (10**($num-$mande));
//    $num = $num - $mande;
//    $div = $num;
//
//    for($i = 0; $i < $div/3; $i++){
//        $string_number .= '.';
//        if($number != 0) {
//            $num -= 3;
//            $string_number .= floor($number / (10 ** ($num)));
//            $number = $number % (10 ** ($num));
//        }
//        else if($i < ($div/3)-1){
//            $string_number .= '000';
//        }
//        else{
//            $string_number .= '000';
//        }
//    }

    return $tmp;
}

function getPast($past) {

    include_once 'jdate.php';

    $jalali_date = jdate("c", $past);

    $date_time = explode('-', $jalali_date);

    $subStr = explode('/', $date_time[0]);

    $day = $subStr[0] . $subStr[1] . $subStr[2];

    $time = explode(':', $date_time[1]);

    $time = $time[0] . $time[1];

    return ["date" => $day, "time" => $time];
}

function getCDN($key) {
//    '_image_CDN' => 'http://79.175.133.206:8080/_images/'
    $arr = ['imageCDN' => 'https://shazdemosafer.com/images/',
        '_image_CDN' => 'http://assets.baligh.ir/_images/',
        'cssCDN' => 'https://shazdemosafer.com/css/',
        'jsCDN' => 'https://shazdemosafer.com/js/',
        'fontCDN' => 'https://shazdemosafer.com/fonts/'];
    return $arr[$key];
}

function _custom_check_national_code($code) {

    if(!preg_match('/^[0-9]{10}$/',$code))
        return false;

    for($i=0;$i<10;$i++)
        if(preg_match('/^'.$i.'{10}$/',$code))
            return false;
    for($i=0,$sum=0;$i<9;$i++)
        $sum+=((10-$i)*intval(substr($code, $i,1)));
    $ret=$sum%11;
    $parity=intval(substr($code, 9,1));
    if(($ret<2 && $ret==$parity) || ($ret>=2 && $ret==11-$parity))
        return true;
    return false;
}

function getBadgeDate($activityId, $floor, $uId, $kindPlaceId) {

    if($kindPlaceId == -1)
        $condition = ['visitorId' => $uId, 'activityId' => $activityId];
    else
        $condition = ['visitorId' => $uId, 'activityId' => $activityId, 'kindPlaceId' => $kindPlaceId];

    $tmp = LogModel::where($condition)->count();
    if($tmp >= $floor) {
        return LogModel::where($condition)->orderBy('date', 'ASC')->skip($tmp - 1)->first()->date;
    }
    return -1;
}

function checkBadge($uId, $badge) {

    if($badge->activityId == 99) { // opOnActivity
        return (\App\models\OpOnActivity::whereUId($uId)->count() >= $badge->floor);
    }

    $act = Activity::whereId($badge->activityId);
    if($act == null)
        return false;

    if($badge->kindPlaceId == -1) {
        if($act->controllerNeed)
            $condition = ['visitorId' => $uId, 'activityId' => $badge->activityId, 'confirm' => 1];
        else
            $condition = ['visitorId' => $uId, 'activityId' => $badge->activityId];
    }
    else {
        if($act->controllerNeed)
            $condition = ['visitorId' => $uId, 'activityId' => $badge->activityId,
                'kindPlaceId' => $badge->kindPlaceId, 'confirm' => 1];
        else
            $condition = ['visitorId' => $uId, 'activityId' => $badge->activityId, 'kindPlaceId' => $badge->kindPlaceId];
    }

    return (LogModel::where($condition)->count() >= $badge->floor);
}

function makeValidInput($input) {
    $input = addslashes($input);
    $input = trim($input);
//    if(get_magic_quotes_gpc())
//        $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function createCode() {

    $str = "";

    while (true) {
        for ($i = 0; $i < 6; $i++) {
            $str .= rand(0, 9);
        }
        if(ActivationCode::whereCode($str)->count() == 0)
            return $str;
    }

}

function sendMail($text, $recipient, $subject) {
    require_once __DIR__ . '/../../../vendor/autoload.php';
    
    $mail = new PHPMailer(true);                           // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->CharSet = "UTF-8";
        //Recipients
        $mail->setFrom('info@shazdemosafer.com', 'Mailer');
//    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress($recipient);               // Name is optional
//        $mail->addReplyTo('ghane@shazdemosafer.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

        //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $text;
        $mail->AltBody = $text;

        $mail->send();
        return true;
    } catch (Exception $e) {
//        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
    }
}

function getUserPoints($uId) {

    $points = DB::select("SELECT SUM(activity.rate) as total FROM log, activity WHERE confirm = 1 and log.visitorId = " . $uId . " and log.activityId = activity.id");

    if($points == null || count($points) == 0 || $points[0]->total == "")
        return 0;

    return $points[0]->total;
}

function nearestLevel($uId) {

    $points = getUserPoints($uId);
    $currLevel = Level::where('floor', '<=', $points)->orderBy('floor', 'DESC')->first();

    if($currLevel == null)
        $currLevel = Level::orderBy('floor', 'ASC')->first();

    $nextLevel = Level::where('floor', '>', $points)->orderBy('floor', 'ASC')->first();

    if($nextLevel == null)
        $nextLevel = Level::orderBy('floor', 'ASC')->first();

    return [$currLevel, $nextLevel];
}

function getActivitiesCount($uId, $activityId, $kindPlaceId) {

    if($kindPlaceId != -1) {
        $conditions = ["visitorId" => $uId, 'activityId' => $activityId, 'confirm' => 1,
            'kindPlaceId' => $kindPlaceId];
    }
    else {
        $conditions = ["visitorId" => $uId, 'activityId' => $activityId, 'confirm' => 1];
    }

    return LogModel::where($conditions)->count();

}

function getMedals($uId) {

    $medals = Medal::all();

    $counter = 0;

    foreach ($medals as $medal) {

        if(getActivitiesCount($uId, $medal->activityId, $medal->kindPlaceId) >= $medal->floor)
            $counter++;
    }

    return $counter;
}

function sortByNeeded($a, $b) {
    return $a['needed'] - $b['needed'];
}

function getNearestMedals($uId) {

    $activities = Activity::all();

    $arr = array();
    $counter = 0;

    foreach ($activities as $activity) {
        $count = LogModel::whereVisitorId($uId)->whereActivityId($activity->id)->count();
        $medals = Medal::whereActivityId($activity->id)->get();

        foreach ($medals as $medal) {
            if($medal->floor > $count) {
                $alaki = Place::whereId($medal->kindPlaceId);
                if($alaki == null)
                    $arr[$counter++] = ["medal" => $medal, "needed" => $medal->floor - $count, "kindPlaceId" => -1];
                else
                    $arr[$counter++] = ["medal" => $medal, "needed" => $medal->floor - $count, "kindPlaceId" => $alaki->name];
            }
        }
    }

    usort($arr, 'sortByNeeded');

    $limit = (count($arr) >= 3) ? 3 : count($arr);

    array_splice($arr, $limit);
    $counter = 0;

    while ($counter < $limit) {
        $arr[$counter]["medal"]->activityId = Activity::whereId($arr[$counter]["medal"]->activityId)->name;
        $counter++;
    }

    return $arr;
}

function getRate($placeId, $kindPlaceId) {

    try {
        $kindPlace = Place::find($kindPlaceId);
        $place = \DB::table($kindPlace->tableName)->find($placeId);

        $city = Cities::find($place->cityId);
        $state = State::find($city->stateId);

        $section = \DB::select('SELECT questionId FROM questionSections WHERE (kindPlaceId = 0 OR kindPlaceId = ' . $kindPlaceId . ' ) AND (stateId = 0 OR stateId = ' . $state->id . ') AND (cityId = 0 OR cityId = ' . $city->id . ') GROUP BY questionId');

        $questionId = array();
        foreach ($section as $item)
            array_push($questionId, $item->questionId);

        if($questionId != null && count($questionId) != 0)
            $questions = \DB::select('SELECT * FROM questions WHERE id IN (' . implode(",", $questionId) . ') AND ansType = "rate"');
        else
            $questions = array();

        $questionId = array();
        foreach ($questions as $item)
            array_push($questionId, $item->id);

        $avgRate = 0;


        if($questionId != null && count($questionId) != 0)
            $rates = DB::select('select avg(ans) as avgRate from log, questionUserAns As qua WHERE log.id = qua.logId and log.placeId = ' . $placeId . " and  log.confirm = 1 and log.kindPlaceId = " . $kindPlaceId . " and  qua.questionId IN (" . implode(',', $questionId) . ") group by(log.visitorId)");
        else
            $rates = array();


        $separatedRates = [0, 0, 0, 0, 0];
        foreach ($rates as $rate) {
            $avgRate += $rate->avgRate;

            if($rate->avgRate > 4)
                $separatedRates[4] = $separatedRates[4] + 1;
            elseif($rate->avgRate > 3)
                $separatedRates[3] = $separatedRates[3] + 1;
            elseif($rate->avgRate > 2)
                $separatedRates[2] = $separatedRates[2] + 1;
            elseif($rate->avgRate > 1)
                $separatedRates[1] = $separatedRates[1] + 1;
            else
                $separatedRates[0] = $separatedRates[0] + 1;
        }

        if(count($rates) != 0)
            $avgRate /= count($rates);

        if($avgRate == 0)
            $avgRate = 2;

        elseif($avgRate > 4)
            $avgRate = 5;
        elseif($avgRate > 3)
            $avgRate = 4;
        elseif($avgRate > 2)
            $avgRate = 3;
        elseif($avgRate > 1)
            $avgRate = 2;
        else
            $avgRate = 1;

        return [$separatedRates, $avgRate];
    }
    catch (\Exception $exception){
        return [[0, 0, 0, 0, 0], 0];
    }
}

function uploadCheck($target_file, $name, $section, $limitSize, $ext) {
    $err = "";
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $check = getimagesize($_FILES[$name]["tmp_name"]);
    $uploadOk = 1;

    if($check === false) {
        $err .= "فایل ارسالی در قسمت " . $section . " معتبر نمی باشد" .  "<br />";
        $uploadOk = 0;
    }


    if ($uploadOk == 1 && $_FILES[$name]["size"] > $limitSize) {
        $limitSize /= 1000000;
        $limitSize .= "MB";
        $err .=  "حداکثر حجم مجاز برای بارگذاری تصویر " .  " <span>" . $limitSize . " </span>" . "می باشد" . "<br />";
    }

    $imageFileType = strtolower($imageFileType);

    if($ext != -1 && $imageFileType != $ext)
        $err .= "شما تنها فایل های $ext. را می توانید در این قسمت آپلود نمایید" . "<br />";
    return $err;
}

function upload($target_file, $name, $section) {

    try {
        move_uploaded_file($_FILES[$name]["tmp_name"], $target_file);
    }
    catch (Exception $x) {
        return "اشکالی در آپلود تصویر در قسمت " . $section . " به وجود آمده است" . "<br />";
    }
    return "";
}

function uploadCheckArray($target_file, $name, $section, $limitSize, $ext, $index) {
    $err = "";
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $check = getimagesize($_FILES[$name]["tmp_name"][$index]);
    $uploadOk = 1;

    if($check === false) {
        $err .= "فایل ارسالی در قسمت " . $section . " معتبر نمی باشد" .  "<br />";
        $uploadOk = 0;
    }


    if ($uploadOk == 1 && $_FILES[$name]["size"][$index] > $limitSize) {
        $limitSize /= 1000000;
        $limitSize .= "MB";
        $err .=  "حداکثر حجم مجاز برای بارگذاری تصویر " .  " <span>" . $limitSize . " </span>" . "می باشد" . "<br />";
    }

    $imageFileType = strtolower($imageFileType);

    if($ext != -1 && $imageFileType != $ext)
        $err .= "شما تنها فایل های $ext. را می توانید در این قسمت آپلود نمایید" . "<br />";
    return $err;
}
function uploadArray($target_file, $name, $section, $index) {

    try {
        move_uploaded_file($_FILES[$name]["tmp_name"][$index], $target_file);
    }
    catch (Exception $x) {
        return "اشکالی در آپلود تصویر در قسمت " . $section . " به وجود آمده است" . "<br />";
    }
    return "";
}

function sendSMS($destNum, $text, $template, $token2 = "") {

    require_once __DIR__ . '/../../../vendor/autoload.php';

    try{
        $api = new \Kavenegar\KavenegarApi("4836666C696247676762504666386A336846366163773D3D");
        $result = $api->VerifyLookup($destNum, $text, $token2, '', $template);
        if($result){
            foreach($result as $r){
                return $r->messageid;
            }
        }
    }
    catch(\Kavenegar\Exceptions\ApiException $e){
        // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
        echo $e->errorMessage();
        return -1;
    }
    catch(\Kavenegar\Exceptions\HttpException $e){
        // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
        echo $e->errorMessage();
        return -1;
    }
}

//email
function welcomeEmail($username, $email){
    $header = 'به کوچیتا خوش آمدید';
    $userName = $username;
    $view = \View::make('emails.welcomeEmail', compact(['header', 'userName']));
    $html = $view->render();
    if(sendEmail($html, $header, $email))
        return true;
    else
        return false;
}

function forgetPassEmail($userName, $link, $email){
    $header = 'فراموشی رمز عبور';
    $view = \View::make('emails.forgetPass', compact(['header', 'userName', 'link']));
    $html = $view->render();
    if(sendEmail($html, $header, $email))
        return true;
    else
        return false;
}

function sendEmail($text, $subject, $to){
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;
        $mail->CharSet = "UTF-8";
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $text;
        $mail->AltBody = $text;
        $mail->setFrom('support@koochita.com', 'Koochita');
        $mail->addAddress($to);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => true,
                'verify_peer_name' => true,
                'allow_self_signed' => true
            )
        );
//        $mail->addReplyTo('ghane@shazdemosafer.com', 'Information');
//        $mail->addCC('cc@example.com');
//        $mail->addBCC('bcc@example.com');
        $mail->send();
        return true;

//        $mail->isSMTP();                                      // Set mailer to use SMTP
//        $mail->SMTPAuth = true;             // Enable SMTP authentication
//        $mail->CharSet = 'UTF-8';
//        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
//        $mail->Host = '127.0.0.1';  // Specify main and backup SMTP servers
//        $mail->Username = 'info';                 // SMTP username
//        $mail->Password = 'adeli1982';                           // SMTP password
//        $mail->SMTPOptions = array(
//            'ssl' => array(
//                'verify_peer' => false,
//                'verify_peer_name' => false,
//                'allow_self_signed' => true
//            )
//        );
//        $mail->setFrom( 'info@koochita.com', 'koochita');
//        $mail->addAddress($to);
//        $mail->isHTML(true);                                  // Set email format to HTML
//        $mail->Subject = $subject;
//        $mail->Body = $text;
//        $mail->send();
    }
    catch (Exception $e) {
        return false;
    }
}


function convertNumber($kind , $number){

    $en = array("0","1","2","3","4","5","6","7","8","9");
    $fa = array("۰","۱","۲","۳","۴","۵","۶","۷","۸","۹");

    if($kind == 'en')
        $number = str_replace($fa, $en, $number);
    else
        $number = str_replace($en, $fa, $number);

    return $number;
}

function compressImage($source, $destination, $quality){
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    try{
        return imagejpeg($image, $destination, $quality);
    }
    catch (Exception $x) {
        return false;
    }
}

function getAllPlacePicsByKind($kindPlaceId, $placeId){

    $sitePics = array();
    $userVideo = [];

    if(auth()->check())
        $user = auth()->user();

    $kindPlace = Place::find($kindPlaceId);
    $MainFile = $kindPlace->fileName;
    $place = DB::table($kindPlace->tableName)->find($placeId);

    $place->pics = PlacePic::where('kindPlaceId', $kindPlaceId)->where('placeId', $place->id)->get();

    $userPhotos = DB::select('SELECT pic.* , users.username, users.id as userId FROM reviewPics AS pic, log, users WHERE pic.isVideo = 0 AND pic.logId = log.id AND log.kindPlaceId = ' . $kindPlaceId . ' AND log.placeId = ' . $placeId . ' AND log.confirm = 1 AND log.visitorId = users.id');
    foreach ($userPhotos as $item){
        $item->pic = URL::asset('userPhoto/' . $MainFile . '/' . $place->file . '/' . $item->pic);
        $item->userPic = getUserPic($item->userId);
        $item->time = getDifferenceTimeString($item->created_at);
        $item->id = 'review_' . $item->id;
    }
    $userPhotosJSON = json_encode($userPhotos);

    $userVideo = DB::select('SELECT pic.*, users.username, users.id as userId FROM reviewPics AS pic, log, users WHERE pic.isVideo = 1 AND pic.logId = log.id AND log.kindPlaceId = ' . $kindPlaceId . ' AND log.placeId = ' . $placeId . ' AND log.confirm = 1 AND log.visitorId = users.id');
    foreach ($userVideo as $item){
        $videoArray = explode('.', $item->pic);
        $videoPicName = '';
        for($k = 0; $k < count($videoArray)-1; $k++)
            $videoPicName .= $videoArray[$k] . '.';
        $videoPicName .= 'png';

        $item->picName = URL::asset('userPhoto/' . $MainFile . '/' . $place->file . '/' . $videoPicName);
        $item->videoUrl = URL::asset('userPhoto/' . $MainFile . '/' . $place->file . '/' . $item->pic);

        $item->video = URL::asset('userPhoto/' . $MainFile . '/' . $place->file . '/' . $item->pic);
        $item->userPic = getUserPic($item->userId);

        $item->time = getDifferenceTimeString($item->created_at);
        $item->id = 'review_' . $item->id;
    }
    $userVideoJSON = json_encode($userVideo);

    $koochitaPic = URL::asset('images/icons/mainIcon.svg');
    if(is_file(__DIR__ .'/../../../../assets/_images/' . $MainFile . '/' . $place->file . '/f-' . $place->picNumber)) {
        $s = ['id' => 0,
            's' => URL::asset('_images/' . $MainFile . '/' . $place->file . '/s-' . $place->picNumber),
            'f' => URL::asset('_images/' . $MainFile . '/' . $place->file . '/f-' . $place->picNumber),
            'l' => URL::asset('_images/' . $MainFile . '/' . $place->file . '/l-' . $place->picNumber),
            't' => URL::asset('_images/' . $MainFile . '/' . $place->file . '/t-' . $place->picNumber),
            'mainPic' => URL::asset('_images/' . $MainFile . '/' . $place->file . '/' . $place->picNumber),
            'alt' => $place->alt,
            'name' => 'کوچیتا',
            'userPic' => $koochitaPic,
            'showInfo' => false,
            'like' => 0,
            'dislike' => 0,
            'description' => '',
            'fromUpload' => ''];

        array_push($sitePics, $s);
    }
    foreach ($place->pics as $item){
        if(is_file(__DIR__ .'/../../../../assets/_images/' . $MainFile . '/' . $place->file . '/f-' . $item->picNumber)) {
            $s = ['id' => $place->id,
                's' => URL::asset('_images/' . $MainFile . '/' . $place->file . '/s-' . $item->picNumber),
                'f' => URL::asset('_images/' . $MainFile . '/' . $place->file . '/f-' . $item->picNumber),
                'l' => URL::asset('_images/' . $MainFile . '/' . $place->file . '/l-' . $item->picNumber),
                't' => URL::asset('_images/' . $MainFile . '/' . $place->file . '/t-' . $item->picNumber),
                'mainPic' => URL::asset('_images/' . $MainFile . '/' . $place->file . '/s-' . $item->picNumber),
                'alt' => $place->alt,
                'name' => 'کوچیتا',
                'userPic' => $koochitaPic,
                'showInfo' => false,
                'like' => 0,
                'dislike' => 0,
                'description' => '',
                'fromUpload' => ''];
            array_push($sitePics, $s);
        }
    }
    $sitePicsJSON = json_encode($sitePics);

    if(\auth()->check())
        $photographerPic = DB::select('SELECT photo.* FROM photographersPics AS photo WHERE photo.kindPlaceId = ' . $kindPlaceId . ' AND photo.placeId  = ' . $placeId . ' AND ((photo.userId = ' . $user->id . ') OR ( photo.status = 1)) ORDER BY created_at');
    else
        $photographerPic = DB::select('SELECT * FROM photographersPics WHERE kindPlaceId = ' . $kindPlaceId . ' AND placeId  = ' . $placeId . ' AND status = 1 ORDER BY created_at');

    if($photographerPic != null) {
        $pid = [];
        foreach ($photographerPic as $item)
            array_push($pid, $item->id);
        if(auth()->check())
            $pidLike = DB::select('SELECT * FROM photographersLogs WHERE picId IN (' . implode(",", $pid) . ') AND userId = ' . $user->id);
        else
            $pidLike = null;
        
        foreach ($photographerPic as $item) {
            if($pidLike != null) {
                foreach ($pidLike as $item2) {
                    if($item2->picId == $item->id){
                        $item->userLike = $item2->like;
                        break;
                    }
                }
                if(!isset($item->userLike))
                    $item->userLike = 0;
            }
            else
                $item->userLike = 0;
        }
    }

    $photographerPics = array();
    if(count($photographerPic) < 5)
        $photographerPics = $sitePics;

    foreach ($photographerPic as $item){
        $user = User::find($item->userId);
        $userName = $user->username;

        if($user != null) {
            $s = [
                'id' => 'photographer_'.$item->id,
                's' => URL::asset('userPhoto/' . $MainFile . '/' . $place->file . '/s-' . $item->pic),
                'f' => URL::asset('userPhoto/' . $MainFile . '/' . $place->file . '/f-' . $item->pic),
                'l' => URL::asset('userPhoto/' . $MainFile . '/' . $place->file . '/l-' . $item->pic),
                't' => URL::asset('userPhoto/' . $MainFile . '/' . $place->file . '/t-' . $item->pic),
                'mainPic' => URL::asset('userPhoto/' . $MainFile . '/' . $place->file . '/' . $item->pic),
                'alt' => $item->alt,
                'name' => $userName,
                'picName' => $item->name,
                'userPic' =>  getUserPic($user->id),
                'showInfo' => true,
                'like' => $item->like,
                'dislike' => $item->dislike,
                'description' => $item->description,
                'fromUpload' => getDifferenceTimeString($item->created_at),
                'userLike' => $item->userLike
            ];

            array_unshift($photographerPics, $s);
        }
    }
    $photographerPicsJSON = json_encode($photographerPics);

    return [$sitePics, $sitePicsJSON, $photographerPics, $photographerPicsJSON, $userPhotos, $userPhotosJSON, $userVideo, $userVideoJSON];
}

function reviewTrueType($_log){
    $user = User::select(['first_name', 'last_name', 'username', 'picture', 'uploadPhoto', 'id'])->find($_log->visitorId);
    $kindPlace = Place::find($_log->kindPlaceId);
    $place = DB::table($kindPlace->tableName)->select(['id', 'name', 'cityId', 'file'])->find($_log->placeId);

    $_log->userName = $user->username;
    $_log->userPageUrl = route('profile', ['username' => $user->username]);
    $_log->userPic = getUserPic($user->id);
    $_log->like = LogFeedBack::where('logId', $_log->id)->where('like', 1)->count();
    $_log->disLike = LogFeedBack::where('logId', $_log->id)->where('like', -1)->count();

    $_log->mainFile = $kindPlace->fileName;
    $_log->placeName = $place->name;
    $_log->kindPlace = $kindPlace->name;
    $_log->placeUrl = createUrl($kindPlace->id, $place->id, 0, 0);
    $_log->pics = ReviewPic::where('logId', $_log->id)->get();
    $_log = getReviewPicsURL($_log, $place->file);
    if(count($_log->pics) > 0){
        $_log->hasPic = true;
        $_log->mainPic = $_log->pics[0]->picUrl;
        if(count($_log->pics) > 1){
            $_log->morePic = true;
            $_log->picCount = count($_log->pics) - 1;
        }
        else
            $_log->morePic = false;
    }
    else {
        $_log->hasPic = false;
        $_log->picCount = 0;
    }

    $getAnses = getAnsToComments($_log->id);
    $_log->answersCount = $getAnses[1];
    if(count($getAnses[0]) > 0)
        $_log->answers = $getAnses[0];
    else
        $_log->answers = array();

    $_log->city = Cities::find($place->cityId);
    $_log->state = State::find($_log->city->stateId);
    $_log->placeCity = $_log->city->name;
    $_log->placeState = $_log->state->name;
    $_log->where = $place->name . ' شهر ' .  $_log->city->name . ' ، استان ' . $_log->state->name;

    $time = $_log->date . '';
    if(strlen($_log->time) == 1)
        $_log->time = '000' . $_log->time;
    else if(strlen($_log->time) == 2)
        $_log->time = '00' . $_log->time;
    else if(strlen($_log->time) == 3)
        $_log->time = '0' . $_log->time;

    if(strlen($_log->time) == 4) {
        $time .= ' ' . substr($_log->time, 0, 2) . ':' . substr($_log->time, 2, 2);
        $_log->timeAgo = getDifferenceTimeString($time);
    }
    else
        $_log->timeAgo = '';

    if(strlen($_log->text) > 180) {
        $_log->summery = mb_substr($_log->text, 0, 180, 'utf-8');
        $_log->hasSummery = true;
    }
    else
        $_log->hasSummery = false;

    $_log->assigned = ReviewUserAssigned::where('logId', $_log->id)->get();
    if (count($_log->assigned) != 0) {
        foreach ($_log->assigned as $item) {
            if ($item->userId != null) {
                $u = User::find($item->userId);
                if ($u != null)
                    $item->name = $u->username;
            }
        }
    }

    $_log->questionAns = \DB::select('SELECT us.logId, us.questionId, us.ans, qus.id, qus.description, qus.ansType FROM questionUserAns AS us , questions AS qus WHERE us.logId = ' . $_log->id . ' AND qus.id = us.questionId ORDER BY qus.ansType');
    if (count($_log->questionAns) != 0) {
        foreach ($_log->questionAns as $item) {
            if ($item->ansType == 'multi') {
                $anss = QuestionAns::where('questionId', $item->id)->where('id', $item->ans)->first();
                $item->ans = $anss->ans;
                $item->ansId = $anss->id;
            }
        }
    }

    $_log->yourReview = false;
    if (\auth()->check()) {
        $u = \auth()->user();
        $_log->userLike = LogFeedBack::where('logId', $_log->id)->where('userId', $u->id)->first();
        if($_log->visitorId == $u->id)
            $_log->yourReview = true;
    }
    else
        $_log->userLike = null;
    return $_log;
}

function questionTrueType($_ques){
    $user = User::whereId($_ques->visitorId);
    $_ques->userName = $user->username;
    $_ques->userPic = getUserPic($user->id);

    $anss = getAnsToComments($_ques->id);

    $_ques->answers = $anss[0];
    $_ques->answersCount = $anss[1];

    $kindPlace = Place::find($_ques->kindPlaceId);
    $_ques->mainFile = $kindPlace->fileName;
    $_ques->place = DB::table($kindPlace->tableName)->select(['id', 'name', 'cityId', 'file'])->find($_ques->placeId);
    $_ques->placeName = $_ques->place->name;
    $_ques->kindPlace = $kindPlace->name;
    $_ques->placeUrl = createUrl($kindPlace->id, $_ques->place->id, 0, 0, 0);

    $_ques->city = Cities::find($_ques->place->cityId);
    $_ques->cityName = $_ques->city->name;
    $_ques->state = State::find($_ques->city->stateId);
    $_ques->stateName = $_ques->state->name;

    $time = $_ques->date . '';
    if(strlen($_ques->time) == 1)
        $_ques->time = '000' . $_ques->time;
    else if(strlen($_ques->time) == 2)
        $_ques->time = '00' . $_ques->time;
    else if(strlen($_ques->time) == 3)
        $_ques->time = '0' . $_ques->time;

    if(strlen($_ques->time) == 4) {
        $time .= ' ' . substr($_ques->time, 0, 2) . ':' . substr($_ques->time, 2, 2);
        $_ques->timeAgo = getDifferenceTimeString($time);
    }
    else
        $_ques->timeAgo = '';

    $_ques->date = convertDate($_ques->date);

    $_ques->yourReview = false;
    if(\auth()->check() && $_ques->visitorId == \auth()->user()->id)
        $_ques->yourReview = true;

    return $_ques;
}

function deleteReviewPic(){
    $pics = ReviewPic::where('logId', null)->get();
    foreach ($pics as $item){
        $diffTimeDay = Carbon::now()->diffInHours($item->created_at);
        if($diffTimeDay > 24){
            $location = __DIR__ . '/../../../../assets/limbo/' . $item->pic;
            if(file_exists($location))
                unlink($location);
            $item->delete();
        }
    }

}

function getDifferenceTimeString($time){
    $time = Carbon::make($time);

    $diffTimeInMin = Carbon::now()->diffInMinutes($time);

    if($diffTimeInMin <= 15)
        $diffTime = 'هم اکنون';
    else if($diffTimeInMin <= 60)
        $diffTime = 'دقایقی پیش';
    else{
        $diffTimeHour = Carbon::now()->diffInHours($time);
        if($diffTimeHour <= 24)
            $diffTime = $diffTimeHour . ' ساعت پیش ';
        else{
            $diffTimeDay = Carbon::now()->diffInDays($time);
            if($diffTimeDay < 30)
                $diffTime = $diffTimeDay . ' روز پیش ';
            else{
                $diffTimeMonth = Carbon::now()->diffInMonths($time);
                if($diffTimeMonth < 12)
                    $diffTime = $diffTimeMonth . ' ماه پیش ';
                else{
                    $diffYear = (int)($diffTimeMonth / 12);
                    $diffMonth = $diffTimeMonth % 12;
                    $diffTime = $diffYear . ' سال  و ' . $diffMonth . ' ماه پیش ';
                }
            }
        }
    }

    return $diffTime;

}

function getAnsToComments($logId){
    $uId = 0;
    if(auth()->check())
        $uId = auth()->user()->id;

    $a = Activity::where('name', 'پاسخ')->first();

    $ansToReview = DB::select('SELECT log.visitorId, log.text, log.subject, log.id, log.confirm, log.date, log.time FROM log WHERE (log.confirm = 1 || log.visitorId = ' . $uId . ') AND log.relatedTo = ' . $logId . ' AND log.activityId = ' . $a->id . ' ORDER BY `date` DESC, `time` DESC; ');

    $countAns = 0;
    if(count($ansToReview) > 0) {
        $logIds = array();
        $ansToReviewUserId = array();
        $countAns += count($ansToReview);
        for ($i = 0; $i < count($ansToReview); $i++) {
            array_push($logIds, $ansToReview[$i]->id);
            array_push($ansToReviewUserId, $ansToReview[$i]->visitorId);

            $ansToReview[$i]->answers = array();

            if($ansToReview[$i]->subject == 'ans') {
                $anss = getAnsToComments($ansToReview[$i]->id);
                $ansToReview[$i]->answers = $anss[0];
                $ansToReview[$i]->answersCount = $anss[1];
                $countAns += $ansToReview[$i]->answersCount;
            }
            else
                $ansToReview[$i]->answersCount = 0;
        }

        $likeLogIds = DB::select('SELECT COUNT(RFB.like) AS likeCount, RFB.logId FROM logFeedBack AS RFB WHERE RFB.logId IN (' . implode(",", $logIds) . ') AND RFB.like = 1 GROUP BY RFB.logId');
        $dislikeLogIds = DB::select('SELECT COUNT(RFB.like) AS dislikeCount, RFB.logId FROM logFeedBack AS RFB WHERE RFB.logId IN (' . implode(",", $logIds) . ') AND RFB.like = -1 GROUP BY RFB.logId');
        $ansToReviewUser = DB::select('SELECT * FROM users WHERE id IN (' . implode(",", $ansToReviewUserId) . ')');

        for ($i = 0; $i < count($ansToReview); $i++) {
            $l = false;
            $dl = false;

            for ($j = 0; $j < count($likeLogIds); $j++) {
                if ($ansToReview[$i]->id == $likeLogIds[$j]->logId) {
                    $ansToReview[$i]->like = $likeLogIds[$j]->likeCount;
                    $l = true;
                    break;
                }
            }
            if (!$l)
                $ansToReview[$i]->like = 0;

            for ($j = 0; $j < count($dislikeLogIds); $j++) {
                if ($ansToReview[$i]->id == $dislikeLogIds[$j]->logId) {
                    $ansToReview[$i]->disLike = $dislikeLogIds[$j]->dislikeCount;
                    $dl = true;
                    break;
                }
            }
            if (!$dl)
                $ansToReview[$i]->disLike = 0;

            for ($j = 0; $j < count($ansToReviewUser); $j++) {
                if ($ansToReview[$i]->visitorId == $ansToReviewUser[$j]->id) {
                    $ansToReview[$i]->userName = $ansToReviewUser[$j]->username;
                    $ansToReview[$i]->userPic = getUserPic($ansToReviewUser[$j]->id);
                    if(auth()->check())
                        $ansToReview[$i]->userLike = LogFeedBack::where('logId', $ansToReview[$i]->id)->where('userId', auth()->user()->id)->first();

                    $time = $ansToReview[$i]->date . '';
                    if(strlen($ansToReview[$i]->time) == 1)
                        $ansToReview[$i]->time = '000' . $ansToReview[$i]->time;
                    else if(strlen($ansToReview[$i]->time) == 2)
                        $ansToReview[$i]->time = '00' . $ansToReview[$i]->time;
                    else if(strlen($ansToReview[$i]->time) == 3)
                        $ansToReview[$i]->time = '0' . $ansToReview[$i]->time;

                    if(strlen($ansToReview[$i]->time) == 4) {
                        $time .= ' ' . substr($ansToReview[$i]->time, 0, 2) . ':' . substr($ansToReview[$i]->time, 2, 2);
                        $ansToReview[$i]->timeAgo = getDifferenceTimeString($time);
                    }
                    else
                        $ansToReview[$i]->timeAgo = '';

                    break;
                }
            }

        }
    }
    else
        $ansToReview = array();

    return [$ansToReview, $countAns];
}

function deleteAnses($logId){
    $activity = Activity::where('name', 'پاسخ')->first();
    $log = LogModel::where('activityId', $activity)->where('id', $logId)->first();
    if($log != null){
        LogFeedBack::where('logId', $logId)->delete();
        $related = LogModel::where('activityId', $activity)->where('relatedTo', $logId)->get();
        foreach ($related as $item)
            deleteAnses($item->id);
        $log->delete();
    }
    return true;
}

function commonInPlaceDetails($kindPlaceId, $placeId, $city, $state, $place){

    $section = \DB::select('SELECT questionId FROM questionSections WHERE (kindPlaceId = 0 OR kindPlaceId = ' . $kindPlaceId . ') AND (stateId = 0 OR stateId = ' . $state->id . ') AND (cityId = 0 OR cityId = ' . $city->id . ') GROUP BY questionId');

    $questionId = array();
    foreach ($section as $item)
        array_push($questionId, $item->questionId);

    if($questionId != null && count($questionId) != 0) {
        $questions = \DB::select('SELECT * FROM questions WHERE id IN (' . implode(",", $questionId) . ')');
        $questionsAns = \DB::select('SELECT * FROM questionAns WHERE questionId IN (' . implode(",", $questionId) . ')');
    }
    else{
        $questions = array();
        $questionsAns = array();
    }

    $multiQuestion = array();
    $textQuestion = array();
    $rateQuestion = array();

    foreach ($questions as $item) {
        if ($item->ansType == 'multi') {
            $item->ans = QuestionAns::where('questionId', $item->id)->get();
            array_push($multiQuestion, $item);
        }
        else if($item->ansType == 'text')
            array_push($textQuestion, $item);
        else if($item->ansType == 'rate')
            array_push($rateQuestion, $item);
    }

    $a2 = Activity::where('name', 'نظر')->first();
    $a3 = Activity::where('name', 'پاسخ')->first();

    $condition = ['activityId' => $a2->id, 'placeId' => $placeId, 'kindPlaceId' => $kindPlaceId, 'confirm' => 1, 'relatedTo' => 0];
    $reviews = LogModel::where($condition)->whereRaw('CHARACTER_LENGTH(text) > 2')->get();
    $reviewCount = count($reviews);

    $ansReviewCount = 0;
    foreach ($reviews as $item)
        $ansReviewCount += getAnsToComments($item->id)[1];

    $userReviweCount = DB::select('SELECT visitorId FROM log WHERE placeId = ' . $placeId . ' AND kindPlaceId = '. $kindPlaceId . ' AND confirm = 1 AND activityId = ' . $a2->id . ' AND CHARACTER_LENGTH(text) > 2 GROUP BY visitorId');
    $userReviweCount = count($userReviweCount);

    return [$reviewCount, $ansReviewCount, $userReviweCount, $multiQuestion, $textQuestion, $rateQuestion];
}

function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function saveViewPerPage($kindPlaceId, $placeId){
    if(Auth::check())
        $userId = auth()->user()->id;
    else
        $userId = 0;

    $value = 'kindPlaceId:'.$kindPlaceId.'Id:'.$placeId;
    if(!(Cookie::has($value) == $value)) {

        try {
            $kindPlace = Place::find($kindPlaceId);
            if ($kindPlace != null)
                \DB::select('UPDATE `' . $kindPlace->tableName . '` SET `seen`= `seen`+1  WHERE `id` = ' . $placeId);
        }
        catch (\Exception $exception){}

        $activityId = Activity::whereName('مشاهده')->first()->id;
        $log = new LogModel();
        $log->time = getToday()["time"];
        $log->activityId = $activityId;
        $log->placeId = $placeId;
        $log->kindPlaceId = $kindPlaceId;
        $log->visitorId = $userId;
        $log->date = date('Y-m-d');
        $log->save();
        Cookie::queue(Cookie::make($value, $value, 5));
    }
}

function getReviewPicsURL($review, $placeFile){
    foreach ($review->pics as $item2) {
        if($item2->isVideo == 1){
            $videoArray = explode('.', $item2->pic);
            $videoName = '';
            for($k = 0; $k < count($videoArray)-1; $k++)
                $videoName .= $videoArray[$k] . '.';
            $videoName .= 'png';

            $item2->picUrl = URL::asset('userPhoto/' . $review->mainFile . '/' . $placeFile . '/' . $videoName);
            $item2->videoUrl = URL::asset('userPhoto/' . $review->mainFile . '/' . $placeFile . '/' . $item2->pic);
        }
        else
            $item2->picUrl = URL::asset('userPhoto/' . $review->mainFile . '/' . $placeFile . '/' . $item2->pic);

        $item2->picKind = 'review';
    }
    return $review;
}

function getUserPic($id = 0){

    $user = User::find($id);
    if($id == 0 || $user == null)
        $uPic = URL::asset('_images/nopic/blank.jpg');
    else{
        if(strpos($user->picture, 'http') !== false)
            return $user->picture;
        else{
            if($user->uploadPhoto == 0){
                $deffPic = DefaultPic::find($user->picture);

                if($deffPic != null)
                    $uPic = URL::asset('defaultPic/' . $deffPic->name);
                else
                    $uPic = URL::asset('_images/nopic/blank.jpg');
            }
            else
                $uPic = URL::asset('userProfile/' . $user->picture);
        }
    }

    return $uPic;
}

function getPlacePic($placeId = 0, $kindPlaceId = 0, $kind = 'f'){
    if($placeId != 0) {
        $kindPlace = Place::find($kindPlaceId);
        $place = DB::table($kindPlace->tableName)->where('id', $placeId)->select(['id', 'cityId','name', 'file', 'picNumber', 'keyword'])->first();
        if($place != null && $place->file != 'none' && $place->file != null){
            $location = __DIR__ . '/../../../../assets/_images/' . $kindPlace->fileName . '/' . $place->file . '/' . $kind . '-' . $place->picNumber;
            if (is_file($location))
                return URL::asset('_images/' . $kindPlace->fileName . '/' . $place->file . '/' . $kind . '-' . $place->picNumber);
        }
    }

    return URL::asset('images/mainPics/nopicv01.jpg');
}

function getStatePic($stateId = 0, $cityId = 0){
    $locationPic = __DIR__ . '/../../../../assets/_images/city';
    if($cityId != 0){
        $place = Cities::find($cityId);
        $pics = CityPic::where('cityId', $cityId)->get();
        if(count($pics) == 0)
            return URL::asset('_images/nopic/blank.jpg');
        else{
            $locationPic1 = $locationPic .'/' . $place->id . '/' . $place->image;
            if(is_file($locationPic1))
                return URL::asset('_images/city/' . $place->id  . '/' . $place->image);
            else
                return URL::asset('_images/city/' . $place->id  . '/' . $place->pic[0]->pic);
        }
    }
    else if($stateId != 0)
        return URL::asset('images/mainPics/nopicv01.jpg');
    else
        return URL::asset('images/mainPics/nopicv01.jpg');
}

function createUrl($kindPlaceId, $placeId, $stateId, $cityId, $articleId = 0){
    if($stateId != 0){
        $state = State::find($stateId);
        return url('cityPage/state/' . $state->name);
    }
    else if($cityId != 0){
        $city = Cities::find($cityId);
        return url('cityPage/city/' . $city->name);
    }
    else if($kindPlaceId != 0){
//        $kindPlace = Place::find($kindPlaceId);
//        $place = DB::table($kindPlace->tableName)->find($placeId);
        return route('placeDetails', ['kindPlaceId' => $kindPlaceId, 'placeId' => $placeId]);
    }
    else if($articleId != 0){
        $post = \App\models\Post::find($articleId);
        if($post != null)
            return url('article/'. $post->slug);
        else
            return false;
    }
}

function createPicUrl($articleId){

    if($articleId != 0){
        $post = \App\models\Post::find($articleId);
        if($post != null)
            return URL::asset('_images/posts/' . $post->id . '/' . $post->pic);
    }
}

function createSeeLog($placeId, $kindPlaceId, $subject, $text){

    $time = getToday()['time'];
    $today = Carbon::now()->format('Y-m-d');

    $userId = 0;
    if(auth()->check())
        $userId = auth()->user()->id;

    $log = new LogModel();
    $log->visitorId = $userId;
    $log->placeId = $placeId;
    $log->kindPlaceId = $kindPlaceId;
    $log->date = $today;
    $log->time = $time;
    $log->activityId = 1;
    $log->subject = $subject;
    $log->text = $text;
    $log->save();

    return [$time, $today, $log->id];
}

function storeNewTag($tag){
    $check = \App\models\Tag::where('name', $tag)->first();
    if($check == null){
        $newTag = new \App\models\Tag();
        $newTag->name = $tag;
        $newTag->save();

        return $newTag->id;
    }
    else
        return false;
}

function getCityPic($cityId){
    $resultPic = null;
    $city = Cities::find($cityId);
    if($cityId != null) {
        $loc = __DIR__ .'/../../../../assets/_images/city/' . $city->id;

        if($city->image == null){
            $pics = CityPic::where("cityId", $city->ic)->get();
            if(count($pics) != 0) {
                foreach ($pics as $pic) {
                    if(is_file($loc . '/' . $pic->pic)) {
                        $resultPic = \URL::asset('_images/city/' . $city->id . '/' . $pic->pic);
                        break;
                    }
                }
            }
            else{
                $seenActivity = Activity::whereName('مشاهده')->first();
                $ala = Amaken::where('cityId', $cityId)->pluck('id')->toArray();
                $mostSeen = [];
                if (count($ala) != 0)
                    $mostSeen = DB::select('SELECT placeId, COUNT(id) as seen FROM log WHERE activityId = ' . $seenActivity->id . ' AND kindPlaceId = 1 AND placeId IN (' . implode(",", $ala) . ') GROUP BY placeId ORDER BY seen DESC');

                if (count($mostSeen) != 0) {
                    foreach ($mostSeen as $item) {
                        $p = Amaken::find($item->placeId);
                        $location = __DIR__ . '/../../../../assets/_images/amaken/' . $p->file . '/s-' . $p->picNumber;
                        if (file_exists($location)) {
                            $resultPic = URL::asset('_images/amaken/' . $p->file . '/s-' . $p->picNumber);
                            break;
                        }
                    }
//                    if ($resultPic == null || $resultPic == '')
//                        $resultPic = URL::asset('_images/nopic/blank.jpg');
                }
//                else
//                    $resultPic = URL::asset('_images/nopic/blank.jpg');
            }
        }
        else
            $resultPic = \URL::asset('_images/city/' . $city->id . '/' . $city->image);

    }

    return $resultPic;
}

//    http://image.intervention.io/
function resizeImage($pic, $size, $fileName = ''){
    try {
        $image = $pic;
        if($fileName == '') {
            $randNum = random_int(100, 999);
            if($image->getClientOriginalExtension() == '')
                $fileName = time() . $randNum . '.jpg';
            else
                $fileName = time() . $randNum . '.' . $image->getClientOriginalExtension();
        }

        foreach ($size as $item){
            $input['imagename'] = $item['name'] .  $fileName ;
            $destinationPath = $item['destination'];
            $img = \Image::make($image->getRealPath());
            $width = $img->width();
            $height = $img->height();

            if($item['height'] != null && $item['width'] != null){
                $ration = $width/$height;
                $nWidth = $ration * $item['height'];
                $nHeight = $item['width'] / $ration;
                if($nWidth < $item['width']) {
                    $height = $nHeight;
                    $width = $item['width'];
                }
                else if($nHeight < $item['height']) {
                    $width = $nWidth;
                    $height = $item['height'];
                }
            }
            else {
                if ($item['width'] == null || $width > $item['width'])
                    $width = $item['width'];

                if ($item['height'] == null || $height > $item['height'])
                    $height = $item['height'];
            }

            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
        }

        return $fileName;
    }
    catch (Exception $exception){
        return 'error';
    }
}

function createSuggestionPack($_kindPlaceId, $_placeId){
    $activityId = Activity::whereName('نظر')->first()->id;

    $kindPlace = Place::find($_kindPlaceId);
    $place = DB::table($kindPlace->tableName)->select(['name', 'id', 'file', 'picNumber', 'alt', 'cityId'])->find($_placeId);
    if($place != null) {
        $city = Cities::whereId($place->cityId);

        $place->pic = getPlacePic($place->id, $kindPlace->id);
        $place->url = createUrl($kindPlace->id, $place->id, 0, 0);
        if($city != null) {
            $place->city = $city->name;
            $place->state = State::whereId($city->stateId)->name;
        }
        else{
            $place->city = '';
            $place->state = '';
        }
        $place->rate = getRate($place->id, $_kindPlaceId)[1];
        $condition = ['placeId' => $place->id, 'kindPlaceId' => $_kindPlaceId, 'activityId' => $activityId, 'confirm' => 1];
        $place->review = LogModel::where($condition)->count();
        return $place;
    }
    return null;
}


function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}


//time
function jalaliToGregorian($time){
    include_once 'jdate.php';

    $date = explode('/', $time);
    $date = jalali_to_gregorian($date[0], $date[1], $date[2]);

    return $date;
}

function gregorianToJalali($time, $splite = '-'){
    include_once 'jdate.php';

    $date = explode($splite, $time);
    $date = gregorian_to_jalali($date[0], $date[1], $date[2]);

    return $date;
}

function formatDate($date) {
    return $date[0] . $date[1] . $date[2] . $date[3] . '/'
        . $date[4] . $date[5] . '/' . $date[6] . $date[7];
}

function convertDate($created) {

    include_once 'jdate.php';

    if(count(explode(' ', $created)) == 2)
        $created = explode('-', explode(' ', $created)[0]);
    else
        $created = explode('-', $created);

    $created = gregorian_to_jalali($created[0], $created[1], $created[2]);
    return $created[0] . '/' . $created[1] . '/' . $created[2];
}

function getToday() {

    include_once 'jdate.php';

    $jalali_date = jdate("c");

    $date_time = explode('-', $jalali_date);

    $subStr = explode('/', $date_time[0]);

    $day = $subStr[0] . $subStr[1] . $subStr[2];

    $time = explode(':', $date_time[1]);

    $time = $time[0] . $time[1];

    return ["date" => $day, "time" => $time];
}

function getCurrentYear() {

    include_once 'jdate.php';

    $jalali_date = jdate("c");

    $date_time = explode('-', $jalali_date);

    $subStr = explode('/', $date_time[0]);

    return $subStr[0];
}

function convertDateToString($date) {
    $subStrD = explode('/', $date);
    if(count($subStrD) == 1)
        $subStrD = explode(',', $date);

    if(strlen($subStrD[1]) == 1)
        $subStrD[1] = "0" . $subStrD[1];

    if(strlen($subStrD[2]) == 1)
        $subStrD[2] = "0" . $subStrD[2];

    return $subStrD[0] . $subStrD[1] . $subStrD[2];
}

function convertTimeToString($time) {
    $subStrT = explode(':', $time);
    return $subStrT[0] . $subStrT[1];
}

function convertStringToTime($time) {
    return $time[0] . $time[1] . ":" . $time[2] . $time[3];
}

function convertStringToDate($date, $spliter = '/') {
    if($date == "")
        return $date;
    return $date[0] . $date[1] . $date[2] . $date[3] . $spliter . $date[4] . $date[5] . $spliter . $date[6] . $date[7];
}

function convertJalaliToText($date){
    $monthName = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
    $dayName = ['شنبه', 'یکشنبه', 'دوشنبه', 'سه‌شنبه', 'چهارشنبه', 'پنج‌شنبه', 'جمعه'];

    $date = convertStringToDate($date);
//    $date = convertDateToString($date);
    $year = $date[0].$date[1].$date[2].$date[3];
    $month = $date[5].$date[6];
    $day = $date[8].$date[9];

    $v = Verta();
    $date = $v->createJalali($year,$month,$day)->format('%A %d %B %Y');
    return $date;

}
