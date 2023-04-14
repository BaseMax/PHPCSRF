<?php

namespace App\Controllers;

use App\Application\Application;
use App\Application\Response;
use App\Application\ViewRender;
use App\Application\CSRF;
use App\Application\Cookie;

class Controller
{
    public function __construct()
    {
    }

    protected function getBody(): array
    {
        return Application::$app->request->getBody();
    }

    protected function app(): Application
    {
        return Application::$app;
    }

    protected function response(): Response
    {
        return $this->app()->response;
    }

    protected function csrf()
    {
        $userData = $this->getBody();
	

	# echo $userData["csrf_token"];

        if (!$userData["csrf_token"]) {
            $this->response()->setStatusCode(403);
            return ViewRender::render("_403");
        }

        if (Cookie::validate($userData["csrf_token"])) return true;

        if (CSRF::validate($userData["csrf_token"])) return true;

        $this->response()->setStatusCode(403);

        return ViewRender::render("_403");
    }
}
