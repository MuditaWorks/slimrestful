<?php

namespace App\Action;

final class HomeAction extends AbstractAction{

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