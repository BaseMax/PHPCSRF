<?php

namespace App\Application;

class Response
{
    public function setStatusCode(int $statusCode)
    {
        http_response_code($statusCode);
    }
}
