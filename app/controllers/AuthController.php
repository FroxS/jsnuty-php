<?php

namespace jsnuty\app\controllers;

use jsnuty\app\models\User;
use jsnuty\app\library\Request;
use jsnuty\app\library\Controller;
use jsnuty\app\library\Application;
use jsnuty\app\library\Response;
use jsnuty\app\models\LoginForm;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if($request->isPost()){
            
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()){
                Application::$app->session->setFlash('success', "Welcome ");
                $response->redirect('/jsnuty/');
                return ;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
       
        $user = new User();
        $this->setLayout('auth');
        if($request->isPost()){

            $user->loadData($request->getBody());
            
            if($user->validate() && $user->save()){
                Application::$app->session->setFlash('success', 'Thanks for registering :D');
                Application::$app->response->redirect('/jsnuty/');
                
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function profile()
    {   
        return $this->render('profile');
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        Application::$app->session->setFlash('info', 'Succes logout');
        $response->redirect('/jsnuty/');
    }
}