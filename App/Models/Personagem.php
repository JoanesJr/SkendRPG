<?php

namespace App\Models;
use MF\Model\Model;

class Personagem extends model {
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
    private $nome_recurso_4;
    private $valor_recurso_1;
    private $valor_recurso_2;
    private $valor_recurso_3;
    private $valor_recurso_4;
    private $historia;
    private $imagem;
    private $nivel;
    private $experiencia;

    public function __get($atr) {
        return $this->$atr;
    }

    public function __set($atr, $value) {
        $this->$atr = $value;
    }

    public function save() {
        $query = 
        "
            INSERT INTO Personagem
                (
                    id_usuario, nome, classe, idade, vida, energia, ca, altura, cabelo, personalidade, detalhes, nome_atributo_1, nome_atributo_2, nome_atributo_3, nome_atributo_4, nome_atributo_5, nome_atributo_6, valor_atributo_1, valor_atributo_2, valor_atributo_3, valor_atributo_4, valor_atributo_5, valor_atributo_6, nome_recurso_1, nome_recurso_2, nome_recurso_3, nome_recurso_4, valor_recurso_1, valor_recurso_2, valor_recurso_3, valor_recurso_4, historia, imagem, nivel, experiencia
                )
            VALUES 
            (
                :id_usuario, :nome, :classe, :idade, :vida, :energia, :ca, :altura, :cabelo, :personalidade, :detalhes, :nome_atributo_1, :nome_atributo_2, :nome_atributo_3, :nome_atributo_4, :nome_atributo_5, :nome_atributo_6, :valor_atributo_1, :valor_atributo_2, :valor_atributo_3, :valor_atributo_4, :valor_atributo_5, :valor_atributo_6, :nome_recurso_1, :nome_recurso_2, :nome_recurso_3, :nome_recurso_4, :valor_recurso_1, :valor_recurso_2, :valor_recurso_3, :valor_recurso_4, :historia, :imagem, :nivel, :experiencia
            );
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':classe', $this->__get('classe'));
        $stmt->bindValue(':idade', $this->__get('idade'));
        $stmt->bindValue(':vida', $this->__get('vida'));
        $stmt->bindValue(':energia', $this->__get('energia'));
        $stmt->bindValue(':ca', $this->__get('ca'));
        $stmt->bindValue(':altura', $this->__get('altura'));
        $stmt->bindValue(':cabelo', $this->__get('cabelo'));
        $stmt->bindValue(':personalidade', $this->__get('personalidade'));
        $stmt->bindValue(':detalhes', $this->__get('detalhes'));
        $stmt->bindValue(':nome_atributo_1', $this->__get('nome_atributo_1'));
        $stmt->bindValue(':nome_atributo_2', $this->__get('nome_atributo_2'));
        $stmt->bindValue(':nome_atributo_3', $this->__get('nome_atributo_3'));
        $stmt->bindValue(':nome_atributo_4', $this->__get('nome_atributo_4'));
        $stmt->bindValue(':nome_atributo_5', $this->__get('nome_atributo_5'));
        $stmt->bindValue(':nome_atributo_6', $this->__get('nome_atributo_6'));
        $stmt->bindValue(':valor_atributo_1', $this->__get('valor_atributo_1'));
        $stmt->bindValue(':valor_atributo_2', $this->__get('valor_atributo_2'));
        $stmt->bindValue(':valor_atributo_3', $this->__get('valor_atributo_3'));
        $stmt->bindValue(':valor_atributo_4', $this->__get('valor_atributo_4'));
        $stmt->bindValue(':valor_atributo_5', $this->__get('valor_atributo_5'));
        $stmt->bindValue(':valor_atributo_6', $this->__get('valor_atributo_6'));
        $stmt->bindValue(':nome_recurso_1', $this->__get('nome_recurso_1'));
        $stmt->bindValue(':nome_recurso_2', $this->__get('nome_recurso_2'));
        $stmt->bindValue(':nome_recurso_3', $this->__get('nome_recurso_3'));
        $stmt->bindValue(':nome_recurso_4', $this->__get('nome_recurso_4'));
        $stmt->bindValue(':valor_recurso_1', $this->__get('valor_recurso_1'));
        $stmt->bindValue(':valor_recurso_2', $this->__get('nome_atributo_2'));
        $stmt->bindValue(':valor_recurso_3', $this->__get('valor_recurso_3'));
        $stmt->bindValue(':valor_recurso_4', $this->__get('valor_recurso_4'));
        $stmt->bindValue(':historia', $this->__get('historia'));
        $stmt->bindValue(':imagem', $this->__get('imagem'));
        $stmt->bindValue(':nivel', $this->__get('nivel'));
        $stmt->bindValue(':experiencia', $this->__get('experiencia'));
        $stmt->execute();

        return $this;
    }

    public function edit() {
        $query = 
        "
            UPDATE 
                Personagem
            SET
                id_usuario = :id_usuario, nome = :nome, classe = :classe, idade = :idade, vida = :vida, energia = :energia, ca = :ca, altura = :altura, cabelo = :cabelo, personalidade = :personalidade, detalhes = :detalhes, nome_atributo_1 = :nome_atributo_1, nome_atributo_2 = :nome_atributo_2, nome_atributo_3 = :nome_atributo_3, nome_atributo_4 = :nome_atributo_4, nome_atributo_5 = :nome_atributo_5, nome_atributo_6 = :nome_atributo_6, valor_atributo_1 = :valor_atributo_1, valor_atributo_2 = :valor_atributo_2, valor_atributo_3 = :valor_atributo_3, valor_atributo_4 = :valor_atributo_4, valor_atributo_5 = :valor_atributo_5, valor_atributo_6 = :valor_atributo_6, nome_recurso_1 = :nome_recurso_1, nome_recurso_2 = :nome_recurso_2, nome_recurso_3 = :nome_recurso_3, nome_recurso_4 = :nome_recurso_4, valor_recurso_1 = :valor_recurso_1, valor_recurso_2 = :valor_recurso_2, valor_recurso_3 = :valor_recurso_3, valor_recurso_4 = :valor_recurso_4, historia = :historia, imagem = :imagem, nivel = :nivel, experiencia = :experiencia
            WHERE
                id = :id
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':classe', $this->__get('classe'));
        $stmt->bindValue(':idade', $this->__get('idade'));
        $stmt->bindValue(':vida', $this->__get('vida'));
        $stmt->bindValue(':energia', $this->__get('energia'));
        $stmt->bindValue(':ca', $this->__get('ca'));
        $stmt->bindValue(':altura', $this->__get('altura'));
        $stmt->bindValue(':cabelo', $this->__get('cabelo'));
        $stmt->bindValue(':personalidade', $this->__get('personalidade'));
        $stmt->bindValue(':detalhes', $this->__get('detalhes'));
        $stmt->bindValue(':nome_atributo_1', $this->__get('nome_atributo_1'));
        $stmt->bindValue(':nome_atributo_2', $this->__get('nome_atributo_2'));
        $stmt->bindValue(':nome_atributo_3', $this->__get('nome_atributo_3'));
        $stmt->bindValue(':nome_atributo_4', $this->__get('nome_atributo_4'));
        $stmt->bindValue(':nome_atributo_5', $this->__get('nome_atributo_5'));
        $stmt->bindValue(':nome_atributo_6', $this->__get('nome_atributo_6'));
        $stmt->bindValue(':valor_atributo_1', $this->__get('valor_atributo_1'));
        $stmt->bindValue(':valor_atributo_2', $this->__get('valor_atributo_2'));
        $stmt->bindValue(':valor_atributo_3', $this->__get('valor_atributo_3'));
        $stmt->bindValue(':valor_atributo_4', $this->__get('valor_atributo_4'));
        $stmt->bindValue(':valor_atributo_5', $this->__get('valor_atributo_5'));
        $stmt->bindValue(':valor_atributo_6', $this->__get('valor_atributo_6'));
        $stmt->bindValue(':nome_recurso_1', $this->__get('nome_recurso_1'));
        $stmt->bindValue(':nome_recurso_2', $this->__get('nome_recurso_2'));
        $stmt->bindValue(':nome_recurso_3', $this->__get('nome_recurso_3'));
        $stmt->bindValue(':nome_recurso_4', $this->__get('nome_recurso_4'));
        $stmt->bindValue(':valor_recurso_1', $this->__get('valor_recurso_1'));
        $stmt->bindValue(':valor_recurso_2', $this->__get('nome_atributo_2'));
        $stmt->bindValue(':valor_recurso_3', $this->__get('valor_recurso_3'));
        $stmt->bindValue(':valor_recurso_4', $this->__get('valor_recurso_4'));
        $stmt->bindValue(':historia', $this->__get('historia'));
        $stmt->bindValue(':imagem', $this->__get('imagem'));
        $stmt->bindValue(':nivel', $this->__get('nivel'));
        $stmt->bindValue(':experiencia', $this->__get('experiencia'));
        $stmt->execute();

        return $this;
    }

    public function delete() {
        $query = 
                "
                    DELETE FROM Personagem WHERE id = :id;
                ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $this;
    }

    public function getAll() {
        $query =   
            "
                SELECT * FROM Personagem WHERE id_usuario = :id_usuario;
            ";
        
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getNumberCharacter() {
        $query = 
                "
                    SELECT count(*) as numberCharacter FROM Personagem WHERE id_usuario = :id_usuario;
                ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getCharacter() {
        $query =   
            "
                SELECT * FROM Personagem WHERE id = :id;
            ";
        
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $this->__get('id'));
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_OBJ);
    }
}
