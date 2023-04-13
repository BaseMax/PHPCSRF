<?php

namespace App\Requests;

use App\Application\Redirect;

class LoginRequest implements Request
{
    public static function validate(array $userData): array
    {
        $roles = self::roles();

        foreach ($roles as $attribute => $roles) {
            $value = $userData[$attribute];
            foreach ($roles as $role) {

                $roleName = $role;
                if (!is_string($role))
                    $roleName = $role[0];


                if ($roleName === self::RULE_REQUIRED && !$value)
                    return Redirect::redirectBack();


                if ($roleName === self::RULE_EMAIL && !self::isEmail($value))
                    return Redirect::redirectBack();
            }
        }
        return $userData;
    }

    public static function roles(): array
    {
        return [
            "email" => [self::RULE_EMAIL, self::RULE_REQUIRED],
            "password" => [self::RULE_REQUIRED]
        ];
    }

    public static function isEmail(string $email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
            return true;


        return false;
    }
}
