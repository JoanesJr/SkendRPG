<?php

namespace App\Models;
use MF\Model\Model;

class Personagem extends Model {
    private $id;
    private $id_usuario;
    private $nome;
    private $classe;
    private $idade;
    private $vida;
    private $energia;
    private $ca;
    private $altura;
    private $cabelo;
    private $personalidade;
    private $detalhes;
    private $nome_atributo_1;
    private $nome_atributo_2;
    private $nome_atributo_3;
    private $nome_atributo_4;
    private $nome_atributo_5;
    private $nome_atributo_6;
    private $valor_atributo_1;
    private $valor_atributo_2;
    private $valor_atributo_3;
    private $valor_atributo_4;
    private $valor_atributo_5;
    private $valor_atributo_6;
    private $nome_recurso_1;
    private $nome_recurso_2;
    private $nome_recurso_3;
    private $nome_recurso_;
    private $valor_recurso_1;
    private $valor_recurso_2;
    private $valor_recurso_3;
    private $valor_recurso_4;
    private $historia;
    private $imagem;

    public function __get($atr) {
        return $this->$atr;
    }

    public function __set($atr, $value) {
        $this->$atr = $value;
    }

    public function save() {
        $query = 
        "
            insert from Personagem (
                :id_usuario, :nome, :classe, :vida, :energia, :ca, :altura, :cabelo, :personalidade,
                :detalhes, :atributo_1, :atributo_2, :atributo_3, :atributo_4, :atributo_5, :atributo_6,
                :v_atributo_1, :v_atributo_2, :v_atributo_3, :v_atributo_4, :v_atributo_5, :v_atributo_6,
                :recurso_1, :recurso_2, :recurso_3, :recurso_4, :v_recurso_1, :v_recurso_2, :v_recurso_3,
                :v_recurso_4, :historia, :imagem
            );
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->execute();

        return $this;
    }
}