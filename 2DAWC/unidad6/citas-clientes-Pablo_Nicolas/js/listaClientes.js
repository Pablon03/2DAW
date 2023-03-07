import { ControladorPHP as Controlador } from "./controlador.js";

ponerEventListeners();

/**
 * Añade Listeners
 */
function ponerEventListeners() {
  document
    .getElementById("crearCliente")
    .addEventListener(
      "click",
      () => (window.location.href = "./nuevo-cliente.html"),
      false
    );
  window.addEventListener("load", mostrarClientes, false);


  window.addEventListener("click", comprobarClick, false);
}


/**
 * Muestra clientes en la tabla clientes
 */
async function mostrarClientes() {
  const tbody = document.getElementById("listado-clientes");
  const datosGrande = await Controlador.mostrarClientes();
  const datosHijo = datosGrande.datos;
  for (let index = 0; index < datosHijo.length; index++) {
    tbody.appendChild(getFila(datosHijo[index]));
  }
}

/**
 * Genera una fila con los datos del cliente
 * @param {Array} cliente
 * @returns tr
 */
function getFila(cliente) {
  const telefonoFormateado = formatearTelefono(cliente.telefono);
  const nifFormateado = formatearNif(cliente.nif);
  const tr = document.createElement("tr");
  tr.innerHTML = `<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    <p class="text-sm leading-5 font-medium text-gray-700 text-lg font-bold">${cliente.nombre}</p>
    <p class="text-sm leading-10 text-gray-700">${cliente.apellidos}</p>
   </td>
   <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
    <p class="text-gray-700">${cliente.email}</p>
   </td>
   <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-700">
    <p class="text-gray-600">${nifFormateado}</p>
   </td>
   <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-700">
    <p class="text-gray-600">${telefonoFormateado}</p>
   </td>
   <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
    <a href="#" class="block text-teal-600 hover:text-teal-900 mr-2 crearCita" data-clienteemail="${cliente.email}" data-clientetelefono="${cliente.telefono}" data-clientenombre="${cliente.nombre}"
   data-clienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Crear cita</a>
    <a href="#" class="block text-teal-600 hover:text-teal-900 mr-2 verCitas" data-clienteemail="${cliente.email}" data-clientetelefono="${cliente.telefono}" data-clientenombre="${cliente.nombre}" data-clienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Ver citas</a>
    <a href="#" class="block text-teal-600 hover:text-teal-900 mr-2 editarCliente" data-clienteemail="${cliente.email}" data-clientetelefono="${cliente.telefono}" data-clientenombre="${cliente.nombre}" data-clienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Editar Cliente</a>
    <a href="#" class="block text-red-600 hover:text-red-900 eliminar" data-clienteemail="${cliente.email}" data-clientetelefono="${cliente.telefono}" data-clientenombre="${cliente.nombre}" data-clienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Eliminar cliente</a>
   </td>`;
  return tr;
}

/**
 * Da formato al número de teléfono
 * @param {string} telefono
 * @returns string
 */
function formatearTelefono(telefono) {
  let telefonoFormateado = "";
  if (telefono.length === 9) {
    telefonoFormateado = `${telefono.substring(0, 3)} ${telefono.substring(
      3,
      5
    )} ${telefono.substring(5, 7)} ${telefono.substring(7, 9)}`;
  }
  return telefonoFormateado;
}

/**
 * Da formato al nif
 * @param {string} nif
 * @returns string
 */
function formatearNif(nif) {
  let nifFormateado = "";
  if (nif.length === 9) {
    nifFormateado = `${nif.substring(0, 8)}-${nif.substring(8)}`;
  }
  return nifFormateado;
}

/**
 * Gestiona los clicks de la ventana
 * @param {Event} e
 */
function comprobarClick(e) {
  for (let index = 0; index < e.target.classList.length; index++) {
    if (e.target.classList[index] === "crearCita") {
      meterDatosStorage(e);
      window.location.href = "./nueva-cita.html";
    } else if (e.target.classList[index] === "verCitas") {
      meterDatosStorage(e);
      window.location.href = "./lista-citas.html";
    } else if (e.target.classList[index] === "eliminar") {
      eliminarCliente(e);
    } else if (e.target.classList[index] === "editarCliente"){
      meterDatosStorage(e);
      window.location.href = "./editar-cliente.html";
    }
  }
}

/**
 * Inserta en localStorage los datos que se necesiten
 * @param {Event} e
 */
function meterDatosStorage(e) {
  const nif = e.target.getAttribute("data-clientenif");
  const nombre = e.target.getAttribute("data-clientenombre");
  const apellidos = e.target.getAttribute("data-clienteapellidos");
  const email = e.target.getAttribute("data-clienteemail");
  const telefono = e.target.getAttribute("data-clientetelefono");

  localStorage.setItem("nifSeleccionado", nif);
  localStorage.setItem("nombreSeleccionado", nombre);
  localStorage.setItem("apellidoSeleccionado", apellidos);
  localStorage.setItem("emailSeleccionado", email);
  localStorage.setItem("telefonoSeleccionado", telefono);
}

/**
 * Elimina clientes según la confirmación
 * @param {Event} e 
 */
async function eliminarCliente(e){
    const nif = e.target.getAttribute("data-clientenif");
    const nombre = e.target.getAttribute("data-clientenombre");
    const apellidos = e.target.getAttribute("data-clienteapellidos");

    const confirmacion = window.confirm(`¿Seguro que quieres eliminar al cliente ${nombre} ${apellidos}?`);
    if(confirmacion){
        const clienteEliminado = await Controlador.eliminarCliente(nif);
        location.reload();
    }
}