<?php

namespace App\Controllers;

use App\Application\ViewRender;
use App\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function show()
    {
        return ViewRender::renderWithToken("login");
    }

    public function store()
    {
        $this->csrf();

        LoginRequest::validate($this->getBody());

        $user = new User();
    }
}
