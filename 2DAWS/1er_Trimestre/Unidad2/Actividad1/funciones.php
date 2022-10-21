<?php

function sumarKey($conexion)
{
    $nuevaKey = obtenerUltimaKey($conexion);
    meterNuevosDatos($conexion, $nuevaKey);
}


function obtenerUltimaKey($conexion)
{
    // Cogemos aquí el array de todas las claves y ordenado de mayor a menor
    $claves = $conexion->query('SELECT dept_no FROM department ORDER BY dept_no DESC');

    // Metemos la primaera fila en la variable clave
    $clave = $claves->fetch_array();

    // Usando Expresiones Regulares, lo que vamos a hacer es separar la clave en
    // dos cadenas diferentes, siendo la posición 1 la letra y la posición 2 los números
    preg_match("/^([a-z]+)([0-9]+)$/", $clave[0], $arreglo);

    // echo $arreglo[1]; Este es la letra
    // echo $arreglo[2]; Este es el número
    $letraClave = $arreglo[1];
    $numeroClave = $arreglo[2];
    $numeroClave = $numeroClave + 1; // Sumamos una clave más

    if ($numeroClave < 10) {
        $numeroClave = "0" . $numeroClave;
        echo $numeroClave;
    } elseif ($numeroClave >= 10){
        $numeroClave = "0" . $numeroClave;
    } elseif ($numeroClave >=100 ) {
        $numeroClave;
    }
    

    return $letraClave . $numeroClave;
}


function meterNuevosDatos($conexion, $nuevaKey)
{
    $nuevoNombre = $_POST['new_department_name'];

    // Creamos la query que vamos a meter, con los ? porque irán las variables
    $query = "INSERT INTO department (dept_no, dept_name)
             VALUES (?, ?)";
    // Lo preparamos
    $stmt = $conexion->prepare($query);
    // Le metemos los parámetros de variables, se pondrán s según la cantidad
    // de huecos que haya que rellenar
    $stmt->bind_param("ss", $nuevaKey, $nuevoNombre);
    $stmt->execute();
}
