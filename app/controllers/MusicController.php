<?php

namespace jsnuty\app\controllers;

use jsnuty\app\models\Music;
use jsnuty\app\library\Request;
use jsnuty\app\library\Response;
use jsnuty\app\library\Controller;
use jsnuty\app\library\Application;

class MusicController extends Controller
{

    public function music(Request $request, Response $response)
    {  

        $music = new Music();
        
        $data = $music->selectAll();

        $params = [
            'songs' => $data
        ];
        if(!Application::isGuest()){
            return $this->render('music', $params);
        }else{
            $response->redirect('/jsnuty/login');
        }
            
    }

    public function getSongs(){
        $music = new Music();
        $data = $music->selectAll();
        // $songs = [];
        // foreach($data as $song){
        //     $songs[$song['id']] = $song;
        // }
        return json_encode($data);  
    }
}