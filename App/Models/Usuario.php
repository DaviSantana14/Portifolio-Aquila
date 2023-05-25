<?php 
namespace App\Models;

use Exception;
use MF\Model\Model;

class Usuario extends Model{
    private $id;
    private $username;
    private $password;


    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($senha) {
        $this->password = $senha;
    }
    
    public function signin()
    {
        $query = "select id from usuario where username = :username and senha = :password";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $this->getUsername());
        $stmt->bindValue('password', $this->getPassword());
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
            $this->setId($usuario['id']);
        }else{
            header('Location: /login?signin=erro');
        }
    }

}
?>