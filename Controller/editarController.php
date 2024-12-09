<?php 
require_once __DIR__.'../../Config/global.php';
require_once __DIR__.'../../Models/editarModel.php';

class Editar {
    private $editarModel;

    public function __construct($conexion) {
        $this->editarModel = new editarModel($conexion);
    } 

    public function registrarDatos(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                if (isset($_POST['region']) 
                    && isset($_POST['genero'])
                    && isset($_POST['nombre'])
                    && isset($_POST['apellido']) 
                    && isset($_POST['edad'])
                    && isset($_POST['email'])
                    && isset($_POST['user_password'])) 
                {
                    $user_ID= $_POST['user_ID'];
                    $region_ID = $_POST['region']; 
                    $genero_ID = $_POST['genero'];
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido']; 
                    $edad = $_POST['edad'];
                    $email = $_POST['email'];
                    $password = password_hash($_POST['user_password'], PASSWORD_BCRYPT); 
                    $rol_ID = $_POST["rol_ID"] ;
                    $estado = $_POST["estado"];

                    $this->editarModel->setUser_ID($user_ID);
                    $this->editarModel->setRegion_ID($region_ID);
                    $this->editarModel->setGenero_ID($genero_ID);
                    $this->editarModel->setNombre($nombre);
                    $this->editarModel->setApellido($apellido);
                    $this->editarModel->setEdad($edad);
                    $this->editarModel->setEmail($email);
                    $this->editarModel->setUser_Password($password);
                    $this->editarModel->setRol_ID($rol_ID);
                    $this->editarModel->setEstado($estado);

                    if ($this->editarModel->actualizar()) {
                        header("Location: ".BASE_URL."Views/Mantenedor/index.php");
                        exit(); 
                    } 
                    else{
                        header("Location: ".BASE_URL."Views/Mantenedor/error.php");
                        exit(); 
                    }
                }
            }
        }
    }
$editar = new Editar($conexion);
$editar->registrarDatos();