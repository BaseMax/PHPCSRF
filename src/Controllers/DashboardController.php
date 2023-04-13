<?php

namespace App\Controllers;

use App\Application\Redirect;
use App\Application\ViewRender;

class DashboardController extends Controller
{
    public function dashboard()
    {



        if (!isset($_SESSION['session_id'])) {
            Redirect::redirectTo("login");
        }

        return ViewRender::render("dashboard");
    }
}