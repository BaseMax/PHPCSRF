<?php

namespace App\Requests;

interface Request
{
    public const RULE_REQUIRED = "required";
    public const RULE_EMAIL = "email";
    public const RULE_MIN = "min";
    public const RULE_MAX = "max";

    public static function validate(array $userData): array;
    public static function roles(): array;
}
