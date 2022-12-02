<?php

//Incluyo los archivos necesarios
require("./app/Models/modeloPokemon.php");
require("./app/Controllers/controllerPokemon.php");

//Instancio el controlador
$elModeloPokemon = new ModeloPokemon('root', '', 5);

$arrayPokemons = $elModeloPokemon->getPokemons();
echo '<pre>';
print_r($arrayPokemons);
echo '</pre>';