<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Parámetros de conexión</title>
    <link rel="stylesheet" href="./styles.css">
    <style>
        body{
            background-image: url("https://i.pinimg.com/736x/97/7a/bc/977abc7da74c493071e4f52bc8551991.jpg");
    background-repeat: no-repeat;
    background-size: cover;
        }
    </style>
</head>

<body>

    <div class="homepage">
        <h1>Conexión a la base de datos</h1>
        <p>Intruduzca los datos de conexión</p>
        <!--Crear aquí un formulario para introducir los parámetros de conexión, que mande al script de listado de productos.-->

        <!-- Formulario para solicitar datos para acceder a la base de datos -->
        <form action="./productos.php" method="POST">
            <span>Servidor BBDD:</span>
            <input type="text" name="servidor" value="localhost" /><br><br>
            <span>Usuario de la BBDD:</span>
            <input type="text" name="usuario" value="root" /><br><br>
            <span>Contraseña de la BBDD:</span>
            <input type="password" name="contrasenya" /><br><br>
            <span>Nombre BBDD:</span>
            <input type="text" name="bbdd" /><br><br>
            <input type="submit" name="acceder" value="Consultar productos" />
        </form>
    </div>

</body>

</html>