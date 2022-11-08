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
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'world';
    $link = mysqli_connect($dbHost, $dbUser, $dbPass);
    $dbSelect = mysqli_select_db($link, $dbName);

    if (isset($_POST['crearDatabase'])) {
        // En caso de no estar creada la base de datos entrará aquí
        if (!$dbSelect) {
            exec('cd ./bbdd && C:\xampp\mysql\bin\mysql.exe -u root < world.sql', $output, $retval);
        } else {
            echo '<script>alert("La database ya estaba creada")</script>';
        }
    }

    if (isset($_POST['nuevoPais']) && isset($_POST['paisNuevo']) && isset($_POST['continentePais'])) {
        $nuevoNombrePais = $_POST['paisNuevo'];
        $continenteNuevoPais = $_POST['continentePais'];

        $query = "INSERT INTO country('Code', 'Name', 'Continent') VALUES ('".$nuevoNombrePais."', '".$nuevoNombrePais."', '".$continenteNuevoPais."')";
        $result = mysqli_query($conexion, $query);
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="submit" name="crearDatabase" value="Crear BBDD" />
        <input type="submit" name="crearPais" value="Crear Pais" />
        <input type="submit" name="verPaises" value="Ver Paises" />
        <input type="submit" name="actualizarPaises" value="Actualizar Paises" />
        <input type="submit" name="eliminarPaises" value="Eliminar Pais" />
    </form>

    <?php
    if (isset($_POST['crearPais']) && !empty($_POST['crearPais'])) {
    ?>

        <form method="POST" action="./crearPais.php">
            <input type="text" name="paisNuevo" value="Pais Nuevo" />
            <select name="continentePais">
                <option value="Asia">Asia</option>
                <option value="Ameria">America</option>
                <option value="Africa">Africa</option>
                <option value="Europa">Europa</option>
                <option value="Antartida">Antártida</option>
                <option value="Oceania">Oceania</option>
            </select>
            <input type="submit" name="nuevoPais" value="Añadir Pais" />
        </form>

    <?php
    } elseif (isset($_POST['verPaises']) && !empty($_POST['verPaises'])) {
        require_once './functions.php';
        verPaises($conexion);
    }
    ?>
</body>

</html>

Comprobar el insertar y ver el resto que nos queda, eliminar, update