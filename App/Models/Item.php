<?php

namespace App\Models;
use MF\Model\Model;



class Item extends model {
    private $id;
    private $id_personagem;
    private $nome;
    private $descricao;
    private $dano;
    private $ca;
    private $efeito;

    public function __set($atr, $value) {
        $this->$atr = $value;
    }

    public function __get($atr) {
        return $this->$atr;
    }

    public function salvar() {
        $sql = 
            "
                INSERT INTO item
                    (id_personagem, nome, descricao, dano, ca, efeito)
                VALUES 
                    (:id_personagem, :nome, :descricao, :dano, :ca, :efeito);
            ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_personagem', $this->__get('id_personagem'));
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':dano', $this->__get('dano'));
        $stmt->bindValue(':ca', $this->__get('ca'));
        $stmt->bindValue(':efeito', $this->__get('efeito'));
        $stmt->execute();

        return $this;
    }

    public function editar() {
        $sql = 
            "
                UPDATE 
                    item
                SET
                    nome = :nome, descricao = :descricao, dano = :dano, ca = :ca, efeito = :efeito
                WHERE
                    id= :id
            ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':dano', $this->__get('dano'));
        $stmt->bindValue(':ca', $this->__get('ca'));
        $stmt->bindValue(':efeito', $this->__get('efeito'));
        $stmt->execute();

        return $this;
    }

    public function excluir() {
        $sql = 
            "
                DELETE FROM item WHERE id = :id;
            ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $this;
    }

    public function getAll() {
        $sql = 
            "
                SELECT * FROM item;
            ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);;
    }

    public function getItemPersonagem() {
        $query = 
            "
                SELECT * FROM Item WHERE id_personagem = :id_personagem ORDER BY nome ASC;
            ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_personagem', $this->__get('id_personagem'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getItem() {
        $query = 
            "
                SELECT * FROM Item WHERE id= :id;
            ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
}