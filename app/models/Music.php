<?php

namespace jsnuty\app\models;

use jsnuty\app\models\User;
use jsnuty\app\library\Model;
use jsnuty\app\library\Application;

class Music extends Model
{
    public function rules()
    {

    }

    public static function tableName(): string
    {
        return 'music';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function GetFisrtLink(){

        $statement = Application::$app->db->pdo->prepare("SELECT link FROM ".self::tableName()." LIMIT 1;");
        $statement->execute();
        $data = $statement->fetch();
        return $data;
    }

    public function selectAll(){
        
        $statement = Application::$app->db->pdo->prepare("SELECT * FROM ".self::tableName());
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }
}