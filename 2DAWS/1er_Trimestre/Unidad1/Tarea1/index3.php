<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index 3</title>
</head>
<body>
<div class="main">
        <div class="top">
            <div class="logo">
                <img id="imagenBanner" src="https://www.veryicon.com/download/png/miscellaneous/learning-software/sudoku-2?s=256" alt="Logo Juego Sudooku">
            </div>
            <div class="list">
                <ul style="list-style: none;">
                    <li>Página Ejemplo 1</li>
                    <li>Página Ejemplo 2</li>
                    <li>Página Ejemplo 3</li>
                    <li>Página Ejemplo 4</li>
                </ul>

            </div>
            <br style="clear:both;"/>
        </div>
        <div class="col1"></div>
        <div class="col2"></div>
        <div class="down"></div>
    </div>

    <div class="barraLat">
        <section>Mov 1</section>
        <section>Mov 2</section>
        <section>Mov 3</section>
        <section>Mov 4</section>
        <section>Mov 5</section>
    </div>
    
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