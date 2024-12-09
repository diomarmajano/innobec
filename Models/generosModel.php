<?php
require_once __DIR__ .'../../Models/conexion.php';

class ObtenerGeneros {
    private $conexion;
    
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerGeneros() {
        $generos = [];
        $query = "CALL obtenerGeneros()";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $generos[] = [
                    'genero_ID' => $row['genero_ID'],
                    'nombre_genero' => $row['nombre_genero']
                ];
            }
        }
        return $generos;
    }
}
?>
