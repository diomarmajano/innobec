<?php 
require_once __DIR__.'../../../Config/global.php';
require_once __DIR__.'../../../Models/regionesModel.php';
require_once __DIR__.'../../../Models/generosModel.php';

session_start();
if(!$_SESSION['token']){
    header("Location:". BASE_URL."Home/login.php"); 
        exit;
}
$obtenerRegiones = new ObtenerRegiones($conexion);
$regiones = $obtenerRegiones->obtenerRegiones();

$obtenerGeneros = new ObtenerGeneros($conexion);
$generos = $obtenerGeneros->obtenerGeneros();

$obtenerRoles = new ObtenerRoles($conexion);
$roles = $obtenerRoles->obtenerRoles();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/Resources/css/registro.css">
    <script src="<?php echo BASE_URL ?>Resources/js/validacionesFront.js" defer></script>
    <title>Registro</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="<?php echo BASE_URL?>Views/Mantenedor/index.php">Inicio</a></li>
        </ul>
    </nav>
    </header>
<h1>Registro de usuarios</h1>
<form class="form" method="POST" action="<?php echo BASE_URL?>Controller/registroController.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido">

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="user_password">Contraseña:</label>
        <input type="password" id="password" name="user_password" required>

        <label for="region_ID">Región:</label>
        <select id="region" name="region" required>
        <?php foreach ($regiones as $region): ?>
            <option value="<?php echo $region['region_ID']; ?>"><?php echo $region['nombre_region']; ?></option>
        <?php endforeach; ?>
        </select>

        <label for="genero_ID">Género:</label>
        <select id="genero" name="genero" required>
        <?php foreach ($generos as $genero): ?>
            <option value="<?php echo $genero['genero_ID']; ?>"><?php echo $genero['nombre_genero']; ?></option>
        <?php endforeach; ?>
        </select>

        <label for="rol_ID">Rol asignado</label>
        <select id="rol_ID" name="rol_ID" required>
        <?php foreach ($roles as $rol): ?>
            <option value="<?php echo $rol['rol_ID']; ?>"><?php echo $rol['nombre_rol']; ?></option>
        <?php endforeach; ?>
        </select>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>