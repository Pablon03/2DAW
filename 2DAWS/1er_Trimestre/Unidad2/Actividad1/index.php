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
        // 1.- Recogida y gestión de datos del POST

        if (isset($_POST) && !empty($_POST)) {

            if(isset($_POST['delete'])){
                // Gestionamos el eliminar
                // Sacará la clave del array de delete que le hemos mandado
                $clave = array_keys($_POST['delete']);
                $clave = $clave[0];

            } else if(isset($_POST['add_button'])){
    
            } else if(isset($_POST['Actualizar'])){
    
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
    <?php
    }
    $conexion->close();
    ?>
</body>

</html>