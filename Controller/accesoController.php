<?php 
require_once __DIR__.'../../Config/global.php';

class Acceder {
    public function acceso(){
        header("Location: ".BASE_URL."Views/Home/login.php");
    }
}
$acceso = new Acceder();
$acceso->acceso();