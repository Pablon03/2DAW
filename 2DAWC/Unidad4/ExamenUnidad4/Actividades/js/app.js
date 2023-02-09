// Constantes que contienen las clases utilizadas para el tratamiento visual de los errores
const ERROR_CAMPO = "Error";
const ERROR_MENSAJE = "AñadirCampo";

crearListeners();

/**
 * Crea los listeners necesarios
 */
function crearListeners() {
  // Eventos al perder el foco (Comprueba error)
  document
    .getElementById("nombre")
    .addEventListener("blur", validateCampoEvento, false);
  document
    .getElementById("email")
    .addEventListener("blur", validateCampoEvento, false);
  document
    .getElementById("clave")
    .addEventListener("blur", validateCampoEvento, false);
  document
    .querySelector("select")
    .addEventListener("blur", validateSelect, false);
  document
    .getElementById("dia")
    .addEventListener("blur", validateCampoEvento, false);
  document
    .getElementById("mes")
    .addEventListener("blur", validateCampoEvento, false);
  document
    .getElementById("año")
    .addEventListener("blur", validateCampoEvento, false);

  // Evento cuando es invalid (Muestra error)
  document
    .getElementById("nombre")
    .addEventListener("invalid", notificateErrorEvents, false);
  document
    .getElementById("email")
    .addEventListener("invalid", notificateErrorEvents, false);
  document
    .getElementById("clave")
    .addEventListener("invalid", notificateErrorEvents, false);
  document
    .getElementById("pais")
    .addEventListener("invalid", notificateErrorEvents, false);
  document
    .getElementById("dia")
    .addEventListener("invalid", notificateErrorEvents, false);
  document
    .getElementById("mes")
    .addEventListener("invalid", notificateErrorEvents, false);
  document
    .getElementById("año")
    .addEventListener("invalid", notificateErrorEvents, false);

  // Se lanza evento en caso de ser validado negativamente (Se limipian los erorres por si ya se han corregido)
  document
    .getElementById("nombre")
    .addEventListener("input", checkErrorEvents, false);
  document
    .getElementById("email")
    .addEventListener("input", checkErrorEvents, false);
  document
    .getElementById("clave")
    .addEventListener("input", checkErrorEvents, false);
  document
    .getElementById("pais")
    .addEventListener("input", checkErrorEvents, false);
  document
    .getElementById("dia")
    .addEventListener("input", checkErrorEvents, false);
  document
    .getElementById("mes")
    .addEventListener("input", checkErrorEvents, false);
  document
    .getElementById("año")
    .addEventListener("input", checkErrorEvents, false);
}

function validateCampoEvento(e) {
  validateCampo(e.target);
}

function validateCampo(campo) {
  deleteErrors(campo);
  return campo.checkValidity();
}


function deleteErrors(campo) {
  campo.classList.remove(ERROR_CAMPO);
  const messageError = document.getElementById(`error-${campo.name}`);
  if (messageError) {
    messageError.innerHTML = "";
  }
}

/**
 * Notifica según el error ocurrido
 */
function notificateErrorEvents(e) {
  const emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
  const campo = e.target;
  //   let campoError = document.getElementById(`error-${campo.name}`);
  //   campoError.classList.add(ERROR_CAMPO);
  campo.classList.add(ERROR_CAMPO);
  let messages = [];

  // Campo necesario pero sin contenido
  if (campo.validity.valueMissing) {
    messages.push("Este campo no puede estar vacío");
  }

  // No se encuentra entre el rango indicado
  if (campo.validity.rangeUnderflow || campo.validity.rangeOverflow) {
    messages.push(`Debe contener un valor entre ${campo.min} y ${campo.max}`);
  }

  // El contenido del campo no es especificado
  if (campo.validity.typeMismatch &&  !(campo.type === "email")) {
    messages.push("Los datos suministrados no tienen el formato correcto");
  }

  if (campo.type == "email") {
    if(!emailRegex.test(campo.value)){
        const messageError = campo.title;
        messages.push(messageError);
    }
  }

  if (campo.type == "password") {
    // if(!passwordRegex.test(campo.value)){
    //     /*Aqui deberia ir el error */
    // }
  }

  if(campo.name == "dia" || campo.name == "mes" || campo.name =="año"){
    if(!isNaN(campo.value)){
        const messageDate = checkDate(campo);
        if(messageDate){
            messages.push(messageDate);
        }
    }
  }
  
  seeMessageErrors(messages, campo);
}

/**
 * Muestra el error
 * @param {Array} messages 
 * @param {Elemento} campo 
 */
function seeMessageErrors(messages, campo) {
  let div = document.getElementById(`error-${campo.name}`);
  for (let i = 0; i < messages.length; i++) {
    let paragraph = document.createElement("p");
    paragraph.textContent = messages[i];
    div.appendChild(paragraph);
  }
  // Se inserta el "div" detrás del campo que ha provocado el error
  // insertAfter(campo, div);
}

/**
 * Comprueba y vacia errores
 * @param {Event} e 
 */
function checkErrorEvents(e) {
  const campo = e.target;
  if (campo.validity.valid) {
    deleteErrors(campo);
  }
}

/**
 * Valida el select de pais
 * @param {Event} e 
 */
function validateSelect(e){

    const campo = e.target;
    const campoError = document.getElementById("error-pais");

    if(campo.value === "df"){
        campoError.textContent = "Por favor seleccione una opción válida";
    }    
}

function checkDate(e){
    if(e.name == "dia"){
        console.log("dia")
        checkDayMonthYear(e, 31, 1);
    } else if (e.name == "mes"){
        checkDayMonthYear(e, 12,1);
    } else if (e.name == "año"){
        checkDayMonthYear(e, 2099, 1900);
    }
}

function checkDayMonthYear(campo, max, min){
    if(campo.value <= max && campo.value >= min){
        campo.setCustomValidity('');
    } else {
        return campo.title;
    }
}