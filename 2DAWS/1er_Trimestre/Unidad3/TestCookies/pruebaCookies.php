<?php
session_start();
if (isset($_SESSION['hora'])) {
    $_SESSION['hora'] = date("Y-m-d H:i:s");
    array_push($_SESSION['array'], $_SESSION['hora']);
} else {
    $_SESSION['hora'] = '';
    $arrayFechas = [];
    $_SESSION['array'] = $arrayFechas;
}
?>
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
    if (empty($_SESSION['hora'])) {
        echo '<p>Bienvenido</p>';
    } else {
        $tamañoArray = count($_SESSION['array']);
        for ($i = 0; $i < $tamañoArray; $i++) {
            echo 'Entrada ' . $i . ': ' . $_SESSION['array'][$i] . '<br>';
        }
    }
    ?>
</body>

</html>