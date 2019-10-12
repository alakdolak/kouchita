<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController2 extends Controller
{

    public function checkLogin() {

        if(Auth::check()) {
            return \redirect()->back();
        }
        else{
            if (isset($_POST["username"]) && isset($_POST["password"])) {

                $username = makeValidInput($_POST['username']);
                $password = makeValidInput($_POST['password']);

                $credentials  = ['username' => $username, 'password' => $password];

                if (Auth::attempt($credentials, true)) {

                    $user = Auth::user();
                    if ($user->status != 0) {
                        if(!Auth::check())
                            Auth::login($user);
                        return \redirect()->back();

                    } else {
                        return \redirect()->back();
                    }
                }
            }
        }
    }

}
