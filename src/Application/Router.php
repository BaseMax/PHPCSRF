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
        $this->routes["get"][$path] = $callback;
    }

    public function post(string $path, array $callback)
    {
        $this->routes["post"][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $httpVerb = $this->request->getMethod();
        $callbackArray = $this->routes[$httpVerb][$path] ?? [];

        if (!$callbackArray) {
            echo "Page Not Found.";
            exit;
        }

        $controller = new  $callbackArray[0];
        $method = $callbackArray[1];
        call_user_func(array($controller, $method));
    }
}
