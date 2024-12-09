<?php
$url= "http://localhost/innobec/";

define("BASE_URL", $url);
define('DB_HOST', 'localhost');
define('DB_NAME', 'innobec');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

try {
    $conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}