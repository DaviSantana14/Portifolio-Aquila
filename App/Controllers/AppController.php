<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{

    public function painel()
    {
        session_start();
        if ($_SESSION['id'] != '') {
            $this->render('painel', 'layout3');
        } else {
            header('Location: /login?auth=erro');
        }
    }

    public function painelVideos()
    {
        session_start();
        if ($_SESSION['id'] != '') {
            $video = Container::getModel('Video');
            $videos = $video->getAll();
            $this->view->videos = $videos;
            $this->render('painelVideos', 'layout3');
        } else {
            header('Location: /login?auth=erro');
        }
    }

    public function postar()
    {
        session_start();
        if ($_SESSION['id'] != '') {
            if ($_FILES['videoThumb']['error'] === UPLOAD_ERR_OK) {
                $video_tmp = $_FILES['videoThumb']['tmp_name'];
                $unique_name = uniqid();
                $destino = "images/videos/" . $unique_name;
                move_uploaded_file($video_tmp, $destino);
                $video = Container::getModel('Video');
                $video->setTitulo($_POST['titulo']);
                $video->setThumbnail($destino);
                $video->setLink($_POST['link']);
                $video->setTipoVideo($_POST['tipoVideo']);
                $video->publicar();
                header('Location: /painel?postagem=sucesso');
            }
        } else {
            header('Location: /login?auth=erro');
        }
    }

    public function editar()
    {
        session_start();
        if ($_SESSION['id'] != '') {
            if (isset($_GET['id'])) {
                $video = Container::getModel('Video');
                $videoRetornado = $video->getVideoId($_GET['id']);
                $this->view->videos = $videoRetornado;
                $this->render('editar', 'layout3');
            } else {
                header('Location: /painel');
            }
        } else {
            header('Location: /login?auth=erro');
        }
    }

    public function salvar(){
        session_start();
        if ($_SESSION['id'] != '') { 
            if (isset($_GET['id'])) {
                $video = Container::getModel('Video');
                if ($_FILES['videoThumb']['error'] === UPLOAD_ERR_OK) {
                    $videoRetornado = $video->getVideoId($_GET['id']);
                    $video_tmp = $_FILES['videoThumb']['tmp_name'];
                    $unique_name = uniqid();
                    $destino = $videoRetornado['caminho_thumb'];
                    move_uploaded_file($video_tmp, $destino);
                    $_POST['caminho_thumb'] = $destino;
                    $video->setTitulo($_POST['titulo']);
                    $video->setTipoVideo($_POST['tipoVideo']);
                    $video->setLink($_POST['link']);
                    $video->setThumbnail($_POST['caminho_thumb']);
                    $video->editar($_GET['id']);
                    header('Location: /painelVideos');
                    return;
                }
                $video->setTitulo($_POST['titulo']);
                $video->setTipoVideo($_POST['tipoVideo']);
                $video->setLink($_POST['link']);
                $video->editar($_GET['id']);
                header('Location: /painelVideos');
            }
        } else {
            header('Location: /login?auth=erro');
        }
    }

    public function excluir() {
        session_start();
        if($_SESSION['id'] != ''){
            if (isset($_GET['id'])) {
                $video = Container::getModel('Video');
                $video->excluir($_GET['id']);
                header('Location: /painelVideos');
            }
        }
    }
}
