<?php

namespace App\Requests;

interface Request
{
    public static function validate(array $userData): array;
}
