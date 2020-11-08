<?php

namespace App\Http\Controllers\Business;

use App\models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainBusinessController extends Controller
{
    public function showBusiness($id = 0)
    {
        $reviews = Restaurant::where('slug', 'رستوران_شیرین_نخل')->first()->getReviews();

        return view('pages.Business.showBusiness', compact(['reviews']));
    }
}
