<?php

namespace App\Action;

final class UsuarioAction {

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function login($request, $response) {
        $vars['page'] = 'login';
        return $this->container->view->render($response, 'template.phtml', $vars);
    }

    public function cadastro($request, $response) {
        $vars['page'] = 'cadastro';
        return $this->container->view->render($response, 'template.phtml', $vars);
    }
}