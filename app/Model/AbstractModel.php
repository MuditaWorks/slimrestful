<?php

namespace App\Model;

abstract class AbstractModel extends \PDO{
    const USERNAME="root";
    const PASSWORD="123";
    const HOST="localhost";
    const DB="slimrestful";

    protected $tableName;
    protected $atributos;
    protected $campoChave;

    public function __construct()
    {
        $username = self::USERNAME;
        $password = self::PASSWORD;
        $host = self::HOST;
        $db = self::DB;
        parent::__construct("mysql:dbname=$db;host=$host", $username, $password);
    }

    protected function executar($sql, $args = null){
        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    public function carregar($dados = []) {
        foreach ($dados as $key => $val) {
            $this->atributos[$key] = $val;
        }
        return $this;
    }

    public function antesGravar() {
        return true;
    }

    public function gravar() {
        $this->antesGravar();

        if (empty($this->atributos[$this->campoChave])) {
            return $this->inserir();
        } else {
            return $this->alterar();
        }
    }

    protected function inserir() {
        $colunas = "";
        $valores = "";
        foreach ($this->atributos as $key => $val) {
            if ($key != $this->campoChave) {
                $colunas .= !empty($colunas) ? ', '.$key : $key;
                $valores .= !empty($valores) ? "', '".$val : $val;
            }
        }
        $sql = <<<DML
INSERT INTO {$this->tableName} ({$colunas}) VALUES ('{$valores}');
DML;
        return $this->executar($sql);
    }

    protected function alterar() {
        $colunas = '';
        foreach ($this->atributos as $key => $val) {
            if (!empty($colunas)) {
                $colunas .= ",";
            }
            if (is_string($val)) {
                $val = "'{$val}'";
            }
            $colunas .= "{$key} = {$val}";
        }
        $sql = <<<DML
UPDATE {$this->tableName} SET
    {$colunas}
WHERE {$this->campoChave} = {$this->atributos[$this->campoChave]}
DML;
        return $this->executar($sql);
    }

    public function apagar() {
        $id = $this->atributos[$this->campoChave];
        $sql = <<<DML
DELETE FROM {$this->tableName} WHERE {$this->campoChave} = {$id}
DML;
        return $this->executar($sql);
    }

    public function listar($id = null) {
        $id = empty($id) ? $this->atributos[$this->campoChave] : $id;
        $where = !empty($id) ? " WHERE {$this->campoChave} = {$id}" : '';
        $campos = implode(',', array_keys($this->atributos));
        $sql = <<<DML
SELECT
    {$campos}
FROM {$this->tableName}
{$where}
DML;
        $res = [];
        if (!empty($id)){
            $res = $this->executar($sql)->fetchAll(\PDO::FETCH_NAMED)[0];
        } else {
            $res = $this->executar($sql)->fetchAll(\PDO::FETCH_NAMED);
        }
        return $res;
    }
}