<?php

namespace App\Application;

class ViewRender
{
    static public function renderWithToken(string $view)
    {
        ob_start();

        include_once Application::$ROOT_DIR . "/src/Views/$view.php";

        $viewContent = ob_get_clean();

        $csrf = CSRF::storeSCRF();

        return str_replace("{{csrf}}", $csrf, $viewContent);
    }

    static public function render(string $view)
    {
        include_once Application::$ROOT_DIR . "/src/Views/$view.php";
    }
}
