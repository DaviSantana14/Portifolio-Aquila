<?php 
namespace App\Models;

use Exception;
use MF\Model\Model;

class Video extends Model{
    private $id;
    private $titulo;
    private $tipoVideo;
    private $link;
    private $thumbnail;

    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    // Getter e Setter para $tipoVideo
    public function getTipoVideo() {
        return $this->tipoVideo;
    }
    
    public function setTipoVideo($tipoVideo) {
        $this->tipoVideo = $tipoVideo;
    }
    
    // Getter e Setter para $link
    public function getLink() {
        return $this->link;
    }
    
    public function setLink($link) {
        $this->link = $link;
    }
    
    // Getter e Setter para $thumbnail
    public function getThumbnail() {
        return $this->thumbnail;
    }
    
    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
    }


    public function publicar(){
        $query = "insert into videos(titulo, tipo_video, link, caminho_thumb) values (:titulo, :tipo_video, :link, :caminho_thumb);";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':titulo', $this->getTitulo());
        $stmt->bindValue(':tipo_video', $this->getTipoVideo());
        $stmt->bindValue(':link', $this->getLink());
        $stmt->bindValue(':caminho_thumb', $this->getThumbnail());
        $stmt->execute();
    }

    public function getAll(){
        $query = 'select id, titulo, tipo_video, link, caminho_thumb from videos;';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
?>