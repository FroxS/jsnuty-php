<?php

namespace jsnuty\app\library;

use jsnuty\app\library\Response;
use jsnuty\app\exceptions\NotFoundException;

require_once __DIR__."/../exceptions/NotFoundException.php";

//require_once __DIR__."/../controllers/AuthController.php";
//require_once __DIR__."/../controllers/MusicController.php";



class Router
{
    public Request $request;
    public Response $response;

    public array $routes = [];

    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        //dump([$this->routes,$path, $method, $callback ]);

        if(!$callback){
            throw new NotFoundException();
        }

        if(is_string($callback)){
            
            return Application::$app->view->renderView($callback);
        }

        if(is_array($callback)){
            $controller = new $callback[0](); 
            Application::$app->controller = $controller;
            $controller->actions = $callback[1];
            $callback[0] = $controller;
        }

        return call_user_func($callback, $this->request, $this->response);
    }

}