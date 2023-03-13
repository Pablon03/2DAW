<?php

// Completa aquí el código
$host = 'localhost';
$dbname = 'examen_dwes_bbdd';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // Configurar PDO para que lance excepciones en caso de errores.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos $dbname en $host";
} catch (PDOException $e) {
    // Manejar cualquier excepción que pueda ocurrir durante la conexión.
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>