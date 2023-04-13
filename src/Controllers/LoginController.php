<?php

namespace App\Controllers;

use App\Application\Cookie;
use App\Application\Redirect;
use App\Application\Session;
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

        $validatedData = LoginRequest::validate($this->getBody());

        $user = new User();

        $user = $user->login(
            $validatedData["email"],
            $validatedData["password"]
        );

        if (!$user) Redirect::redirectBack();

        Cookie::setSession("session_id", $user["id"]);

        if ($validatedData["remember"]) Cookie::setSessionCookie("session_id", $user["id"]);

        Session::setUser($user);

        Redirect::redirectTo("dashboard");
    }
}
