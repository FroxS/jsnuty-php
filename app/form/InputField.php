<?php

namespace jsnuty\app\form;

use jsnuty\app\library\Model;

class InputField extends BaseField
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';

    public string $type;

    public function __construct(Model $model, $attriubte)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attriubte);
    }

    public function passworldField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function renderInput(): string
    {
        return sprintf('<input type="%s" name="%s" value="%s" class="%s">',
            $this->type,
            $this->attriubte,
            $this->model->{$this->attriubte},
            $this->model->hasError($this->attriubte) ? 'invailddata' : ''
        );
    }
}