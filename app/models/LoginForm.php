<?php

namespace jsnuty\app\models;

use jsnuty\app\models\User;
use jsnuty\app\library\Model;
use jsnuty\app\library\Application;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules()
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    } 

    public function labels(): array
    {
        return [
            'email' => 'Twój email',
            'password' => 'Hasło'
        ];
    }

    public function login()
    {
        
        $user = User::findOne(['email' => $this->email]);
        
        if(!$user){
            $this->addError('email', 'User doe not not exist with this emial');
            return false;
        }

        if(!password_verify($this->password, $user->password)){
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        
        return Application::$app->login($user);
    }
}