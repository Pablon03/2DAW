<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="margin: 0;">
    <div style="height: 100vh; display:flex; justify-content: center; align-items: center;">
        <form style="margin: auto; width: 220px;" action="./?controlador=controlador_pokemon&metodo=newPokemon" method="POST">
            Introduzca nombre: <input type="text" name="nombre_pokemon"/>
            <br>
            Introduzca tipo: <input type="text" name="tipo_pokemon"/>
            <br>
            Introduzca imagen(link): <input type="text" name="url_imagen"/>
            <br>
            Introduzca descripción: <input type="text" name="descrip_pokemon"/>
            <input type="submit" value="Submit" />
        </form>
    </div>
</body>

</html>