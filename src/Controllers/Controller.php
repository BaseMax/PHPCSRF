<?php

namespace App\Controllers;

use App\Application\Application;
use App\Application\Response;

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
}
