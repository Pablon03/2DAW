//----------------------------------------------------------//

function desactivarSubmit() {
  // Obtenemos el elemento de submit, y lo desactivamos
  document.getElementById("enviar").addEventListener(
    "click",
    (event) => {
      event.preventDefault();
      console.log("No se ha enviado el formulario");
    },
    false
  );
}

desactivarSubmit();

//----------------------------------------------------------//

function recorrerFormulario() {

  
  document.getElementById("enviar").addEventListener("click", () => {
    let miFormulario = document.getElementById("formulario");
    // guardamos la referencia del formulario en una variable.

    for (let i = 0; i < miFormulario.elements.length; i++) {
      if (miFormulario.elements[i].type === "text") {
        console.log(miFormulario.elements[i].value);
      }
    }
  });
}

recorrerFormulario();
