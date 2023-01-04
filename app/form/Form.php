<?php 

namespace jsnuty\app\form;

use jsnuty\app\library\Model;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">',$action, $method);
        return new Form();
    }
    
    public static function end()
    {
        return '</form>';
    }

    public function field(Model $model, $atttribute, $hidden = false)
    {
        return new InputField($model, $atttribute, $hidden);
    }
}