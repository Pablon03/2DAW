DROP DATABASE IF EXISTS clientes;
CREATE DATABASE IF NOT EXISTS clientes;
USE clientes;

SELECT 'CREATING DATABASE STRUCTURE' as 'INFO';

DROP TABLE IF EXISTS clientes

CREATE TABLE clientes (
    idCliente           INT             NOT NULL,
    imagenCliente       BLOB            NOT NULL,
    nombreCliente       VARCHAR(14)     NOT NULL,
    instagramCliente    VARCHAR(16)     NOT NULL,    
    PRIMARY KEY (idCliente)
);

INSERT INTO `clientes` VALUES (10001,'file_get_contents("https://ceslava.s3-accelerate.amazonaws.com/2016/04/mistery-man-gravatar-wordpress-avatar-persona-misteriosa-510x510.png")','Pablo Nicolás','Pablon03'),
