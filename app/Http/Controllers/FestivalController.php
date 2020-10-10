<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FestivalController extends Controller
{
    public function mainFestival()
    {
        return view('pages.festival.festivalIntroduction');
    }

    public function festivalSubmitPage()
    {
        $user = auth()->user();
//        if($user->sex != null){
//            if ($user->sex == 1)
//                $user->sex = 'آقا';
//            else
//                $user->sex = 'خانم';
//        }
        return view('pages.festival.festivalSubmitWorks', compact('user'));
    }
}
