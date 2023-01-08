<?php

namespace jsnuty\app\models;

use jsnuty\app\library\UserModel;

class UserChangePass extends UserModel
{
    public string $password = '';
    public string $confirmPassword = '';
    public string $id;

    public static function tableName(): string
    {
        return 'user';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function getDisplayName(): string
    {
        return $this->username ?? '';
    }

    public function rules()
    {
        return [
            'password' => [self::RULE_REQUIRED, 
                [self::RULE_MIN, 'min' => 8], 
                [self::RULE_MAX, 'max' => 24]
            ],
            'confirmPassword' => [self::RULE_REQUIRED, 
                [self::RULE_MATCH, 'match' => 'password']
            ]
        ];
    }

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function labels(): array
    {
        return [
            'password' => 'Nowe hasło',
            'confirmPassword' => 'Potwierdź hasło'
        ];
    }

    public function attributes(): array 
    {
        return ['password'];
    }

    public function update(){
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::update();
    }


}