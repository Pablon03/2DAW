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
            margin: 0;
            padding: 15px; 
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;    
            background-color: white;
        }


    </style>
</head>
<body>
    <?php
        // SI LE DAN A ENVIAR
        if(isset($_POST['enviar'])){

            // SI NOMBRE ESTÁ VACÍO MUESTRA FORM + ERROR
            if(empty($_POST['nombre'])){
    ?>
                <div class="caja">
                <img src="https://www.instagram.com/static/images/web/logged_out_wordmark.png/7a252de00b20.png">
                <form method="POST" action="">
                    <p>Su nombre: </p>
                    <input type="text" name="nombre" placeholder="Teléfono, usuario o correo electrónico"><br/>
                    <p>Asignaturas que cursa: </p>
                    <input type="checkbox" name="modulos[]" value="DWES">
                    Desarrollo Web en Entorno Servidor<br/>
                    <input type="checkbox" name="modulos[]" value="DWEC">
                    Desarrollo Web en Entorno Cliente<br/>
                    <input type="submit" name="enviar">
                </form>
                <h1>Por favor, debe rellenar el campo de nombre</h1>
        
            <?php
            // SI MODULO ESTÁ VACÍO MUESTRA FORM + ERROR
            } elseif (empty($_POST['modulos'])){
            ?>
                <div class="caja">
                <img src="https://www.instagram.com/static/images/web/logged_out_wordmark.png/7a252de00b20.png">
                <form method="POST" action="">
                    <p>Su nombre: </p>
                    <input type="text" name="nombre" placeholder="Teléfono, usuario o correo electrónico"><br/>
                    <p>Asignaturas que cursa: </p>
                    <input type="checkbox" name="modulos[]" value="DWES">
                    Desarrollo Web en Entorno Servidor<br/>
                    <input type="checkbox" name="modulos[]" value="DWEC">
                    Desarrollo Web en Entorno Cliente<br/>
                    <input type="submit" name="enviar">
                </form>
                <h1>Por favor, debe rellenar el campo de módulos</h1>
            <?php
            // SI AMBOS ESTÁN RELLENOS MUESTRA EL RESULTADO
            } else {
            ?>
            <?php
                $nombre = $_POST['nombre'];
                $modulos = $_POST['modulos'];

                print "Nombre del alumno: ".$nombre."<br/>";

                foreach($modulos as $modulo ){
                    print "Cursa el siguiente módulo ".$modulo."<br/>";
                }
            }
            ?>
    </div> 
    <?php
        // SI NO LE DAN A ENVIAR MUESTRA EL FORM
        } else {
    ?>
            <div class="caja">
                <img src="https://www.instagram.com/static/images/web/logged_out_wordmark.png/7a252de00b20.png">
                <form method="POST" action="">
                    <p>Su nombre: </p>
                    <input type="text" name="nombre" placeholder="Teléfono, usuario o correo electrónico"><br/>
                    <p>Asignaturas que cursa: </p>
                    <input type="checkbox" name="modulos[]" value="DWES">
                    Desarrollo Web en Entorno Servidor<br/>
                    <input type="checkbox" name="modulos[]" value="DWEC">
                    Desarrollo Web en Entorno Cliente<br/>
                    <input type="submit" name="enviar">
                </form>
                
        <?php
        }
        ?>
            </div> 
</body>
</html>