<?php

class ControladorRestApi
{

    // Constructor
    public function __construct()
    {
    }

    /**
     * Funcion para procesar todo
     */
    public function procesar($params)
    {

        $path = $params['path'];
        $parametros = explode("/", $path);

        $metodo = $_SERVER['REQUEST_METHOD'];

        switch ($metodo) {
            case 'GET':
                if ($parametros[0] === "pokemon") {
                    $this->getPokemon($parametros[1]);
                }

                if ($parametros[0] === "pokemons") {
                    $this->getAllPokemons();
                }

                break;

            case 'DELETE':
                # code...
                break;

            case 'UPDATE':
                # code...
                break;

            case 'POST':
                # code...
                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Obtiene un json de un solo pokemon
     */
    private function getPokemon($id)
    {

        $modeloPokemon = new ModeloPokemon();
        $sourceDDBB['source'] = "DDBB";

        $pokemon = $modeloPokemon->getDatosPokemon($sourceDDBB, $id);

        // echo "<pre>";
        // print_r($pokemon);
        // echo "</pre>";

        $paraEnviar = json_encode($pokemon);

        header('Content-Type: application/json; charset=utf-9');

        echo $paraEnviar;
    }

    private function getAllPokemons()
    {
        $modeloPokemon = new ModeloPokemon();
        $sourceDDBB['source'] = "ddbb";

        $pokemon = $modeloPokemon->getAllPokemons($sourceDDBB);

        $paraEnviar = json_encode($pokemon);

        header('Content-Type: application/json; charset=utf-9');

        echo $paraEnviar;
    }
}
