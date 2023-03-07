import { ControladorPHP as Controlador } from "./controlador.js";

ponerEventListeners();

/**
 * Añade Listeners
 */
function ponerEventListeners() {
  //// Mostrar el nombre bajo Nueva Cita ////
  window.addEventListener("load", mostrarDatos, false);
  document
    .getElementById("cancelar")
    .addEventListener(
      "click",
      () => (window.location.href = "./lista-citas.html"),
      false
    );

  document
    .getElementById("formulario")
    .addEventListener("submit", gestionarSubmit, false);

  ////// Poner en focus el formulario la primera vez que entre //////
  window.addEventListener("load", () => document.getElementById("formulario")[0].focus(), false);

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

/**
 * Muestra el nombre debajo de Cita
 */
function mostrarDatos() {
  const nombre = localStorage.getItem("nombreSeleccionado");
  const apellidos = localStorage.getItem("apellidoSeleccionado");
  const subituloEspacio = document.getElementById("cita-cliente");
  subituloEspacio.innerHTML = `${nombre} ${apellidos}`;
}

/**
 * Hace las comprobaciones finales y si hay un error de servidor
 * lo mandará y se quedará en la página, sino se redirigirá
 * @param {Event} e
 */
async function gestionarSubmit(e) {
  e.preventDefault();

  let formValido = compruebaErrores(document.getElementById("fecha"));
  formValido = compruebaErrores(document.getElementById("hora")) && formValido;
  formValido =
    compruebaErrores(document.getElementById("descripcion")) && formValido;
  formValido =
    compruebaErrores(document.getElementById("detalles")) && formValido;

  if (formValido) {
    const datos = recogerDatosFormulario();
    const respuesta = await Controlador.setCita(datos);
    const validacionRespuesta = tratarRespuesta(respuesta);
    if (!validacionRespuesta) {
      window.location.href = "./index.html";
    }
  }
  console.log(document.getElementsByClassName("border-red-600")[0].focus());
}

/**
 * Estructura los datos del formulario y transforma en JSON
 * @returns json estructurado
 */
function recogerDatosFormulario() {
  const form = document.getElementById("formulario");
  const formDatos = new FormData(form);
  const nif = localStorage.getItem("nifSeleccionado");
  return {
    nifCliente: nif,
    fecha: formDatos.get("fecha"),
    hora: formDatos.get("hora"),
    descripcion: formDatos.get("descripcion"),
    detalles: formDatos.get("detalles"),
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
    document.getElementById(`error-${respuesta.camposError[i]}`).innerHTML =
      respuesta.mensajesError[i];
    document
      .getElementById(`${respuesta.camposError[i]}`)
      .classList.add("border-red-600");
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
  document.getElementById(`error-${e.target.name}`).innerHTML = mensajeError;
  e.target.classList.add("border-red-600");
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