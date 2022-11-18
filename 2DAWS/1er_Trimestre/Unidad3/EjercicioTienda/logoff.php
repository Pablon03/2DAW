<?php
session_start();
$_SESSION['productosCarrito'] = 0;
if (isset($_SESSION['login']) && !$_SESSION['login']) {
    // Redireccionamos a productos.php
    header('location: ./login.php');
} else {
    $_SESSION['login'] = false; 
    header('location: ./login.php');
}