<?php

namespace App\Application;

class Redirect
{
    public static function redirectBack(): never
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);

        exit();
    }

    public static function redirectTo(string $path): never
    {
        header("Location: /$path");

        exit();
    }
}
