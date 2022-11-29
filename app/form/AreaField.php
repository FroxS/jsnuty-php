<?php

namespace jsnuty\app\form;

use jsnuty\app\library\Model;

class AreaField extends BaseField
{
    
    public function renderInput(): string
    {
        return sprintf('<textarea name="%s" class="%s">%s</textarea>',
            $this->attriubte,
            $this->model->hasError($this->attriubte) ? 'invailddata' : '',
            $this->model->{$this->attriubte}
        );
    }
}