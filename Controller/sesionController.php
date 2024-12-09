<?php
require_once __DIR__.'../../Config/global.php';
session_start();
class CerrarSesion {

    public function cerrarSesion() {
        session_unset();
        session_destroy();
        header("Location: ".BASE_URL."Views/Home/index.php");
        exit();
    }
}
$cerrarSesion = new CerrarSesion();
$cerrarSesion->cerrarSesion();
?>
