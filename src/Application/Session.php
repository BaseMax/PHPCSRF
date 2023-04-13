<?php

namespace App\Application;

class Session
{
    public static function setUser(array $user): void
    {
        $_SESSION["fullname"] = $user["fullname"];
        $_SESSION["email"] = $user["email"];
    }
}
