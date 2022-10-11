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
        $arrayCodificadoInicial = base64_encode(serialize($arrayFacil));
    } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayMedio" && isset($_POST['enviar']) && $_POST['enviar'] == "Elegir") {
        crearSudoku($arrayMedio, "nivelMedio");
        $arrayMedioJuego = $arrayMedio;
        $arrayCodificado = base64_encode(serialize($arrayMedioJuego));
        $arrayCodificadoInicial = base64_encode(serialize($arrayMedio));
    } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayDificil" && isset($_POST['enviar']) && $_POST['enviar'] == "Elegir") {
        crearSudoku($arrayDificil, "nivelDificil");
        $arrayDificilJuego = $arrayDificil;
        $arrayCodificado = base64_encode(serialize($arrayDificilJuego));
        $arrayCodificadoInicial = base64_encode(serialize($arrayDificil));
    } else {
        // Mostrar ERROR, POR HACER
    }


    // SI PULSA AÑADIR NÚMERO
    if (!empty($_POST['botonSubmit']) && $_POST['botonSubmit'] == "Insertar") {
        $miArray = unserialize(base64_decode($_POST['arrayCodificado']));
        $miArrayInicial = unserialize(base64_decode($_POST['arrayCodificadoInicial']));
        $comprobacion = comprobarDatos();

        // Este if comprueba que la comprobación haya sido correcta, en caso de que el valor sea FALSE
        // quiere decir que no ha ido bien la comprobación, por lo que solo se mostrará el sudoku por
        // pantalla y no se insertará el número en el array de juego, simplemente se mostrará el mensaje de
        // error correspondiente
        if (!$comprobacion) {
            if (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayFacil") {
                $miArray = insertarNumero($miArrayInicial, $miArray, $_POST['numeroJuego'], $_POST['filaNumero'] - 1, $_POST['columnaNumero'] - 1);
                crearSudokuJuego($miArrayInicial, $miArray, "nivelFacil");
            } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayMedio") {
                $miArray = insertarNumero($miArrayInicial, $miArray, $_POST['numeroJuego'], $_POST['filaNumero'] - 1, $_POST['columnaNumero'] - 1);
                crearSudokuJuego($miArrayInicial, $miArray, "nivelMedio");
            } else {
                $miArray = insertarNumero($miArrayInicial, $miArray, $_POST['numeroJuego'], $_POST['filaNumero'] - 1, $_POST['columnaNumero'] - 1);
                crearSudokuJuego($miArrayInicial, $miArray, "nivelDificil");
            }
        } else {
            if (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayFacil") {
                crearSudokuJuego($miArrayInicial, $miArray, "nivelFacil");
            } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayMedio") {
                crearSudokuJuego($miArrayInicial, $miArray, "nivelMedio");
            } else {
                crearSudokuJuego($miArrayInicial, $miArray, "nivelDificil");
            }
        }

        $arrayCodificado = base64_encode(serialize($miArray));
        $arrayCodificadoInicial = base64_encode(serialize($miArrayInicial));
    }

    // SI PULSA EL BOTÓN ELIMINAR
    if (!empty($_POST['botonSubmit']) && $_POST['botonSubmit'] == "Eliminar") {
        $miArray = unserialize(base64_decode($_POST['arrayCodificado']));
        $miArrayInicial = unserialize(base64_decode($_POST['arrayCodificadoInicial']));
        $comprobacion = comprobarDatos();

        // Es decir, si no ha ocurrido un error en la comprobación entrará en el IF
        if (!$comprobacion) {
            if (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayFacil") {
                $miArray = eliminarNumero($miArrayInicial, $miArray, $_POST['numeroJuego'], $_POST['filaNumero'] - 1, $_POST['columnaNumero'] - 1);
                crearSudokuJuego($miArrayInicial, $miArray, "nivelFacil");
            } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayMedio") {
                $miArray = eliminarNumero($miArrayInicial, $miArray, $_POST['numeroJuego'], $_POST['filaNumero'] - 1, $_POST['columnaNumero'] - 1);
                crearSudokuJuego($miArrayInicial, $miArray, "arrayMedio");
            } else {
                $miArray = eliminarNumero($miArrayInicial, $miArray, $_POST['numeroJuego'], $_POST['filaNumero'] - 1, $_POST['columnaNumero'] - 1);
                crearSudokuJuego($miArrayInicial, $miArray, "nivelDificil");
            }
        } else {
            if (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayFacil") {
                crearSudokuJuego($miArrayInicial, $miArray, "nivelFacil");
            } elseif (!empty($_POST['dificultad']) && $_POST['dificultad'] == "arrayMedio") {
                crearSudokuJuego($miArrayInicial, $miArray, "nivelMedio");
            } else {
                crearSudokuJuego($miArrayInicial, $miArray, "nivelDificil");
            }
        }

        $arrayCodificado = base64_encode(serialize($miArray));
        $arrayCodificadoInicial = base64_encode(serialize($miArrayInicial));
    }

    // SI PULSA EL BOTÓN CANDIDATOS
    if (!empty($_POST['botonSubmit']) && $_POST['botonSubmit'] == "Candidatos") {
        $miArray = unserialize(base64_decode($_POST['arrayCodificado']));
        $miArrayInicial = unserialize(base64_decode($_POST['arrayCodificadoInicial']));
        $comprobacion = comprobarDatos();

        // Es decir, si no ha ocurrido un error en la comprobación entrará en el IF
        if (!$comprobacion) {
            $arrayCandidatos = comprobarCandidatos($miArray, $_POST['filaNumero'] - 1, $_POST['columnaNumero'] - 1);
            crearSudokuJuego($miArrayInicial, $miArray, "nivelFacil");
        } else {
        }

        $arrayCodificado = base64_encode(serialize($miArray));
        $arrayCodificadoInicial = base64_encode(serialize($miArrayInicial));
    }

    ?>

    <div class="formulario">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="numero">Número</label>
            <input type="number" name="numeroJuego">
            <br>
            <label for="fila">Fila</label>
            <input type="text" name="filaNumero">
            <br>
            <label for="columna">Columna</label>
            <input type="text" name="columnaNumero">
            <br>

            <input type="hidden" value=<?php echo $arrayCodificadoInicial ?> name="arrayCodificadoInicial" />
            <input type="hidden" value=<?php echo $arrayCodificado ?> name="arrayCodificado" />
            <input type="hidden" value=<?php echo $_POST['dificultad'] ?> name="dificultad" />

            <input type="submit" name="botonSubmit" value="Insertar" />
            <br>
            <input type="submit" name="botonSubmit" value="Eliminar" />
            <br>
            <input type="submit" name="botonSubmit" value="Candidatos" />
            <?php
            // Este IF entra si en el array hay datps
            if (isset($arrayCandidatos)) {
                for ($i = 0; $i < count($arrayCandidatos); $i++) {
                    // Si $arrayCandidatos[$i] está lleno lo imprime
                    if (isset($arrayCandidatos[$i])) {
                        print '<a>' . $arrayCandidatos[$i] . ', </a>';
                    }
                }
            }
            ?>
        </form>
    </div>


</body>

</html>