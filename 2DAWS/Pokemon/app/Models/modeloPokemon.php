
<?php

class ModeloPokemon {

    //Variables o atributos
    public $conn;
    public $pokemonXpagina;

    public function __construct($userBBDD, $passBBDD, $pokemonXpagina){
        $this->conn = new PDO('mysql:host=localhost;dbname=bbddpokemon', $userBBDD, $passBBDD);
        $this->pokemonXpagina = $pokemonXpagina;
    }

    //Funciones o métodos
    public function getPokemons () {
        $pokemons = [];
        foreach ($this->conn->query('SELECT * FROM pokemon ORDER BY num_pokedex ASC') as $fila) {
            print_r($fila);
            array_push($pokemons, $fila);
        }
        return $pokemons;
    }

    public function getPage ($pokemons, $page) {
        // Divide el array según lo que se le indique
        $pokemonParts = array_chunk($pokemons, $this->pokemonXpagina, true);

        // Recorremos el array por parte
        foreach ($pokemonParts[$page] as $fila) {
        
        }
    }
    
}