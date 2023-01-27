creationAddEventListeners();

/**
 * Create add event listener for the elements of the form
 */
function creationAddEventListeners() {
  let name = document.getElementById("inputName");
  let email = document.getElementById("inputEmail");
  let password = document.getElementById("inputPassword");
  let password2 = document.getElementById("inputPassword2");
  let edad = document.getElementById("inputEdad");
  let genre1 = document.getElementById("inputHombre");
  let genre2 = document.getElementById("inputMujer");

  /////////////////Creation of add event listeners
  name.addEventListener("blur", checkValidityInput, false);
  email.addEventListener("blur", checkValidityInput, false);
  password.addEventListener("change", checkValidityInput, false);
  password2.addEventListener("change", checkValidityInput, false);
  edad.addEventListener("blur", checkValidityInput, false);
}

/**
 * Check elements of the form are valid
 */
function checkValidityInput(e) {
  const campo = e.target;

  if (campo.id === "inputPassword" || campo.id === "inputPassword2") {
    checkPasswords();
  }

  
  if (!campo.checkValidity()) {
    const error = errorInput(campo);
    showErrorInPage(error, campo);
  } else {
    clearError(campo);
  }
}

function checkPasswords() {
  if (
    document.getElementById("inputPassword").value !==
    document.getElementById("inputPassword2").value
  ) {
    // alert("Los passwords no coinciden");
    const error = "Las contraseñas no son iguales";
    showErrorInPage(error, document.getElementById("inputPassword2"));
    document.getElementById("submit-button").disabled = true;
  } else {
    //   document.getElementById("submit-button").disabled = false;
    clearError(document.getElementById("inputPassword2"));
  }


}

/**
 * clear error of display
 * @param {*} campo
 */
function clearError(campo) {
  document.querySelector(`.${campo.id}`).innerHTML = "";
}

/**
 * validate input of form with the types of error the input can have
 * @returns string of error of the input
 */
function errorInput(campo) {
  if (campo.validity.typeMismatch) {
    return "Los datos suministrados no tienen el formato correcto";
  } else if (campo.validity.rangeUnderflow || campo.validity.rangeOverflow) {
    return `Debe contener un valor entre ${campo.min} y ${campo.max}`;
  } else if (campo.validity.patternMismatch) {
    return "El campo debe contener al menos un número";
  } else if (campo.validity.valueMissing) {
    return "Este campo no puede estar vacío";
  } else {
    return "El valor introducido no es válido";
  }
}

/**
 * show error below the input
 */
function showErrorInPage(error, campo) {
  let input = document.getElementById(campo.id);
  if (document.querySelector(`.${campo.id}`)) {
    document.querySelector(`.${campo.id}`).innerHTML = error;
  } else {
    let span = document.createElement("span");
    span.classList.add(campo.id);
    span.textContent = error;
    input.parentNode.insertBefore(span, input.nextSibling);
  }
}
