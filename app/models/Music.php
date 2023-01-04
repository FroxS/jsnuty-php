<?php

namespace jsnuty\app\models;

use jsnuty\app\models\User;
use jsnuty\app\library\Model;
use jsnuty\app\library\Application;
use jsnuty\app\database\DbModel;

class Music extends DbModel//Model
{

    public string $name = '';
    public string $link = '';
    public string $opis = '';
    public int $id;
    public int $useId;

    public function rules()
    {
        return [
            'name' => [self::RULE_REQUIRED, 
                [self::RULE_MIN, 'min' => 5], 
                [self::RULE_MAX, 'max' => 100]
            ],
            'link' => [self::RULE_REQUIRED
            ],
            'opis' => [self::RULE_REQUIRED, 
                [self::RULE_MIN, 'min' => 5], 
                [self::RULE_MAX, 'max' => 200]
            ]
        ];
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

    public function selectAll($userid){
        $sql = "SELECT m.`id`,m.`name`,m.`link`,m.`opis` FROM `".self::tableName()."` as m INNER JOIN `music_user` as mu ON mu.`music_id` = m.id WHERE mu.`user_id` = ".$userid;
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }

    public function select($userid, $musicId){
        $sql = "SELECT m.`id`,m.`name`,m.`link`,m.`opis` FROM `".self::tableName()."` as m INNER JOIN `music_user` as mu ON mu.`music_id` = m.id WHERE mu.`user_id` = ".$userid." AND mu.`music_id` = ".$musicId." LIMIT 1";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->execute();
        $data = $statement->fetch();
        return $data;
    }

    public function labels(): array
    {
        return [
            'name' => 'Nazwa utworu',
            'link' => 'Link',
            'opis' => 'Opis'
        ];
    }

    public function attributes(): array 
    {
        return ['name', 'link', 'opis'];
    }

    public function save()
    {
        $pdo = Application::$app->db->pdo;
        try {

            $pdo->beginTransaction();
            $flag = parent::save();
            $tableName = "music_user";
            $attributes = ['user_id', 'music_id'];
            $params = array_map(fn($attr) => ":$attr", $attributes);
            
            $where = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
            
            $sql = "
                INSERT INTO $tableName (".implode(',', $attributes).") 
                VALUES (".implode(',', $params).")
            ";
            $statment = $pdo->prepare($sql);

            $statment->bindValue(":user_id", $this->useId);
            $statment->bindValue(":music_id", $this->id);
            
            $statment->execute(); 
            
            
            $pdo->commit();
            return true;
        } catch(PDOExecption $e) {
    
            $pdo->rollback();
            return false;
    
        }

    }

}