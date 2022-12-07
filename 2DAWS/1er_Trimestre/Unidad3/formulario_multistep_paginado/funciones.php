<?php
function cogerProductosPagina(&$productos, $numProductosPagina, &$carrito)
{

    // Hacemos la conexión
    $conn = @new mysqli('localhost', 'root', '', 'ejtienda');
    $error = $conn->connect_errno;

    if ($error != null) {
        echo "<p>Error $error conectando a la base de datos: $conn->connect_error</p>";
        exit();
    }

    // Calculamos el inicio del formulario
    if ($_SESSION['formulario']['paginaActual'] === 1) {
        $offset = 1;
    } else {
        $offset = ($_SESSION['formulario']['paginaActual'] + 1) * $numProductosPagina;
    }

    // Cogemos los productos
    $listaMostrar = $conn->query('SELECT * FROM producto LIMIT ' . $numProductosPagina . ' OFFSET ' . $offset . '');

    $listaMostrar = $listaMostrar->fetch_all();
    // echo '<pre>' . print_r($listaMostrar) . '</pre>';

    // Metemos los productos en el array
    $index = 1;
    foreach ($listaMostrar as $producto) {
        $productos[$index] = array(
            'nombreCorto' => $producto[2],
            'precio' => $producto[4],
            'codProducto' => $producto[0],
        );

        $carrito[$producto[0]] = array(
            'nombreCorto' => $producto[2],
            'precio' => $producto[4],
            'cantidad' => 0,
        );
        $index++;
    }

    $conn->close();
}

function imprimirFormulario($formulario)
{

    $output = '<form method="post" action="./formulario.php">';
    foreach ($formulario['productos'] as $producto) {
        $output .= '<h2>' . $producto['nombreCorto'] . '<h2>';
        $output .= '<input type="number" name="cantidad['. $producto['nombreCorto'] . ']" value="' . $formulario['carrito'][$producto['codProducto']]['cantidad'] . '"';
        $output .= '<br>';
    }

    if (isset($formulario['paginaActual']) && $formulario['paginaActual'] == 1) { // PÁGINA UNO
        $output .= '<input type="submit" name="siguiente" value="Siguiente">';

    } elseif (isset($formulario['paginaActual']) && $formulario['paginaActual']  != 1 || 0) {
        $output .= '<input type="submit" name="anterior" value="Anterior">
        <input type="submit" name="siguiente" value="Siguiente">';
    }
    $output .= '</form>';

    echo $output;
}
    
/**
 * Actualiza la variable de cantidad del producto seleccionado 
 * para el carrito.
 */
function meterProductosCarrito($postAnnadir, &$carrito){
    foreach($postAnnadir['cantidad'] as $producto => $cantidad) {
        $carrito[$producto]['cantidad'] = $cantidad;
    }
}