<?php

namespace App\Requests;

class RegisterRequest implements Request
{
    public static function validate(array $userData): array
    {
        return [];
    }

    public static function roles(): array
    {
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED],
            "fullname" => [self::RULE_REQUIRED]
        ];
    }
}
