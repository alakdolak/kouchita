<?php

use App\models\ActivationCode;
use App\models\Activity;
use App\models\Level;
use App\models\LogModel;
use App\models\Medal;
use App\models\Place;
use App\models\User;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function getPostTranslated($key) {

    switch ($key) {
        case 1:
            return 'اماکن تاریخی';
        case 2:
            return 'اماکن مذهبی';
        case 3:
            return 'اماکن تفریحی';
        case 4:
            return 'طبیعت گردی';
        case 5:
            return 'مراکز خرید';
        case 6:
            return 'موزه ها';
        case 7:
            return 'هتل';
        case 8:
            return 'رستوران';
        case 9:
            return 'هواپیما';
        case 10:
            return 'اتوبوس';
        case 11:
            return 'سواری';
        case 12:
            return 'قطار';
        case 13:
            return 'سوغات محلی';
        case 14:
            return 'صنایع دستی';
        case 15:
            return 'اماکن تفریحی';
        case 16:
            return 'غذای محلی';
        case 17:
            return 'لباس محلی';
        case 18:
            return 'گویش محلی';
        case 19:
            return 'اصطلاحات محلی';
        case 20:
            return 'رسوم محلی';
        case 21:
            return 'جشنواره';
        case 22:
            return 'تور';
        case 23:
            return 'کنسرت';
    }
}

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

function jalaliToGregorian($time){
    include_once 'jdate.php';

    $date = explode('/', $time);
    $date = jalali_to_gregorian($date[0], $date[1], $date[2]);
    return $date;
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
    if(get_magic_quotes_gpc())
        $input = stripslashes($input);
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

    // some thing must be done

    $currLevel = Level::where('floor', '<=', $points)->orderBy('floor', 'DESC')->first();

//    if($currLevel == null || count($currLevel) == 0)
//        $currLevel = Level::orderBy('floor', 'ASC')->first();

    $nextLevel = Level::where('floor', '>', $points)->orderBy('floor', 'ASC')->first();

//    if($nextLevel == null || count($nextLevel) == 0)
//        $nextLevel = Level::orderBy('floor', 'ASC')->first();

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

    $avgRate = 0;
    $rates = DB::select('select avg(rate) as avgRate from log, userOpinions WHERE log.id = logId and placeId = ' . $placeId . " and kindPlaceId = " . $kindPlaceId . " and activityId = " . Activity::whereName('امتیاز')->first()->id . " group by(visitorId)");
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

function sendEmail($text, $subject, $to){
    $mail = new PHPMailer(true);// Passing `true` enables exceptions

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = env('mail_host_main', 'mail.koochita.com');  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;             // Enable SMTP authentication
        $mail->CharSet = 'UTF-8';
        $mail->Username = env('mail_username_main', 'info@koochita.com');                 // SMTP username
        $mail->Password = env('mail_password_main', 'pass123456');                           // SMTP password
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom( env('mail_username_main', 'info@koochita.com'), 'koochita');
        $mail->addAddress($to);

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $text;
        $mail->send();
    }
    catch (Exception $e) {
        echo 'nok';
        dd($e);
    }
}
