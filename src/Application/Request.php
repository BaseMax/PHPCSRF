<?php

namespace App\Application;

class Request
{
    public function getPath(): string
    {
        $path = $_SERVER["REQUEST_URI"] ?? false;
        $positionOfQuestionMark = strpos($path, "?");

        if (!$positionOfQuestionMark) {
            return $path;
        }

        return substr($path, 0, $positionOfQuestionMark);
    }

    public function getMethod(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
}
