<?php

namespace App\Controllers;

use App\Application\Hash;
use App\Application\ViewRender;
use App\Models\User;
use App\Requests\RegisterRequest;
use App\Application\Redirect;

class RegisterController extends Controller
{
    /*
    *
    *
    */
    public function show()
    {
        return ViewRender::renderWithToken("register");
    }

    public function store()
    {
        $this->csrf();

        $validatedData = RegisterRequest::validate($this->getBody());

        $user = new User();

        $user->email = $validatedData["email"];
        $user->password = Hash::make($validatedData["password"]);
        $user->fullname = $validatedData["fullname"];

        if ($user->save()) {
            Redirect::redirectTo("login");
        }
    }
}