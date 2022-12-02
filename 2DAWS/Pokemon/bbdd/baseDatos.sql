CREATE SCHEMA bbddPokemon;
USE bbddPokemon;

CREATE TABLE pokemon (
    num_pokedex INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(24) NOT NULL,
    peso INT NOT NULL,
    altura INT NOT NULL,
    foto VARCHAR(255) NOT NULL
);

CREATE TABLE tipos (
    id_tipo INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(24) NOT NULL
);

CREATE TABLE pokemon_tipo (
	num_pokedex int not null,
    id_tipo int not null,
    primary key(num_pokedex, id_tipo),
    foreign key (num_pokedex) references pokemon(num_pokedex),
    foreign key (id_tipo) references tipos(id_tipo)
);
