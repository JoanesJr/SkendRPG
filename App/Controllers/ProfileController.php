<?php

namespace App\Controllers;

use MF\Model\Container;
use MF\Controller\Action;

class ProfileController extends Action {

    //metodo para editar as informações do usuário
    public function userEdit() {
        $this->validateLogin();
        $user = Container::getModel('Usuario');
        $user->__set('id', $_SESSION['id']);
        $name_validate = $this->nameValidate();
		$email_validate = $this->emailValidate();
		$password_validade = $this->passwordValidate();

		if(!empty($_FILES['image']['name'])) {
			$name_img = $this->nameImg('img_profile');
		}else {
			$userControlorImg = $user->getUSer();
			$name_img = $userControlorImg->imagem;
		}
		
		if ($name_validate && $email_validate && $password_validade) {
			$user->__set('nome', $_POST['name']);
			$user->__set('email', $_POST['email']);
			$user->__set('senha', md5($_POST['password']));
            $user->__set('imagem', $name_img);
			$user->edit();
			header('Location: /profile?success=1');
		} else {
            header('Location: /profile/error=4');
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
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && (empty($user->getEmailUser() || $user->getEmailUser() == $_SESSION['email']))) {
			return true;
		}

		return 'oi';
	}

	public function passwordValidate() {
		if (strlen($_POST['password']) > 5 && ctype_alnum($_POST['password']) ) {
			return true;
		}

		return false;
	}
}