<?php

namespace App\Models;
use MF\Model\Model;

class Usuario extends model {
    //definição de atributos com os mesmo nomes das colunas do banco de dados a qual o Model se refere
    private $id;
    private $nome;
    private $senha;
    private $email;
    private $imagem;

    //metodo magico para recuperar valores dos atributos
    public function __get($atr) {
        return $this->$atr;
    }

    //metodo magico para inserir valores nos atributos
    public function __set($atr, $value) {
        $this->$atr = $value;
    }

    //metodo para inserir um novo usuario no banco de dados
    public function save() {
        //variavel com codigo SQL
        $query = 
        "
            INSERT INTO Usuario
                (nome, senha, email)
            VALUES
                (:nome, :senha, :email);
        ";

        //OBS: o ':algo' é apena suma referencia. Onde existir esses valores na query sera substituidos por outros valores no metodo bindValue.

        //prepara a query para evitar sql injection
        $stmt = $this->db->prepare($query);
        //bindValue. onde existe o ':algo', sera substituido pelo valor passado no segundo parametro.
        //bindValue($valor_que_sera_substituido, $valor_que_substituira)
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->bindValue(':email', $this->__get('email'));
        //executa a query no banco de dados
        $stmt->execute();

        return $this;
    }

    //metodo para editar os dados de um usuario do banco de dados
    public function edit() {
        $query = 
        "
            UPDATE
                Usuario
            SET
                nome = :nome, senha = :senha, email = :email, imagem = :imagem
            WHERE
                id = :id
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue('id', $this->__get('id'));
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->bindValue(':imagem', $this->__get('imagem'));
        $stmt->execute();

        return $this;
    }

    //metodo para apagar um usuario do banco de dados
    public function delete() {

    }

    //metodo para verificar se um usuario existe no banco de dados
    public function auth() {
        $query = 
        "
            SELECT 
                id, nome, email, senha
            FROM 
                Usuario
            WHERE 
                email = :email AND senha = :senha;
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->execute();

        /*
            $var->fetch || esse metodo retorna apenas um registro do banco de dados, 
            ele recebe como paramatro o modo que voce quer o retorno, alguns exemplos:
            $var->fetch(\PDO::FETCH_ASSOC) || retorna como array associativo.
            $var->fetch(\PDO::FETCH_OBJ) || retorna como objeto.

            sintaxe: $var->fetch(/PDO::MODO_DE_RETORNO)
        
        */
        $user =  $stmt->fetch(\PDO::FETCH_OBJ);

        if (!empty($user->id) && !empty($user->nome)) {
            $this->__set('id', $user->id);
            $this->__set('nome', $user->nome);
        }

        return $this;
    }

    //metodo que retorna apenas um usuario de acordo com o email.
    public function getEmailUser() {
        $query = 
        "
            SELECT
                email 
            FROM
                Usuario
            WHERE
                email = :email;
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    //metodo que retorna apenas um usuario de acordo com o id.
    public function getUser() {
        $query = 
        "
            SELECT
                id, nome, email, imagem 
            FROM
                Usuario
            WHERE
                id = :id;
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    //metodo que retorna todos os usuarios da tabela.
    public function getAll() {

    }
}