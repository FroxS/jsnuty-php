<?php

namespace jsnuty\app\models;

use jsnuty\app\library\UserModel;

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $username = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';
    public $terms = '';
    public int $status = self::STATUS_INACTIVE;

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
                [self::RULE_UNIQUE, 'class' => self::class]
            ],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, 
                [self::RULE_UNIQUE, 'class' => self::class]
            ],
            'password' => [self::RULE_REQUIRED, 
                [self::RULE_MIN, 'min' => 8], 
                [self::RULE_MAX, 'max' => 24]
            ],
            'confirmPassword' => [self::RULE_REQUIRED, 
                [self::RULE_MATCH, 'match' => 'password']
            ],
            'terms' => [self::RULE_REQUIRED]
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
            'username' => 'Nazwa użytkownika',
            'email' => 'Email',
            'password' => 'Hasło',
            'confirmPassword' => 'Potwierdź hasło'
        ];
    }

    public function attributes(): array 
    {
        return ['username', 'email', 'password', 'status'];
    }



}