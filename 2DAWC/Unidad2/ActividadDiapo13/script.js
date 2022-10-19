let int = 0;
let idInt = null;

function crear(){
    do{
        int = parseInt(window.prompt("Indica el tiempo en milisegundos: ", ""), 10);
    }while(isNaN(int));

    // int = prompt("Indica el tiempo en milisegundos: ");
    segundos = int / 1000;
    if(!idInt){
        idInt = setInterval(alertaEjecucionTemp, int);
    } else {
        console.error("Error, ya está creado");
    }
}

function eliminar(){
    if(!idInt){
        console.error("No has establecido un temporizador aún");
    } else {
        clearInterval(idInt);
        idInt = null;
    }
}

function alertaEjecucionTemp (){
    segundos = int / 1000;
    console.log("Se mostrará cada "+segundos+" segundos");
}