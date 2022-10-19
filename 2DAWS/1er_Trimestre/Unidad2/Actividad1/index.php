<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento - Operaciones CRUD</title>
    <style>
        .mainContainer {
            margin: auto;
        }
        .registrosContainer{
            border-right: solid 1px black;
            display: inline-block;
            margin: 1rem;
            padding: 0.5rem;
        }

        .updateContainer{
            margin: 1rem;
            display: inline-block;
        }
    </style>
</head>

<body>

<?php

        @ $conexion = new mysqli('localhost', 'root', '', 'employees');

        $error = $conexion->connect_errno;

        if($error != null){
?>
            <!-- Esto es el HTML si hay error -->
            <p>Error de conexion a la base de datos. <?php echo $conexion->connect_error; ?> Vuelve en un rato.</p>
            
<?php
            exit();
        }else{
            //Este código se ejecuta si la conexion a la base de datos ha ido bien.
        }

?>

    <div class="mainContainer">
        <h1>Departamentos</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <div class="addContainer">
            <input type="submit" value="+" name="add_button"> <input type="text" name="new_department_name" placeholder="Nombre de nuevo departamento">
        </div> 

            <div class="registrosContainer">

                <input type="submit" value="x" name="delete_001"> <input type="text" name="name_001" value="Marketing"> <br>
                <input type="submit" value="x" name="delete_002"> <input type="text" name="name_002" value="Sales"> <br>

            </div>

            <div class="updateContainer">
                <input type="submit" value="Actualizar registros" name="update_button">
            </div>

        </form>
    </div>

    <?php 
        $conexion->close();
    ?>

</body>

</html>