<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {
		$this->render('index');
	}

	public function works(){
		$video = Container::getModel('Video');
		$videos = $video->getAll();
		$this->view->videos = $videos;
		$this->render('works', 'layout2');
	}

	public function contact(){
		$this->render('contact', 'layout2');
	}

	public function video(){
		$this->render('video', 'layout2');
	}

	public function login(){
		$this->render('login', 'layout3');
	}

}


?>