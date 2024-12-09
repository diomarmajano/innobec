<?php
require_once __DIR__ .'../../Models/conexion.php';

class ObtenerRegiones {
    private $conexion;
    
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerRegiones() {
        $regiones = [];
        $query = "CALL obtenerRegiones()";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $regiones[] = [
                    'region_ID' => $row['region_ID'],
                    'nombre_region' => $row['nombre_region']
                ];
            }
        }
        return $regiones;
    }
}
?>
