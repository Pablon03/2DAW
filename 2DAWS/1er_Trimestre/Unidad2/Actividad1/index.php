<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos - Operaciones CRUD</title>
    <style>
        .mainContainer {
            margin: auto;
        }

        .registroContainer {
            border-right: solid 1px black;
            display: inline-block;
            margin: 1rem;
            padding: 0.5rem;
        }

        .updateContainer {
            margin: 1rem;
            display: inline-block;
        }

        .errorMessage{
            color: red;
        }
    </style>
</head>

<body>
    <?php
    @$conexion = new mysqli('localhost', 'root', '', 'mysql_employees');

    $error = $conexion->connect_errno;

    if ($error != null) {
        echo "<p>Error $error conectando a la base de datos: $dwes->connect_error</p>";
        exit();
    } else {

        // Este código se ejecuta si la conexión con bbdd ha sido buena
        // 0.- Inicialización de variables
        $mensajeErrorCliente = '';

        // 1.- Recogida y gestión de datos del POST

        if (isset($_POST) && !empty($_POST)) {
            print_r($_POST);
            if (isset($_POST['delete'])){
                // Gestionamos el eliminar
                $clave = array_keys($_POST['delete']);
                $clave = $clave[0];
                echo '<br>'.$clave.'<br>';

                // Con este if vamos a eliminar y ver si nos devuelve FALSE (nos da error)
                // y si no afecta a ninguna columna también nos dará error
                if (!$conexion->query('DELETE FROM department WHERE dept_no="' . $clave . '"') || $conexion->affected_rows === 0) {
                    $mensajeErrorCliente == "Ha hecho algo mal";
                }

            } elseif (isset($_POST['add_button'])){
                // Gestionamos el meter un nuevo campo
                //Vamos a acceder al POST donde esté el nombre a añadir
                $nuevoNombre = $_POST['new_department_name'];
                // $compro = $conexion->query("INSERT INTO department (dept_name) VALUES ('.$nuevoNombre.')");
                require_once './funciones.php';
                sumarKey($conexion);
            } elseif (isset($_POST['Actualizar'])){
                // TODO
            }
        }


        // 2.- Generacion e impresión del resultado

        $resultados = $conexion->query('SELECT * FROM department');

    ?>
        <div class="mainContainer">
            <h1>Departamentos</h1>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="addContainer">
                    <input type="submit" value="+" name="add_button"><input type="text" value="" placeholder="Nombre nuevo departamento" name="new_department_name"><br>
                </div>
                <div class="registroContainer">
                    <?php while ($departamento = $resultados->fetch_array()) { ?>
                        <input type="submit" value="x" name="delete[<?php echo $departamento['dept_no']; ?>]"><input type="text" value="<?php echo $departamento['dept_name']; ?>" name="name[<?php echo $departamento['dept_no']; ?>]"><br><br>
                    <?php
                    }
                    ?>
                </div>
                <div class="updateContainer">
                    <input type="submit" value="Actualizar">
                </div>

            </form>
        </div>

        <div class="errorMessage">
            <p><?php echo $mensajeErrorCliente;?></p>
        </div>

    <?php
    }
    $conexion->close();
    ?>
</body>

</html>