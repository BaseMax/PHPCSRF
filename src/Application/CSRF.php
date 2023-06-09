<?php

namespace App\Application;

class CSRF
{
    static public function generate(): string
    {
        return bin2hex(random_bytes(40));
    }

    static public function validate(string $csrf): bool
    {
        $sessionCsrf = $_SESSION["CSRF_TOKEN"] ?? false;

        if (!$sessionCsrf) return false;
        else if ($csrf !== $sessionCsrf) return false;
        else return true;
    }

    static public function storeSCRF(): string
    {
        $_SESSION["CSRF_TOKEN"] = CSRF::generate();

        return $_SESSION["CSRF_TOKEN"];
    }
}
