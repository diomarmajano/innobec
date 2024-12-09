<?php 
require_once __DIR__.'../../Config/global.php';
require_once __DIR__.'../../Models/desactivarModel.php';

class Desactivar {
    private $desactivarModel;

    public function __construct($conexion) {
        $this->desactivarModel = new DesactivarModel($conexion);
    } 

    public function desactivar(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                if (isset($_POST['user_ID'])&& isset($_POST['estado_user'])) 
                {
                    $user_ID= $_POST['user_ID'];
                    $estado_user= $_POST['estado_user'];
                    $this->desactivarModel->setUser_ID($user_ID);
                    $this->desactivarModel->setEstado($estado_user);
                    if ($this->desactivarModel->desactivar()) {
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
$desactivar = new Desactivar($conexion);
$desactivar->desactivar();