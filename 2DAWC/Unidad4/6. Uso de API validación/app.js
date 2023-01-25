//----------------------------------------------------------//

function validarEmail() {
  document.getElementById("emailInput").addEventListener("change", () => {
    const campoEmail = document.getElementById("emailInput");

    if (!campoEmail.checkValidity()) {
      document.getElementById("mensajeEmail").innerHTML = "Error de Email";
      return false;
    } else {
        return true;
    }
  });
}

function validarPass() {
  document.getElementById("passwordInput").addEventListener("change", () => {
    const campoPass = document.getElementById("passwordInput");

    if (!campoPass.checkValidity()) {
      document.getElementById("mensajePass").innerHTML =
        "No puede estar vacía la contraseña";
        return false;
    } else {
        return true;
    }
  });
}

function validarNombre() {
  document.getElementById("nombreInput").addEventListener("change", () => {
    const campoNombre = document.getElementById("nombreInput");

    if (!campoNombre.checkValidity()) {
      document.getElementById("mensajeNombre").innerHTML =
        "Nombre incorrecto";
        return false;
    } else {
        return true;
    }
  });
}

function validarEdad() {
  document.getElementById("edadInput").addEventListener("change", () => {
    const campoEdad = document.getElementById("edadInput");

    if (!campoEdad.checkValidity()) {
      document.getElementById("mensajeEdad").innerHTML =
        "Edad incorrecta";
        return false;
    } else {
        return true;
    }
  });
}


///////////////////////////////////VOY POR AQUI///////////////////////////////////////
function validarEnvio(){
    document.getElementById("enviar").addEventListener(
        "click",
        (event) => {
            if(){
                // Si no hay nada bien. no se mandará
            } else {
                // Si todo está bien, se mandará
            }
          event.preventDefault();
          console.log("No se ha enviado el formulario");
        },
        false
      );
}


validarEmail();
validarPass();
validarNombre();
validarEdad();