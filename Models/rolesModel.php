<?php
require_once 'conexion.php';

class ObtenerRoles {
    private $conexion;
    
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerRoles() {
        $roles = [];
        $query = "CALL obtenerRoles()";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $roles[] = [
                    'rol_ID' => $row['rol_ID'],
                    'nombre_rol' => $row['nombre_rol']
                ];
            }
        }
        return $roles;
    }
}
?>
