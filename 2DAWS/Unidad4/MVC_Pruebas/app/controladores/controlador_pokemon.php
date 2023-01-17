<?php

class ControladorPokemon
{
    protected $nombrePokemon = 'Pikachu';
    protected $vidaPokemon = 5;

    // Constructor
    public function __construct()
    {
        $this->nombrePokemon;
        $this->vidaPokemon;


        
    }

    // Métodos 
    public function listar(){

        if(is_file(RUTA_APP.'\modelos\modelo_pokemon.php')){
            $modelo_pokemon = new ModeloPokemon();
        } else {
            throw new Exception("No se ha encontrado el modelo", 1);
        }
        $datos = $modelo_pokemon->getAllPokemons();

        if(is_file(RUTA_APP.'\vistas\pokemon\listado_pokemons.tpl.php')){
            require_once (RUTA_APP.'\vistas\pokemon\listado_pokemons.tpl.php');
        } else {
            throw new Exception("No se ha encontrado la vista", 1);
        }
    }

    /**
     * Muestra los datos del pokemon
     * $parametros Tiene todos los datos pasados como parámetros
     */
    public function ver($parametros){

        if(is_file(RUTA_APP.'\modelos\modelo_pokemon.php')){
            $modelo_pokemon = new ModeloPokemon();
        } else {
            throw new Exception("No se ha encontrado el modelo", 1);
        }

        // Comprueba si es un dígito o no
        if (ctype_digit($parametros['id'])) {

            // Lanza modelo y obtiene los datos del pokemon
            if (is_file(RUTA_APP.'\modelos\modelo_pokemon.php')) {
                $datos = $modelo_pokemon->getDatosPokemon($parametros['id']);
            } else {
                throw new Exception("No se ha encontrado el modelo", 1);
            }
    
            // Con los datos de antes, los mete en la vista
            if (is_file(RUTA_APP.'\vistas\pokemon\info_pokemon.tpl.php')) {
                require_once(RUTA_APP.'\vistas\pokemon\info_pokemon.tpl.php');
            } else {
                throw new Exception("No se ha encontrado la vista", 1);
            }

        } else {
            throw new Exception("El ID no es un dígito");
        }
    }


    	/* Delete */
	public function delete(){

        if(is_file(RUTA_APP.'\modelos\modelo_pokemon.php')){
            $modelo_pokemon = new ModeloPokemon();
        } else {
            throw new Exception("No se ha encontrado el modelo", 1);
        }

        $modelo_pokemon->delete($_POST['id']); 

        $datos = $modelo_pokemon->getAllPokemons();
        require_once (RUTA_APP.'\vistas\pokemon\listado_pokemons.tpl.php');
	}

    public function newPokemon(){
        require_once (RUTA_APP.'\vistas\pokemon\insertar_pokemon.tpl.php');
    }
}
