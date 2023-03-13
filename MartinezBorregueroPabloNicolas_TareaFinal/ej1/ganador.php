<?php
require_once('./vars.php');

if (!isset($_POST['seleccionar'])) {
  header("Location: ./index.php");
  exit();
}

$ganador_id = array_keys($_POST['seleccionar'])[0];

// Busca el ganador en la lista de candidatos seleccionados
$ganador = null;
global $participantes;
foreach ($participantes as $index => $candidato) {
  if ($index == $ganador_id) {
    $ganador = $candidato;
    break;
  }
}

// Si no se encontró al ganador en la lista de candidatos seleccionados, redirige al usuario a la página principal
if (!$ganador) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1: Candidatos finalistas</title>
    <style>
        
    </style>
</head>
<body>
    <h1>¡Enhorabuena a <?php echo $ganador['nombre']; ?>!</h1>        
    <p><img src="<?php echo $ganador['imagen_url']; ?>"></p>
    
</body>
</html>
