<?php

namespace jsnuty\app\controllers;

use jsnuty\app\models\User;
use jsnuty\app\models\UserChangePass;
use jsnuty\app\library\Request;
use jsnuty\app\library\Controller;
use jsnuty\app\library\Application;
use jsnuty\app\library\Response;
use jsnuty\app\models\LoginForm;
use jsnuty\app\models\ProfilForm;

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

    public function profile(Request $request, Response $response)
    {   
        if(!Application::isGuest()){
            $contact = new ProfilForm();
            $contact->email = Application::$app->user->email;
            $contact->username = Application::$app->user->username;
            $contact->id = Application::$app->user->id;
            if($request->isPost()){
                $contact->loadData($request->getBody());
                
                if($contact->validate() && $contact->update()){
                    Application::$app->session->setFlash('success', 'Udało się zaktualizować dane');
                    $response->redirect('/jsnuty/profile');
                }
                return $this->render('profile',[
                    'model' => $contact
                ]);
            }
            return $this->render('profile',[
                'model' => $contact
            ]);

            //return $this->render('profile');
        }
        else
            $response->redirect('/jsnuty/login');
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        Application::$app->session->setFlash('info', 'Succes logout');
        $response->redirect('/jsnuty/');
    }

    public function changePassword(Request $request, Response $response)
    {
        if(!Application::isGuest()){
            $user = new UserChangePass();

            if($request->isPost()){
                $user->loadData($request->getBody());
                $user->id = Application::$app->user->id;

                if($user->validate() && $user->update()){
                    Application::$app->session->setFlash('success', 'Udało się zmienic hasło');
                }else{
                    Application::$app->session->setFlash('error', 'Nie udało się zmienić hasła');
                    return $this->render('changePassword',[
                        'model' => $user
                    ]);
                }
                $response->redirect('/jsnuty/profile');
            }

            return $this->render('changePassword',[
                'model' => $user
            ]);
        }
        else{
            $response->redirect('/jsnuty/login');
        }
           
    }
    
}