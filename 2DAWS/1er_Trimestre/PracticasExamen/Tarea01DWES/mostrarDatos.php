<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Datos</title>
</head>
<body>
    <?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPass = '';
    $dbName = 'datos';
    @$conexion = new mysqli($dbHost, $dbUsername, $dbPass, $dbName);

    $link = mysqli_connect($dbHost, $dbUsername, $dbPass);
    $dbSelect = mysqli_select_db($link, $dbName);
    if (!$dbSelect) {
        echo "<h1>Su tabla no está creada correctamente</h1>";
    } else {
        if (empty($_POST['agregarAlta'])) {
            require_once './functions.php';
            añadirAlta($conexion);
        }
    }

    require_once './functions.php';
    mostrarTablaAltas($conexion);

    $conexion->close();
    ?>
</body>
</html>