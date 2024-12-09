<?php 
require_once 'conexion.php';

class LoginModel {
    private $conexion;
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    private $email;
    private $password;

    public function setEmail($email){
        $this->email= $email;
    }

    public function setPassword($password){
        $this->password= $password;
    }

    public function GetEmail(){
        return $this->email;
    }

    public function GetPassword(){
        return $this->password;
    }

    public function verificar(){
        $query="CALL verificarUsuario(?)";

        $stmt= $this->conexion->prepare($query);
        $stmt->bindValue(1, $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado;
        } else {
            return false;
        }
    } 
}