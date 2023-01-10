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

        $datos = [
            '1' => [
                'nombre' => 'Pikachu',
                'tipo' => 'eléctrico',
                'url_imagen' => 'https://pbs.twimg.com/media/D3UIXzPWkAAQo7A.png',   
            ],
            '2' => [
                'nombre' => 'Bulbasur',
                'tipo' => 'Hierba',
                'url_imagen' => 'https://i.pinimg.com/600x315/a5/85/20/a58520a8b86897e148361db6b4ead562.jpg',
            ]

        ];

        if(is_file(RUTA_APP.'\vistas\pokemon\listado_pokemons.tpl.php')){
            require_once (RUTA_APP.'\vistas\pokemon\listado_pokemons.tpl.php');

        } else {
            throw new Exception("No se ha encontrado la vista", 1);
            
        }
    }
}
