<?php

namespace App\Models;

use App\Application\Application;

class User extends Model
{
    public string $email;
    public string $password;
    public string $fullname;

    public function __construct()
    {
    }

    public function save(): never
    {
        $table = $this->tableName();
        $attributes = $this->attributes();

        $columns = implode(",", $attributes);

        $params = implode(",", array_map(fn ($attr) => ":$attr", $attributes));


        $statment = self::prepare("INSERT INTO $table ($columns) 
                                    VALUES ($params)");
    }

    public function tableName(): string
    {
        return "users";
    }

    public function attributes(): array
    {
        return [
            "email",
            "fullname",
            "password"
        ];
    }

    public static function prepare(string $sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}