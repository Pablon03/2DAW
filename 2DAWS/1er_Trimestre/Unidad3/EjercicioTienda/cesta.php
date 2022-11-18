<?php

session_start();
$_SESSION['productosCarrito'] = 0;
if (isset($_SESSION['login']) && !$_SESSION['login']) {
    // Redireccionamos a productos.php
    header('location: ./login.php');

} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css?ver=1.0">
</head>

<body>
    <?php
    
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        include_once('./functions.php');
        $con = conectar();
    
        insertHeader();
        echo "<h1>Carrito</h1>";
    
        $precioTotal = ponerCesta();
        $_SESSION['precioCompra'] = $precioTotal;
    } else {
        header('location: ./productos.php');
    }

}
?>
</body>
</html>