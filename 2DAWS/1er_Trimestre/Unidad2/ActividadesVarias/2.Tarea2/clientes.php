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
    $dbName= 'clientes';
    @$conexion = new mysqli($dbHost, $dbUsername, $dbPassWord, $dbName);

    $error = $conexion->connect_errno;

    if ($error != null) {
        // Si hay error al conectarme con la base de datos
        echo "<p>Error $error conectando a la base de datos: $dwes->connect_error</p>";
        exit();
    } else {

        print_r($_FILES);
        // Si se pulsa el botón de reiniciar
        if (!empty($_GET['creacion'])) {
            // Mostrar que ya se ha creado la BBDD, a partir de ahí solo se mostrará
            // para meter nuevos usuarios.
            
            exec('cd ./bbdd && C:\xampp\mysql\bin\mysql.exe -u root < clientes.sql', $output, $retval);
            echo '<h1>Tu tabla ya ha sido restaurada</h1>';
        // Si no se muestra el botón de reiniciar

        } elseif (!empty($_POST['submit'])) {
            // Mostrar todas las casillas con su imagen, nombre, usuario y un botón
            // a la derecha para editar 

            // $fileName = $_FILES['image']['name']; //Nombre imagen
            // $image = $_FILES['image']['tmp_name']; //TimeStamp Archivo
            // $folder = "./image/" . $fileName; //Destino de la imagen


            /**
             * Nuevo Nombre de archivo 
             * TEST
             * */
            $idCliente = $_GET['idCliente'];
            $newFilename = "imagen['.$idCliente.']";
            $newName = $newFilename.".jpg";
            $image = $_FILES['image']['tmp_name']; //TimeStamp Archivo
            $folder = "./image/" . $fileName; //Destino de la imagen

            // Hacemos update del proceso
            $insert = $conexion->query("UPDATE clientes SET imagenCliente = '$newName' WHERE  idCliente = 10001");
            
            // Movemos el archivo subido a la carpeta que le indicamos
            move_uploaded_file($image, $folder);

            // Seleccionamos el array para recorrerlo
            $query = "SELECT imagenCliente FROM clientes ";
            $result = mysqli_query($conexion, $query);
     
            while ($data = mysqli_fetch_assoc($result)) {
                print_r($data);
            ?>
                <img src="./image/<?php echo $data['imagenCliente']; ?>">
     
            <?php
            }
        } else {

    ?>
        <h1>Bienvenido al panel de administración de clientes</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        <input type="submit" name="creacion" value="Crear Base de Datos"/>
        </form>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="image" value="image"/>
        <input type="submit" name="submit" value="UPLOAD"/>
        </form>
    <?php
        }
    }

    ?>
    
</body>
</html>
