<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Application\Application;

$app = new Application(dirname(__DIR__));

session_start();

$app->router->get("/", [App\Controllers\HomeController::class, "home"]);

$app->router->get("/login", [App\Controllers\LoginController::class, "show"]);

$app->router->get("/register", [App\Controllers\RegisterController::class, "show"]);

$app->router->get("/dashboard", [App\Controllers\DashboardController::class, "dashboard"]);

$app->router->post("/login", [App\Controllers\LoginController::class, "store"]);

$app->router->post("/register", [App\Controllers\RegisterController::class, "store"]);


$app->run();
