<?php

function sumarKey($conexion)
{
    $nuevaKey = obtenerUltimaKey($conexion);
    meterNuevosDatos($conexion, $nuevaKey);
}

function obtenerUltimaKey($conexion)
{
    // Cogemos aquí el array de todas las claves y ordenado de mayor a menor
    $claves = $conexion->query('SELECT idCliente FROM clientes ORDER BY idCliente DESC');

    // Metemos la primaera fila en la variable clave
    $clave = $claves->fetch_array();

    // echo $clave[0]; Este es la idCliente
    $numeroClave = $clave[0];
    $numeroClave = $numeroClave + 1; // Sumamos una clave más

    // Si acaba en cero se le pone un 0 al final
    if ($numeroClave % 2 === 0 && $numeroClave % 5 === 0) {
        $numeroClave = $numeroClave . "0";
        echo $numeroClave;
    }
    return $numeroClave;
}


function meterNuevosDatos($conexion, $nuevaKey)
{
    $nuevaImagen = meterImagenNueva($nuevaKey);
    $nuevoNombre = $_POST['new_name_client'];
    $nuevoUsuario = $_POST['new_username_client'];

    // Creamos la query que vamos a meter, con los ? porque irán las variables
    $query = "INSERT INTO clientes VALUES (?, ?, ?, ?)";
    // Lo preparamos
    $stmt = $conexion->prepare($query);
    // Le metemos los parámetros de variables, se pondrán s según la cantidad
    // de huecos que haya que rellenar
    $stmt->bind_param("ssss", $nuevaKey, $nuevaImagen, $nuevoNombre, $nuevoUsuario);
    $stmt->execute();
}

function meterImagenNueva($nuevaKey)
{
    /**
     * Nuevo Nombre de archivo 
     * */
    $idCliente = $nuevaKey;
    // Cogemos el tmp y le quitamos todo, solo dejamos el nombre
    $tmp = $_FILES['new_image_client']['tmp_name'];
    $tmp = substr($tmp, 13);
    $tmp = trim($tmp, '.tmp');
    $tmp = "p" . $tmp;

    $newFilename = "imagen[$idCliente][$tmp]"; // Nuevo nombre
    $newName = $newFilename . ".jpg"; // Ponemos la extensión
    $image = $_FILES['new_image_client']['tmp_name']; //TimeStamp Archivo
    $folder = "./image/" . $newName; //Destino de la imagen

    // Movemos el archivo subido a la carpeta que le indicamos
    move_uploaded_file($image, $folder);

    return $newName;
}


function borrarImagenAntigua($conexion, $clave){

        // Cogemos aquí el array de todas las claves y ordenado de mayor a menor
        $claves = $conexion->query("SELECT imagenCliente FROM clientes WHERE idCliente = $clave");

        // Metemos la primera fila en la variable clave
        $clave = $claves->fetch_array();
        $imagen = $clave[0];

        $enlace = "./image/".$imagen;

        unlink($enlace);
}