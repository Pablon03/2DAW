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
    print_r($_FILES['10001']);
    // Nos quedamos con el nombre del tmp
    $tmp = $_FILES["'$clave'"]['tmp_name'];
    $tmp = substr($tmp, 13);
    $tmp = trim($tmp, '.tmp');
    $tmp = "p" . $tmp;

    // Cambiamos el nombre y destino de la imagen
    $newFilename = "imagen[$clave][$tmp]"; // Nuevo nombre
    $newName = $newFilename . ".jpg"; // Ponemos la extensión
    $image = $_FILES['image']['tmp_name']; //TimeStamp Archivo
    $folder = "./image/" . $newName; //Destino de la imagen

    // Hacemos update del proceso
    if (!$insert = $conexion->query("UPDATE clientes SET imagenCliente = '$newName' WHERE  idCliente = '$clave'")) {
        echo "Algo ha salido mal";
    }

    // Movemos el archivo subido a la carpeta que le indicamos
    move_uploaded_file($image, $folder);
}
