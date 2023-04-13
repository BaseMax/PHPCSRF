<?php

namespace App\Application;

use PDO;

class Database
{
    public PDO $pdo;

    public function __construct()
    {
        $env = Database::getDotEnv();

        $this->pdo = new PDO(
            "mysql:host={$env['DB_HOST']};port={$env['DB_PORT']};dbname={$env['DB_NAME']}",
            $env["DB_USER"],
            $env["DB_PASSWORD"]
        );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected static function getDotEnv(): array
    {
        return [
            "DB_NAME"     => $_ENV["DB_NAME"],
            "DB_PASSWORD" => $_ENV["DB_PASSWORD"],
            "DB_HOST"     => $_ENV["DB_HOST"],
            "DB_PORT"     => $_ENV["DB_PORT"],
            "DB_USER"     => $_ENV["DB_USER"]
        ];
    }

    public static function applyMigrations()
    {
        $files = scandir(Application::$ROOT_DIR . "/src/Migrations");

        $migrations = [];

        foreach ($files as $file) {
            if (substr($file, 0, 1) === "_")
                $migrations[] = $file;
        }

        $tables = [];

        foreach ($migrations as $migration) {

            require_once Application::$ROOT_DIR . "/src/Migrations/$migration";

            $file_name = '_0001_create_users_table.php';
            preg_match('/^_\d+_create_(\w+)_table\.php$/', $file_name, $matches);
            $tables[] = $matches[1];
        }
    }
}