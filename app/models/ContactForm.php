<?php
namespace jsnuty\app\models;

use jsnuty\app\library\Model;

class ContactForm extends Model{
    public string $email = '';
    public string $text = '';

    public function rules(){
        return[
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'text' => [self::RULE_REQUIRED, 
                [self::RULE_MIN, 'min' => 0], 
                [self::RULE_MAX, 'max' => 200]
            ]
        ];
    }

    public function labels(): array
    {
        return[
            'email' => "Twój email",
            'text' => 'Zapytaj co cokolwiek'
        ];
    }

    public function send(){
        // Send message Comming soon
        return true;
    }
}