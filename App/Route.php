<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'IndexController',
			'action' => 'index'
		);

		$routes['works'] = array(
			'route' => '/works',
			'controller' => 'IndexController',
			'action' => 'works'
		);

		$routes['contact'] = array(
			'route' => '/contact',
			'controller' => 'IndexController',
			'action' => 'contact'
		);

		$routes['video'] = array(
			'route' => '/video',
			'controller' => 'IndexController',
			'action' => 'video'
		);

		$routes['login'] = array(
			'route' => '/login',
			'controller' => 'indexController',
			'action' => 'login'
		);

		$routes['auth'] = array(
			'route' => '/auth',
			'controller' => 'authController',
			'action' => 'auth'
		);

		$routes['painel'] = array(
			'route' => '/painel',
			'controller' => 'AppController',
			'action' => 'painel'
		);

		$routes['postar'] = array(
			'route' => '/postar',
			'controller' => 'AppController',
			'action' => 'postar'
		);



		$this->setRoutes($routes);
	}

}

?>