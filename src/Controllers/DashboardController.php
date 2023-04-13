<?php

namespace App\Controllers;

use App\Application\ViewRender;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return ViewRender::render("dashboard");
    }
}