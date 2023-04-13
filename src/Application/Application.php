<?php

namespace App\Application;

class Application
{
    public Router $router;
    public Request $request;
    public static string $ROOT_DIR;


    public function __construct(string $rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
