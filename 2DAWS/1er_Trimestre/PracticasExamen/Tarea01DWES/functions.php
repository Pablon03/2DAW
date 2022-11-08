<?php

function añadirAlta($conexion)
{
    $nuevaKey = obtenerUltimaKey($conexion);
    meterNuevosDatos($conexion, $nuevaKey);
}

function obtenerUltimaKey($conexion)
{
    // Cogemos aquí el array de todas las claves y ordenado de mayor a menor
    $claves = $conexion->query('SELECT idDatos FROM datos ORDER BY idDatos DESC');

    // Metemos la primaera fila en la variable clave
    $clave = $claves->fetch_array();

    // echo $clave[0]; Este es la idCliente
    $numeroClave = $clave[0];
    $numeroClave = $numeroClave + 1; // Sumamos una clave más

    // Si acaba en cero se le pone un 0 al final
    if ($numeroClave % 2 === 0 && $numeroClave % 5 === 0) {
        $numeroClave = $numeroClave . "0";
    }
    return $numeroClave;
}

function meterNuevosDatos($conexion, $nuevaKey)
{
    $imagenPerfil = meterImagenNueva($nuevaKey);
    $Nombre = $_POST['nombre'];

    // Creamos la query que vamos a meter, con los ? porque irán las variables
    $query = "INSERT INTO datos VALUES (?, ?, ?, ?)";
    // Lo preparamos
    $stmt = $conexion->prepare($query);
    // Le metemos los parámetros de variables, se pondrán s según la cantidad
    // de huecos que haya que rellenar
    $stmt->bind_param("ssss", $nuevaKey, $imagenPerfil, $Nombre);
    $stmt->execute();
}

function meterImagenNueva($nuevaKey)
{
    /**
     * Nuevo Nombre de archivo 
     * */
    $idDatos = $nuevaKey;
    // Cogemos el tmp y le quitamos todo, solo dejamos el nombre
    $tmp = $_FILES['imagenPerfil']['tmp_name'];
    $tmp = substr($tmp, 13);
    $tmp = trim($tmp, '.tmp');
    $tmp = "p" . $tmp;

    $newFilename = "imagen[$idDatos][$tmp]"; // Nuevo nombre
    $newName = $newFilename . ".jpg"; // Ponemos la extensión
    $image = $_FILES['imagenPerfil']['tmp_name']; //TimeStamp Archivo
    $folder = "./image/" . $newName; //Destino de la imagen

    // Movemos el archivo subido a la carpeta que le indicamos
    move_uploaded_file($image, $folder);

    return $newName;
}

// function mostrarTablaAltas($conexion) {
//     $query = "SELECT * FROM datos";
//     $result = mysqli_query($conexion, $query);

//     echo "<table>";
//         while ($data = mysqli_fetch_assoc($result)) {
//             echo "<tr>";
//                 echo "<td><span>'".$data['imagenPersona']."'";
//                 echo "<td><span>'".$data['nombrePersona']."'";
//             echo "</tr>";
//         }
//     echo "</table>";
// }

function mostrarTablaAltas($conexion) {
    $query = $conexion->query("SELECT * FROM datos");

    echo "<table>";
        while ($data = $query->fetch_array()) {
                echo "<tr>";
                echo "<td><span>'".$data['imagenPersona']."'";
                echo "<td><span>'".$data['nombrePersona']."'";
            echo "</tr>";
        }
    echo "</table>";
}