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