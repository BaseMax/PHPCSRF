<?php

namespace App\Requests;

interface Request
{
    public const RULE_MIN = "min";
    public const RULE_MAX = "max";
    public const RULE_EMAIL = "email";
    public const RULE_REQUIRED = "required";

    public static function roles(): array;
    public static function validate(array $userData): array;
}
