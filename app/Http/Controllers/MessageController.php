<?php

namespace App\Http\Controllers;

use App\models\Activity;
use App\models\Block;
use App\models\LogModel;
use App\models\Message;
use App\models\Place;
use App\models\Report;
use App\models\ReportsType;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class MessageController extends Controller {

    public function showMessages($err = "", $currMsg = "", $subject = "") {

        $uId = Auth::user()->id;

        $condition1 = ['receiverId' => $uId, 'receiverShow' => 1];
        $condition2 = ['senderId' => $uId, 'senderShow' => 1];


        return view('message', array("err" => $err, "currMsg" => $currMsg,
            'subject' => $subject, 'inMsgCount' => Message::where($condition1)->count(),
            'outMsgCount' => Message::where($condition2)->count()));

    }

    public function getMessage() {

        $mId = makeValidInput($_POST["mId"]);

        $msg = Message::whereId($mId);

        if($msg->senderId == Auth::user()->id)
            $msg->seenSender = 1;
        else
            $msg->seenReceiver = 1;

        $msg->save();

        $msg->senderId = User::whereId($msg->senderId)->username;
        $msg->receiverId = User::whereId($msg->receiverId)->username;

        $msg->date = formatDate($msg->date);

        echo json_encode($msg);

    }

    public function opOnMsgs() {

        $uId = Auth::user()->id;

        if(isset($_POST["selectedMsgs"]))
            $this->deleteMsg($_POST["selectedMsgs"], $uId);

        echo "ok";
    }

    public function deleteMsg($msgs, $uId) {

        for($i = 0; $i < count($msgs); $i++) {

            $msgTmp = Message::whereId($msgs[$i]);

            if($msgTmp->senderId == $uId)
                $msgTmp->senderShow = 0;
            else if($msgTmp->receiverId == $uId)
                $msgTmp->receiverShow = 0;

            $msgTmp->save();

            if($msgTmp->senderShow == 0 && $msgTmp->receiverShow == 0)
                $msgTmp->delete();
        }
    }

    public function blockList() {

        $uId = Auth::user()->id;

        $senders = Message::where('receiverId', '=', $uId)->distinct()->select('senderId')->get();

        foreach ($senders as $sender) {

            $sender->senderName = User::whereId($sender->senderId)->username;

            $condition = ['srcId' => $uId, 'destId' => $sender->senderId];
            if(Block::where($condition)->count() > 0)
                $sender->block = 1;
            else
                $sender->block = 0;
        }

        echo json_encode($senders);

    }

    public function sendMsgAjax() {

        if(isset($_POST["destUser"]) && isset($_POST["msg"]) && isset($_POST["subject"])) {

            $uId = Auth::user()->id;

            $destUser = makeValidInput($_POST["destUser"]);
            $destUser = User::whereUserName($destUser)->first();

            if($destUser == null)
                return;

            if($destUser->id == $uId)
                return;

            $currMsg = makeValidInput($_POST["msg"]);
            $subject = makeValidInput($_POST["subject"]);

            $condition = ['srcId' => $destUser->id, 'destId' => $uId];
            if(Block::where($condition)->count() > 0) {
                echo "nok";
                return;
            }

            $msg = new Message();
            $msg->senderId = $uId;
            $msg->receiverId = $destUser->id;
            $msg->subject = $subject;
            $msg->message = $currMsg;
            $msg->date = getToday()["date"];

            $msg->save();

            echo "ok";
        }
    }

    public function sendMsg($srcName = "") {

        $uId = Auth::user()->id;

        $destUser = makeValidInput($_POST["destUser"]);

        $destUser = User::whereUserName($destUser)->first();
        $currMsg = makeValidInput($_POST["msg"]);
        $subject = makeValidInput($_POST["subject"]);

        if($destUser == null)
            return $this->showMessages("نام کاربری وارد شده نامعتبر است", $currMsg, $subject);

        if($destUser->id == $uId)
            return $this->showMessages("نمی توانید پیامی را به خودتان ارسال کنید", $currMsg, $subject);

        $condition = ['srcId' => $destUser->id, 'destId' => $uId];
        if(Block::where($condition)->count() > 0)
            return $this->showMessages("کاربر مقصد شما را بلاک کرده است", $currMsg, $subject);

        $msg = new Message();
        if(Auth::user()->level == 1 && !empty($srcName) && User::whereUserName(makeValidInput($srcName))->first() != null) {
            $msg->senderId = User::whereUserName(makeValidInput($srcName))->first()->id;
        }
        else
            $msg->senderId = $uId;
        $msg->receiverId = $destUser->id;
        $msg->subject = $subject;
        $msg->message = $currMsg;
        $msg->date = getToday()["date"];

        $msg->save();

        return Redirect::to("messages");
    }

    public function getListOfMsgs() {

        $uId = Auth::user()->id;

        $mode = makeValidInput($_POST["mode"]);
        $sortMode = makeValidInput($_POST["sortMode"]);

        if($mode == "true") {

            $condition = ['receiverId' => $uId, 'receiverShow' => 1];
            $inMsgs = Message::where($condition)->orderBy('date', $sortMode)->get();

            foreach ($inMsgs as $inMsg) {
                $inMsg->target = User::whereId($inMsg->senderId)->username;
                $inMsg->date = formatDate($inMsg->date);
            }
            echo json_encode($inMsgs);
        }
        else {

            $condition = ['senderId' => $uId, 'senderShow' => 1];
            $outMsgs = Message::where($condition)->orderBy('date', $sortMode)->get();

            foreach ($outMsgs as $outMsg) {
                $outMsg->target = User::whereId($outMsg->receiverId)->username;
                $outMsg->date = formatDate($outMsg->date);
            }
            echo json_encode($outMsgs);
        }

    }

    public function blockUser() {

        $uId = Auth::user()->id;

        Block::where('srcId', '=', $uId)->delete();

        if(!isset($_POST["blockList"])) {
            echo "ok";
            return;
        }

        $blocks = $_POST["blockList"];

        for($i = 0; $i < count($blocks); $i++) {

            $blocks[$i] = makeValidInput($blocks[$i]);
            $tmpUser = User::whereId($blocks[$i]);
            if ($tmpUser == null || count($tmpUser) == 0 || $tmpUser->level == 1) {
                echo "nok";
                return;
            }

        }

        for($i = 0; $i < count($blocks); $i++) {
            $condition = ["srcId" => $uId, "destId" => $blocks[$i]];
            if(Block::where($condition)->count() == 0) {
                $block = new Block();
                $block->srcId = $uId;
                $block->destId = $blocks[$i];
                $block->save();
            }
        }

        echo "ok";

    }
}