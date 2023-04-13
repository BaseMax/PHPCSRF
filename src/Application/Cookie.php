<?php

namespace App\Application;

class Cookie
{
    public static function setCookie(string $csrfToken, int $time = 3600): int
    {
        $time = time() + $time;
        setcookie('csrf_token', $csrfToken, time() + $time, '/', '', false, true);

        return $time;
    }

    protected static function getCookie(): string| bool
    {
        return $_COOKIE["csrf_token"] ?? false;
    }

    public static function validate(string $csrf): bool
    {
        return !(Cookie::getCookie() !== $csrf);
    }
}
