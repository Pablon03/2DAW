<?php

function datosAjustes(){
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
}

