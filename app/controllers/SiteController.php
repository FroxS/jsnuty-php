<?php

namespace jsnuty\app\controllers;

use jsnuty\app\library\Application;
use jsnuty\app\library\Request;
use jsnuty\app\library\Response;
use jsnuty\app\library\Controller;
use jsnuty\app\models\ContactForm;
use jsnuty\app\models\Music;


class SiteController extends Controller
{
    public function home()
    {
        $music = new Music();
        
        $data = $music->GetFisrtLink();
        $params = [
            'name' => 'Kuba',
            'link' => $data
        ];
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if($request->isPost()){
            $contact->loadData($request->getBody());

            if($contact->validate() && $contact->send()){
                Application::$app->session->setFlash('success', 'Thanks for contact, we will resend to you sonn! :D');
                Application::$app->response->redirect('/jsnuty/');
            }
            
        }
        return $this->render('contact',[
            'model' => $contact
        ]);
    }
}