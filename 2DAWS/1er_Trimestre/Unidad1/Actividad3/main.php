<!-- Programa que pida fecha y hora actual y fecha y hora del vuelo, sacar por pantalla la fecha restante de lo que queda. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fecha y hora restante</title>
</head>
<body>
    
    <?php
        $horaactual = new DateTime($_POST['fechaActual']);
        $horavuelo = new DateTime($_POST['fechaVuelo']);

        $horaActualTime = strtotime($_POST['fechaActual']);
        $horaVueloTime = strtotime($_POST['fechaVuelo']);

        $restaFecha = $horaActualTime - $horaVueloTime;

        $diferenciaFecha = getdate($restaFecha);

        $interval= $horaactual->diff($horavuelo);

        echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <label for="hora">Introduce la fecha y hora actual</label>
        <input type="date" name="fechaActual">
        <br/>
        <label for="hora">Introduce la fecha y hora del vuelo</label>
        <input type="date" name="fechaVuelo">
        
        <input type="submit" name="enviar">
    </form>
    
</body>
</html>