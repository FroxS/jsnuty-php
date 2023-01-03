<?php
namespace jsnuty\app\models;

use jsnuty\app\library\UserModel;

class ProfilForm extends UserModel{


    public string $username = '';
    public string $email = '';
    public int $id = 0;

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
            'username' => [self::RULE_REQUIRED, 
                [self::RULE_MIN, 'min' => 4], 
                [self::RULE_MAX, 'max' => 50]
            ],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL
                
            ],
        ];
    }

    public function save()
    {
        return parent::save();
    }

    public function labels(): array
    {
        return [
            'username' => 'Nazwa użytkownika',
            'email' => 'Email',
        ];
    }

    public function attributes(): array 
    {
        return ['username', 'email'];
    }
}