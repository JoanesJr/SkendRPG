<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {

		/*
			renderiza o arquivo index, dentro da pasta 'nome_inicial_controller', dentro da pasta Vews
			ex: IndexController | nome inicial = tudo antes de 'Controller", logo nome_inicial = 'Index'
			então vai dar um require do arquivo index.phtml dentro da pax index que esta dentro da pasta Views
		*/
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
		/* 
			Instanciando um model
			sintaxe = Container:getModel('nome_do_model')
		*/
		$user = Container::getModel('Usuario');
		$name_validate = $this->nameValidate();
		$email_validate = $this->emailValidate();
		$password_validade = $this->passwordValidate();
		
		if ($name_validate && $email_validate && $password_validade) {
			$user->__set('nome', $_POST['name']);
			$user->__set('email', $_POST['email']);
			$user->__set('senha', md5($_POST['password']));
			$user->save();
			header('Location: /login');
		} else {
			header('Location: /register?error=1');
		}
	}

	public function nameValidate() {
		if (strlen($_POST['name']) > 3 && !filter_var($_POST['name'], FILTER_SANITIZE_NUMBER_INT)) {
			return true;
		}

		return false;
	}

	public function emailValidate() {
		$user = Container::getModel('Usuario');
		$user->__set('email', $_POST['email']);
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && empty($user->getEmailUser())) {
			return true;
		}

		return false;
	}

	public function passwordValidate() {
		if (strlen($_POST['password']) > 5 && ctype_alnum($_POST['password']) ) {
			return true;
		}

		return false;
	}

}


?>