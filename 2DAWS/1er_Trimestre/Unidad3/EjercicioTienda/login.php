<?php

session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    // Redireccionamos a productos.php
    header('location: ./productos.php');
} else {
    // Comprobamos si el inicio de sesión es correcto o no
    print_r($_POST);
    // Si en POST hay usuario y contraseña
    if (isset($_POST['usuario']) && isset($_POST['password'])) {
        require_once './functions.php';
        $con = conectar();
        $nombreUsuario = $_POST['usuario'];
        $contrasenyaUsuario = $_POST['password'];
        $query = "SELECT * FROM usuarios WHERE usuario='$nombreUsuario' AND contrasena='$contrasenyaUsuario'";
        
        $resultado = $con->query($query);
        
        $fila = $resultado->fetch_array();

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
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
    <input type="text" name="usuario" placeholder="Usuario"/>
    <input type="password" name="password" placeholder="Contraseña"/>
    <input type="submit" name="acceder" value="Acceder"/>
    </form>

    <?php


    ?>
</body>
</html>
<?php
    }
}
?>