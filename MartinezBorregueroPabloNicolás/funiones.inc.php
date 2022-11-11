<?php
/*Escribe aquí la función conectar, y todas aquellas que consideres oportunas para la realización del examen*/
function conectarBBDD()
{
    // En caso de que el POST esté vacío o no esté se mostrará un error
    if (empty($_POST) || !isset($_POST)) {
        echo "<script>alert('Ha ocurrido un error')</script>";
        return false;
    } else {
        $host = $_POST['servidor'];
        $user = $_POST['usuario'];
        $pass = $_POST['contrasenya'];
        $name = $_POST['bbdd'];
    }

    // Control si la base de datos es la correcta
    if (isset($_POST['bbdd']) && $_POST['bbdd'] == "productos_comerciales") {
        // Control si la contraseña es la correcta
        if (isset($_POST['contrasenya']) && !empty($_POST['contrasenya'])) {
            echo "<script>alert('La contraseña es incorrecta.')</script>";
            return false;
            // Control si el servidor es el correcto
        } elseif (empty($_POST['servidor']) || (isset($_POST['servidor']) && !($_POST['servidor'] == "localhost"))) {
            echo "<script>alert('El servidor es incorrecto.')</script>";
            return false;
        } elseif (empty($_POST['usuario']) || (isset($_POST['usuario']) && !($_POST['usuario'] == "root"))) {
            echo "<script>alert('El usuario es incorrecto.')</script>";
            return false;
        } else {
            // Comprobación de la conexion
            @$conn = new mysqli($host, $user, $pass, $name);
            if (!$conn) {
                echo "<script>alert('Los datos son incorrectos, no se puede acceder a la base de datos')</script>";
                return false;
            } else {
                return true;
            }
        }
    } else {
        echo "<script>alert('La base de datos introducida no existe')</script>";
        return false;
    }
}
// COgemos la conexión para tenerla en la página que nos interesa
function cogerConexion()
{
    $host = $_POST['servidor'];
    $user = $_POST['usuario'];
    $pass = $_POST['contrasenya'];
    $name = $_POST['bbdd'];
    @$conn = new mysqli($host, $user, $pass, $name);
    return $conn;
}
