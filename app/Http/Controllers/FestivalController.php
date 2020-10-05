<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FestivalController extends Controller
{
    public function mainFestival()
    {
        return view('pages.festival.festivalIntroduction');
    }
}
