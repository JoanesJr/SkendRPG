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

		//Character

		$routes['make_character'] = array(
			'route' => '/make_character',
			'controller' => 'CharacterController',
			'action' => 'index'
		);

		$routes['add_character'] = array(
			'route' => '/add_character',
			'controller' => 'CharacterController',
			'action' => 'createCharacter'
		);

		$routes['character'] = array(
			'route' => '/character',
			'controller' => 'CharacterController',
			'action' => 'view'
		);

		$routes['edit_character'] = array(
			'route' => '/edit_character',
			'controller' => 'CharacterController',
			'action' => 'editCharacter'
		);

		$routes['delete_character'] = array(
			'route' => '/delete_character',
			'controller' => 'CharacterController',
			'action' => 'deleteCharacter'
		);

		//Habilidades

		$routes['create_habilities'] = array(
			'route' => '/create_habilities',
			'controller' => 'CharacterController',
			'action' => 'createHabilities'
		);

		$routes['save_habilities'] = array(
			'route' => '/save_habilities',
			'controller' => 'CharacterController',
			'action' => 'saveHabilities'
		);

		$routes['delete_habilitie'] = array(
			'route' => '/delete_habilitie',
			'controller' => 'CharacterController',
			'action' => 'deleteHabilitie'
		);

		$routes['edit_habilitie'] = array(
			'route' => '/edit_habilitie',
			'controller' => 'CharacterController',
			'action' => 'editHabilitie'
		);

		$routes['update_habilities'] = array(
			'route' => '/update_habilities',
			'controller' => 'CharacterController',
			'action' => 'updateHabilitie'
		);

		//Itens
		$routes['create_item'] = array(
			'route' => '/create_item',
			'controller' => 'CharacterController',
			'action' => 'createItem'
		);

		$routes['save_item'] = array(
			'route' => '/save_item',
			'controller' => 'CharacterController',
			'action' => 'saveItem'
		);

		$routes['delete_item'] = array(
			'route' => '/delete_item',
			'controller' => 'CharacterController',
			'action' => 'deleteItem'
		);

		$routes['edit_item'] = array(
			'route' => '/edit_item',
			'controller' => 'CharacterController',
			'action' => 'editItem'
		);

		$routes['update_Item'] = array(
			'route' => '/update_item',
			'controller' => 'CharacterController',
			'action' => 'updateItem'
		);


		$this->setRoutes($routes);
	}

}

?>