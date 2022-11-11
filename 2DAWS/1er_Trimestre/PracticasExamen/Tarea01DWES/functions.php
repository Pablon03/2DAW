<?php

function obtenerNuevaKey($conexion)
{
    $query = "SELECT idDatos FROM datos ORDER BY idDatos DESC";
    $claves = mysqli_query($conexion, $query);

    $clave = $claves->fetch_array();
    $clave = $clave[0];
    $clave = $clave + 1;

    return $clave;
}

function insertarDatos($conexion, $nuevaKey, $nuevoNombre)
{
    $query = "INSERT INTO datos(idDatos, nombrePersona) VALUES ('" . $nuevaKey . "', '" . $nuevoNombre . "')";
    $controlError = mysqli_query($conexion, $query);

    if (!$controlError) {
        echo "<script>alert('Error, no se han podido meter los datos')</script>";
    }
}

function meterImagen($conexion, $clave)
{

    // Cogemos aquí el array de todas las claves y ordenado de mayor a menor
    $imagenes = $conexion->query("SELECT imagenPersona FROM datos WHERE idDatos = $clave");

    // Metemos la primera fila en la variable clave
    $imagen = $imagenes->fetch_array();
    $imagen = $imagen[0];

    $enlace = "./image/" . $imagen;

    // Nos quedamos con el nombre del tmp
    $tmp = $_FILES['perfil']['tmp_name'][$clave];
    $tmp = substr($tmp, 13);
    $tmp = trim($tmp, '.tmp');
    $tmp = "p" . $tmp;

    // Cambiamos el nombre y destino de la imagen
    $newFilename = "imagen[$clave][$tmp]"; // Nuevo nombre
    $newName = $newFilename . ".jpg"; // Ponemos la extensión
    $image = $_FILES['perfil']['tmp_name'][$clave]; //TimeStamp Archivo
    $folder = "./image/" . $newName; //Destino de la imagen

    // Metemos nuevo o hacemos update
    if (isset($_POST['addNombre'])) {
        if (!$insert = $conexion->query("INSERT INTO datos SET imagenPersona = '$newName' WHERE  idDatos = '$clave'")) {
            echo "Algo ha salido mal";
        }
    } elseif (isset($_POST['actualizar'])) {
        if (!$insert = $conexion->query("UPDATE datos SET imagenPersona = '$newName' WHERE  idDatos = '$clave'")) {
            echo "Algo ha salido mal";
        }
    }

    // Movemos el archivo subido a la carpeta que le indicamos
    move_uploaded_file($image, $folder);

    // Borramos la imagen antigua de la carpeta
    unlink($enlace);
}

