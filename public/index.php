<?php

//use Dotenv\Dotenv;
use jsnuty\app\library\Application;
use jsnuty\app\controllers\AuthController;
use jsnuty\app\controllers\SiteController;
use jsnuty\app\controllers\MusicController;


require_once __DIR__."/../app/helpers/debug.php";
require_once __DIR__."/../app/library/Application.php";
//require_once __DIR__."/../vendor/autoload.php";

//$dotenv = Dotenv::createImmutable(dirname(__DIR__));
//$dotenv->load();

$config = [
    'userClass' => \jsnuty\app\models\User::class,
    // 'db' => [
    //     'dsn' => 'mysql:host=localhost;port=3306;dbname=froxs1231',
    //     'user' => 'kubaMainUser1231',
    //     'password' => 'dsaer$fs3X'
    // ],
    'db' => [
        'dsn' => 'mysql:host=localhost;port=3306;dbname=php-mvc',
        'user' => 'root',
        'password' => ''
    ]
];

$app = new Application(dirname(__DIR__), $config);

//dump($app->request->getPath());

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/profile', [AuthController::class, 'profile']);
$app->router->post('/profile', [AuthController::class, 'profile']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/music', [MusicController::class, 'music']);
$app->router->post('/music', [MusicController::class, 'music']);


$app->router->get('/music/add', [MusicController::class, 'addmusic']);
$app->router->post('/music/add', [MusicController::class, 'addmusic']);

$app->router->get('/music/edit', [MusicController::class, 'editmusic']);
$app->router->post('/music/edit', [MusicController::class, 'editmusic']);

$app->router->get('/music/delete', [MusicController::class, 'deletemusic']);



//dump($app->router->routes);

$app->run();


