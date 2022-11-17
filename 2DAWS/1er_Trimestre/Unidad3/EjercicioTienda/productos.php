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

    // Si se pulsa en comprar, vamos a añadir ese producto como array a la variable SESSION
    if (isset($_POST['comprar'])) {
        $codProd = key($_POST['comprar']);
        $query = ("SELECT * FROM producto WHERE cod = '$codProd'");

        $productoInfo = $con->query($query);
        $producto = $productoInfo->fetch_array();
        $nombre = $producto['nombre_corto'];
        $precio = $producto['PVP'];
        $producto = array($nombre, $precio);

        // Mete en el array de carrito el producto
        $_SESSION['carrito'][$nombre] = $producto;


        // echo "<pre>";
        // print_r($_SESSION['carrito']);
        // echo "</pre>";
    }
    ?>
    <h1>Productos</h1>
    <?php
    $query = ("SELECT * FROM producto");

    $resultados = $con->query($query);

    echo "<div id='header'>";
        echo "<a href='./cesta.php'>Ir al carrito</a>";
    echo "</div>";
    echo "<div id='boxGrande'>";
    while ($producto = $resultados->fetch_array()) {
    ?>
        <div class="cajaProducto">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <h4><?php echo $producto['nombre_corto'] ?></h4>
                <br>
                <input type="submit" name="comprar[<?php echo $producto['cod'] ?>]" value="Comprar por <?php echo $producto['PVP'] ?>€" />
            </form>
        </div>
    <?php
    }
    echo "</div>";
    ?>
    <?php
    // }
    ?>

</body>

</html>