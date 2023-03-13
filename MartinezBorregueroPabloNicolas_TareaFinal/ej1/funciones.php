<?php

/**
 * Función que, a partir de la lista de participantes, ubicada en la variable de ámbito global 
 * $participantes, genera un array de $n candidatos finalistas de manera aleatoria
 * 
 * @param $n: Número de candidatos que serán seleccionados
 * 
 * @return: Array con los $n candidatos seleccionados
 */

//IMPORTANTE: Crear aquí una función llamada getCandidatos que cumpla con la descripción anterior.

function getCandidatos($n)
{
  global $participantes; // Accede a la lista de participantes global

  // Obtenemos la cantidad de participantes y creamos un array vacío 
  $num_participantes = count($participantes);
  $candidatos_seleccionados = array();

  // Selecciona $n candidatos de manera aleatoria y mete de manera aleatoria en el array vacío
  for ($i = 0; $i < $n; $i++) {
    $indice_aleatorio = rand(1, $num_participantes);
    $candidato_seleccionado = $participantes[$indice_aleatorio];
    $candidatos_seleccionados[] = $candidato_seleccionado;
  }

  // Retorna el array de candidatos seleccionados
  return $candidatos_seleccionados;
}

/**
 * Función que, a partir de la lista de candidatos seleccionados, ubicada en la variable pasada como parámetro $candidatos, genera una cadena HTML con el formulario para poder elegir el ganador final
 * 
 * @param $candidatos: Un array con los seleccionados a ganador.
 * 
 * @return: Cadena con el formulario que se imprimirá en el html con los candidatos seleccionados.
 */
function getFormularioCandidatosMarkup($candidatos)
{
  //Debes modificar esta función para que el formulario se construya dinámicament con los datos de $candidatos
  $output = '';
  global $participantes;
  $output .= '<form method="post" action="./ganador.php">';

  foreach ($candidatos as $index => $candidato) {
    $indiceCandidato = "";
    foreach ($participantes as $indexParticipante => $participante) {
      if ($candidato['imagen_url'] == $participante['imagen_url']) {
        $indiceCandidato = $indexParticipante;
        break;
      }
    }
    $output .= '<div class="candidatoContainer">';
    $output .= '<h2>' . $candidato['nombre'] . '</h2>';
    $output .= '<img src="' . $candidato['imagen_url'] . '"><br>';
    $output .= '<input type="submit" value="Seleccionar" name="seleccionar[' . $indiceCandidato . ']">';
    $output .= '</div>';
  }

  $output .= '</form>';
  return $output;
}