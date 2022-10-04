<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./styles.css" />
    <title>Document</title>
</head>

<body>


    <div class="tablaSudokus">
        <!-- Tabla Fácil -->
        <div class="sudokuFacil">
            <p>Método Fácil</p>
            <table class="tablaSudoku">

                <?php

                // Creamos el array del sudoku fácil
                $arrayMedio = [
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

                for ($i = 0; $i < 9; $i++) {
                    echo '<tr>';

                    for ($j = 0; $j < 9; $j++) {

                        // Comprobamos si es numero diferente a 0, entonces se pondría .
                        if (!empty($arrayMedio[$i][$j])) {
                            echo '<td class="number">' . $arrayMedio[$i][$j] . '</td>';
                        } else {
                            echo '<td class="dot">.</td>';
                        }

                        // echo '<td>' . $arrayMedio[$i][$j] . '</td>';
                    }
                    echo "</tr>";
                }

                ?>
                </tr>
            </table>
        </div>

        <!-- Creación Sudoku Medio -->
        <div class="sudokuMedio">
            <p>Método Medio</p>
            <table class="tablaSudoku">
                <tr>

                    <?php

                    // Creamos el array del sudoku fácil
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

                    $j = 1; // Creamos una variable para empezar con las columnas

                    // Se llega hasta 81 porque 9x9 es 81
                    for ($i = 0; $i < 81; $i++) {
                        // Comprobamos si es numero diferente a 0, entonces se pondría .
                        if (!empty($arrayFacil[$i])) {
                            echo '<td class="number">' . $arrayFacil[$i] . '</td>';
                        } else {
                            echo '<td class="dot">.</td>';
                        }

                        if ($j % 9 == 0)  // Comprobamos si es cero o no para meter una nueva fila
                        {
                            echo "</tr><tr>";
                        }


                        $j++;
                    } // Se incrementa el valor del contador de columnas
                    ?>
                </tr>
            </table>
        </div>

        <!-- Creación Sudoku Dificil -->
        <div class="sudokuDificil">
            <p>Método Medio</p>
            <table class="tablaSudoku">
                <tr>

                    <?php

                    // Creamos el array del sudoku fácil
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

                    $j = 1; // Creamos una variable para empezar con las columnas

                    // Se llega hasta 81 porque 9x9 es 81
                    for ($i = 0; $i < 81; $i++) {
                        // Comprobamos si es numero diferente a 0, entonces se pondría .
                        if (!empty($arrayFacil[$i])) {
                            echo '<td class="number">' . $arrayFacil[$i] . '</td>';
                        } else {
                            echo '<td class="dot">.</td>';
                        }

                        if ($j % 9 == 0)  // Comprobamos si es cero o no para meter una nueva fila
                        {
                            echo "</tr><tr>";
                        }


                        $j++;
                    } // Se incrementa el valor del contador de columnas
                    ?>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>