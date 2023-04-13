<?php

namespace App\Requests;

interface Request
{
    public function validate(array $userData);
}
