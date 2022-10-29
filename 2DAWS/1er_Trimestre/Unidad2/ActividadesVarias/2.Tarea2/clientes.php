<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassWord = '';
    $dbName = 'clientes';

    // Con esta sentencia vamos a comprobar si la BBDD está creada
    // En caso de nos estar creada la creará
    $link = mysqli_connect($dbHost, $dbUsername, $dbPassWord);
    $db_selected = mysqli_select_db($link, $dbName);
    if (!$db_selected) {
        exec('cd ./bbdd && C:\xampp\mysql\bin\mysql.exe -u root < clientes.sql', $output, $retval);
        echo '<h1>Tu tabla ya ha sido creada</h1>';
    }

    // Nos conectamos con la Base de Datos
    @$conexion = new mysqli($dbHost, $dbUsername, $dbPassWord, $dbName);
    $error = $conexion->connect_errno;
    if ($error != null) {
        // Si hay error al conectarme con la base de datos
        echo "<p>Error $error conectando a la base de datos: $conexion->connect_error</p>";
        exit();
    } else {

        if (!empty($_POST['submit'])) {
            // Mostrar todas las casillas con su imagen, nombre, usuario y un botón
            // a la derecha para editar 

            /**
             * Nuevo Nombre de archivo 
             * */
            $idCliente = $_GET['idCliente'];
            $newFilename = "imagen[$idCliente]";
            $newName = $newFilename . ".jpg";
            $image = $_FILES['image']['tmp_name']; //TimeStamp Archivo
            $folder = "./image/" . $newName; //Destino de la imagen

            // Hacemos update del proceso
            $insert = $conexion->query("UPDATE clientes SET imagenCliente = '$newName' WHERE  idCliente = '$idCliente'");

            // Movemos el archivo subido a la carpeta que le indicamos
            move_uploaded_file($image, $folder);
        }

        if (!empty($_POST['edit'])) {
            // CREAR LA PÁGINA DE EDITAR PERFIL
        }

        if (!empty($_POST['newClient'])) {
            // CREAR LA PÁGINA PARA CREAR UN NUEVO CLIENTE
        }

            ?>
            <h1>Bienvenido al panel de administración de clientes</h1>
            <form action="<?php $_SERVER['PHP_SELF'] ?>?idCliente=10001" method="post" enctype="multipart/form-data">
                <input type="file" name="image" value="image" />
                <input type="submit" name="submit" value="UPLOAD" />
            </form>
        <?php
        
        // Seleccionamos el array para recorrerlo
        $query = "SELECT * FROM clientes ";
        $result = mysqli_query($conexion, $query);
        echo "<table>";
        echo "<tbody>";
        while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><img src="./image/<?php echo $data['imagenCliente']; ?>" class="imagesClientes"></td>
                <td><span><?php echo $data['nombreCliente'] ?></span></td>
                <td><span>@<?php echo $data['instagramCliente'] ?></span></td>
                <td><input type="submit" value="Editar Perfil" name="edit[<?php echo $data['idCliente']; ?>]"></td>
            </tr>

    <?php
        }
        echo "</table>";
        echo "</tbody>";
    ?>
        <!-- CREAR FORMULARIO CON BOTÓN PARA AÑADIR NUEVO CLIENTE -->
    <?php
    }
    ?>

</body>

</html>