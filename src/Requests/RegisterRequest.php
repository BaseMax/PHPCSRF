<?php

namespace App\Requests;

class RegisterRequest implements Request
{
    public static function validate(array $userData): array
    {
        return [];
    }
}
