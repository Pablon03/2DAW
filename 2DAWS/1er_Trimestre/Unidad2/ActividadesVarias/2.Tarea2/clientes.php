<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css?1.5">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@1,800&display=swap" rel="stylesheet">
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

        // Entra aquí en caso de que se le de al botón de añadir Cliente en su pestaña
        if (isset($_POST['add_client'])) {
            require_once './functions.php';
            sumarKey($conexion);
        }

        // Entra aquí en caso de que se haya pulsado para editar un perfil
        if (!empty($_GET['edit'])) {

            // Cogemos el ID
            $clave = array_keys($_GET['edit']);
            $clave = $clave[0]; // Esto es el ID



            echo "<div class='pageEdit'>";
            echo "<div class='editClient'>";
            $phpSelf = $_SERVER['PHP_SELF'];
            echo '<form action="' . $phpSelf . '?idCliente=' . $clave . '" method="post" enctype="multipart/form-data">';
    ?>
            <div class='top'>
                <div class='topLeft'>
                    <a href='clientes.php' class='boton'>Back</a>
                </div>
                <div class='topCenter'>
                    <span class='editProfile'>Edit profile</span>
                </div>
                <div class='topRight'>
                    <input type="submit" name="submit" value="Save" />
                </div>
            </div>

            <div class="content">
                <?php

                // Seleccionamos el array para recorrerlo
                $query = "SELECT * FROM clientes WHERE idCliente = ${clave} ";
                $result = mysqli_query($conexion, $query);
                $data = mysqli_fetch_assoc($result);

                ?>
                <!-- Poner imagen por defecto en caso de que no tenga -->
                <img src="./image/<?php echo $data['imagenCliente']; ?>" class="imagesEdit">
                <br>
                <input type="file" name="image" value="image" />
                <br>
                <span><?php echo $data['nombreCliente'] ?></span>
                <br>
                <span>@<?php echo $data['instagramCliente'] ?></span>
                <br>
            </div>
            </form>
            </div>
            </div>

        <?php

            // Entra un nuevo cliente
        } elseif (!empty($_POST['newClient'])) {
            echo "<div class='pageNewClient'>";
            echo "<div class='newClient'>";
            $phpSelf = $_SERVER['PHP_SELF'];
            echo '<form action="' . $phpSelf . '" method="post" enctype="multipart/form-data">';
        ?>
            <div class='top'>
                <div class='topLeft'>
                    <a href='clientes.php' class='boton'>Back</a>
                </div>
                <div class='topCenter'>
                    <span class='newProfile'>New profile</span>
                </div>
                <div class='topRight'>
                    <input type="submit" name="add_client" value="Add Client" />
                </div>
            </div>

            <div class="content">
                <!-- Poner imagen por defecto en caso de que no tenga -->
                <img src="./image/defaultUserImage.jpg" class="imagesNew">
                <br>
                <input type="file" name="new_image_client" value="image" />
                <br>
                <input type="text" name="new_name_client" placeholder="Introduce tu nombre" />
                <br>
                <input type="text" name="new_username_client" placeholder="@username" />
                <br>
            </div>
            </form>
            </div>
            </div>
        <?php
        } else {
            // Si se ha pulsado para cambiar la foto, entrará aquí
            if (!empty($_POST['submit'])) {

                // Gestionamos el eliminar
                $clave = $_GET['idCliente'];
                require_once './functions.php';
                // Borra la imagen Antigua para poner la nueva
                borrarImagenAntigua($conexion, $clave);

                /**
                 * Nuevo Nombre de archivo 
                 * */
                $idCliente = $_GET['idCliente'];
                // Cogemos el tmp y le quitamos todo, solo dejamos el nombre
                $tmp = $_FILES['image']['tmp_name'];
                $tmp = substr($tmp, 13);
                $tmp = trim($tmp, '.tmp');
                $tmp = "p" . $tmp;

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
        ?>
            <h1>Bienvenido al panel de administración de clientes</h1>

            <?php

            // Seleccionamos el array para recorrerlo
            $query = "SELECT * FROM clientes ";
            $result = mysqli_query($conexion, $query);
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
                    <form class="newClientForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="submit" name="newClient" value="New Client" />
                    </form>
            <?php
        }
    }
    $conexion->close();
            ?>

</body>

</html>