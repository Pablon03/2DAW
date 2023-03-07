import { ControladorPHP as Controlador } from "./controlador.js";

ponerEventListeners();
noValidarconHTML();

/**
 * Añade Listeners
 */
function ponerEventListeners() {
  ////// Botones del Formulario //////
  document
    .getElementById("formulario")
    .addEventListener("submit", gestionarSubmit, false);
  document
    .getElementById("cancelar")
    .addEventListener(
      "click",
      () => (window.location.href = "./index.html"),
      false
    );

    
  ////// Poner en focus el formulario la primera vez que entre //////
  window.addEventListener("load", () => document.getElementById("formulario")[0].focus(), false);

  ////// Poner el value de los inputs //////
  window.addEventListener("load", ponerValueInputs, false);

  ////// Inputs del formulario //////
  const inputsForm = document.getElementsByTagName("input");
  for (let i = 0; i < inputsForm.length; i++) {
    if (
      inputsForm[i].id !== "cancelar" &&
      inputsForm[i].value !== "Agregar Cliente"
    ) {
      inputsForm[i].addEventListener("blur", comprobarInput, false);
      inputsForm[i].addEventListener("invalid", mostrarErrores, false);
      inputsForm[i].addEventListener("input", corregirCampo, false);
    }
  }
}

function ponerValueInputs(){
    document.getElementsByName('nombre')[0].value=localStorage.nombreSeleccionado;
    document.getElementsByName('apellidos')[0].value=localStorage.apellidoSeleccionado;
    document.getElementsByName('email')[0].value=localStorage.emailSeleccionado;
    document.getElementsByName('telefono')[0].value=localStorage.telefonoSeleccionado;
    document.getElementsByName('nif')[0].value=localStorage.nifSeleccionado;
}

////// GESTIÓN DE FORMULARIO //////

/**
 * Hace las comprobaciones finales y si hay un error de servidor
 * lo mandará y se quedará en la página, sino se redirigirá
 * @param {Event} e 
 */
async function gestionarSubmit(e) {
  e.preventDefault();

  let formValido = compruebaErrores(document.getElementById("nombre"));
  formValido =
    compruebaErrores(document.getElementById("apellidos")) && formValido;
  formValido = compruebaErrores(document.getElementById("email")) && formValido;
  formValido =
    compruebaErrores(document.getElementById("telefono")) && formValido;
  formValido = compruebaErrores(document.getElementById("nif")) && formValido;

  if (formValido) {
    const cliente = recogerDatosFormulario();
    const respuesta = await Controlador.editarCliente(cliente);
    const validacionRespuesta = tratarRespuesta(respuesta);
    if (!validacionRespuesta) {
        window.location.href = "./index.html";
    }
  }
  console.log(document.getElementsByClassName("border-red-600")[0].focus());
}

/**
 * Estructura los datos del formulario y transforma en JSON
 * @returns json estrucurado
 */
function recogerDatosFormulario() {
  const form = document.getElementById("formulario");
  const formDatos = new FormData(form);
  return {
    nombre: formDatos.get("nombre"),
    apellidos: formDatos.get("apellidos"),
    email: formDatos.get("email"),
    telefono: formDatos.get("telefono"),
    nif: formDatos.get("nif"),
  };
  // return JSON.stringify(datos);
}

/**
 * Trata la respuesta del servidor
 * @param {Campo} respuesta 
 * @returns 
 */
function tratarRespuesta(respuesta) {
  let validacion = false;
  for (let i = 0; i < respuesta.camposError.length; i++) {
    document.getElementById(`error-${respuesta.camposError[i]}`).innerHTML = respuesta.mensajesError[i];
    document.getElementById(`${respuesta.camposError[i]}`).classList.add("border-red-600");
    validacion = true;
  }
  return validacion;
}

/**
 * Comprueba los campos
 * @param {Campo} elementoForm 
 * @returns 
 */
function compruebaErrores(elementoForm) {
  return elementoForm.checkValidity();
}

/////// GESTIONAR LA VERIFICACIÓN DE DATOS ///////
/**
 * Aplica para que no se valide por HTML
 */
function noValidarconHTML() {
  document.getElementById("formulario").setAttribute("novalidate", true);
}
/**
 * Comprueba la validación con js
 * @param {Event} e 
 * @returns 
 */
function comprobarInput(e) {
  return e.target.checkValidity();
}

/**
 * muestra error en el campo oportuno y colorea de rojo
 * @param {event} e 
 */
function mostrarErrores(e) {
  const mensajeError = getMensajeError(e.target.validity);

  if (
    e.target.id === "email" ||
    e.target.id === "telefono" ||
    e.target.id === "nif"
  ) {
    document.getElementById(`error-${e.target.name}`).innerHTML =
      e.target.title;
    e.target.classList.add("border-red-600");
  } else {
    document.getElementById(`error-${e.target.name}`).innerHTML = mensajeError;
    e.target.classList.add("border-red-600");
  }
}

/**
 * Gestiona el mensaje según el error
 * @param {campo} evento 
 * @returns Error del campo si ocurre
 */
function getMensajeError(evento) {
  let mensajeError = "";

  if (evento.patterMismatch) {
    mensajeError = "No coincide con el formato adecuado";
  } else if (evento.rangeOverflow) {
    mensajeError = "Este campo es mayor al requerido";
  } else if (evento.rangeUnderflow) {
    mensajeError = "Este campo es menor al requerido";
  } else if (evento.valueMissing) {
    mensajeError = "Este campo no puede estar vacío";
  } else if (evento.tooShort) {
    mensajeError = "Este campo tiene menos carácteres que los requeridos";
  } else if (evento.tooLong) {
    mensajeError = "Este campo tiene más carácteres que los requeridos";
  }

  return mensajeError;
}

/**
 * Comprueba si una vez se ha terminado de escribir, sigue el error
 * @param {event} e 
 */
function corregirCampo(e) {
  if (e.target.checkValidity()) {
    document.getElementById(`error-${e.target.name}`).innerHTML = "";
    e.target.classList.remove("border-red-600");
  }
}