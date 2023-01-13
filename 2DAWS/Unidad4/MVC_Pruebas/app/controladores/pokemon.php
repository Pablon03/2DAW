<?php
class Pokemon
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

        if(is_file(RUTA_APP.'\modelos\pokemon.php')){
            require_once (RUTA_APP.'\modelos\pokemon.php');
            $modelo_pokemon = new ModeloPokemon();
            $datos = $modelo_pokemon->getAllPokemons();
        } else {
            throw new Exception("No se ha encontrado el modelo", 1);

        }

        if(is_file(RUTA_APP.'\vistas\pokemon\listado_pokemons.tpl.php')){
            require_once (RUTA_APP.'\vistas\pokemon\listado_pokemons.tpl.php');
        } else {
            throw new Exception("No se ha encontrado la vista", 1);
        }
    }

    public function ver($parametros){
        
        if (is_file(RUTA_APP.'\modelos\pokemon.php')) {
            require_once (RUTA_APP.'\modelos\pokemon.php');
            $modelo_pokemon = new ModeloPokemon();
            $datos = $modelo_pokemon->getDatosPokemon($parametros['id']);

        } else {
            throw new Exception("No se ha encontrado el modelo", 1);
        }

        if (is_file(RUTA_APP.'\vistas\pokemon\info_pokemon.tpl.php')) {
            require_once(RUTA_APP.'\vistas\pokemon\info_pokemon.tpl.php');
        } else {
            throw new Exception("No se ha encontrado la vista", 1);
        }
    }
}
