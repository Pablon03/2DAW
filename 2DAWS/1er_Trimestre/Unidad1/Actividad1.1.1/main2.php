<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>

        body{
            background-color: #1d1d1d;
        }

        .caja{
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 100px;
        }

        .form{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 450px;
            width: 650px;
            background-color: white;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <?php

        // En caso de que exista nombre y módulos, me lo mandará
        if(!empty($_POST['nombre'] && !empty($_POST['modulos']))){
            $nombre = $_POST['nombre'];
            $modulos = $_POST['modulos'];

            print "Nombre del alumno: ".$nombre."<br/>";

            foreach($modulos as $modulo ){
                print "Cursa el siguiente módulo ".$modulo."<br/>";
            }

        } else {
    ?>

    <div class="caja">
        <div class="form">
        <img src="https://www.instagram.com/static/images/web/logged_out_wordmark.png/7a252de00b20.png">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">

            <!-- Mostrar mensaje de error Nombre -->
            <?php
            if(empty($_POST['nombre']) && isset($_POST['enviar'])){
            ?>

                <h2>-_- Debe indicar su nombre.</h2>

            <?php
            }
            ?>

            <!-- Nombre -->
            <p>Su nombre: </p>
            <input type="text" value="<?php if(!empty($_POST['nombre'])){echo $_POST["nombre"];}?>"
            name="nombre" placeholder="Teléfono, usuario o correo electrónico">
            <br/>

            <!-- Mostrar mensaje de error Módulo -->
            <?php
            if(empty($_POST['modulos']) && isset($_POST['enviar'])){
            ?>

                <h2>-_- Debe marcar al menos un módulo</h2>

            <?php
            }
            ?>
            <!-- Módulos -->
            <p>Asignaturas que cursa: </p>

            <!-- Comprobación para que los checkbox se mantengan -->

                <input type="checkbox" name="modulos[]" value="DWES" <?php if(in_array("DWES",$_POST['modulos'])){echo 'checked';} ?>>
                Desarrollo Web en Entorno Servidor
                <br/>

                <input type="checkbox" name="modulos[]" value="DWEC" <?php if(in_array("DWEC",$_POST['modulos'])){echo 'checked';} ?>>
                Desarrollo Web en Entorno Cliente
                <br/>

            <input type="submit" name="enviar">
        </form>
        
        <?php
        }
        ?>
        </div>
    </div> 
</body>
</html>