<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainBusinessController extends Controller
{
    public function showBusiness()
    {
        return view('pages.Business.showBusiness');
    }
}
