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
            "DB_NAME"     => getenv("DB_NAME"),
            "DB_PASSWORD" => getenv("DB_PASSWORD"),
            "DB_HOST"     => getenv("DB_HOST"),
            "DB_PORT"     => getenv("DB_PORT"),
            "DB_USER"     => getenv("DB_USER")
        ];
    }
}