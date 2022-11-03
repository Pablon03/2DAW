<?php
if (!empty($_POST['submit'])) {
            // Mostrar todas las casillas con su imagen, nombre, usuario y un botón
            // a la derecha para editar 

            /**
             * Nuevo Nombre de archivo 
             * */
            $idCliente = $_GET['idCliente'];
            // Cogemos el tmp y le quitamos todo, solo dejamos el nombre
            $tmp = $_FILES['image']['tmp_name'];
            $tmp = substr($tmp, 13);
            $tmp = trim($tmp, '.tmp');
            $tmp = "p" . $tmp;

            $newFilename = "imagen[$idCliente][$tmp]"; // Nuevo nombre
            $newName = $newFilename . ".jpg"; // Ponemos la extensión
            $image = $_FILES['image']['tmp_name']; //TimeStamp Archivo
            $folder = "./image/" . $newName; //Destino de la imagen

            // Hacemos update del proceso
            if (!$insert = $conexion->query("UPDATE clientes SET imagenCliente = '$newName' WHERE  idCliente = '$idCliente'")) {
                echo ("Algo ha salido mal");
            }

            // Movemos el archivo subido a la carpeta que le indicamos
            move_uploaded_file($image, $folder);
        }