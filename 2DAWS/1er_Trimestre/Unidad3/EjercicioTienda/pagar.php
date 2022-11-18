<?php

session_start();
$_SESSION['productosCarrito'] = 0;
if (isset($_SESSION['login']) && !$_SESSION['login'] == true) {
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
    if (isset($_SESSION['precioCompra']) && !empty($_SESSION['precioCompra'])) {
        // Muestra las gracias
    ?>
        <div id='header'>
            <a href='./productos.php'>Ir a ver los productos</a><br>
            <a href='./logoff.php'>Log Out</a>
        </div>
        <h1>Muchas Gracias</h1>
        <br>
        <h3>Ha relizado su compra de: <?php echo $_SESSION['precioCompra']; ?>€</h3>

    <?php
        // Vaciamos el carrito
        unset($_SESSION['carrito']);
    } else {
        //Redireccionamos a productos.php
        header('location: ./productos.php');
    }
    }
    ?>

</body>

</html>