<?php

namespace MF\Controller;

abstract class Action {

	protected $view;

	public function __construct() {
		$this->view = new \stdClass();
	}

	protected function render($view, $layout = 'layout') {
		$this->view->page = $view;

		if(file_exists("../App/Views/".$layout.".phtml")) {
			require_once "../App/Views/".$layout.".phtml";
		} else {
			$this->content();
		}
	}

	protected function content() {
		$classAtual = get_class($this);

		$classAtual = str_replace('App\\Controllers\\', '', $classAtual);

		$classAtual = strtolower(str_replace('Controller', '', $classAtual));

		require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml";
	}

	protected function validateLogin() {
        session_start();

        if (empty($_SESSION['id']) && empty($_SESSION['nome'])) {
            header('Location: /login?error=3');
        }

        return true;
    }

	protected function nameImg($dir) {
        if (!empty($_FILES['image']['name'])) {
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
            $new_name = time().'.'.$extension;
            $directory = "img/{$dir}/";
            move_uploaded_file($_FILES['image']['tmp_name'], $directory.$new_name);
        }else {
            $new_name = 'anonymus.png';
        }

        return $new_name;
    }
}

?>