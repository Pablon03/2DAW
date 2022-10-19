const TEMP = 3000;
let idTemp;

function crear(){
    if(!idTemp){
        idTemp = setTimeout(alertaEjecucionTemp, TEMP);
    } else {
        console.log("Error, ya está creado");
    }
}

function eliminar(){
    if(!idTemp){
        console.log("No has establecido un temporizador aún");
    } else {
        clearTimeout(idTemp);
        idTemp = null;
    }
}

function alertaEjecucionTemp (){
    alert("Se ha puesto un contador de 3 segundos");
}