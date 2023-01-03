<?php

namespace jsnuty\app\database;

use Exception;
use jsnuty\app\library\Application;
use jsnuty\app\library\Model;

abstract class DbModel extends Model
{
    abstract static public function tableName(): string;
    
    abstract public function attributes(): array;

    abstract static public function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        
        $where = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        
        $sql = "
            INSERT INTO $tableName (".implode(',', $attributes).") 
            VALUES (".implode(',', $params).")
        ";
        dump($sql);
        $statment = self::prepare($sql);
        foreach ($attributes as $attribute) {
            $statment->bindValue(":$attribute", $this->{$attribute});
        }
        $statment->execute(); 
        return true;
    }


    public function update()
    {

        try {
            $tableName = $this->tableName();
            $attributes = $this->attributes();

            $params = array_map(fn($attr) => ":$attr", $attributes);
            //dump($this->{$this->primaryKey()});
            $set = implode(" , ", array_map(fn($attr) => "$attr = :$attr", $attributes));
            $where = $this->primaryKey() . "= :" . $this->primaryKey();
            
            $sql = "
                UPDATE $tableName SET $set 
                WHERE $where
            ";
            
            $statment = self::prepare($sql);
            foreach ($attributes as $attribute) {
                $statment->bindValue(":$attribute", $this->{$attribute});
            }
            $statment->bindValue(":".$this->primaryKey(), $this->{$this->primaryKey()});
            $statment->execute(); 
            return true;
        } catch (Exception $e) {
            Application::$app->session->setFlash('error', $e->getMessage());
            return false;
        }
        
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();

        $attributes = array_keys($where);

        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $sql = "SELECT * FROM $tableName WHERE $sql";
        
        $statment = self::prepare("$sql");

        foreach($where as $key => $value){
            $statment->bindValue(":$key", $value);
        }

        $statment->execute();
        //dump(static::class);
        return $statment->fetchObject(static::class);
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}