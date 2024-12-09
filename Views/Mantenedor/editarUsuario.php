<?php
require_once __DIR__ . '../../../Config/global.php';
session_start();
if (!$_SESSION['token']) {
    header("Location:" . BASE_URL . "Home/login.php");
    exit;
}
if (isset($_POST["usuario"])) {
    $usuario = unserialize($_POST['usuario']);
    $user_ID = $_POST["user_ID"];
}
require_once __DIR__ . '../../../Config/global.php';
require_once __DIR__ . '../../../Models/regionesModel.php';
require_once __DIR__ . '../../../Models/generosModel.php';

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
    <title>Editar registro</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="<?php echo BASE_URL ?>Views/Mantenedor/index.php">Inicio</a></li>
            </ul>
        </nav>
    </header>
    <h1>Editar usuario</h1>
    <form class="form" method="POST" action="<?php echo BASE_URL ?>Controller/editarController.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario["nombre"] ?>">

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $usuario["apellido"] ?>" required>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="<?php echo $usuario["edad"] ?>" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?php echo $usuario["email"] ?>" required>

        <label for="user_password">Contraseña:</label>
        <input type="text" id="password" name="user_password" placeholder="repetir contraseña, o ingrese nueva" required>

        <label for="region">Región:</label>
        <select id="region" name="region" required>
            <?php foreach ($regiones as $region): ?>
                <option value="<?php echo $region['region_ID']; ?>"
                    <?php if ($region['region_ID'] == $usuario['region_ID']) echo 'selected'; ?>>
                    <?php echo $region['nombre_region']; ?>
                </option>
            <?php endforeach; ?>
        </select>


        <label for="genero_ID">Género:</label>
        <select id="genero" name="genero" required>
            <?php foreach ($generos as $genero): ?>
                <option value="<?php echo $genero['genero_ID']; ?>"
                    <?php if ($genero['genero_ID'] == $usuario['genero_ID']) echo 'selected'; ?>>
                    <?php echo $genero['nombre_genero']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="rol_ID">Rol asignado</label>
        <select id="rol_ID" name="rol_ID" required>
            <?php foreach ($roles as $rol): ?>
                <option value="<?php echo $rol['rol_ID']; ?>"><?php echo $rol['nombre_rol']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="0" <?php if ($usuario['estado'] == 0) echo 'selected'; ?>>Inactivo</option>
            <option value="1" <?php if ($usuario['estado'] == 1) echo 'selected'; ?>>Activo</option>
        </select>

        <input type="submit" value="Guardar">
        <input type="hidden" name="user_ID" value="<?php echo $user_ID ?>">
    </form>
</body>

</html>