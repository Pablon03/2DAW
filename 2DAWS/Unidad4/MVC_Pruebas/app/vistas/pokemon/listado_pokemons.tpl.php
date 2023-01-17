<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Listado de pokemons</h1>
    <table>
        <thead>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Tipo</th>
        </thead>
        <tbody>
            <?php foreach ($datos as $clavePokemon => $valorPokemon) : ?>
                <tr>
                    <td><img src=<?php echo $valorPokemon['url_imagen'] ?>></td>
                    <td><a href="./?controlador=controlador_pokemon&metodo=ver&id=<?php echo $clavePokemon ?>"><?php echo $valorPokemon['nombre'] ?></td>
                    <td><?php echo $valorPokemon['tipo'] ?></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <form class="form" action="./?controlador=controlador_pokemon&metodo=newPokemon" method="POST">
        <input type="submit" value="Nuevo Pokemon" />
    </form>
</body>

</html>