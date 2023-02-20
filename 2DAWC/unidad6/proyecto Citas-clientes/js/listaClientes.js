import {ControladorPHP as Controlador} from "./controlador.js";

ponerEventListeners();

/**
 * Añade Listeners
 */
function ponerEventListeners(){
    document.getElementById("crearCliente").addEventListener("click", () => window.location.href="./nuevo-cliente.html", false);
    window.addEventListener('load', mostrarClientes, false);
}

/**
 * Muestra clientes en la tabla clientes
 */
async function mostrarClientes(){
    let meterHTML = "";
    const datosGrande = await Controlador.mostrarClientes();
    const datosHijo = datosGrande.datos; 
    for (let index = 0; index < datosHijo.length; index++) {
        meterHTML += generarHTMLTablaClientes(datosHijo[index]);
    }
    document.getElementById("listado-clientes").innerHTML = meterHTML;
}

/**
 * Genera HTML de la tabla para mostrar los clientes
 * @param {Array} cliente 
 * @returns String
 */
function generarHTMLTablaClientes(cliente) {
    const htmlGenerado = `<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
     <p class="text-sm leading-5 font-medium text-gray-700 text-lg font-bold">${cliente.nombre}</p>
     <p class="text-sm leading-10 text-gray-700">${cliente.apellidos}</p>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
     <p class="text-gray-700">${cliente.email}</p>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-700">
     <p class="text-gray-600">${cliente.nif}</p>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-700">
     <p class="text-gray-600">${cliente.telefono}</p>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
     <a href="#" class="block text-teal-600 hover:text-teal-900 mr-2 crearCita" data-clientenombre="${cliente.nombre}"
    data-clienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Crear cita</a>
     <a href="#" class="block text-teal-600 hover:text-teal-900 mr-2 verCitas" data-clientenombre="${cliente.nombre}" dataclienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Ver citas</a>
     <a href="#" class="block text-red-600 hover:text-red-900 eliminar" data-clientenombre="${cliente.nombre}" dataclienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Eliminar cliente</a>
    </td>
    </tr>`;
    return htmlGenerado;
}
