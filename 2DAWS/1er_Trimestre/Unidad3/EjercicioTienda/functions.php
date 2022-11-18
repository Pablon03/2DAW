<?php
function conectar()
{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $name = "ejtienda";

    $con = mysqli_connect($host, $user, $pass, $name);

    if (!$con) {
        echo "<h1>No se ha podido establecer conexión con el servidor</h1>";
        exit();
    } else {
        return $con;
    }
}

function anyadirCarrito($con)
{
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

function ponerCesta()
{
    echo "<table>";
    $precioTotal = 0;
    foreach ($_SESSION['carrito'] as $row) {
        echo "<tr>";
        echo "<td>";
        echo $row[0];
        echo "</td>";
        echo "<td>";
        echo $row[1] . "€";
        echo "</td>";
        echo "</tr>";
        $precioTotal += $row[1];
    }
    echo "<tr>";
    echo "<td><strong>Precio Total:</strong> </td>";
    echo "<td>$precioTotal €</td>";
    echo "</tr>";
    echo "</table>";
}

function insertHeader()
{
    echo "<div id='header'>
            <a href='./cesta.php'>Carrito</a><br>
            <a href='./productos.php'>Productos</a><br>
            <a href='./pagar.php'>Pagar</a>
            <a href='./logoff.php'>Log Out</a>
        </div>";
}

function mostrarProductos($con)
{
    $query = ("SELECT * FROM producto");
    $resultados = $con->query($query);

    echo "<div id='boxGrande'>";
    while ($producto = $resultados->fetch_array()) {
        $phpSelf = $_SERVER['PHP_SELF'];
        $nombreProducto = $producto['nombre_corto'];
        $codProducto = $producto['cod'];
        $precioProducto = $producto['PVP'];
        echo "<div class='cajaProducto'>
            <form action='$phpSelf' method='POST'>
                <h4>$nombreProducto</h4>
                <br>
                <input type='submit' name='comprar[$codProducto]' value='Comprar por $precioProducto €' />
            </form>
        </div>";
        echo "</div>";
    }
}
