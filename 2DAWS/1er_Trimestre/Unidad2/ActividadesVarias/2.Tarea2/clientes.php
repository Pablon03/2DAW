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
            
            
            exec('cd ./bbdd && C:\xampp\mysql\bin\mysql.exe -u root < clientes.sql', $output, $retval);
            echo '<h1>Tu tabla ya ha sido restaurada</h1>';
        // Si no se muestra el botón de reiniciar

        } elseif (!empty($_POST['submit'])) {
            //$imagePath = $_FILES['image']['full_path'];
            //$imgContent = addslashes(file_get_contents($image));

            $fileName = $_FILES['image']['name'];
            $image = $_FILES['image']['tmp_name'];
            //$imgContent = addslashes(file_get_contents($image));
            $folder = "./image/" . $fileName;

            $insert = $conexion->query("UPDATE clientes SET imagenCliente = '$fileName' WHERE  idCliente = 10001");
    
            move_uploaded_file($image, $folder);
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
    <img src="<?php echo $imagePath ?>">
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
