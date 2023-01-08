<?php
namespace jsnuty\app\library;

use Exception;

abstract class Model 
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';

    public array $errors = [];

    abstract public function rules();

    public function loadData($data)
    {
        foreach($data as $key => $value){
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }

    public function labels(): array
    {
        return [];
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute] ?? $attribute;
    }

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};

            foreach ($rules as $rule) {
                $ruleName = $rule;
                if(!is_string($ruleName)){
                    $ruleName = $rule[0];
                }

                if($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addErrorForRule($attribute, self::RULE_REQUIRED,$rule);
                }

                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->addErrorForRule($attribute, self::RULE_EMAIL,$rule);
                }

                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']){
                    
                    $this->addErrorForRule($attribute, self::RULE_MIN,$rule);
                }

                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']){

                    $this->addErrorForRule($attribute, self::RULE_MAX,$rule);
                }

                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}){
                    
                    $this->addErrorForRule($attribute, self::RULE_MATCH,$rule);
                }

                if($ruleName === self::RULE_UNIQUE){
                    
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $tableName = $className::tableName();
                    $statement = Application::$app->db->pdo->prepare("SELECT id FROM $tableName WHERE $uniqueAttr = :attr");
                    $statement->bindValue(":attr", $value);
                    $statement->execute();
                    $record = $statement->fetchObject();
                    if($record){
                        $this->addErrorForRule(
                            $attribute, 
                            self::RULE_UNIQUE, ['field' => $this->getLabel($attribute)]
                        );
                    }
                }
                
                
            }
        }
        return empty($this->errors);
    }

    private function addErrorForRule(string $attribute, string $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
            if(array_key_exists($value,$this->labels())){
                $message = str_replace("{label}", $this->labels()[$value], $message);
            }
        }
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages(){
        return [
            self::RULE_REQUIRED => 'Te pole jest wymagane',
            self::RULE_EMAIL => 'Wpisz poprawny adres email',
            self::RULE_MIN => 'Minimalna długość tego pola to {min}',
            self::RULE_MAX => 'Maksymalna długość tego pola to {max}',
            //self::RULE_MATCH => 'Te pola nie są takie same {match}',
            self::RULE_MATCH => 'To pole nie pasuje do pola {label}',
            self::RULE_UNIQUE => 'Rekord z {field} już istnieje'
        ];
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }

    public function addError(string $attribute, string $message)
    {
        $this->errors[$attribute][] = $message;
    }
}
