<?php
session_start();
require_once dirname(__DIR__) . '/Config/global.php';
require_once dirname(__DIR__ ). '/Models/loginModel.php';

class Login
{
    private $loginModel;

    public function __construct($conexion)
    {
        $this->loginModel = new LoginModel($conexion);
    }
    public function LoginAccess()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["email"]) && isset($_POST["password"])) {
                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
                {

                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    $this->loginModel->setEmail($email);
                    $resultado = $this->loginModel->verificar();

                    if ($resultado) {
                        if (password_verify($password, $resultado['user_password']) && $resultado['estado'] == 1) {
                            $token = bin2hex(random_bytes(32));
                            $_SESSION['token'] = $token;
                            header("Location: " . BASE_URL . "Views/Mantenedor/index.php");
                            exit();
                        } else if (password_verify($password, $resultado['user_password']) && $resultado['estado'] == 0) {
                            echo '<script type="text/javascript">
                                    alert("tu cuenta está desactivada.");
                                    window.location.href = "' . BASE_URL . 'Views/Home/login.php";
                                </script>';
                            exit();
                        } else if (!password_verify($password, $resultado['user_password'])) {
                            echo '<script type="text/javascript">
                                alert("Contraseña incorrecta");
                                window.location.href = "' . BASE_URL . 'Views/Home/login.php";
                              </script>';
                            exit();
                        }
                    } else {
                        echo '<script type="text/javascript">
                            alert("Contraseña incorrecta");
                            window.location.href = "' . BASE_URL . 'Views/Home/login.php";
                           </script>';
                        exit();
                    }
                }
                else {
                    echo '<script type="text/javascript">
                                alert("El formato del Email es invalido");
                                window.location.href = "' . BASE_URL . 'Views/Home/login.php";
                               </script>';
                    exit();
            } 
            }
        }
    }
}
$validate = new Login($conexion);
$validate->LoginAccess();
