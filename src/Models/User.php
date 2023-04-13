<?php

namespace App\Models;

use App\Application\Application;
use App\Application\Hash;

class User extends Model
{
    public string $email;
    public string $password;
    public string $fullname;

    public function __construct()
    {
    }

    public function save(): bool
    {
        $table = $this->tableName();
        $attributes = $this->attributes();

        $columns = implode(",", $attributes);

        $params = implode(",", array_map(fn ($attr) => ":$attr", $attributes));


        $statment = self::prepare("INSERT INTO $table ($columns) 
                                    VALUES ($params)");


        foreach ($attributes as $attribute) {
            $statment->bindValue(":$attribute", $this->{$attribute});
        }

        $statment->execute();

        return true;
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


    public function login(string $email, string $password): bool| array
    {
        $table = $this->tableName();

        // $password = Hash::make($password);

        $statment = self::prepare("SELECT * FROM $table WHERE email = :email");

        $statment->execute([
            "email" => $email
        ]);

        $user = $statment->fetch();

        if (!$user || !password_verify($password, $user["password"])) return false;

        return $user;
    }
}