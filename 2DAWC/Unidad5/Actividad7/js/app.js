// Importamos la base de datos
import {productos, categorias} from "../db/db.js";
import {controladorCarrito, controladorBBDD} from "../js/controlador.js";

/////////////////////ACTIVIDAD 1/////////////////////////////
seeAllProducts();

function seeAllProducts(){
    let arrayProducts = '';
    for (let index = 0; index < productos.length; index++) {
        // Obtenemos el producto y lo metemos a la función
        // que nos mostrará el producto
        let productNow = controladorBBDD.getProducts(index);
        arrayProducts += seeProducts(productNow);


        // console.log(dataBBDD);
        // console.log("------------------------------");
    }

    const productsContainer = document.getElementById("products-container");
    productsContainer.innerHTML = arrayProducts;
}



/**
 *  TENGO QUE PCOGE EL ID DE LA CATEGORIA DEL PRODUCTO QUE SE VA A METER
 * LA FUNCION getCategoryByID DEL CONTROLADOR SE ENCARGA
 * 
 */


function seeProducts(productNow){

    const {id, nombre, categoria, imagen, precio, vendedor, stock} = productNow;

    const idCategory = controladorBBDD.getCategoryByID(categoria);

    return `<article id="${id}" class="location-listing" data-categoria="${id}">
    <div class="location-image">
    <a href="#">
    <img src="${imagen}" alt="${nombre}">
    </a>
    </div>
    <div class="data">
    <h4>${nombre}</h4>
    <p class="price">${precio}</p>
    <p>Vendido por <strong>${vendedor}</strong></p>
    <p>Quedan ${stock} unidades</p>
    <div class="button-container">
    <a class="button add" href="#" target="_blank">Añadir al carrito</a>
    </div>
    </div>
    </article>`;
}


// <article id="007" class="location-listing" data-categoria="005">
// <div class="location-image">
// <a href="#">
// <img src="res/art007.webp" alt="Placa base Asus">
// </a>
// </div>
// <div class="data">
// <h4>Placa base Asus</h4>
// <p class="price">187,45€</p>
// <p>Vendido por <strong>Amazonia</strong></p>
// <p>Quedan 6 unidades</p>
// <div class="button-container">
// <a class="button add" href="#" target="_blank">Añadir al carrito</a>
// </div>
// </div>
// </article>