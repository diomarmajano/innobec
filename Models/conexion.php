<?php
require_once __DIR__.'../../Config/global.php';

require_once __DIR__.'../../Models/registroModel.php';
require_once __DIR__.'../../Models/regionesModel.php';
require_once __DIR__.'../../Models/generosModel.php';
require_once __DIR__.'../../Models/LoginModel.php';
require_once __DIR__.'../../Models/rolesModel.php';
require_once __DIR__.'../../Models/usuariosModel.php';
require_once __DIR__.'../../Models/editarModel.php';
require_once __DIR__.'../../Models/desactivarModel.php';

$host = DB_HOST;
$dbname = DB_NAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<script>Error al conectar a la base de datos:</script>" . $e->getMessage();
    exit;
}

$registroModel= new RegistroModel($conexion);
$obtenerRegistro= new ObtenerRegiones($conexion);
$obtenerGeneros= new ObtenerGeneros($conexion);
$loginModel= new LoginModel($conexion);
$obtenerRoles= new ObtenerRoles($conexion);
$obtenerUsuarios= new ObtenerUsuarios($conexion);
$editarModel= new EditarModel($conexion);
$desactivarModel= new DesactivarModel($conexion);
