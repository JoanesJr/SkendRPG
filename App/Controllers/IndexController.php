<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {

		$this->render('index');
	}

	public function login() {
		$this->render('login');
	}

	public function register() {
		$this->render('register');
	}

	public function userLogin() {

	}

	public function userRegister() {
		
	}

}


?>