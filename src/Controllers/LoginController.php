<?php

namespace App\Controllers;

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
        return $this->getBody();
    }
}
