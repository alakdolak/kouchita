<?php

namespace App\Http\Controllers;

use App\models\LogModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        if(\Session::get('lang'))
            app()->setLocale(\Session::get('lang'));
    }
    public function landingPage()
    {
        createSeeLog(0, 0, 'landing', '');
        return view('landing.landingPage');
    }

    public function tranfa()
    {
        $location = __DIR__ .'/../../../resources/lang/en';
        $loc2 = __DIR__ .'/../../../resources/lang/fa';

        $files = scandir($location);
        foreach ($files as $item){
            if($item != '.' && $item != '..'){

                $nFile = fopen($loc2.'/'.$item, "w") or die("Unable to open file!");
                $text = '<?php ' ."\n";
                $text .= 'return [' ."\n";

                $te = include($location.'/'.$item);
                foreach ($te as $key => $it)
                    $text .= '"'.$key.'"' . ' => ' . '"'.$key.'"' . ',' ."\n";
                $text .= '];';

                fwrite($nFile, $text);
                fclose($nFile);

            }
        }
        dd('done');
    }
}
