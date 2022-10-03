<!-- Programa que pida fecha y hora actual y fecha y hora del vuelo, sacar por pantalla la fecha restante de lo que queda. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fecha y hora restante vuelos</title>
    <link rel="stylesheet" type="text/css" href="./styles.css" />
</head>

<body>

    <?php
    // Si está bien relleno muestra resultado
    if (!empty($_POST['fechaActual']) && !empty($_POST['fechaVuelo'])) {

        $fechaactual = new DateTime($_POST['fechaActual']);
        $fechavuelo = new DateTime($_POST['fechaVuelo']);

        $interval = $fechaactual->diff($fechavuelo);

        echo "difference " . $interval->y . " years, " . $interval->m . " months, " . $interval->d . " days ";
        //echo "<h3>La diferencia es de ".$diff->format("%d")."</h3>";

        if (empty($_POST['horaActual'])){
            echo '<h4> Usted ha dejado vacío el campo de hora actual</h4>';
            
        } elseif (empty($_POST['horaVuelo'])){
            echo '<h4> Usted ha dejado vacío el campo de hora vuelo</h4>';

        } else {
            $horaActual = new DateTime($_POST['horaActual']);
            $horaVuelo = new DateTime($_POST['horaVuelo']);

            $diferenciaHoras = date_diff($horaActual, $horaVuelo);
            $diferenciaHoras = $diferenciaHoras->format('%H:%i:%s');

            echo '<h4>'.$diferenciaHoras.' estas son las horas restantes</h4>'; 
        }

    } else {
    ?>
        <div class="caja">
            <div class="form">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <label for="hora">Introduce la fecha actual</label>
                    <input type="date" name="fechaActual">
                    <br>
                    <label for="hora">Introduce la hora actual</label>
                    <input type="time" name="horaActual">
                    <br>
                    <br>
                    <label for="hora">Introduce la fecha vuelo</label>
                    <input type="date" name="fechaVuelo">
                    <br>
                    <label for="hora">Introduce la hora del vuelo</label>
                    <input type="time" name="horaVuelo">
                    <br>
                    <input type="submit" name="enviar">
                </form>
            </div>
        </div>

    <?php
    }
    ?>


</body>

</html>