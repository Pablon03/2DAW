DROP DATABASE IF EXISTS datos;
CREATE DATABASE IF NOT EXISTS datos;
USE datos;

SELECT 'CREATING DATABASE STRUCTURE' as 'INFO';

DROP TABLE IF EXISTS datos;

CREATE TABLE datos (
    idDatos           INT             NOT NULL,
    imagenPersona       VARCHAR(100)      NOT NULL,
    nombrePersona       VARCHAR(14)     NOT NULL,
    PRIMARY KEY (idDatos)
);

SELECT 'LOADING datos' as 'INFO';
source load_datos.dump ;
