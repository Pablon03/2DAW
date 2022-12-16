<?php
class Core {
    protected $controladorActual = 'pokemon';
    protected $metodoActual = 'index';
    protected $parametros = [];

    // Constructor
    public function __construct(){
        
        // Aquí sobreescribimos el controlador actual, el método y los parámetros que hay por defecto.

        if (isset($_GET['controlador']) && !empty($_GET['controlador'])) {
            $this->controladorActual = filter_var($_GET['controlador'], FILTER_SANITIZE_URL);
        }
        if (isset($_GET['metodo']) && !empty($_GET['metodo'])) {
            $this->metodoActual = filter_var($_GET['metodo'], FILTER_SANITIZE_URL);
        }

        $parametros = array_filter($_GET, fn($element)=>!in_array($element, ['controlador', 'metodo']), ARRAY_FILTER_USE_KEY);
        print_r($parametros);
    }
}
