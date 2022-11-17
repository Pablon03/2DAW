<?php

session_start();
$_SESSION['productosCarrito'] = 0;
// if (isset($_SESSION['login']) && !$_SESSION['login'] == true) {
//     // Redireccionamos a productos.php
//     header('location: ./login.php');
// } else {
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
    $con = conectar();
    ?>
    <h1>Carrito</h1>


    <!-- Poner la tabla bien -->
    <table>
        <?php
        $precioTotal = 0;
        foreach ($_SESSION['carrito'] as $row) {
            echo $row[0];
            echo $row[1];
            $precioTotal += $row[1];
        }
        ?>
    </table>

    <?php
    // }
    ?>

</body>

</html>