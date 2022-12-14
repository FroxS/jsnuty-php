<?php
namespace jsnuty\app\library;




class Request
{
    public function getAddres()
    {
        return "http://$_SERVER[HTTP_HOST]";
    }

    public function getPath()
    {

        // $path = $_SERVER['REQUEST_URI'];
        // $position = strpos($path, '?');
        // if ($position !== false) {
        //     $path = substr($path, 0, $position);
        // }
        // return $path;

        $path = $_SERVER['REQUEST_URI'] ?? '/';
        
        $position = strpos($path, '?');
        if(strstr($path, 'jsnuty')){
            $path = substr($path,7);
        }


        if(!$position){
            return $path;
        }else{
            $path = substr($path,0, $position);
        }

        $path = substr($path, 0, strpos($path, "?"));
        return $path;
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->method() === 'get';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }

    public function getBody()
    {
        $body = [];

        if($this->isGet())
        {
            foreach($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->isPost())
        {
            foreach($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    
}