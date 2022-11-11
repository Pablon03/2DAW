<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Listado de productos</title>
  <link rel="stylesheet" href="./styles.css">
</head>

<body>
  <h1>Listado de productos</h1>
  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once('./funiones.inc.php');
  // Comprobamos la conexion
  if (conectarBBDD()) {
    // Cogemos la variable de la conexión
    $conn = cogerConexion();

    // Hacemos la consulta a la base de datos
    $consultaCompleta = "SELECT * FROM Productos";
    $consulta = $conn->query($consultaCompleta);

    if ($consulta) {
      // Ponemos la cabecera en la tabla
      echo "<table>";
      echo "<tr>";
      echo "<th>Nombre</th>";
      echo "<th>Descripción</th>";
      echo "<th>Precio</th>";
      echo "<th>Descuento</th>";
      echo "</tr>";
      // Con el While recorremos para posteriormente mostrarlos
      while ($fila = mysqli_fetch_assoc($consulta)) {
  ?>
        <tr>
          <td><?php echo $fila['nombre'] ?></td>
          <td><?php echo $fila['descripcion'] ?></td>
          <td><?php echo $fila['precio'] ?></td>
          <td><?php echo $fila['descuento'] ?></td>
        </tr>
    <?php
      }
      echo "</table>";
      // Mostramos el botón para volver al formulario
      echo "<a href='./index.php'>
              <button>Volver al formulario</button>
            </a> ";
    } else {
      // En caso de que no se pueda hacer la consulta
      echo "<script>alert('No se ha podido hacer la consulta'</script>)";
      exit;
    }
    ?>

  <?php
    $conn->close();
    // En caso de que los datos introducidos sean incorrectos
  } else {
    echo "<a href='./index.php'>
    <button>Volver al formulario</button>
  </a> ";
  }
  //Aquí mostraremos la información pertinente al usuario. También, si lo consideras oportuno, mostrarás aquí la información de errores, falta de datos para realizar la conexión, etc. Para debug puedes utlizar:
  //echo '<pre>'.print_r($variable).'</pre>';
  ?>
</body>

</html>