<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <title>Juega a Sudoku Online</title>
</head>

<body>


    <div class="tablaSudokus">

        <!-- Creación de las tres tablas -->
        <?php include './definicionSudokus.php'; ?>
        <?php require './generaTabla.php'; ?>

        <?php
        crearSudoku($arrayFacil, 'nivelFacil');
        crearSudoku($arrayMedio, 'nivelMedio');
        crearSudoku($arrayDificil, 'nivelDificil');
        ?>
    </div>

    <div class="formulario">
        <form action="./pantalla2.php" method="POST">
            <input type="radio" id="facil" name="dificultad" value="arrayFacil" checked>
            <label for="facil">Facil</label><br>
            <input type="radio" id="medio" name="dificultad" value="arrayMedio">
            <label for="medio">Medio</label><br>
            <input type="radio" id="dificil" name="dificultad" value="arrayDificil">
            <label for="dificil">Dificil</label>
            <input type="submit" name="enviar" value="Elegir" />
        </form>
    </div>
</body>

</html>