<?php

namespace App\Models;

class User
{
    public string $email;
    public string $password;
    public string $fullname;

    public function __construct()
    {
    }
}
