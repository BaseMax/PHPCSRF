<?php

namespace App\Controllers;

use App\Application\Cookie;
use App\Application\ViewRender;
use App\Application\CSRF;

class LoginController extends Controller
{
    public function show()
    {
        return ViewRender::renderWithToken("login");
    }

    public function store()
    {
        $this->csrf();
    }
}
