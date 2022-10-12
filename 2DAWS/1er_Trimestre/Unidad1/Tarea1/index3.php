<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index 3</title>
</head>
<body>
    <?php
            require_once './funciones.php';
            require_once './definicionSudokus.php';

            for ($i=0; $i < 9; $i++) { 
                for ($j=0; $j < 9; $j++) { 
                    $cuadro = calcularCuadro($i, $j);
                    $filaInicial = filaInicial($i, $j);
                    $filaFinal = filaFinal($i, $j);
                    $columnaInicial = columnaInicial($i, $j);
                    $columnaFinal = columnaFinal($i, $j);
                    echo $i.','.$j.' - '.$cuadro.' ('.$filaInicial.', '.$columnaInicial.') - ('.$filaFinal.', '.$columnaFinal.') |';
                }
                echo '<br>';
            }

    ?>
</body>
</html>