<?php
require_once __DIR__ . '../../../Config/global.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/Resources/css/acceso.css">
    <title>Login</title>
</head>
<body>
    <div class="form-container">
        <div class="form-acceso">
            <h1>Acceso</h1>
            <form class="form" method="POST" action="<?php echo BASE_URL ?>Controller/loginController.php">
                <input type="text" name="email" placeholder="email">
                <br> <br>
                <input type="password" name="password" placeholder="password">
                <br> <br>
                <button type="submit">Acceder</button>
            </form>
        </div>
    </div>
</body>

</html>