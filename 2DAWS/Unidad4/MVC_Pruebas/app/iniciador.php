<?php

require_once './app/config/config.php';
require_once 'core.php';

try {
    //code...
    $iniciador = new Core();
} catch (\Throwable $th) {
    header('HTTP/1.0 404 Not found');
    die($th->getMessage());

    //require_once (RUTA_APP.'/vistas/404.html'); Es una opción
}
