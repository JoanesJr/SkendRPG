<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class CharacterController extends Action {

    public function index() {
        $user = Container::getModel('Usuario');
        $user->__set('id', $_SESSION['id']);
        $this->view->user = $user->getUser();
        $this->render('index', 'home');
    }
}