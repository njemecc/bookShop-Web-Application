<?php

namespace app\models;

use app\core\DbModel;

class UserModel extends DbModel
{
    public string $id;
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $password;
    public $role_names;

    public function rules(): array
    {
        return [];
    }

    public function tableName()
    {
        return "users";
    }

    public function attributes(): array
    {
        return [
            "first_name",
            "last_name",
            "email",
            "password"
        ];
    }
}