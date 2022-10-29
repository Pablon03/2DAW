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
            // Cogemos el tmp y le quitamos todo, solo dejamos el nombre
            $tmp = $_FILES['image']['tmp_name'];
            $tmp = substr($tmp, 13);
            $tmp = trim($tmp, '.tmp');
            $tmp = "p".$tmp;
            
            $newFilename = "imagen[$idCliente][$tmp]"; // Nuevo nombre
            $newName = $newFilename . ".jpg"; // Ponemos la extensión
            $image = $_FILES['image']['tmp_name']; //TimeStamp Archivo
            $folder = "./image/" . $newName; //Destino de la imagen

            // Hacemos update del proceso
            if (!$insert = $conexion->query("UPDATE clientes SET imagenCliente = '$newName' WHERE  idCliente = '$idCliente'")) {
                echo ("Algo ha salido mal");
            }

            // Movemos el archivo subido a la carpeta que le indicamos
            move_uploaded_file($image, $folder);
        }

        if (!empty($_GET['edit'])) {
            // CREAR LA PÁGINA DE EDITAR PERFIL
            // Si se pulsa SAVE, nos quedaremos en esta página, no nos salimos si no se le da para atrás

            echo "<div class='editClient'>";
                $phpSelf = $_SERVER['PHP_SELF'];
                echo '<form action="'.$phpSelf.'?idCliente=10001" method="post" enctype="multipart/form-data">';
                echo "<div class='top'>";
                    echo "<div class='topLeft'>";
                        echo "<a href='clientes.php' class='boton'>Back</a>";
                    echo "</div>";
                    echo "<div class='topCenter'>";
                    echo "<span class='editProfile'>edit profile</span>";
                    echo "</div>";
                    echo "<div class='topRight'>";
                        echo '<input type="submit" name="save" value="Save" />';
                    echo "</div>";
                echo "</div>";
                echo "</form>";
            echo "</div>";

        } elseif (!empty($_POST['newClient'])) {
            // CREAR LA PÁGINA PARA CREAR UN NUEVO CLIENTE

        } else {
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
            print_r($_GET);
        ?>
        <table>
            <tbody>

        <?php
        while ($data = mysqli_fetch_assoc($result)) {
        ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>?idCliente=<?php $data['idCliente']; ?>">
            <tr>
                <td><img src="./image/<?php echo $data['imagenCliente']; ?>" class="imagesClientes"></td>
                <td><span><?php echo $data['nombreCliente'] ?></span></td>
                <td><span>@<?php echo $data['instagramCliente'] ?></span></td>
                <td><input type="submit" value="Editar Perfil" name="edit[<?php echo $data['idCliente']; ?>]"></td>
            </tr>
        </form>
    <?php
        }
        echo "</table>";
        echo "</tbody>";
    ?>
        <!-- CREAR FORMULARIO CON BOTÓN PARA AÑADIR NUEVO CLIENTE -->
    <?php
        }
    }
    $conexion -> close();
    ?>

</body>

</html>