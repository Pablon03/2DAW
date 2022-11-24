<?php

session_start();
// Redireccionamos a productos.php
if (isset($_SESSION['login']) && $_SESSION['login']) {
    header('location: ./form1.php');
    exit();
    
// Comprobamos si el inicio de sesión es correcto o no
} else {

    // Si en POST hay usuario y contraseña
    if (isset($_POST['usuario']) && isset($_POST['password'])) {
        require_once './functions.php';
        $con = conectar();
        $fila = comprobarLogIn($con);

        if ($fila != null) {
            // Mandamos a productos.php
            header('location: ./productos.php');
            $_SESSION['login'] = true;
        } else {
            echo "<h2>Credenciales incorrectas</h2>";
        }
    } else {
?>
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
    require_once './functions.php';
    ponerForm();
    }
}
?>
</body>
</html>