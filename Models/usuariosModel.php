<?php 
require_once 'conexion.php';

class ObtenerUsuarios{
    private $conexion;
    
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    public function obtenerUsuarios() {
        $usuarios = [];
        $query = "CALL obtenerUsuarios()";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $usuarios[] = [
                    'user_ID' => $row['user_ID'],
                    'region_ID'=> $row['region_ID'],
                    'genero_ID'=> $row['genero_ID'],
                    'region' => $row['region'],
                    'genero' => $row['genero'],
                    'nombre' => $row['nombre'],
                    'apellido' => $row['apellido'],
                    'edad' => $row['edad'],
                    'email' => $row['email'],
                    'user_password' => $row['user_password'],
                    'rol' => $row['rol'],
                    'estado' => $row['estado']
                ];
            }
        }
        return $usuarios;
    }
}