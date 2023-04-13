<?php

namespace App\Controllers;

use App\Application\ViewRender;

class RegisterController extends Controller
{
    public function show()
    {
        return ViewRender::renderWithToken("register");
    }

    public function store()
    {
        return "here is store in register";
    }
}
