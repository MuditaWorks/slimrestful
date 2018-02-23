<?php
header('Content-Type: application/json');

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

require_once 'vendor/autoload.php';
require_once 'config/constantes.php';
require_once 'config/config.php';


$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();

$container['view'] = new Slim\Views\PhpRenderer("resources/views/");

require 'app/routes.php';

$app->run();