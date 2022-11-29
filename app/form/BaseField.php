<?php

namespace jsnuty\app\form;

use jsnuty\app\library\Model;

abstract class BaseField
{
    public Model $model;
    public string $attriubte;

    abstract public function renderInput(): string;

    public function __construct(Model $model, $attriubte)
    {
        $this->attriubte = $attriubte;
        $this->model = $model;
    }

    public function __toString()
    {
        return sprintf('
            <div class="inputBx">
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