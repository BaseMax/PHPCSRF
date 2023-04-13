<?php

namespace App\Requests;

class LoginRequest implements Request
{
    public static function validate(array $userData): array
    {
        return [];
    }

    public static function roles(): array
    {
        return [
            "email" => [self::RULE_EMAIL, self::RULE_REQUIRED],
            "password" => [self::RULE_REQUIRED]
        ];
    }
}
