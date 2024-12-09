<?php
require_once 'conexion.php';

class DesactivarModel {
    private $conexion;
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    private $user_ID;
    private $estado;

    public function setUser_ID($user_ID) {
        $this->user_ID = $user_ID;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function desactivar(){
        $query="CALL desactivarUser(?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(1, $this->user_ID, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->estado, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error al desactivar");
        }
    }

}


