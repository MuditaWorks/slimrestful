<?php

namespace App\Action;

final class UsuarioAction extends AbstractAction{

    public function login($request, $response) {
        return $response->withJson(['teste']);
    }

    public function cadastro($request, $response) {
        return $response->withJson(['teste']);
    }
}