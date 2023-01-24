<?php
namespace app\models;
use app\core\DbModel;

class RegistrationModel extends DbModel
{
    public string $email;
  
    public string $password;

    public function rules(): array
    {
        return [
            'email' => [self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
            ];
    }

    public function registration()
    {
        //$this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->create();

        $user = new UserModel();
        $role = new RoleModel();
        $userRoles = new UserRolesModel();

        $user->mapData($user->one("email = '$this->email'"));
        $role->mapData($role->one("name = 'registered'"));

        $userRoles->id_user = $user->id;
        $userRoles->id_role = $role->id;
        $userRoles->create();
    }

    public function tableName()
    {
        return "users";
    }

    public function attributes(): array
    {
        return [
            "email",
            "password"
        ];
    }
}