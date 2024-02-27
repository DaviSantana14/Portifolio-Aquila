<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {

	public function auth() {
        session_start();
        $usuario = Container::getModel('Usuario');
        $usuario->setUsername($_POST['username']);
        $usuario->setPassword($_POST['password']);
        $usuario->signin();
        print_r($usuario);
        if (!empty($usuario->getId())) {
            $_SESSION['id'] = $usuario->getId();
            header('Location: /painel');
        }
	}

	

}


?>