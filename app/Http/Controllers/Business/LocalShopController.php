<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalShopController extends Controller
{
    public function createLocalShopPage()
    {

        return view('pages.Business.createLocalShopPage');
    }

    public function storeLocalShop()
    {

    }

    public function storeLocalShopPics()
    {

    }
}
