<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./styles.css" />
    <title>Document</title>
</head>

<body>


    <div class="tablaSudokus">

        <!-- Creación de las tres tablas -->
        <?php

        // Creamos el array del sudoku facil
        $arrayFacil = [
            0 => [0, 0, 1, 9, 4, 8, 5, 0, 0],
            1 => [0, 0, 3, 7, 0, 6, 1, 0, 0],
            2 => [0, 5, 0, 0, 0, 0, 0, 7, 0],
            3 => [1, 0, 6, 0, 3, 0, 8, 0, 5],
            4 => [0, 0, 0, 0, 0, 0, 0, 0, 0],
            5 => [3, 0, 2, 0, 9, 0, 6, 0, 7],
            6 => [0, 6, 0, 0, 0, 0, 0, 1, 0],
            7 => [0, 0, 7, 1, 0, 9, 4, 0, 0],
            8 => [0, 0, 5, 8, 6, 3, 7, 0, 0]
        ];

        // Creamos el array del sudoku medio
        $arrayMedio = [
            0 => [0, 0, 0, 0, 8, 4, 0, 0, 2],
            1 => [2, 0, 0, 0, 0, 0, 5, 0, 0],
            2 => [0, 3, 0, 1, 0, 0, 0, 4, 0],
            3 => [0, 8, 5, 0, 0, 9, 0, 0, 0],
            4 => [1, 7, 0, 0, 0, 0, 0, 2, 9],
            5 => [0, 0, 0, 3, 0, 0, 8, 5, 0],
            6 => [0, 6, 0, 0, 0, 5, 0, 7, 0],
            7 => [0, 0, 8, 0, 0, 0, 0, 0, 6],
            8 => [9, 0, 0, 8, 4, 0, 0, 0, 0],
        ];

        // Creamos el array del sudoku dificil
        $arrayDificil = [
            0 => [6, 2, 0, 0, 0, 4, 0, 7, 0],
            1 => [5, 0, 3, 0, 9, 0, 0, 0, 0],
            2 => [8, 0, 0, 0, 6, 0, 0, 3, 0],
            3 => [7, 0, 0, 0, 1, 0, 0, 0, 0],
            4 => [0, 0, 0, 6, 0, 9, 0, 0, 0],
            5 => [0, 0, 0, 0, 8, 0, 0, 0, 6],
            6 => [0, 5, 0, 3, 0, 0, 0, 0, 2],
            7 => [0, 0, 0, 7, 0, 0, 6, 0, 3],
            8 => [0, 7, 0, 2, 0, 0, 0, 1, 8],
        ];

        // Creación de Constantes
        const SUDOKUFACIL = "sudokuFacil";
        const NIVELBAJO = "Nivel Facil";
        const SUDOKUMEDIO = "sudokuMedio";
        const NIVELMEDIO = "Nivel Medio";
        const SUDOKUAVANZADO = "sudokuAvanzado";
        const NIVELAVANZADO = "Nivel Avanzado";
        
        function crearSudoku($arraySudoku, $claseDivSudoku, $nivelDificultad)
        {

            echo "<div class=" . $claseDivSudoku . ">";
            echo "<p>" . $nivelDificultad . "</p>";
            echo '<table class="tablaSudoku">';
            echo '<tr>';

            for ($i = 0; $i < 9; $i++) {
                echo '<tr>';

                for ($j = 0; $j < 9; $j++) {

                    // Comprobamos si es numero diferente a 0, entonces se pondría .
                    if (!empty($arraySudoku[$i][$j])) {
                        echo '<td class="number">' . $arraySudoku[$i][$j] . '</td>';
                    } else {
                        echo '<td class="dot">.</td>';
                    }
                }
                echo "</tr>";
            }
            echo '</table>';
            echo '</div>';
        }

        // Creamos los sudokus
        crearSudoku($arrayFacil, SUDOKUFACIL, NIVELMEDIO);
        crearSudoku($arrayMedio, SUDOKUMEDIO, NIVELMEDIO);
        crearSudoku($arrayDificil, SUDOKUMEDIO, NIVELMEDIO);
        ?>
    </div>
</body>

</html>