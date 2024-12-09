<?php
require_once __DIR__ .'../../Models/conexion.php';

class RegistroModel {
    private $conexion;
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    private $region_ID;
    private $genero_ID;
    private $nombre;
    private $apellido;
    private $edad;
    private $email;
    private $user_password;
    private $rol_ID;
    private $estado;


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

    public function getGenero_ID() {
        return $this->genero_ID;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUser_Password() {
        return $this->user_password;
    }

    public function getRol_ID() {
        return $this->rol_ID;
    }

    public function registrar(){
        $query="CALL saveUser(?, ?, ?, ?, ?, ?, ?, ?, ?, @p_resultado)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(1, $this->region_ID, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->genero_ID, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->nombre, PDO::PARAM_STR);
        $stmt->bindValue(4, $this->apellido, PDO::PARAM_STR);
        $stmt->bindValue(5, $this->edad, PDO::PARAM_INT);
        $stmt->bindValue(6, $this->email, PDO::PARAM_STR);
        $stmt->bindValue(7, $this->user_password, PDO::PARAM_STR);
        $stmt->bindVAlue(8, $this->rol_ID, PDO::PARAM_STR);
        $stmt->bindVAlue(9, $this->estado, PDO::PARAM_INT);
        $stmt->execute();

    $stmt = $this->conexion->query("SELECT @p_resultado AS resultado");
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC)['resultado'];
    if ($resultado == 1) {
        return true; 
    } else {
        return false;
    }
    }

}


