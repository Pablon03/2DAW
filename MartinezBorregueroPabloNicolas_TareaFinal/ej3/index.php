<?php
session_start();

// Recuperamos la matriz de posiciones de la sesión
if (isset($_SESSION['posiciones'])) {
    $posiciones = $_SESSION['posiciones'];
} else { 
    $_SESSION['posiciones'] = [];
}

// Si se ha enviado el formulario
if (isset($_POST['x']) && isset($_POST['y'])) {
    // Recuperamos las casillas seleccionada desde el formulario
    $casillaX = $_POST['x'];
    $casillaY = $_POST['y'];

    // Comprobamos que las coordenadas sean números de 0-9
    if (ctype_digit($casillaX) && ctype_digit($casillaY) && $casillaX >= 0 && $casillaX <= 9 && $casillaY >= 0 && $casillaY <= 9) {
        $casillaNueva = $casillaX . "-" . $casillaY;

        // Comprobamos que la posición no está ya en la sesión
        if (!in_array($casillaNueva, $posiciones)) {
            // Agregamos la nueva posición al principio de la matriz de posiciones
            array_unshift($posiciones, $casillaNueva);

            // Actualizamos la información de la sesión con la nueva matriz de posiciones
            $_SESSION['posiciones'] = $posiciones;
        } else {
            // La posición ya está en la sesión, mostramos un mensaje de error
            $mensaje = "La posición ya está en la sesión";
        }
    } else {
        // Las coordenadas no son números de 0-9, mostramos un mensaje de error
        $mensaje = "Las coordenadas deben ser números de 0 a 9";
    }
}

// Si se ha enviado el formulario para limpiar
if (isset($_POST['op']) && $_POST['op'] == 'limpiar') {
    // Eliminamos todas las posiciones
    $posiciones = [];
    $_SESSION['posiciones'] = $posiciones;
    $mensaje = "Tablero limpio";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <style>
        td {
            border: 1px solid green;
            min-width: 30px;
            height: 30px;
            text-align: center;
            vertical-align: middle;
        }

        .blue {
            background-color: lightblue;
        }
    </style>
</head>

<body>
    <?php if (isset($mensaje)) : ?>
        <h2><?= $mensaje ?></h2>
    <?php endif; ?>
    <table>

        <tr>
            <th></th>
            <?php for ($x = 0; $x < 10; $x++) : ?>
                <th><?= $x ?></th>
            <?php endfor; ?>
        </tr>
        <?php for ($y = 0; $y < 10; $y++) : ?>
            <tr>
                <th><?= $y ?></th>
                <?php
                for ($x = 0; $x < 10; $x++) :
                    if (in_array($x . '-' . $y, $posiciones))
                        $class = 'blue';
                    else
                        $class = '';
                ?>
                    <td class='<?= $class ?>'>
                        <?= $class ? "x" : "" ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    <form action="" method="post">
        <label for="x">Posicion x: <input type="text" name="x" id="x"></label><br>
        <label for="y">Posicion y: <input type="text" name="y" id="y"></label><br>
        <input type="submit" value="Marcar">
    </form>
    <form action="" method="post">
        <input type="hidden" name="op" value="limpiar">
        <input type="submit" value="Limpiar Tablero">
    </form>
</body>

</html>


