<?php


// NO FUNCIONA EL SESSION
session_start();

// En caso de que aún no se haya cogido el array de Productos, los creamos.
// if (!isset($_SESSION['arrayProductos']) && isset($_SESSION['login'])) {
if (!isset($_SESSION['arrayProductos'])) {
    require_once './functions.php';
    $con = conectar();
    $query = ("SELECT * FROM producto LIMIT 4");
    $_SESSION['arrayProductos'] = $con->query($query);
    $_SESSION['formulario'] = 1;
    print_r($_SESSION['arrayProductos']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 1</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <?php if(isset($_SESSION['formulario'])){
            $paso = $_SESSION['formulario'];
            switch ($paso) {
                case '1':
                    // Cogemos el nombre del producto 1 y su precio para mandarlo
                    $producto = "Producto 1";
                    $precio = "1€";
                    break;
                case '2':
                    $producto = "Producto 2";
                    $precio = "2€";
                    $producto1 = "Producto 3";
                    $precio1 = "3€";
                    break;
                case '3':
                    $producto = "Producto 4";
                    $precio = "4€";
                    break;
                default;
                    break;
            }
            echo '<label for="producto">¿Quiere comprar '.$producto.'</label>';
            echo '<br>';
            echo '<label for="producto">Precio: '.$precio.'</label>';
            echo '<br>';
            echo '<label for="producto">Cantidad: </label>';
            echo '<input type="number" name="producto" min="0" max="100">';

            // Si es el paso 2, voy a poner dos productos
            if (isset($paso) && $paso == 2) {
                echo '<label for="producto">¿Quiere comprar '.$producto1.'</label>';
                echo '<br>';
                echo '<label for="producto">Precio: '.$precio1.'</label>';
                echo '<br>';
                echo '<label for="producto">Cantidad: </label>';
                echo '<input type="number" name="producto" min="0" max="100"';
            }

            // Si es el primer form no te puede mostrar ir hacia atrás
            if (isset($paso) && $paso != 1){
                echo '<input type="submit" name="atras" value="Atrás"/>';
            }

        }?>
        <input type="submit" name="avanzar" value="Avance"/>
    </form>
</body>
</html>