<?php

namespace App\Application;

class Hash
{
    public static function make(string $password, $type = PASSWORD_DEFAULT): string
    {
        return password_hash($password, $type);
    }
}
