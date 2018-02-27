<?php
//phpinfo();
//exit;

header('Content-Type: application/json; charset=utf-8');

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

use App\Model\UsuarioModel;

require_once 'vendor/autoload.php';
require_once 'config/constantes.php';
require_once 'config/config.php';

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();

$container['view'] = new Slim\Views\PhpRenderer("resources/views/");

$app->delete('/teste/[{params}]', function($request, $response, $args){
    var_dump($args['params']);
});

require 'app/routes.php';

$app->run();