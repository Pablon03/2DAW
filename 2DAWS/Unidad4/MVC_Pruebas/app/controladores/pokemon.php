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
        echo 'Estamos listando:';
    }
}
