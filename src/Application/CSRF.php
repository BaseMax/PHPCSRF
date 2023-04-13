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

        if (!$sessionCsrf) {
            return false;
        }

        if ($csrf !== $sessionCsrf) {
            return false;
        }

        return true;
    }

    static public function storeSCRF(): bool
    {
        $_SESSION["CSRF_TOKEN"] = CSRF::generate();

        return true;
    }
}
