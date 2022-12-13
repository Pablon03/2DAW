<?php

/** La siguiente función debe generar el código HTML de la cesta, y su formulario asociado
 * Ten presente los ámbitos de las variables y los modificadores que puedes utilizar para cambiarlo
 */
function getBasketMarkup(){
  //Ejemplo del HTML generado: ( no tiene por qué coincidir exactamente con el presente en la plantilla HTML )
  //Hay que incluir form
  $basket_markup = '';

  $basket_markup .= '<p><strong>Número de items:</strong> '.$_SESSION['productos_totales'].'</p>';
  $basket_markup .= '<p><strong>Precio total:</strong> $'.$_SESSION['precioCarrito'].'</p>';
  $basket_markup .= '<hr>';

  $basket_markup .= '<form action="./index.php" method="POST">';

  foreach ($_SESSION['cesta'] as $clave => $valor) {
    $basket_markup .= '<div class="cItemContainer">';
    $basket_markup .= '<div class="cFoto"><img src="'.$_SESSION['cesta'][$clave]['img_miniatura'].'"></div>';
    $basket_markup .= '<div class="cNombreProducto"><h3>'.$clave.'</h3></div>';
    $basket_markup .= '<input type="submit" name="quitar['.$_SESSION['cesta'][$clave]['id'].']" value="-"> '.$_SESSION['cesta'][$clave]['cantidad'].' <input type="submit" name="sumar['.$_SESSION['cesta'][$clave]['id'].']" value="+">';
    $basket_markup .= '<strong>Precio:</strong> $'.$_SESSION['cesta'][$clave]['precioTotal'].'';
    $basket_markup .= '</div>';
  }
  
  $basket_markup .= '</form>';

/*  
 <p><strong>Número de items:</strong> 2</p>
      <p><strong>Precio total:</strong> $800</p>
      <hr>
      <div class="cItemContainer">
        <div class="cFoto"><img src="./images/product-mini-1-108x100.png"></div>
        <div class="cNombreProducto"><h3>Blueberries</h3></div>
        <input type="submit" value="-"> 1 <input type="submit" value="+">
        <strong>Precio:</strong> $550
      </div>

      <div class="cItemContainer">
        <div class="cFoto"><img src="./images/product-mini-2-108x100.png"></div>
        <div class="cNombreProducto"><h3>Avocados</h3></div>
        <input type="submit" value="-"> 1 <input type="submit" value="+">
        <strong>Precio:</strong> $250
      </div>
*/    
    return $basket_markup;
  }

/** La siguiente función debe generar el código HTML de los productos, con sus botones de 'add to cart' cesta
 * Ten presente los ámbitos de las variables y los modificadores que puedes utilizar para cambiarlo
 */
  function getProductosMarkup($productos){
   //Ejemplo del HTML generado: ( no tiene por qué coincidir exactamente con el presente en la plantilla HTML )
   //Hay que incluir form
   $productos_markup = '';

   $productos_markup .= '<form action="./index.php" method="post">';

   $indice = 0;
   foreach ($productos as $producto) {
      $productos_markup .= '<div class="cProductoContainer"><img src="'.$producto['img_url'].'" alt="" width="270" height="280">';
      $productos_markup .= '<input type="submit" name="incluirCesta['.$indice.']" value="Incluir en cesta">';
      $productos_markup .= '<h4>'.$producto['nombre'].'</h4>';
      $productos_markup .= '<p><strong>$ '.$producto ['precio'].'</strong></p>';
      $productos_markup .= '</div>';
      $indice ++;
  }

   $productos_markup .= '</form>';

    /*<!-- Producto-->          
      <div class="cProductoContainer"><img src="./images/product-5-270x280.png" alt="" width="270" height="280">
        <input type="submit" value="Incluir en cesta">
        <h4>Avocados</h4>
        <p><strong>$ 28.00</strong></p>
      </div>
      <!-- Producto-->          
      <div class="cProductoContainer"><img src="./images/product-5-270x280.png" alt="" width="270" height="280">
        <input type="submit" value="Incluir en cesta">
        <h4>Corn</h4>
        <p><strong>$ 27.00</strong></p>
      </div>
      <!-- Producto-->          
      <div class="cProductoContainer"><img src="./images/product-5-270x280.png" alt="" width="270" height="280">
        <input type="submit" value="Incluir en cesta">
        <h4>Artichokes</h4>
        <p><strong>$ 23.00</strong></p>
      </div>
      <!-- Producto-->          
      <div class="cProductoContainer"><img src="./images/product-5-270x280.png" alt="" width="270" height="280">
        <input type="submit" value="Incluir en cesta">
        <h4>Broccoli</h4>
        <p><strong>$ 25.00</strong></p>
      </div>*/
    return $productos_markup;
  }