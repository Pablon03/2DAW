<!-- Ejemplo: Función header para autentificación HTTP -->
<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
 header('WWW-Authenticate: Basic Realm="Contenido restringido"');
 header('HTTP/1.0 401 Unauthorized');
echo "Este usuario no está reconocido";
exit;
}
?>
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
echo "Nombre de usuario: ".$_SERVER['PHP_AUTH_USER']."<br />";
echo "Contraseña: ".$_SERVER['PHP_AUTH_PW']."<br />";
?>
</body>
</html>