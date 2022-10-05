<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./styles.css" />
    <title>Document</title>
</head>

<body>
    <?php
    require './generaTabla.php';
    require './definicionSudokus.php';

    if (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayFacil") {
        crearSudoku($arrayFacil, "nivelFacil");
    } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayMedio") {
        crearSudoku($arrayMedio, "nivelMedio");
    } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayDificil") {
        crearSudoku($arrayDificil, "nivelDificil");
    } else {
        // Mostrar ERROR, POR HACER
    }
    ?>
</body>

</html>