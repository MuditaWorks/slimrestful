<?php

namespace App\Action;

final class HomeAction {

    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function home($request, $response)
    {
        $vars['page'] = 'home';
        return $this->container->view->render($response, 'template.phtml', $vars);
    }

    public function login($request, $response)
    {
        $vars['page'] = 'login';
        return $this->container->view->render($response, 'template.phtml', $vars);
    }

}