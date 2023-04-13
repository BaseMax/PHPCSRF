<?php

namespace App\Controllers;

use App\Application\ViewRender;

class HomeController
{
    public function home()
    {
        return ViewRender::render("home");
    }
}
