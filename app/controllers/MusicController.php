<?php

namespace jsnuty\app\controllers;

use jsnuty\app\models\Music;
use jsnuty\app\models\ContactForm;
use jsnuty\app\library\Request;
use jsnuty\app\library\Response;
use jsnuty\app\library\Controller;
use jsnuty\app\library\Application;

class MusicController extends Controller
{

    public function music(Request $request, Response $response)
    {  
        if(!Application::isGuest()){
            $music = new Music();
            
            $data = $music->selectAll(Application::$app->user->id);

            $params = [
                'songs' => $data
            ];
            return $this->render('music', $params);
        }else{
            $response->redirect('/jsnuty/login');
        }
            
    }


    public function addmusic(Request $request, Response $response)
    {  
        if(!Application::isGuest()){
            $music = new Music();
            $music->useId = Application::$app->user->id;
            if($request->isPost()){
                $music->loadData($request->getBody());

                if($music->validate() && $music->save()){
                    Application::$app->session->setFlash('success', 'Udało się oddać utwór');
                    Application::$app->response->redirect('/jsnuty/music');
                }else{
                    Application::$app->session->setFlash('error', 'Nie udało się dodać');
                }
                
            }
            return $this->render('addmusic', [
                'model' => $music
            ]);
        }else{
            $response->redirect('/jsnuty/login');
        }
            
    }


    public function editmusic(Request $request, Response $response)
    {  
        if(!Application::isGuest() ){
            if($request->isGet()){
                $get = $request->getBody();
                if(!array_key_exists("id", $get)){
                    $response->redirect('/jsnuty/music');
                }
                $music = Music::findOne(['id' => $get["id"]]);
                $music->useId = Application::$app->user->id;

                return $this->render('editmusic', [
                    'model' => $music
                ]);
                //dump($music);

            }

            if($request->isPost()){

                $music = new Music();
                $music->loadData($request->getBody());

                if($music->validate() && $music->update()){
                    Application::$app->session->setFlash('success', 'Udało się oddać utwór');
                    Application::$app->response->redirect('/jsnuty/music');
                }else{
                    Application::$app->session->setFlash('error', 'Nie udało się dodać');
                }
            }
        }else{
            $response->redirect('/jsnuty/login');
        }     
    }

    public function deletemusic(Request $request, Response $response)
    {  
        if(!Application::isGuest() ){
            if($request->isGet()){
                $get = $request->getBody();
                if(!array_key_exists("id", $get)){
                    $response->redirect('/jsnuty/music');
                }
                // $music = Music::findOne(['id' => $get["id"]]);
                // $music->useId = Application::$app->user->id;

                $music = new Music();;
                $data = $music->select(Application::$app->user->id,$get["id"]);
                if(empty($data)){
                    Application::$app->session->setFlash('error', 'Nie istnieje');
                    $response->redirect('/jsnuty/music');
                }
                $music->id = $data["id"];
                if($music->delete()){
                    Application::$app->session->setFlash('success', 'Udało się usunąć utwór');
                }else{
                    Application::$app->session->setFlash('error', 'Nie udało się usunąć');
                }
                $response->redirect('/jsnuty/music');
                //dump($music);

            }

        }else{
            $response->redirect('/jsnuty/login');
        }     
    }
    


    public function getSongs(){
        $music = new Music();
        $data = $music->selectAll();
        return json_encode($data);  
    }
}