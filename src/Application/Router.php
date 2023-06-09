<?php

namespace App\Application;

class Router
{
    public Request $request;
    protected array $routes = [
        "get" => [],
        "post" => [],
        "delete" => []
    ];

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
            Application::$app->response->setStatusCode(404);

            return ViewRender::render("_404");
        }

        $controller = new  $callbackArray[0];
        $method = $callbackArray[1];

        return call_user_func([$controller, $method]);
    }
}
