function porId() {
    parrafo = document.getElementById("parrafo2");
    console.log(parrafo);
}

function porTag(){
    arrayParrafo = document.getElementsByTagName("p");
    parrafo = arrayParrafo[2];
    console.log(parrafo);
}

function porClass(){
    parrafo = document.getElementsByClassName("parrafo2");
}