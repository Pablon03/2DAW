<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <title>Juega a Sudoku Online</title>
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
    <div class="tablaSudokus">

        <!-- Creación de las tres tablas -->
        <?php include './definicionSudokus.php'; ?>
        <?php require './funciones.php'; ?>

        <?php
        crearSudoku($arrayFacil, 'nivelFacil');
        crearSudoku($arrayMedio, 'nivelMedio');
        crearSudoku($arrayDificil, 'nivelDificil');
        ?>
    </div>

    <div class="formulario">
        <form action="./index2.php" method="POST">
            <input type="radio" id="facil" name="dificultad" value="arrayFacil" checked>
            <label for="facil">Facil</label>
            <input type="radio" id="medio" name="dificultad" value="arrayMedio">
            <label for="medio">Medio</label>
            <input type="radio" id="dificil" name="dificultad" value="arrayDificil">
            <label for="dificil">Dificil</label><br>
            <input type="submit" name="enviar" value="Elegir" />
        </form>
    </div>
</body>

</html>