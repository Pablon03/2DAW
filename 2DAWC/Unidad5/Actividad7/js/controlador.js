// Importamos la base de datos
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
    let indexDDBB = id-1;
    // return productos[indexDDBB][id];
    console.log(productos[indexDDBB][id])
  }
}

export class controladorCarrito {}
