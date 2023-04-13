<?php

namespace App\Controllers;

use App\Application\ViewRender;

class LoginController extends Controller
{
    public function show()
    {
        return ViewRender::render("login");
    }
}
