<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./styles.css" />
    <title>Document</title>
</head>

<body>

    <?php
    require './funciones.php';
    require './definicionSudokus.php';

    // ESTO SOLO OCURRIRÁ LA PRIMERA VEZ QUE SE ENTRE
    if (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayFacil") {
        crearSudoku($arrayFacil, "nivelFacil");
    } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayMedio") {
        crearSudoku($arrayMedio, "nivelMedio");
    } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayDificil") {
        crearSudoku($arrayDificil, "nivelDificil");
    } else {
        // Mostrar ERROR, POR HACER
    }

    if (!empty($_POST['botonSubmit'])) {
        comprobarDatos();
    }

    ?>

    <div class="formulario">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="numero">Número</label>
            <input type="text" name="numeroIntroducir">
            <br>
            <label for="fila">Fila</label>
            <input type="text" name="filaNumero">
            <br>
            <label for="columna">Columna</label>
            <input type="text" name="columnaNumero">
            <br>
            <input type="submit" name="botonSubmit" value="Insertar" />
            <br>
            <input type="submit" name="botonSubmit" value="Eliminar" />
            <br>
            <input type="submit" name="botonSubmit" value="Candidatos" />
        </form>
    </div>


</body>

</html>