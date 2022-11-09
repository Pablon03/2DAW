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
    @$conexion = new mysqli('localhost', 'root', '', 'datos');

    $error = $conexion->connect_errno;

    if ($error) {
        echo "<script>alert('Error al conectarse con la base de datos')</script>";
        exit();
    } else {

        if (isset($_POST) && !empty($_POST)) {
            if (isset($_POST['addNombre'])) {
                // 1. Gestionamos el añadir
                require_once './functions.php';
                $nuevaKey = obtenerNuevaKey($conexion);
                $nuevoNombre = $_POST['nuevoNombre'];
                insertarDatos($conexion, $nuevaKey, $nuevoNombre);
            } elseif (isset($_POST['actualizar'])) {
                // 2. Gestionamos el actualizar

            } elseif (isset($_POST['delete'])) {
                // 3. Gestionamos el borrar
                $clave = array_keys($_POST['delete']);
                $clave = $clave[0];

                $conexion->query("DELETE * FROM datos WHERE idDatos ='".$clave."'");
            }
        }
        // 4. Gestionamos el mostrar la lista

        $datos = $conexion->query("SELECT * FROM datos");
    ?>
        <h1>Datos</h1>
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <table>
                <?php while ($fila = mysqli_fetch_assoc($datos)) { ?>
                    <tr>
                        <td>
                            <input type="submit" name="delete[<?php echo $fila['idDatos'] ?>]" value="x" />
                            <input type="text" name="name[<?php echo $fila['idDatos'] ?>]" value="<?php echo $fila['nombrePersona'] ?>" />
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td>
                        <input type="text" name="nuevoNombre" value="" placeholder="Introduce su nombre" />
                        <input type="submit" name="addNombre" value="+" />
                    </td>
                </tr>
            </table>
        </form>

    <?php
    }
    $conexion->close();
    ?>
</body>

</html>