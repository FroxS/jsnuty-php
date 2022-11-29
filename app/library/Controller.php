<?php

namespace jsnuty\app\library;

class Controller
{
    public string $layout = 'main';
    public string $action = '';

    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function setlayout($layout)
    {
        $this->layout = $layout;
    }
}