<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
  <meta charset='utf-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=2.0' />
  <style>
    body {
      max-width: 210mm;
      margin: 0 auto;
      padding: 0 1em;
      font-family: 'Segoe UI', 'Open Sans', sans-serif
    }

    a {
      text-decoration: none;
      color: blue
    }

    h1 {
      text-align: center;
      margin-top: 0
    }

    nav,
    footer {
      text-align: center
    }
  </style>
  <title>Películas</title>
</head>

<body>
  <h1>Películas</h1>

  <nav><a href='index.php'>Inicio</a> | Editar</nav>

  <h2>Editar</h2>

  <!-- Completa aquí el código -->

  <?php
  require_once('connect_db.php');

  $id_pelicula = $_POST['identificador_pelicula'];

  // Obtener la información de la película de la base de datos.
  $stmt = $pdo->prepare('SELECT * FROM peliculas WHERE id = :id');
  $stmt->execute(array('id' => $id_pelicula));
  $pelicula = $stmt->fetch();

  // Comprobar si se encontró una película con ese ID.
  if (!$pelicula) {
    echo "No se encontró una película con ese ID.";
    die();
  }

  ?>

  <form method="post" action="./editar_3.php">
    <input type="hidden" name="id_pelicula" value="<?php echo $pelicula['id']; ?>">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" value="<?php echo $pelicula['titulo']; ?>">
    <br><br>
    <label for="fecha_estreno">Fecha de Estreno:</label>
    <input type="date" name="fecha_estreno" id="fecha_estreno" value="<?php echo $pelicula['fecha_estreno']; ?>">
    <br><br>
    <label for="duracion">Duración:</label>
    <input type="number" name="duracion" id="duracion" value="<?php echo $pelicula['duracion']; ?>">
    <br><br>
    <label for="genero">Género:</label>
    <input type="text" name="genero" id="genero" value="<?php echo $pelicula['genero']; ?>">
    <br><br>
    <label for="director">Director:</label>
    <input type="text" name="director" id="director" value="<?php echo $pelicula['director']; ?>">
    <br><br>
    <input type="submit" value="Guardar Cambios">
  </form>

  <footer>
    <p>Examen de febrero - Desarrollo Web en Entorno Servidor a distancia - 2022-2023.</p>
  </footer>

</body>

</html>