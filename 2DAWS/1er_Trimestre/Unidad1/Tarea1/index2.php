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
    if (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayFacil" && isset($_POST['enviar']) && $_POST['enviar'] == "Elegir") {
        crearSudoku($arrayFacil, "nivelFacil");
        $arrayFacilJuego = $arrayFacil;
        $arrayCodificado = base64_encode(serialize($arrayFacilJuego));
    } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayMedio" && $_POST['enviar'] == "Elegir") {
        crearSudoku($arrayMedio, "nivelMedio");
        $arrayMedioJuego = $arrayMedio;
        $arrayCodificado = base64_encode(serialize($arrayMedioJuego));
    } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayDificil" && $_POST['enviar'] == "Elegir") {
        crearSudoku($arrayDificil, "nivelDificil");
        $arrayDificilJuego = $arrayDificil;
        $arrayCodificado = base64_encode(serialize($arrayDificilJuego));
    } else {
        // Mostrar ERROR, POR HACER
    }

    // TENGO QUE SERIALIZAR Y PASARLO SERIALIZADO EN BUCLE, YA QUE AHORA MISMO NO ME LO ESTÁ HACIENDO
    print_r($_POST);

    // SI PULSA AÑADIR NÚMERO
    if (!empty($_POST['botonSubmit']) && $_POST['botonSubmit'] == "Insertar") {
        $miArray = unserialize(base64_decode($_POST['arrayCodificado']));
        comprobarDatos();

        if (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayFacil") {
            print_r($_POST);
            insertarNumero($miArray, $_POST['numeroIntroducir'], $_POST['filaNumero'] - 1, $_POST['columnaNumero'] - 1);
            crearSudoku($miArray, "nivelFacil");
            $arrayCodificado = base64_encode(serialize($miArray));
        }
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

            <input type="hidden" value=<?php echo $arrayCodificado ?> name="arrayCodificado" />
            <input type="hidden" value=<?php echo $_POST['dificultad'] ?> name="dificultad" />

            <input type="submit" name="botonSubmit" value="Insertar" />
            <br>
            <input type="submit" name="botonSubmit" value="Eliminar" />
            <br>
            <input type="submit" name="botonSubmit" value="Candidatos" />
        </form>
    </div>


</body>

</html>