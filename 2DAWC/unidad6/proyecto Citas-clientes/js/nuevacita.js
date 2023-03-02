import { ControladorPHP as Controlador } from "./controlador.js";

ponerEventListeners();

/**
 * Añade Listeners
 */
function ponerEventListeners() {
  //// Mostrar el nombre bajo Nueva Cita ////
  window.addEventListener("load", mostrarDatos, false);
  document.getElementById("cancelar").addEventListener("click", () => window.location.href="./lista-citas.html", false);

  // Ponemos listeners en los inputs
  // Eventos al perder el foco
  document
    .getElementById("nombre")
    .addEventListener("blur", compruebaCampo, false);
  document
    .getElementById("apellidos")
    .addEventListener("blur", compruebaCampo, false);
  document
    .getElementById("email")
    .addEventListener("blur", compruebaCampo, false);
  document
    .getElementById("telefono")
    .addEventListener("blur", compruebaCampo, false);
  document
    .getElementById("nif")
    .addEventListener("blur", compruebaCampo, false);

  // Eventos cuando la validación no es correcta
  document
    .getElementById("nombre")
    .addEventListener("invalid", notificarErrores, false);
  document
    .getElementById("apellidos")
    .addEventListener("invalid", notificarErrores, false);
  document
    .getElementById("email")
    .addEventListener("invalid", notificarErrores, false);
  document
    .getElementById("telefono")
    .addEventListener("invalid", notificarErrores, false);
  document
    .getElementById("nif")
    .addEventListener("invalid", notificarErrores, false);

  // Eventos cuando se produce validacion negativa y se revisan las validaciones
  document
    .getElementById("nombre")
    .addEventListener("input", revisarErroresEvento, false);
  document
    .getElementById("apellidos")
    .addEventListener("input", revisarErroresEvento, false);
  document
    .getElementById("email")
    .addEventListener("input", revisarErroresEvento, false);
  document
    .getElementById("telefono")
    .addEventListener("input", revisarErroresEvento, false);
  document
    .getElementById("nif")
    .addEventListener("input", revisarErroresEvento, false);
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
 * Valida el campo según los requisitos puestos en el HTML
 * @param {Event} e
 * @returns true en caso de estar validado correctamente
 */
function revisarErroresEvento(e) {
  return e.target.checkValidity();
}

function compruebaCampo(e) {
  if (revisarErroresEvento) {
    document.getElementById(`error-${e.target.name}`).innerHTML = "";
  }
}

function notificarErrores(e) {
  document.getElementById(`error-${e.target.name}`).innerHTML = getMensajeError(e);
}

function getMensajeError(e) {}
