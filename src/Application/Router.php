<?php

namespace App\Application;


class Router
{

    protected array $routes = [
        "get" => [],
        "post" => [],
        "delete" => []
    ];

    public function __construct()
    {
    }

    public function get(string $path, array $callback)
    {
    }

    public function post(string $path, array $callback)
    {
    }

    public function resolve()
    {
        // var_dump($_SERVER);
    }
}
