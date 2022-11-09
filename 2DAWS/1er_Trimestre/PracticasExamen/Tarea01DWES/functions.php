<?php

function obtenerNuevaKey($conexion){
    $query = "SELECT idDatos FROM datos ORDER BY idDatos DESC";
    $claves = mysqli_query($conexion, $query);

    $clave = $claves->fetch_array();
    $clave = $clave[0];
    $clave = $clave + 1;

    return $clave;
}

function insertarDatos($conexion, $nuevaKey, $nuevoNombre) {
    $query = "INSERT INTO datos(idDatos, nombrePersona) VALUES ('".$nuevaKey."', '".$nuevoNombre."')";
    $controlError = mysqli_query($conexion, $query);

    if (!$controlError) {
        echo "<script>alert('Error, no se han podido meter los datos')</script>";
    }
}