<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {
    
    //metodo index, apenas redireciona para a pagina inicial do app
    public function index() {
        $this->validateLogin();
        $user = Container::getModel('Usuario');
        $user->__set('id', $_SESSION['id']);
        $this->view->user = $user->getUser();

        $this->render('index', 'home');
    }

     //metodo de logoff, simplesmente destroi a sessão e redireiciona para o home d aaplicação
     public function logoff() {
        session_start();
        session_destroy();

        header('Location: /');
    }

    public function profile() {
        $this->validateLogin();
        $user = Container::getModel('Usuario');
        $user->__set('id', $_SESSION['id']);
        $this->view->user = $user->getUser();

        $this->render('profile', 'home');
    }

    //terá em todas as paginas do app, basicamente, verifica se o usuario esta logado, caso não esteja, redireciona para a pagina inicial de login
    public function validateLogin() {
        session_start();

        if (empty($_SESSION['id']) && empty($_SESSION['nome'])) {
            header('Location: /login?error=3');
        }

        return true;
    }
}