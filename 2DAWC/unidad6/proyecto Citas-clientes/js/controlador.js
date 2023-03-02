export class ControladorPHP {
  /**
   * Método que elimina la base de datos para el caso de que se necesite
   * establecer el estado inicial.
   * La siguiente petición al servidor creará de nuevo la base de datos
   * y la rellenará con algunos datos de prueba.
   * @returns Respuesta del servidor en formato JSON
   */
  static async eliminarBD() {
    let respuestaJSON = null;
    try {
      const respuesta = await fetch(`citasClientes.php`, {
        method: "POST",
        headers: {
          "content-type": "application/json",
        },
        body: JSON.stringify({
          metodo: "eliminarBD",
        }),
      });
      respuestaJSON = await respuesta.json();
    } catch (error) {
      console.error(error.message);
    }
    return respuestaJSON;
  }

  /**
   * Método que muestra clientes de la base de datos
   * @returns Respuesta del servidor en formato JSON
   */
  static async mostrarClientes() {
    let respuestaJSON = null;
    try {
      const respuesta = await fetch(`citasClientes.php`, {
        method: "POST",
        headers: {
          "content-type": "application/json",
        },
        body: JSON.stringify({
          metodo: "getClientes",
        }),
      });
      respuestaJSON = await respuesta.json();
    } catch (error) {
      console.error(error.message);
    }
    return respuestaJSON;
  }

  /**
   * Método que añadirá un nuevo cliente en la base de datos.
   * @returns Respuesta del servidor en formato JSON
   */
  static async setCliente(datos) {
    let respuestaJSON = null;
    try {
      const respuesta = await fetch("citasClientes.php", {
        method: "POST",
        headers: {
          "content-type": "application/json",
        },
        body: JSON.stringify({
          metodo: "setCliente",
          cliente: datos,
        }),
      });
      respuestaJSON = await respuesta.json();
    } catch (error) {
      console.error(error.message);
    }
    return respuestaJSON;
  }

  /**
   * Método que pondrá nueva cita en la base de datos del cliente.
   * En la variable datos se le pasará los detalles de la cita
   * así como el dni del cliente
   * @returns Respuesta del servidor en formato JSON
   */
  static async setCita(datos) {
    let respuestaJSON = null;
    try {
      const respuesta = await fetch("citasClientes.php", {
        method: "POST",
        headers: {
          "content-type": "application/json",
        },
        body: JSON.stringify({
          metodo: "setCita",
          cita: datos,
        }),
      });
      respuestaJSON = await respuesta.json();
    } catch (error) {
      console.error(error.message);
    }
    return respuestaJSON;
  }

  /**
   * Método que mostrará las citas del cliente el cual se le
   * pasará su nif mediante una variable
   * @returns Respuesta del servidor en formato JSON
   */
  static async mostrarCitas(nif) {
    let respuestaJSON = null;
    try {
      const respuesta = await fetch(`citasClientes.php`, {
        method: "POST",
        headers: {
          "content-type": "application/json",
        },
        body: JSON.stringify({
          metodo: "getCitasCliente",
          nifCliente: nif,
        }),
      });
      respuestaJSON = await respuesta.json();
    } catch (error) {
      console.error(error.message);
    }
    return respuestaJSON;
  }

  /**
   * Método que elimina el cliente de la base de datos
   * El cliente será identidicado por su nif
   * que será pasado como variable al servidor
   * @returns Respuesta del servidor en formato JSON
   */
  static async eliminarCliente(nif) {
    let respuestaJSON = null;
    try {
      const respuesta = await fetch(`citasClientes.php`, {
        method: "POST",
        headers: {
          "content-type": "application/json",
        },
        body: JSON.stringify({
          metodo: "eliminarCliente",
          nif: nif,
        }),
      });
      respuestaJSON = await respuesta.json();
    } catch (error) {
      console.error(error.message);
    }
    return respuestaJSON;
  }

  /**
   * Método que eliminará una cita de una base de datos
   * Se le pasarán los datos necesarios por el servidor
   * para gestionar dicho borrado
   * @returns Respuesta del servidor en formato JSON
   */
  static async eliminarCita(id) {
    let respuestaJSON = null;
    try {
      const respuesta = await fetch(`citasClientes.php`, {
        method: "POST",
        headers: {
          "content-type": "application/json",
        },
        body: JSON.stringify({
          metodo: "eliminarCita",
          id: id,
        }),
      });
      respuestaJSON = await respuesta.json();
    } catch (error) {
      console.error(error.message);
    }
    return respuestaJSON;
  }
}
