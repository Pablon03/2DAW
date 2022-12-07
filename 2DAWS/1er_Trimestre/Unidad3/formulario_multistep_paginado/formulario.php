<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once './templates/header.tpl.php';
include './funciones.php';

// Si no existe la sesión, se crea
if (!isset($_SESSION['formulario']) || empty($_SESSION['formulario'])) {
    include("./vars.php");
}

print_r("Página Actual: " . $_SESSION['formulario']['paginaActual'] . "<br>");

// Ponemos en $_SESSION['formulario]['productos] los que toque mostrar
cogerProductosPagina($_SESSION['formulario']['productos'], 5, $_SESSION['formulario']['carrito']);


// Gestión del POST
if (isset($_POST['anterior'])) {
    $_SESSION['formulario']['paginaActual'] = $_SESSION['formulario']['paginaActual'] - 1;

} elseif (isset($_POST['siguiente']) && $_SESSION['formulario']['paginaActual'] != 5) {
    $_SESSION['formulario']['paginaActual'] = $_SESSION['formulario']['paginaActual'] + 1;
    meterProductosCarrito($_POST, $_SESSION['formulario']['carrito']);

} elseif (isset($_POST['siguiente'])) {
    //TODO: MOSTRAR CARRITO
    echo "<meta http-equiv='refresh' content='0;url=cesta.php'>";
}

// Imprimimos el formulario
imprimirFormulario($_SESSION['formulario']);

include_once './templates/footer.tpl.php';
