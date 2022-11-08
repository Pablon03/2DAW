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
    ?>
    
</body>

</html>