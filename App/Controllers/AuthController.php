<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {
    
    public function auth() {
        //Inicia a sessão
        session_start();

        //Instancia do Model Usuario
        $user = Container::getModel('Usuario');
        //Atribuindo valores as variaveis email e senha do Model Usuario
        $user->__set('email', $_POST['email']);
        $user->__set('senha', md5($_POST[ 'password']));
        //Chamando o medoto de autentificação dentro do Model Usuario
        $user->auth();

        //vericando se existe algum retorno da consulta no bd, caso exista, redirecione para a apagina do app, caso não exista, redirecione para a pagina de login com mensagem de erro.
        if (!empty($user->__get('id')) && !empty($user->__get('nome'))) {
            $_SESSION['id'] = $user->__get('id');
            $_SESSION['name'] = $user->__get('nome');
            $_SESSION['email'] = $user->__get('email');
            header('Location: /app');
        } else {
            header('Location:login?error=2');    
        }
         
    }
}