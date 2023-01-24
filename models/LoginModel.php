<?php

namespace app\models;

use app\core\DbModel;

class LoginModel extends DbModel
{
    public string $email;
    public string $password;

    public function tableName()
    {
        return "users";
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        $result = $this->one("email = '$this->email'");
        if ($result != null)
        {
            return $this->password ==  $result["password"] ? true : false;
        }
        return false;
    }

    public function attributes(): array
    {
        return [
            "email",
            "password"
        ];
    }
}