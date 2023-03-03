import {ControladorPHP as Controlador} from "./controlador.js";

ponerEventListeners();

/**
 * Añade Listeners
 */
function ponerEventListeners(){
    document.getElementById("crearCita").addEventListener("click", () => window.location.href="./nueva-cita.html", false);
    document.getElementById("volverClientes").addEventListener("click", () => window.location.href="./index.html", false);

    //// Mostrar la lista de citas cuando se cargue la web ////
    window.addEventListener('DOMContentLoaded', mostrarCitas, false);

    //// Mostrar el nombre bajo citas ////
    window.addEventListener('load', mostrarDatos, false);

    //// Eliminar Cita ////
    window.addEventListener("click", comprobarClick, false);
}

/**
 * Muestra clientes en la tabla clientes
 */
async function mostrarCitas(e){    
    const nif = localStorage.getItem('nifSeleccionado');

    const tbody = document.getElementById('listado-citas');
    const datosGrande = await Controlador.mostrarCitas(nif);

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
function getFila(cita){
    const fechaFormateada = formatearFecha(cita.fecha);
    const tr = document.createElement("tr");
    tr.innerHTML = `<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    <p class="text-gray-700"> ${fechaFormateada} </p>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
    <p class="text-gray-700">${cita.hora}</p>
    </td>
    <td class="px-6 py-4 border-b border-gray-200 leading-5 text-gray-700">
    <p class="text-gray-600">${cita.descripcion}</p>
    </td>
    <td class="px-6 py-4 border-b border-gray-200 leading-5 text-gray-700">
    <p class="text-gray-600">${cita.detalles}</p>
   </td>
   <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
   <a href="#" class="block text-red-600 hover:text-red-900 eliminar" data-citaid="${cita.id}" datanifcliente="${cita.nifCliente}" data-citafecha="${cita.fecha}" data-citahora="${cita.hora}">Eliminar cita</a>
   </td>`;
   return tr;
}

/**
 * Muestra el nombre debajo de Cita
 */
function mostrarDatos(){
    const nombre = localStorage.getItem('nombreSeleccionado');
    const apellidos = localStorage.getItem('apellidoSeleccionado');
    const subituloEspacio = document.getElementById("cita-cliente");
    subituloEspacio.innerHTML = `${nombre} ${apellidos}`;
}

/**
 * Da formato a la fecha
 * @param {Date} fecha 
 * @returns fecha formateada
 */
function formatearFecha(fecha){
    const fechaObjeto = new Date(fecha);
    const dia = fechaObjeto.getDate();
    const mes = fechaObjeto.getMonth() + 1;
    const anio = fechaObjeto.getFullYear();
    const fechaFormateada = `${dia.toString().padStart(2, '0')}-${mes.toString().padStart(2, '0')}-${anio.toString()}`;
    return fechaFormateada;
}

/**
 * Comprueba si se ha dado click en eliminar
 * @param {Event} e 
 */
function comprobarClick(e){
    for (let index = 0; index < e.target.classList.length; index++) {
        if (e.target.classList[index] === "eliminar") {
          eliminarCita(e)
        }
      }
}

/**
 * Elimina clientes según la confirmación
 * @param {Event} e 
 */
async function eliminarCita(e){
    const fecha = formatearFecha(e.target.getAttribute("data-citafecha"));
    const hora = e.target.getAttribute("data-citahora");
    const idCita = e.target.getAttribute("data-citaid");

    const confirmacion = window.confirm(`¿Seguro que desea eliminar la cita del ${fecha} a las ${hora}`);
    if(confirmacion){
        const citaEliminada = await Controlador.eliminarCita(idCita);
        location.reload();
    }
}

  