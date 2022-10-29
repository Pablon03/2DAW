DROP DATABASE IF EXISTS clientes;
CREATE DATABASE IF NOT EXISTS clientes;
USE clientes;

SELECT 'CREATING DATABASE STRUCTURE' as 'INFO';

DROP TABLE IF EXISTS clientes;

CREATE TABLE clientes (
    idCliente           INT             NOT NULL,
    imagenCliente       VARCHAR(100)      NOT NULL,
    nombreCliente       VARCHAR(14)     NOT NULL,
    instagramCliente    VARCHAR(16)     NOT NULL,    
    PRIMARY KEY (idCliente)
);

SELECT 'LOADING clientes' as 'INFO';
source load_clientes.dump ;
