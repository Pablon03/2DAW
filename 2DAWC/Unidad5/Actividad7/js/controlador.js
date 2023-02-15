// Importamos la base de datos
import { ControladorCarrito } from "../../Tienda online LocalStorage (solución)/Tienda online LocalStorage (solución)/js/controlador.js";
import { productos, categorias } from "../db/db.js";

export class controladorBBDD {
  static getProducts(index) {
    return productos[index];
  }

  static getCategories(index) {
    return categorias[index];
  }

  static filterCategoriesProducts(id) {
    return productos.filter((product) => product.categoria === id);
  }

  static getProductsByID(id) {
    return productos.filter((product) => product.id === id);
  }
}

export class controladorCarrito {
  /**
   * Método que elimina todos los productos almacenados en el carrito
   */
  static vaciarCarrito() {
    localStorage.clear();
  }

  static deleteProduct(id) {
    localStorage.removeItem(id);
  }

  static getProduct(id) {
    return JSON.parse(localStorage.getItem(id));
  }

  static productExist() {
    return controladorCarrito.getProduct(id) !== null;
  }

  static getQuantityProduct(id) {
    const product = getProduct(id);
    return product ? product.quantity : 0;
  }

  static addProduct(product) {
    if (producto) {
      const id = product.id;
      if (controladorCarrito.productExist(id)) {
        product = ControladorCarrito.getProduct(id);
        product.quantity += 1;
      } else {
        product.quantity = 1;
      }
      localStorage.setItem(id, JSON.stringify(product));
    }
  }

  static getProducts() {
    let productsCarrito = [];
    for (let index = 0; index < localStorage.length; index++) {
      const id = localStorage.key(index);
      const product = JSON.parse(localStorage.getItem(id));
      productsCarrito.push(product);
    }
    return productsCarrito;
  }
}
