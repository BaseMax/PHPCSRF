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
            return "Page Not Found.";
        }

        $controller = new  $callbackArray[0];
        $method = $callbackArray[1];
        return call_user_func(array($controller, $method));
    }
}
