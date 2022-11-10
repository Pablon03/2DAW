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
        if (isset($_POST['crear'])) {
            exec('./bbdd && /opt/lamp/bin/mysql -u root < world.sql');
        }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="submit" name="crear" value="crearbbdd"/>
    </form>
</body>
</html>