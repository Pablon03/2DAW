<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hola</title>
</head>
<body>

    <?php
    print_r($_POST);
    echo "gola";
        if (isset($_POST['crear'])) {
            if(exec('cd ./bbdd && /opt/lampp/bin/mysql -u root < world.sql')) {
                echo "Creado bien";
            } else {
                echo "NO se ha creado";
            }
        }
    ?>
    <form action="abrirBBDDLinux.php" method="POST">
    <input type="submit" name="crear" value="crearbbdd"/>
    </form>
</body>
</html>