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

    public static function destroyCookie(string $key): bool
    {
        setCookie($key, "", time() - 3600, "/");

        return true;
    }

    public static function setSession(string $key, string|int $value): bool
    {
        $_SESSION[$key] = $value;

        return true;
    }

    public static function setSessionCookie(string $key, string|int $value): bool
    {
        setCookie($key, $value, time() + (3600 * 24 * 10), "/", "", false, true);

        return true;
    }
}
