<?php
function conectar () {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $name = "ejtienda";

    $con = mysqli_connect($host, $user, $pass, $name);

    if (!$con) {
        echo "<h1>No se ha podido establecer conexión con el servidor</h1>";
        exit();
    } else {
        return $con;
    }
}