let n, primera = 0;

n = prompt("Introduzca un número entero positivo: ");

if (n < 10) {
    primera = n;
    console.log("La primera cifra del número introducido es el " + primera + ".");
}

if ((n >= 10) && (n < 100)) {
    primera = Math.floor(n / 10);
    console.log("La primera cifra del número introducido es el " + primera + ".");
}

if ((n >= 100) && (n < 1000)) {
    primera = Math.floor(n / 100);
    console.log("La primera cifra del número introducido es el " + primera + ".");
}

if ((n >= 1000) && (n < 10000)) {
    primera = Math.floor(n / 1000);
    console.log("La primera cifra del número introducido es el " + primera + ".");
}

if (n >= 10000) {
    primera = Math.floor(n / 10000);
    console.log("La primera cifra del número introducido es el " + primera + ".");
}

if (n >= 100000) {
    console.log("El número introducido tiene más de 5 cifras.");
}

