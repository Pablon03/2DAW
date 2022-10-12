<?php

/**
 * $arraySudoku incluye el array con los números
 * $nivelDificultad incluye la dificultad que tiene el sudoku
 * En esta función recibiremos el Array que queramos colocar,
 * también la dificultad y con ella crearemos el array según el
 * switch que hemos creado.
 */
function crearSudoku($arraySudoku, $nivelDificultad)
{
    switch ($nivelDificultad) {

            // Creación para el nivel Medio
        case "nivelFacil":
            echo '<div class="sudokuFacil">';
            echo "<p>Fácil</p>";
            echo '<table class="tablaSudoku">';
            echo '<tr>';

            for ($i = 0; $i < 9; $i++) {
                echo '<tr>';
                for ($j = 0; $j < 9; $j++) {
                    // Comprobamos si es numero diferente
                    //a 0, entonces se pondría .
                    if (!empty($arraySudoku[$i][$j])) {
                        echo '<td class="number">' .
                            $arraySudoku[$i][$j] . '</td>';
                    } else {
                        echo '<td class="dot">.</td>';
                    }
                }
                echo "</tr>";
            }
            echo '</table>';
            echo '</div>';
            break;


            // Creación para el nivel Medio
        case "nivelMedio":
            echo '<div class="sudokuMedio">';
            echo "<p>Medio</p>";
            echo '<table class="tablaSudoku">';
            echo '<tr>';

            for ($i = 0; $i < 9; $i++) {
                echo '<tr>';
                for ($j = 0; $j < 9; $j++) {
                    // Comprobamos si es numero diferente
                    //a 0, entonces se pondría .
                    if (!empty($arraySudoku[$i][$j])) {
                        echo '<td class="number">' .
                            $arraySudoku[$i][$j] . '</td>';
                    } else {
                        echo '<td class="dot">.</td>';
                    }
                }
                echo "</tr>";
            }
            echo '</table>';
            echo '</div>';
            break;

            // Creación para el nivel Dificil
        case "nivelDificil":
            echo '<div class="sudokuDificil">';
            echo "<p>Dificil</p>";
            echo '<table class="tablaSudoku">';
            echo '<tr>';

            for ($i = 0; $i < 9; $i++) {
                echo '<tr>';
                for ($j = 0; $j < 9; $j++) {
                    // Comprobamos si es numero diferente
                    //a 0, entonces se pondría .
                    if (!empty($arraySudoku[$i][$j])) {
                        echo '<td class="number">' .
                            $arraySudoku[$i][$j] . '</td>';
                    } else {
                        echo '<td class="dot">.</td>';
                    }
                }
                echo "</tr>";
            }
            echo '</table>';
            echo '</div>';
            break;
        default:;
    }
}


/**
 * Esta función comprueba los datos metidos, en caso de que alguno de ellos
 * sea incorrecto se devolverá el valor TRUE para que muestre el error 
 * correspondiente y se trate con ese TRUE las excepciones.
 */
function comprobarDatos()
{
    // Comprobar datos del Número Introducido
    if (!empty($_POST['numeroJuego'])) {
        if ($_POST['numeroJuego'] > 9 || $_POST['numeroJuego'] < 1) {
            echo '<h3>El número introducido es incorrecto</h3>';
            return true;
        }
    }

    // Comprobar si la fila es válida
    if (!empty($_POST['filaNumero'])) {
        if (
            $_POST['filaNumero'] > 9 ||
            $_POST['filaNumero'] < 1
        ) {
            echo '<h3>El número de Fila introducido es incorrecto</h3>';
            return true;
        }
    }

    // Comprobar si la columna es válida
    if (!empty($_POST['columnaNumero'])) {
        if (
            $_POST['columnaNumero'] > 9 ||
            $_POST['columnaNumero'] < 1
        ) {
            echo '<h3>El número de Columna es incorrecto</h3>';
            return true;
        }
    }
}

/**
 * Le pasamos el Array 'Plantilla' y el array del juego, también el número que queremos
 * meter como su fila y su columna. Con esto, comprobamos si el Array 'Plantilla' está vacío o no.
 * En caso de estar vacío meteremos el número en el de juego, en caso de no estar vacío mandaremos un mensaje de error.
 * Lo devolvemos para que cuando volvamos a hacer POST siempre lo tengamos presente
 */
function insertarNumero($arrayInicial, $arrayModificar, $numero, $fila, $columna)
{
    if (empty($arrayInicial[$fila][$columna])) {
        $arrayModificar[$fila][$columna] = $numero;
    } else {
        echo '<h5>Usted ha intentado introducir un número que ya estaba<br>puesto por defecto, eso no se puede hacer</h5>';
    }

    return $arrayModificar;
}

/**
 * En esta función vamos a comprobar si el número es nuevo o es antiguo, para ello usaremos condicionales
 * y veremos si ese número se encuentra en el array prefedinido pues no habrá que modificarlo, en caso de
 * que sea nuevo número se pondrá en color azul al igual que los puntos.
 */
function crearSudokuJuego($arrayInicial, $arrayJuego, $nivelDificultad)
{

    switch ($nivelDificultad) {

            // Creación para el nivel Medio
        case "nivelFacil":
            echo '<div class="sudokuFacil">';
            echo "<p>Fácil</p>";
            echo '<table class="tablaSudoku">';
            echo '<tr>';

            for ($i = 0; $i < 9; $i++) {
                echo '<tr>';
                for ($j = 0; $j < 9; $j++) {
                    // Comprobamos si es numero diferente
                    //a 0, entonces se pondría .
                    if (!empty($arrayJuego[$i][$j]) && $arrayJuego[$i][$j] == $arrayInicial[$i][$j]) {
                        echo '<td class="number">' .
                            $arrayJuego[$i][$j] . '</td>';
                    } else if (!empty($arrayJuego) && $arrayJuego[$i][$j] != $arrayInicial[$i][$j]) {
                        echo '<td class="dot">' . $arrayJuego[$i][$j] . '</td>';
                    } else {
                        echo '<td class="dot">.</td>';
                    }
                }
                echo "</tr>";
            }
            echo '</table>';
            echo '</div>';
            break;

        case "nivelMedio":
            echo '<div class="sudokuMedio">';
            echo "<p>Medio</p>";
            echo '<table class="tablaSudoku">';
            echo '<tr>';

            for ($i = 0; $i < 9; $i++) {
                echo '<tr>';
                for ($j = 0; $j < 9; $j++) {
                    // Comprobamos si es numero diferente
                    //a 0, entonces se pondría .
                    if (!empty($arrayJuego[$i][$j]) && $arrayJuego[$i][$j] == $arrayInicial[$i][$j]) {
                        echo '<td class="number">' .
                            $arrayJuego[$i][$j] . '</td>';
                    } else if (!empty($arrayJuego) && $arrayJuego[$i][$j] != $arrayInicial[$i][$j]) {
                        echo '<td class="dot">' . $arrayJuego[$i][$j] . '</td>';
                    } else {
                        echo '<td class="dot">.</td>';
                    }
                }
                echo "</tr>";
            }
            echo '</table>';
            echo '</div>';
            break;

        case "nivelDificil":
            echo '<div class="sudokuDificil">';
            echo "<p>Medio</p>";
            echo '<table class="tablaSudoku">';
            echo '<tr>';

            for ($i = 0; $i < 9; $i++) {
                echo '<tr>';
                for ($j = 0; $j < 9; $j++) {
                    // Comprobamos si es numero diferente
                    //a 0, entonces se pondría .
                    if (!empty($arrayJuego[$i][$j]) && $arrayJuego[$i][$j] == $arrayInicial[$i][$j]) {
                        echo '<td class="number">' .
                            $arrayJuego[$i][$j] . '</td>';
                    } else if (!empty($arrayJuego) && $arrayJuego[$i][$j] != $arrayInicial[$i][$j]) {
                        echo '<td class="dot">' . $arrayJuego[$i][$j] . '</td>';
                    } else {
                        echo '<td class="dot">.</td>';
                    }
                }
                echo "</tr>";
            }
            echo '</table>';
            echo '</div>';
            break;
    }
}


function eliminarNumero($arrayInicial, $arrayModificar, $numeroEliminar, $fila, $columna)
{

    if (empty($arrayInicial[$fila][$columna])) {
        print_r($arrayModificar);
        print_r($fila);
        print($columna);

        if (!empty($arrayModificar[$fila][$columna]) && $arrayModificar[$fila][$columna] == $numeroEliminar) {
            $arrayModificar[$fila][$columna] = 0;
        } else if (!empty($arrayModificar[$fila][$columna]) && $arrayModificar[$fila][$columna] != $numeroEliminar) {
            echo '<h5>El número introducido no coincide con la posición seleccionada</h5>';
        } else {
            echo '<h5>Ha introducido una posición vacía</h5>';
        }
    } else {
        echo '<h5>Usted ha intentado eliminar un número que ya estaba<br>puesto por defecto, eso no se puede hacer</h5>';
    }

    return $arrayModificar;
}

function comprobarCandidatos1($arrayModificar, $fila, $columna)
{

    $arrayCompleto = range(1, 9);

    $valoresCandidatosFila = array_diff($arrayCompleto, $arrayModificar[$fila]);
    $valoresCandidatosColumna = array_diff($arrayCompleto, $arrayModificar[$columna]);

    $candidatosFinal = array_merge($valoresCandidatosFila, $valoresCandidatosColumna);

    print_r($candidatosFinal);
}

function comprobarCandidatos($arrayModificar, $fila, $columna)
{
    // Rango de números posibles en una celda
    $arrayCompleto = range(1, 9);

    // Coge los valores que falta en la fila seleccionada
    $valoresCandidatosFila = array_diff($arrayCompleto, $arrayModificar[$fila]);

    // Me da los valores del array de columna que se le indica
    $datosColumna = array_column($arrayModificar, $columna);

    // Me da los valores que faltan en esa columna
    $valoresCandidatosColumna = array_diff($arrayCompleto, $datosColumna);

    $filaInicial = filaInicial($fila, $columna);
    $filaFinal = filaFinal($fila, $columna);
    $columnaInicial = columnaInicial($fila, $columna);
    $columnaFinal = columnaFinal($fila, $columna);
    $valoresCuadro = array();
    $contadorCuadro = 0;


    for ($i = $filaInicial; $i <= $filaFinal; $i++) {
        for ($j = $columnaInicial; $j <= $columnaFinal; $j++) {
            if (isset($arrayModificar[$i][$j])) {
                $valoresCuadro[$contadorCuadro] = $arrayModificar[$i][$j];
                $contadorCuadro += 1;
            }
        }
    }

    // Coge los valores que falta en el cuadro seleccionada
    $candidatosCuadro = array_diff($arrayCompleto, $valoresCuadro);

    // Array con la unión de los números que coinciden en los 3 arrays, es decir, si coinciden en los tres
    // son los Candidatos a colocarse en dicha celda
    $result_array = array_intersect_assoc($valoresCandidatosFila, $valoresCandidatosColumna, $candidatosCuadro);
    return $result_array;
    //print_r($result_array);
}

/**
 * Recibe los datos de fila y columna y devuelve el índice del cuadro en el que se encuentra
 */
function calcularCuadro($fila, $columna)
{

    if (($fila == 0 || $fila == 1 || $fila == 2) && ($columna == 0 || $columna == 1 || $columna == 2)) {
        return 0;
    } elseif (($fila == 0 || $fila == 1 || $fila == 2) && ($columna == 3 || $columna == 4 || $columna == 5)) {
        return 1;
    } elseif (($fila == 0 || $fila == 1 || $fila == 2) && ($columna == 6 || $columna == 7 || $columna == 8)) {
        return 2;
    } elseif (($fila == 3 || $fila == 4 || $fila == 5) && ($columna == 0 || $columna == 1 || $columna == 2)) {
        return 3;
    } elseif (($fila == 3 || $fila == 4 || $fila == 5) && ($columna == 3 || $columna == 4 || $columna == 5)) {
        return 4;
    } elseif (($fila == 3 || $fila == 4 || $fila == 5) && ($columna == 6 || $columna == 7 || $columna == 8)) {
        return 5;
    } elseif (($fila == 6 || $fila == 7 || $fila == 8) && ($columna == 0 || $columna == 1 || $columna == 2)) {
        return 6;
    } elseif (($fila == 6 || $fila == 7 || $fila == 8) && ($columna == 3 || $columna == 4 || $columna == 5)) {
        return 7;
    } elseif (($fila == 6 || $fila == 7 || $fila == 8) && ($columna == 6 || $columna == 7 || $columna == 8)) {
        return 8;
    }
}

/**
 * Recibe la fila y columna y devuelve la fila inicial del cuadro al que pertenecen.
 */
function filaInicial($fila, $columna)
{
    $indiceCuadro = calcularCuadro($fila, $columna);

    switch ($indiceCuadro) {
        case 0;
            return 0;
            break;
        case 1;
            return 0;
            break;
        case 2;
            return 0;
            break;
        case 3:
            return 3;
            break;
        case 4:
            return 3;
            break;
        case 5:
            return 3;
            break;
        case 6:
            return 6;
            break;
        case 7:
            return 6;
            break;
        case 8:
            return 6;
            break;
        default:
            break;
    }
}

/**
 * Recibe la fila y columna y devuelve la fila final del cuadro al que pertenecen.
 */
function filaFinal($fila, $columna)
{
    $indiceCuadro = calcularCuadro($fila, $columna);

    switch ($indiceCuadro) {
        case 0:
            return 2;
            break;
        case 1:
            return 2;
            break;
        case 2:
            return 2;
            break;
        case 3:
            return 5;
            break;
        case 4:
            return 5;
            break;
        case 5:
            return 5;
            break;
        case 6:
            return 8;
            break;
        case 7:
            return 8;
            break;
        case 8:
            return 8;
            break;
        default:
            break;
    }
}

/**
 * Recibe la fila y columna y devuelve la columna inicial del cuadro al que pertenecen.
 */
function columnaInicial($fila, $columna)
{
    $indiceCuadro = calcularCuadro($fila, $columna);

    switch ($indiceCuadro) {
        case 0;
            return 0;
            break;
        case 1;
            return 3;
            break;
        case 2;
            return 6;
            break;
        case 3:
            return 0;
            break;
        case 4:
            return 3;
            break;
        case 5:
            return 6;
            break;
        case 6:
            return 0;
            break;
        case 7:
            return 3;
            break;
        case 8:
            return 6;
            break;
        default:
            break;
    }
}
/**
 * Recibe la fila y columna y devuelve la columna final del cuadro al que pertenecen.
 */
function columnaFinal($fila, $columna)
{
    $indiceCuadro = calcularCuadro($fila, $columna);

    switch ($indiceCuadro) {
        case 0:
            return 2;
            break;
        case 1:
            return 5;
            break;
        case 2:
            return 8;
            break;
        case 3:
            return 2;
            break;
        case 4:
            return 5;
            break;
        case 5:
            return 8;
            break;
        case 6:
            return 2;
            break;
        case 7:
            return 5;
            break;
        case 8:
            return 8;
            break;
        default:
            break;
    }
}
