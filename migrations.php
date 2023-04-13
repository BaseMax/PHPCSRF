<?php

// migration runner

require_once __DIR__ . "/vendor/autoload.php";

use App\Application\Application;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$app = new Application(__DIR__);

$files = $app->db->applyMigrations();