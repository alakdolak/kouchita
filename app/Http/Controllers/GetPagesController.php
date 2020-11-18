<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetPagesController extends Controller
{
    public function getLoginPage(){
        return view('general.nLoginPopUp');
    }
}
