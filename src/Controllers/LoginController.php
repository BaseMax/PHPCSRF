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
        $userData = $this->getBody();

        if (!CSRF::validate($userData["csrf_token"])) {
            $this->response()->setStatusCode(403);
            return ViewRender::render("_403");
        }
    }
}
