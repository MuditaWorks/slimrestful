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

    public function gravar($request, $response) {
        try {
            if ($request->isPost()) {
                $dados = $request->getParsedBody();
                $this->model->carregar($dados);
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

    public function apagar($request, $response, $args) {
        try {
            if ($request->isDelete()) {
                $this->model->carregar($args);
                if (!$this->model->apagar()) {
                    throw new \Exception('Falha ao tentar apagar o usuário');
                }
                return $response->withJson([
                    'error' => false,
                    'mensagem' => 'Usuário apagado com sucesso'
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

    public function listar($request, $response, $args) {
        try {
            if ($request->isGet()) {
                $idusu = !empty($args) ? $args['idusu'] : null;
                return $response->withJson($this->model->listar($idusu));
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