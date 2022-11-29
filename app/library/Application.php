<?php 

namespace jsnuty\app\library;

use jsnuty\app\database\Database;

require_once "Request.php";
require_once "Response.php";
require_once "Router.php";
require_once "View.php";
require_once "Session.php";
require_once "Model.php";
require_once __DIR__."/../database/Database.php";
require_once __DIR__."/../database/DbModel.php";
require_once "UserModel.php";
require_once "Controller.php";
require_once __DIR__."/../controllers/SiteController.php";
require_once __DIR__."/../controllers/MusicController.php";
require_once __DIR__."/../controllers/AuthController.php";
require_once __DIR__."/../models/ContactForm.php";
require_once __DIR__."/../models/Music.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../models/LoginForm.php";
require_once __DIR__."/../form/BaseField.php";
require_once __DIR__."/../form/Form.php";
require_once __DIR__."/../form/InputField.php";
require_once __DIR__."/../form/AreaField.php";


class Application
{
    public string $userClass;
    public static Application $app;
    public static string $ROOT_DIR;

    public string $layout = 'main';
    public string $navigation = 'mainNav';
    public Router $router;
    public Request $request;
    public Response $response;
    public View $view;
    public Database $db;
    public Session $session;
    public ?UserModel $user;

    public ?Controller $controller = null;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->userClass = $config['userClass'];
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
        $this->db = new Database($config['db']);
        $this->session = new Session();

        //dump($this->user);
        //$_SESSION = [];
        //dump($this->session->get('user'));
        $primaryValue = $this->session->get('user');
        if($primaryValue){
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        }else{
            $this->user = null;
        }
    }

    public function run()
    {
        try{
            echo $this->router->resolve();
        }catch(\Throwable $e){
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error', ['exception' => $e]);
        }         
    }

    public function login(UserModel $user)
    {
        
        $this->user = $user;

        $primaryKey = $user->primaryKey();

        $primaryValue = $user->{$primaryKey};

        $this->session->set('user', $primaryValue);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

}

