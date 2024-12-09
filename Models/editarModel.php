<?php
require_once 'conexion.php';

class EditarModel {
    private $conexion;
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    private $user_ID;
    private $region_ID;
    private $genero_ID;
    private $nombre;
    private $apellido;
    private $edad;
    private $email;
    private $user_password;
    private $rol_ID;
    private $estado;

    public function setUser_ID($user_ID) {
        $this->user_ID = $user_ID;
    }

    public function setRegion_ID($region_ID) {
        $this->region_ID = $region_ID;
    }

    public function setGenero_ID($genero_ID) {
        $this->genero_ID = $genero_ID;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setUser_Password($user_password) {
        $this->user_password = $user_password;
    }

    public function setRol_ID($rol_ID) {
        $this->rol_ID = $rol_ID;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getRegion_ID() {
        return $this->region_ID;
    }

    public function actualizar(){
        $query="CALL actualizarUser(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(1, $this->user_ID, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->region_ID, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->genero_ID, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->nombre, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->apellido, PDO::PARAM_STR);
        $stmt->bindValue(6, $this->edad, PDO::PARAM_INT);
        $stmt->bindValue(7, $this->email, PDO::PARAM_STR);
        $stmt->bindValue(8, $this->user_password, PDO::PARAM_STR);
        $stmt->bindValue(9, $this->rol_ID, PDO::PARAM_STR);
        $stmt->bindValue(10, $this->estado, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error al actualizar los datos");
        }
    }

}


