<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Application\Application;

$app = new Application();


$app->router->get("/login", []);

$app->router->get("/dashboard", []);

$app->router->post("/login", []);

$app->router->get("/register", []);

$app->router->post("/register", []);
