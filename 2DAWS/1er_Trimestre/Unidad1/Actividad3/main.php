<!-- Programa que pida fecha y hora actual y fecha y hora del vuelo, sacar por pantalla la fecha restante de lo que queda. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fecha y hora restante vuelos</title>
    <link rel="stylesheet" type="text/css" href="./styles.css" />
</head>

<body>


    <div class="caja">
        <div class="form">
            <h2>Calcula el tiempo restante para tu vuelo</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="columnaizq">
                    <label for="hora">Introduce la fecha actual</label>
                    <input type="date" name="fechaActual">
                    <br>
                    <label for="hora">Introduce la hora actual</label>
                    <input type="time" name="horaActual">
                    <br>
                </div>

                <div class="columnader">
                    <label for="hora">Introduce la fecha vuelo</label>
                    <input type="date" name="fechaVuelo">
                    <br>
                    <label for="hora">Introduce la hora del vuelo</label>
                    <input type="time" name="horaVuelo">
                    <br>
                </div>

                <input style="margin-bottom: 20px;" type="submit" name="enviar" value="Enviar consulta" />
            </form>

            <?php
            if (!empty($_POST['fechaActual']) && !empty($_POST['fechaVuelo'])) {

                $fechaactual = new DateTime($_POST['fechaActual']);
                $fechavuelo = new DateTime($_POST['fechaVuelo']);

                $interval = $fechaactual->diff($fechavuelo);

                echo "<h4>Para que tu avión despegue le quedan <br>". $interval->m . " meses y " . $interval->d . " días.</h4> ";

                if (empty($_POST['horaActual'])) {
                    echo '<h4> Usted ha dejado vacío el campo de hora actual</h4>';
                } elseif (empty($_POST['horaVuelo'])) {
                    echo '<h4> Usted ha dejado vacío el campo de hora vuelo</h4>';
                } else {
                    $horaActual = new DateTime($_POST['horaActual']);
                    $horaVuelo = new DateTime($_POST['horaVuelo']);

                    $diferenciaHoras = date_diff($horaActual, $horaVuelo);
                    $diferenciaHorash = $diferenciaHoras->format('%H');
                    $diferenciaHorasm = $diferenciaHoras->format('%i');

                    echo '<h3>' . $diferenciaHorash . ' horas y '.$diferenciaHorasm.' minutos.</h3>';
                }
            }
            ?>
        </div>
    </div>




</body>

</html>
