///////////////////////////// FUNCIONES QUE DEBES IMPLEMENTAR /////////////////////////

// ACTIVIDAD 1:
// Clase Producto
class Producto {
    // Atributos privados
    #id;
    #descripcion;
    #precio;

    // Constructor de la clase Producto
    constructor(id, descripcion, precio) {
        this.#id = id;
        this.#descripcion = descripcion;
        this.#precio = precio;
    }

    // Getters y setters
    get id() {
        return this.#id;
    }

    set id(id) {
        this.#id = id;
    }

    get descripcion() {
        return this.#descripcion;
    }

    set descripcion(descripcion) {
        this.#descripcion = descripcion;
    }

    get precio() {
        return this.#precio;
    }

    set precio(precio) {
        this.#precio = precio;
    }

    // Método toString
    toString() {
        return `(${this.#id}) ${this.#descripcion} - ${this.#precio}`;
    }

}


//Clase ArticuloFactura
class ArticuloFactura extends Producto {
    // Atributos privados
    #cantidad;

    // Constructor
    constructor(id, descripcion, precio, cantidad) {
        super(id, descripcion, precio);
        this.#cantidad = cantidad;
    }

    // Get y set
    get cantidad() {
        return this.#cantidad;
    }

    set cantidad(cantidad) {
        this.#cantidad = cantidad;
    }

    // Método toString
    toString() {
        return `(${this.id}) ${this.descripcion} - ${this.precio.toFixed(2)}€ x ${this.#cantidad}`;
    }

    // Método getTotal
    getTotal() {
        return this.precio * this.cantidad;
    }

}
//ACTIVIDAD 2:
/**
 * Crea un array con productos y muestra dicha Factura por consola
 */
function crearFactura() {
    // Crear array de artículos
    const factura = [
      new ArticuloFactura(8, "Almendras bolsa 200gr", 3.12, 3),
      new ArticuloFactura(12, "Harina bolsa 1Kg", 2.30, 1),
      new ArticuloFactura(4, "Piña conserva lata 500gr", 2.10, 4)
    ];
  
    // Imprimir factura
    let total = 0;
    console.log("FACTURA:");
    for (const articulo of factura) {
      total += articulo.getTotal();
      console.log(`${articulo.toString()} - ${articulo.getTotal().toFixed(2)}€`);
    }
    console.log(`TOTAL - ${total.toFixed(2)}€`);
  }
  
crearFactura();


///////////////////////////// FIN FUNCIONES QUE DEBES IMPLEMENTAR /////////////////////////