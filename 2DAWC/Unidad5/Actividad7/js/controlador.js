// Importamos la base de datos
import {productos, categorias} from "../db/db.js";

export class controladorBBDD{

    static getProducts(index) {
        return productos[index];
    }

    /**
     * 
     * @param {string} category Nombre categoria producto
     * @returns id de la categoria
     */
    static getCategoryByID(category){
        let i = 0;
        let exit = false;

        let correctID = "";
        do {
            let categoryCheck = categorias[i];
            console.log(categorias[0].nombre);
            let categoryName = categoryCheck.nombre;

            if(categoryName == category){
                correctID = categoryCheck.id;
                exit = true;
            }
            i++;
        } while (!exit);
        return correctID;
    }
}

export class controladorCarrito{

}