<?php
session_start();
$_SESSION['productosCarrito'] = 0;
if (isset($_SESSION['login'])) {
    // Redireccionamos a productos.php
    header('location: ./login.php');
} else {
    session_destroy();
    header('location: ./login.php');
}