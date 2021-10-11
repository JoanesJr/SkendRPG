<?php

use MF\Model\Model;

class Habilidade extends model {
    private $id;
    private $id_usuario;
    private $nome;
    private $descricao;
    private $efeito;
    private $dano;
    private $custo;

    public function __set($atr, $value) {
        $this->$atr = $value;
    }

    public function __get($atr) {
        return $this->$atr;
    }

    public function salvar() {

    }

    public function editar() {

    }

    public function excluir() {

    }

    public function getAll() {

    }

    public function getHabUser() {
        
    }
}