<?php

namespace App\Controllers;

use App\Application\Application;

class Controller
{
    public function __construct()
    {
    }

    protected function getBody(): array
    {
        return Application::$app->request->getBody();
    }
}
