<?php

namespace App\Application;

class Redirect
{
    public static function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
