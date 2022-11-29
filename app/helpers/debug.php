<?php
function dump($data, $exit = true)
{
    if(is_null($data)){
        return null;
    }
    if(is_array($data)){
        foreach($data as $value){
            echo '<pre>';
            echo var_dump($value);
            echo '</pre>';
        }
    }else{
        echo '<pre>';
        echo var_dump($data);
        echo '</pre>';
    }
    if($exit){
        die();
    }
}

function scan($data, $exit = true)
{
    if(is_array($data)){
        foreach($data as $value){
            echo '<pre>';
            echo print_r($value);
            echo '</pre>';
        }
    }else{
        echo '<pre>';
        echo print_r($data);
        echo '</pre>';
    }
    if($exit){
        die();
    }
}