<?php

namespace App\Controllers;

use App\Application\ViewRender;
use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return ViewRender::renderWithToken("register");
    }

    public function store()
    {
        $this->csrf();

        $user = new User();
    }
}
