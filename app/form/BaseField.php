<?php

namespace jsnuty\app\form;

use jsnuty\app\library\Model;

abstract class BaseField
{
    public Model $model;
    public string $attriubte;
    public bool $hidden;
    
    abstract public function renderInput(): string;

    public function __construct(Model $model, $attriubte,$hidden = false)
    {
        $this->attriubte = $attriubte;
        $this->model = $model;
        $this->hidden = $hidden;
    }

    public function __toString()
    {
        return sprintf('
            <div class="inputBx'.($this->hidden ? ' hidden' : '').'">
                <span>%s</span>
                %s
                <p class="invaildmessage">%s</p>
            </div>
            ',
            $this->model->getLabel($this->attriubte),
            $this->renderInput(),
            $this->model->getFirstError($this->attriubte)
        );
    }
}