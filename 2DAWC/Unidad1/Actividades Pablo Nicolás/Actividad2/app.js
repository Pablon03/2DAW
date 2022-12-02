// Declaración de variables
const PREGUNTAMENU = "¿Qué desea hacer hoy?";
const MENU1 = "\t1.Número par o impar";
const MENU2 = "\t2.Saludo";
const MENU3 = "\t3.Salir";
const ELEGIROPCION = "Introduzca la opción (1 - 3)";
const ERRORTECLADO = "Error, ha introducido un dato incorrecto";
const SOLICITUDNUM = "Introduzca un número mayor o igual a cero.";
const SOLICITUDNAME = "Introduzca nombre por teclado.";
const DEFAULTVALUE = 0;
const DEFAULTNAME = "Manuela";
const NUMEROINVALIDO = "El número introducido es incorrecto";
const NUMEROPAR = "Ha introducido un número par";
const NUMEROIMPAR = "Ha introducido un número impar";
const ERRORNAME = "Ha introducido una cadena vacía.";
const BIENVENIDA = "Bienvenido/a ";
const VUELTA = "Vuelve cuando lo necesites";

// Función main 
function main() {
    // Menú que se mostrará por consola
    console.log(PREGUNTAMENU);
    console.log(MENU1);
    console.log(MENU2);
    console.log(MENU3);

    // Variante para true o false y para la respuesta por teclado
    let comprobante;
    let respuesta;

    // Con este do-while vamos a repetir cuantas veces se necesite hasta que sea False
    do {
        // Solicitamos y parseamos a tipo int
        const respuestaStr = prompt(ELEGIROPCION);
        respuesta = parseInt(respuestaStr);
        comprobante = comprobarRespuesta(respuesta);
    } while (comprobante);
}

function comprobarRespuesta(respuesta) {

    // Si no es un número muestra error
    if(isNaN(respuesta)){
        console.log(ERRORTECLADO);
        return true;
    
    // Nos vamos a los métodos oportunos
    } else if (respuesta === 1){
        method1();
        return true;

    } else if (respuesta === 2){
        method2();
        return true;

    } else if (respuesta === 3){
        method3();
        return false;

    // Si no es 1/2/3 y es un número muestra el error oportuno y manda
    // true para que se vuelva a pedir por teclado
    } else {
        console.log(NUMEROINVALIDO);
        return true;
    }
}

function method1(){

    // Creamos variable para comprobar si es true o false
    let comprobar;
    let respuesta;

    do {
        // Solicitamos número y hacemos la comprobación
        respuesta = prompt(SOLICITUDNUM, DEFAULTVALUE);
        // En caso de que sea incorrecto devvuelve false y se solicita de nuevo por teclado
        if (isNaN(respuesta) || respuesta < 0){
            comprobar = false;
            console.log(NUMEROINVALIDO);
        } else {
            comprobar = true;
        }
    } while (!comprobar);
    
    // Aquí veremos si es par o impar
    if (respuesta % 2 === 0) {
        console.log(NUMEROPAR);
    } else {
        console.log(NUMEROIMPAR);
    }
}

function method2(){
    // Creamos variable para comprobar si es true o false
    let comprobar;
    let respuesta;

    do {
        // Solicitamos nombre y hacemos la comprobación
        respuesta = prompt(SOLICITUDNAME, DEFAULTNAME);
        // En caso de que sea incorrecto devvuelve false y se solicita de nuevo por teclado
        if (respuesta === '' || respuesta === null) {
            comprobar = false;
            console.log(ERRORNAME);
        } comprobar = true
    } while (!comprobar);

    // Mostramos el mensaje de bienvenida
    console.log(BIENVENIDA + respuesta);
}

    // Nos despedimos del cliente
function method3(){
    console.log(VUELTA);
}