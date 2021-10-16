<?php

namespace App\Models;
use MF\Model\Model;

class Habilidade extends model {
    private $id;
    private $id_personagem;
    private $nome;
    private $descricao;
    private $efeito;
    private $dano;
    private $custo;
    private $cooldown;

    public function __set($atr, $value) {
        $this->$atr = $value;
    }

    public function __get($atr) {
        return $this->$atr;
    }

    public function salvar() {
        $query = 
        "
            INSERT INTO Habilidade
                (id_personagem, nome, descricao, efeito, dano, custo, cooldown)
            VALUES
                (:id_personagem, :nome, :descricao, :efeito, :dano, :custo, :cooldown);
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_personagem', $this->__get('id_personagem'));
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':efeito', $this->__get('efeito'));
        $stmt->bindValue(':dano', $this->__get('dano'));
        $stmt->bindValue(':custo', $this->__get('custo'));
        $stmt->bindValue(':cooldown', $this->__get('cooldown'));

        $stmt->execute();

        return $this;
    }

    public function editar() {
        $query = 
            "
                UPDATE 
                    Habilidade
                SET
                    nome = :nome, descricao = :descricao, efeito = :efeito, dano = :dano, custo =  :custo, cooldown = :cooldown
                WHERE
                        id = :id;
            ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':efeito', $this->__get('efeito'));
        $stmt->bindValue(':dano', $this->__get('dano'));
        $stmt->bindValue(':custo', $this->__get('custo'));
        $stmt->bindValue(':cooldown', $this->__get('cooldown'));

        $stmt->execute();

        return $this;
    }

    public function excluir() {
        $query = 
            "
                DELETE FROM Habilidade WHERE id = :id
            ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $this;
    }

    public function getAll() {
        $query = 
        "
            SELECT * FROM Habilidade ;
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getHabUser() {
        $query = 
            "
                SELECT * FROM Habilidade WHERE id_personagem = :id_personagem ORDER BY nome ASC;
            ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_personagem', $this->__get('id_personagem'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getUnicHabUser() {
        $query = 
            "
                SELECT * FROM Habilidade WHERE id = :id;
            ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
}