<?php
require_once __DIR__ . '../../Config/global.php';
require_once __DIR__ . '../../Models/registroModel.php';

class Registro
{
    private $registroModel;

    public function __construct($conexion)
    {
        $this->registroModel = new RegistroModel($conexion);
    }

    public function registrar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                isset($_POST['region'])
                && isset($_POST['genero'])
                && isset($_POST['nombre'])
                && isset($_POST['apellido'])
                && isset($_POST['edad'])
                && isset($_POST['email'])
                && isset($_POST['user_password'])
            ) {
                $region_ID = $_POST['region'];
                $genero_ID = $_POST['genero'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $edad = $_POST['edad'];
                $email = $_POST['email'];
                $password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
                $rol_ID = $_POST["rol_ID"];
                $estado = 1;

                if (!filter_var($edad, FILTER_VALIDATE_INT)) {
                    echo '<script type="text/javascript">
                                    alert("EL campo edad, solo debe ser numerico");
                                    window.location.href = "' . BASE_URL . 'Views/Mantenedor/registro.php";
                                </script>';
                    exit();
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<script type="text/javascript">
                        alert("EL correo electronico no es valido");
                        window.location.href = "' . BASE_URL . 'Views/Mantenedor/registro.php";
                    </script>';
                    exit();
                }
                if (strlen($_POST['user_password']) < 6) {
                    echo '<script type="text/javascript">
                        alert("La contraseña debe tener por lo menos 6 caracteres");
                        window.location.href = "' . BASE_URL . 'Views/Mantenedor/registro.php";
                    </script>';
                    exit();
                }

                $this->registroModel->setRegion_ID($region_ID);
                $this->registroModel->setGenero_ID($genero_ID);
                $this->registroModel->setNombre($nombre);
                $this->registroModel->setApellido($apellido);
                $this->registroModel->setEdad($edad);
                $this->registroModel->setEmail($email);
                $this->registroModel->setUser_Password($password);
                $this->registroModel->setRol_ID($rol_ID);
                $this->registroModel->setEstado($estado);
                $ejecucion = $this->registroModel->registrar();
                if ($ejecucion) {
                    header("Location: " . BASE_URL . "Views/Mantenedor/index.php");
                    exit();
                } else {
                    echo '<script type="text/javascript">
                                    alert("Este correo ya esta registrado");
                                    window.location.href = "' . BASE_URL . 'Views/Mantenedor/registro.php";
                                </script>';
                    exit();
                }
            }
        }
    }
}
$registro = new Registro($conexion);
$registro->registrar();
