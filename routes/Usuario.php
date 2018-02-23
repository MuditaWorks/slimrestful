<?php

namespace App\Routes;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\App as Slim;

class Usuario {
    public function home(Request $request, Response $response, array $args) {
        return 'Teste';
    }
}