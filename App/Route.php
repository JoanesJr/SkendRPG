<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		/*  DEFINE AS URLS AMIGAVEIS por meios de arrays
			Campo Route: define a rota.
			Campo Controller: Define o controller que será disparado.
			Campo action: Define o metodo que sera disparado dentro do controller.
			$route['exemplo'] = array(
				'route' => '/exemplo';
				'controller' => 'ExemploController',
				'action' => 'Exemplo';
			);
		*/

		//ROTAS HOME
		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['login'] = array(
			'route' => '/login',
			'controller' => 'IndexController',
			'action' => 'login'
		);

		$routes['user_login'] = array(
			'route' => '/user_login',
			'controller' => 'AuthController',
			'action' => 'auth'
		);

		$routes['register'] = array(
			'route' => '/register',
			'controller' => 'IndexController',
			'action' => 'register'
		);

		$routes['user_register'] = array(
			'route' => '/user_register',
			'controller' => 'IndexController',
			'action' => 'userRegister'
		);

		//ROTAS APP
		$routes['app'] = array(
			'route' => '/app',
			'controller' => 'AppController',
			'action' => 'index'
		);

		$routes['logoff'] = array(
			'route' => '/logoff',
			'controller' => 'AppController',
			'action' => 'logoff'
		);

		$routes['profile'] = array(
			'route' => '/profile',
			'controller' => 'AppController',
			'action' => 'profile'
		);

		$routes['edit'] = array(
			'route' => '/user_edit',
			'controller' => 'ProfileController',
			'action' => 'userEdit'
		);

		$this->setRoutes($routes);
	}

}

?>