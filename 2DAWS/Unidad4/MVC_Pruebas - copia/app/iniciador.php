<?php

// define('DS', DIRECTORY_SEPARATOR);

// function app_autoload($classname){
//     $classname = __DIR__ . DS . str_replace('\\', DS, $classname). '.php';
//     require_once $classname;
// }
// spl_autoload_register('app_autoload');
require_once './app/config/config.php';
require_once 'core.php';

// function loader($nombreClase){
//     require_once($nombreClase.'.php');
// }

// spl_autoload_register('loader');

try {
    //code...
    $iniciador = new Core();
} catch (\Throwable $th) {
    header('HTTP/1.0 404 Not found');
    die($th->getMessage());

    //require_once (RUTA_APP.'/vistas/404.html'); Es una opción
}
