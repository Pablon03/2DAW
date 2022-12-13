<?php
  session_start();
  
  
  require_once('./productos.php');
  require_once('./funciones.php');


  //Aquí puedes inicializar, si procede, la variable de sesión de la cesta
  //La estructura de la cesta puede ser simplemente un array cuyas claves se correspondan a los identificadores de los productos y cuyo valor sea el número de unidades de ese producto en la cesta
  //Puedes sacar el resto de la información cruzando la información de la cesta con el array producto 
  // PABLO: Si no existe la $_SESSION['cesta'] o está vacía, se rellena con nombre y cantidad cero
  // PABLO: También pondremos los productos del carrito a cero y el precio del carrito también a cero.
  if (!isset($_SESSION['cesta']) || empty($_SESSION['cesta'])) {

    $_SESSION['cesta'] = array();
    $_SESSION['productos_totales'] = 0;
    $_SESSION['precioCarrito'] = 0;
  }
  
  // echo '<pre>';
  // print_r($_POST);
  // echo '</pre>';

  // PABLO: Si se ha pulsado el botón de añadir a la cesta, comprobaremos que producto
  // ha sido para posteriormente y meter también el precio del carrito y la cantidad de productos
  if (isset($_POST['incluirCesta']) && !empty($_POST['incluirCesta'])) {
    foreach ($_POST['incluirCesta'] as $clave => $valor) {

      // Si es la primera vez que se añade, se crea la session de ese producto
      if (!isset($_SESSION['cesta'][''.$productos[$clave]['nombre'].''])) {
        $_SESSION['cesta'][''.$productos[$clave]['nombre'].''] = array();
        $_SESSION['cesta'][''.$productos[$clave]['nombre'].'']['cantidad'] = 0;
        $_SESSION['cesta'][''.$productos[$clave]['nombre'].'']['precioTotal'] = 0;
        $_SESSION['cesta'][''.$productos[$clave]['nombre'].'']['img_miniatura'] = $productos[$clave]['img_miniatura'];
        $_SESSION['cesta'][''.$productos[$clave]['nombre'].'']['id'] = $clave;
      }
      
      $_SESSION['cesta'][''.$productos[$clave]['nombre'].'']['cantidad'] += 1;
      $_SESSION['cesta'][''.$productos[$clave]['nombre'].'']['precioTotal'] += $productos[$clave]['precio'];


      $_SESSION['productos_totales'] ++;
      $_SESSION['precioCarrito'] += $productos[$clave]['precio'];
    }
  }

  // echo '<pre>';
  // print_r($_SESSION);
  // echo '</pre>';

  //Aquí puedes gestionar los post. Hay varias funcionalidades en la página (dos formularios): incluir en cesta, subir un determinado producto en una unidad y bajar un determinado producto de la cesta en una unidad. La manera de sacar los productos de la cesta es poner a 0 el número de unidades que hay en la cesta
  if (isset($_POST['sumar']) && !empty($_POST['sumar'])) {

    foreach ($_POST['sumar'] as $clave => $valor) {
      $_SESSION['cesta'][$productos[$clave]['nombre']]['cantidad'] += 1;
      $_SESSION['cesta'][$productos[$clave]['nombre']]['precioTotal'] += $productos[$clave]['precio'];

      $_SESSION['productos_totales'] ++;
      $_SESSION['precioCarrito'] += $productos[$clave]['precio'];
    }

  // Si se ha pulsado quitar
  } else if (isset($_POST['quitar']) && !empty($_POST['quitar'])) {

    foreach ($_POST['quitar'] as $clave => $valor) { 

      $_SESSION['cesta'][$productos[$clave]['nombre']]['cantidad'] --;

      // Si la cantidad es cero, se quitará de la sesión
      if ($_SESSION['cesta'][$productos[$clave]['nombre']]['cantidad'] === 0) {
        unset($_SESSION['cesta'][$productos[$clave]['nombre']]);

      // Si no es cero, se quitará el precio total de ese producto en el pedido
      } else {
      $_SESSION['cesta'][$productos[$clave]['nombre']]['precioTotal'] -= $productos[$clave]['precio'];
      }
      $_SESSION['productos_totales'] --;
      $_SESSION['precioCarrito'] -= $productos[$clave]['precio'];
    }
  }
  
  $the_basket = getBasketMarkup();
  $the_products = getProductosMarkup($productos);
  include('./home.tpl.php'); 

