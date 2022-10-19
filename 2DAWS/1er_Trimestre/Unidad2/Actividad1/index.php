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
    <div class="mainContainer">
        <h1>Departamentos</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="addContainer">
            <input type="submit" value="+"><input type="text" value="" placeholder="Nombre nuevo departamento"><br>
            </div>
            <div class="registroContainer">
                <input type="submit" value="x"><input type="text" value="marketing"><br>
                <input type="submit" value="x"><input type="text" value="marketing"><br>
            </div>
            <div class="updateContainer">
                <input type="submit" value="Actualizar">
            </div>

        </form>
    </div>

</body>

</html>