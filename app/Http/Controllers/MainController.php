<?php

namespace App\Http\Controllers;

use App\models\LogModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function landingPage()
    {
        createSeeLog(0, 0, 'landing', '');
        return view('landing.landingPage');
    }
}
