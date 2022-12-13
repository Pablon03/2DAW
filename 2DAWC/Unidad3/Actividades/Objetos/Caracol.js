function creationTablero() {
    let tablero = [];
    for (let fila = 0; fila < 10; fila++) {
      let fila = [];
      for (let columna = 0; columna < 10; columna++) {
        fila.push(' ');
      }
      tablero.push(fila);
    }
    return tablero;
  }
  
  function numeroAleatorio() {
    return Math.random() > 0.8;
  }
  
  function pintarTablero(array) {
    let salida = false;
    for (let fila = 0; fila < array.length; fila++) {
      for (let columna = 0; columna < array.length; columna++) {
        if (fila === 0 || fila === 9 || columna === 9 || columna === 0) {
          array[fila][columna] = 'O';
        }
        if (fila > 0 && fila < 9 && columna > 0 && columna < 9) {
          array[fila][columna] = 'X';
        }
        if (
          (!salida && numeroAleatorio() && fila === 0) ||
          (!salida && numeroAleatorio() && fila === 9)
        ) {
          array[fila][columna] = 'II';
          salida = true;
        }
      }
    }
    return array;
  }
  
  const tablero = creationTablero();
  const tableroPintado = pintarTablero(tablero);
  console.log(tableroPintado);