<?php

namespace App\Action;

final class UsuarioAction extends AbstractAction{

    public function login($request, $response) {
        return json_encode(['teste']);
    }

    public function cadastro($request, $response) {
        return json_encode(['teste']);
    }
}