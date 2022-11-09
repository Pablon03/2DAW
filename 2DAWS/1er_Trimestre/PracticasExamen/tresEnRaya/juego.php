<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($_REQUEST) {
        $tableroJuego = unserialize(base64_decode($_POST['tableroJuego']));
        require_once './tablero.php';
        require_once './functions.php';

        $tableroJuego = meterRespuesta($tableroJuego);
        mostrarTablero($tableroJuego);
        comprobacionGanador($tableroJuego);

        // Sumamos el turno
        $turno = $_POST['turno'];
        $turno = $turno +1;


        if ($turno % 2 === 0 || $turno % 5 === 0) {
            require_once './functions.php';
            turnoJ1($turno, $tableroJuego);
        } else {
            require_once './functions.php';
            turnoJ2($turno, $tableroJuego);
        }
        
    } else {
        echo "<h2> Empecemos a Jugar </h2>";
        require_once './tablero.php';
        require_once './functions.php';
        mostrarTablero($tablero);
        $tableroJuego = $tablero;

        echo "<h2>Bienvenido al juego</h2>";
        $turno = 0;

        if ($turno === 0) {
            require_once './functions.php';
            turnoJ1($turno, $tableroJuego);
        }

    }
    ?>

</body>
</html>