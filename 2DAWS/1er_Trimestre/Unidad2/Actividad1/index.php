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

        .registroContainer{
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
@ $conexion = new mysqli('localhost', 'root', '', 'mysql_employees');

$error = $conexion->connect_errno;

if ($error != null) {
    echo "<p>Error $error conectando a la base de datos: $dwes->connect_error</p>";
    exit();
} else {

}
?>
    <div class="mainContainer">
        <h1>Departamentos</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="addContainer">
            <input type="submit" value="+" name="add_button"><input type="text" value="" placeholder="Nombre nuevo departamento" name="new_department_name"><br>
            </div>
            <div class="registroContainer">
                <input type="submit" value="x" name="delete_001"><input type="text" value="marketing" name="name_001"><br>
                <input type="submit" value="x" name="delete_002"><input type="text" value="marketing" name="name_002"><br>
            </div>
            <div class="updateContainer">
                <input type="submit" value="Actualizar">
            </div>

        </form>
    </div>
    <?php
    $conexion->close();
    ?>
</body>

</html>