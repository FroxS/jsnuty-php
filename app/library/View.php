<?php


namespace jsnuty\app\library;


class View
{
    public function renderView($view, $params = [])
    {
        $viewContent = $this->renderOnlyView($view, $params);
        $layoutContent = $this->layoutContent();
        $navigation = $this->navigation(Application::$app->navigation);
        return str_replace([
                '{{content}}',
                '{{navigation}}'
            ],[
                $viewContent,
                $navigation
            ], 
            $layoutContent
        );
    }

    public function layoutContent()
    {
        $layout = Application::$app->layout;
        if(Application::$app->controller){
            $layout = Application::$app->controller->layout;
        } 
        ob_start();
        include_once Application::$ROOT_DIR."/app/templates/layout/$layout.php";
        return ob_get_clean();
    }

    public function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $param){
            $$key = $param;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/app/templates/$view.php";
        return ob_get_clean();
    }

    public function navigation($nav)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/app/templates/nav/$nav.php";
        return ob_get_clean();
    }
}