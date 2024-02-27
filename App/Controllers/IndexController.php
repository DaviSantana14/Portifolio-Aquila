<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {
		$this->render('index');
		$this->view->exibe_video_youtube = false;
	}

	public function works(){
		$video = Container::getModel('Video');
		$videos = $video->getAll();
		$this->view->videos = $videos;
		$this->view->exibe_video_youtube = false;
		
		$this->render('works', 'layout2');
	}

	public function contact(){
		$this->render('contact', 'layout2');
		$this->view->exibe_video_youtube = false;
	}

	public function video(){
		if (isset($_GET['id'])) {
			$video = Container::getModel('Video');
			$videoRetornado = $video->getVideoId($_GET['id']);
			$this->view->videos = $videoRetornado;
			$this->view->exibe_video_youtube = true;
			$this->render('video', 'layout2');
		}else{
			header('Location: /works');
		}
	}

	public function login(){
		session_start();
		if (isset($_SESSION['id'])) {
			header('Location: /painel');
		}else{
			$this->render('login', 'layout3');
		}
	}

}


?>