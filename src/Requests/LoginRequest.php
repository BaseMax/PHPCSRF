<?php

namespace App\Requests;

class LoginRequest implements Request
{
    public static function validate(array $userData): array
    {
        return [];
    }
}
