<?php

namespace App\Controllers;

use App\Application\ViewRender;

class RegisterController extends Controller
{
    public function show()
    {
        return ViewRender::render("register");
    }
}
