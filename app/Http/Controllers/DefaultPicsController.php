<?php

namespace App\Http\Controllers;

use App\models\DefaultPic;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class DefaultPicsController extends Controller {

    public function showPics() {

        $pics = DefaultPic::all();

        return view('defaultPics', array('pics' => $pics, 'mode2' => 'see'));
    }

    public function addPic() {

        $msg = "";

        if(isset($_POST["addPic"]) && isset($_FILES["pic"])) {

            $file = $_FILES["pic"];
            $targetFile = __DIR__ . "/../../../../assets/defaultPic/" . $file["name"];

            $err = "";

            if(!file_exists($targetFile)) {
                $err = uploadCheck($targetFile, "pic", "ایجاد تصویر جدید", 3000000, "png");
                if(empty($err)) {
                    $err = upload($targetFile, "pic", "ایجاد تصویر جدید");
                }
            }

            if(empty($err)) {

                $defaultPic = new DefaultPic();
                $defaultPic->name = $file["name"];

                try {
                    $defaultPic->save();
                    return Redirect::to('defaultPics');
                } catch (Exception $e) {
                    $msg = "تصویر مورد نظر در سامانه موجود است";
                }
            }

            else
                $msg = $err;
        }

        $pics = DefaultPic::all();

        return view('defaultPics', array('pics' => $pics, 'mode2' => 'add', 'msg' => $msg));
    }

    public function opOnPic() {

        if(isset($_POST["deletePic"])) {

            $picId = makeValidInput($_POST["deletePic"]);

            $picName = DefaultPic::whereId($picId)->name;

            if($picName != null && !empty($picName)) {
                $targetFile = __DIR__ . '/../../../public/defaultPic/' . $picName;
                if(file_exists($targetFile))
                    unlink($targetFile);
                DefaultPic::destroy($picId);
            }

            return Redirect::to('defaultPics');
        }

        return Redirect::to('defaultPics');

    }
    
}