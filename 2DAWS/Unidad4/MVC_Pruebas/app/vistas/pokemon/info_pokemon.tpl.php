<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $datos['pok_nombre']; ?></h1>
    <table>
        <thead>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripcion</th>
        </thead>
        <tbody>
            <tr>
                <td><img src=<?php echo $datos['pok_imagen'] ?>></td>
                <td><?php echo $datos['pok_nombre']?></td>
                <td><?php echo $datos['tipo_nombre']?></td>
                <td><?php echo $datos['pok_descrip']?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>