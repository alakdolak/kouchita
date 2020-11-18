<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetPagesController extends Controller
{
    public function getPages(){
        return view('general.nLoginPopUp');
    }
}
