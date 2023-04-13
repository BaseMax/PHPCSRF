<?php

namespace App\Controllers;

use App\Application\ViewRender;
use App\Application\CSRF;

class LoginController extends Controller
{
    public function show()
    {

        var_dump(CSRF::generate());

        return ViewRender::render("login");
    }
}
