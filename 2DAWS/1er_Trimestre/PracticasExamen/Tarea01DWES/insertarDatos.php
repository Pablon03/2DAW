<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar datos</title>
</head>
<body>
    <?php
        if (empty($_POST['createBBDD'])) {
            exec('cd ./bbdd && C:\xampp\mysql\bin\mysql.exe -u root < datos.sql', $output, $retval);
        }
    ?>

    <h1>Darse de alta en el Sistema</h1>
    <form action="./mostrarDatos.php" method="post">
        <input type="text" name="nombre" placeholder="Introduce tu nombre">
        <input type="file" name="imagenPerfil" value="image" />
        <input type="submit" name="agregarAlta" value="Darse de Alta">
    </form>
</body>
</html>