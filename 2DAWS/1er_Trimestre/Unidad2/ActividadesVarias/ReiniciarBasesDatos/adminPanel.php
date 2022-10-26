<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassWord = '';
    $dbName= 'mysql_employees';
    @$conexion = new mysqli($dbHost, $dbUsername, $dbPassWord, $dbName);

    $error = $conexion->connect_errno;

    if ($error != null) {
        // Si hay error al conectarme con la base de datos
        echo "<p>Error $error conectando a la base de datos: $dwes->connect_error</p>";
        exit();
    } else {
        // Si se pulsa el botón de reiniciar
        if (!empty($_GET['reiniciador'])) {
            exec('cd ./bbdd && C:\xampp\mysql\bin\mysql -u root < employees.sql');
            echo ('hola mundo');
        // Si no se muestra el botón de reiniciar
        } else {
    ?>
        <h1>Bienvenido al panel de administración</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        <input type="submit" name="reiniciador" value="Reiniciar"/>
        </form>
    <?php
        }
    }
    ?>
    
</body>
</html>
