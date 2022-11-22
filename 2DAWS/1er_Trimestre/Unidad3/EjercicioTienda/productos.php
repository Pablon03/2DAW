<?php

session_start();
$_SESSION['productosCarrito'] = 0;
if (isset($_SESSION['login'])) {
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
        <link rel="stylesheet" href="./styles.css">
    </head>

    <body>
    <?php
    include_once('./functions.php');
    insertHeader();
    $con = conectar();

    // Si se pulsa en comprar, vamos a añadir ese producto como array a la variable SESSION
    if (isset($_POST['comprar'])) {
        anyadirCarrito($con);
    }
    echo "<h1>Productos</h1>";
    mostrarProductos($con);
}
    ?>
</body>

</html>