//----------------------------------------------------------//

function desactivarSubmit(){
    // Obtenemos el elemento de submit, y lo desactivamos
    document.getElementById('enviar').addEventListener('click', (event)=> {
        event.preventDefault();
        console.log("No se ha enviado el formulario");
    }, false);
}

desactivarSubmit();
