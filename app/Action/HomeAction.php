<?php

namespace App\Action;

final class HomeAction extends AbstractAction{

    public function home($request, $response)
    {
        return json_encode(['teste']);
    }

    public function login($request, $response)
    {
        return json_encode(['teste']);
    }

}