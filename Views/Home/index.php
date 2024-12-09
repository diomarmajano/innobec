<?php 
require_once __DIR__.'../../../Config/global.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL?>/Resources/css/main.css">
    <title>Innobec</title>
</head>
<body>
    <div class="main">
        <form action="<?php echo BASE_URL?>Views/Home/login.php">
        <button type="submit"> Acceder </button>
         </form>
    </div>
</body>
</html>