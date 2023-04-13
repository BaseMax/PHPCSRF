<?php

namespace App\Models;

class User extends Model
{
    public string $email;
    public string $password;
    public string $fullname;

    public function __construct()
    {
    }

    public function save()
    {
    }
}
