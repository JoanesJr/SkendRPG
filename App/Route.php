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

		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'IndexController',
			'action' => 'registrar'
		);

		$routes['registrar_usuario'] = array(
			'route' => '/registrar_usuario',
			'controller' => 'IndexController',
			'action' => 'registrarUsuario'
		);

		$routes['login_usuario'] = array(
			'route' => '/login_usuario',
			'controller' => 'IndexController',
			'action' => 'loginUsuario'
		);

		$this->setRoutes($routes);
	}

}

?>