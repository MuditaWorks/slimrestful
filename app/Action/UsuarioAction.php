<?php

namespace App\Action;

use App\Model\UsuarioModel;

final class UsuarioAction extends AbstractAction{

    private $model;

    public function __construct($container)
    {
        parent::__construct($container);
        $this->model = new UsuarioModel();
    }

    public function login($request, $response) {
        return $response->withJson(['teste']);
    }

    public function cadastro($request, $response) {
        try {
            if ($request->isPost()) {
                $dados = $request->getParsedBody();
                $this->model->carregar($dados);
//                $this->model->inserir();
                if(!$this->model->gravar()) {
                    throw new \Exception('Erro ao salvar o usuário');
                }
                return $response->withJson([
                    'error' => false,
                    'mensagem' => 'Usuário salvo com sucesso'
                ]);
            } else {
                throw new \Exception('Método não implementado');
            }
        } catch (\Exception $e) {
            return $response->withJson([
                'error' => true,
                'mensagem' => $e->getMessage()
            ]);
        }
    }
}