<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>Desarrollo Web</title>
     </head>

     <body>

        <?php
            $nombre = $_POST['nombre'];
            $modulos = $_POST['modulos'];
            print "Nombre: ".$nombre."<br />";
            foreach ($modulos as $modulo) {
                print "Modulo: ".$modulo."<br />";
            }

        ?>
     </body>

</html>