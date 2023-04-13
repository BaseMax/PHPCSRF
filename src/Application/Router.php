<?php

namespace App\Application;


class Router
{

    protected array $routes = [
        "get" => [],
        "post" => [],
        "delete" => []
    ];

    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $path, array $callback)
    {
    }

    public function post(string $path, array $callback)
    {
    }

    public function resolve()
    {
        var_dump($this->request->getPath());
    }
}
