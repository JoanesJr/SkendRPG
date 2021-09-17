<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

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

		$routes['user_login'] = array(
			'route' => '/user_login',
			'controller' => 'IndexController',
			'action' => 'userLogin'
		);

		$this->setRoutes($routes);
	}

}

?>