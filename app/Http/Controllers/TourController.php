<?php

namespace App\Http\Controllers;

use App\models\TourDifficult;
use App\models\TourFocus;
use App\models\TourKind;
use App\models\TourStyle;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function stageOneTour(Request $request)
    {
        if($request->method() == 'POST'){
            dd(json_decode($request->kind));
        }
        else{
            $tourDifficult = TourDifficult::all();
            $tourStyle = TourStyle::all();
            $tourFocus = TourFocus::all();
            $tourKind = TourKind::all();

            return view('tour.tourCreationGeneralInfo', compact(['tourDifficult', 'tourStyle', 'tourFocus', 'tourKind']));
        }
    }
}
