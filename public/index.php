<?php

use jsnuty\app\library\Application;
use jsnuty\app\controllers\AuthController;
use jsnuty\app\controllers\SiteController;
use jsnuty\app\controllers\MusicController;


require_once __DIR__."/../app/helpers/debug.php";
require_once __DIR__."/../app/library/Application.php";

$db = file_get_contents(__DIR__."/../db.json");
  

$config = [
    'userClass' => \jsnuty\app\models\User::class,
    'db' => json_decode($db,true)["DB"]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/profile', [AuthController::class, 'profile']);
$app->router->post('/profile', [AuthController::class, 'profile']);

$app->router->get('/profile/password', [AuthController::class, 'changePassword']);
$app->router->post('/profile/password', [AuthController::class, 'changePassword']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/music', [MusicController::class, 'music']);
$app->router->post('/music', [MusicController::class, 'music']);


$app->router->get('/music/add', [MusicController::class, 'addmusic']);
$app->router->post('/music/add', [MusicController::class, 'addmusic']);

$app->router->get('/music/edit', [MusicController::class, 'editmusic']);
$app->router->post('/music/edit', [MusicController::class, 'editmusic']);

$app->router->get('/music/delete', [MusicController::class, 'deletemusic']);

$app->run();


