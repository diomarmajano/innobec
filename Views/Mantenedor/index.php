<?php
require_once __DIR__ . '../../../Config/global.php';
session_start();
if(!$_SESSION['token']){
    header("Location:". BASE_URL."Views/Home/login.php"); 
        exit;
}
require_once __DIR__ . '../../../Models/usuariosModel.php';

$obtenerUsuarios = new ObtenerUsuarios($conexion);
$usuarios = $obtenerUsuarios->obtenerUsuarios();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/Resources/css/mantenedor.css">
    <title>Mantenedor de usuarios</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li> <a href="registro.php"> Registro de usuarios</a></li>
                <li> <a href="<?php echo BASE_URL?>Controller/sesionController.php"> Cerrar sesion</a></li>
            </ul>
        </nav>
    </header>
    <h1> Mantenedor de usuarios </h1>

    <table id="usuarios" class="tableusuarios">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Password</th>
                <th>Genero</th>
                <th>Region</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Desactivar</th>
            </tr>
        </thead>
        <?php
        foreach ($usuarios as $usuario) {
        ?>
            <tr>
                <td>
                    <?php echo $usuario['nombre']; ?>
                </td>
                <td>
                    <?php echo $usuario['apellido']; ?>
                </td>
                <td>
                    <?php echo $usuario['edad']; ?>
                </td>
                <td>
                    <?php echo $usuario['email']; ?>
                </td>
                <td class="password">
                    <?php echo $usuario['user_password']; ?>
                </td>
                <td>
                    <?php echo $usuario['genero']; ?>
                </td>
                <td>
                    <?php echo $usuario['region']; ?>
                </td>
                <td>
                    <?php echo $usuario['rol']; ?>
                </td>
                <td class="<?php echo ($usuario['estado'] == 1) ? "Activo" : "Inactivo"; ?>">
                    <?php echo ($usuario['estado'] == 1) ? "Activo" : "Inactivo"; ?>
                </td>
                <td>
                    <form action="editarUsuario.php" method="POST">
                        <input type="hidden" name="usuario" value="<?php echo htmlspecialchars(serialize($usuario)); ?>">
                        <input type="hidden" name="user_ID" value="<?php echo $usuario['user_ID']; ?>">
                        <button type="submit">Editar</button>
                    </form>
                </td>
                <td>
                    <form action="<?php echo BASE_URL ?>Controller/desactivarController.php" method="POST">
                        <input type="hidden" name="user_ID" value="<?php echo $usuario['user_ID']; ?>">
                        <input type="hidden" name="estado_user" value="<?php echo ($usuario['estado'] == 1) ? 0 : 1; ?>">
                        <button type="submit"><?php echo ($usuario['estado'] == 1) ? "Desabilitar" : "Habilitar"; ?></button>
                    </form>
                </td>

            <?php
        }
            ?>
</body>

</html>