<?php

namespace App\Controllers;

use App\Application\Cookie;
use App\Application\Redirect;

class LogoutController extends Controller
{
    public function logout()
    {
        session_unset();
        session_destroy();
        Cookie::destroyCookie("session_id");
        Redirect::redirectTo("login");
    }
}