<?php

namespace App\Action;

final class HomeAction extends AbstractAction{

    public function home($request, $response)
    {
        return $response->withJson(['teste']);
    }

    public function login($request, $response)
    {
        return $response->withJson(['teste']);
    }

}