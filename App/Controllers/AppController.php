<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

	public function painel() {
        session_start();
        if ($_SESSION['id'] != '') {
            $this->render('painel', 'layout3');
        }else{
            header('Location: /login?auth=erro');
        }
	}

    public function postar(){
        session_start();
        if ($_SESSION['id'] != '') {
            if ($_FILES['videoThumb']['error'] === UPLOAD_ERR_OK) {
                $video_name = $_FILES['videoThumb']['name'];
                $video_tmp = $_FILES['videoThumb']['tmp_name'];
                $unique_name = uniqid().''.$video_name;
                $destino = "images/videos/".$unique_name;
                move_uploaded_file($video_tmp, $destino);

                $video = Container::getModel('Video');
                $video->setTitulo($_POST['titulo']);
                $video->setThumbnail($destino);
                $video->setLink($_POST['link']);
                $video->setTipoVideo($_POST['tipoVideo']);
                $video->publicar();

                echo $destino;
            }
        }else{
            header('Location: /login?auth=erro');
        }
    }

    

	

}


?>