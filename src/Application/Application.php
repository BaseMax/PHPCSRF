<?php

namespace App\Application;

class Application
{
    protected Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }
}
