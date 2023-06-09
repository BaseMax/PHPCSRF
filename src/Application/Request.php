<?php

namespace App\Application;

class Request
{
    public function getPath(): string
    {
        $path = $_SERVER["REQUEST_URI"] ?? false;
        $positionOfQuestionMark = strpos($path, "?");

        if (!$positionOfQuestionMark) return $path;

        return substr($path, 0, $positionOfQuestionMark);
    }

    public function getMethod(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getBody(): array
    {
        $body = [];

        if ($this->getMethod() === "get") {
            foreach ($_GET as $key => $value)
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if ($this->getMethod() === "post") {
            foreach ($_POST as $key => $value)
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $body;
    }
}
