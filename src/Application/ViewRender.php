<?php

namespace App\Application;

class ViewRender
{
    static public function render(string $view)
    {
        include_once __DIR__ . "/../Views/$view.php";
    }
}
