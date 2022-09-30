<!-- Vamos a hacer un programa en el cual se solicite presupuesto
mediante un formulario, cada llamada de menos de 5 minutos costará 
0.2$, cada minuto adicional serán 0.05$ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Calcula presupuesto llamadas</title>
</head>

<body>
    <div class="caja">
        <div class="form">
    <?php
        // Definimos constantes
        const MENOS5 = 0.2;
        const MAS5 = 0.05;

        // En caso de que haya minutos mostramos minutos y precios
        if(!empty($_POST['minutos']) && is_numeric($_POST['minutos']) ){


            // Cogemos los minutos en String
            $minutos = $_POST['minutos'];
            // Pasamos de String a formato numerico
            $minutos1 = (float)($minutos);
            print "<h3>Usted ha llamado ".$minutos." minutos</h3>";
            
            if($minutos <= 5){
                print "<h3>El precio de su llamada es de ".MENOS5."$</h3>";

            } else{

                // Restamos para ver lo que se ha pasado de 5
                $restante = $minutos1 - 5;
                $precioAdicional = $restante * MAS5;
                $precioTotal = MENOS5 + $precioAdicional;

                print "<h3>El precio de su llamada es de ".$precioTotal."$</h3>";

            }

    ?>
        </div>
    </div>
    <?php
        } else {
    ?>
    <div class="caja">
        <div class="form">
            <h2>Solicita presupuesto</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <p>
                <input type="text" name="minutos" >
                Minutos de llamada
                </p>
                <input type="submit" name="enviar">
            </form>    
        </div>   
    </div>

    <?php
        }
    ?>

</body>
</html>