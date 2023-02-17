// Importamos la base de datos
import { productos, categorias } from "../db/db.js";
import { controladorCarrito, controladorBBDD } from "../js/controlador.js";

/////////////////////ACTIVIDAD 1/////////////////////////////
seeAllProducts();

/**
 * Muestra los productos en su sitio
 */
function seeAllProducts() {
  let arrayProducts = "";
  for (let index = 0; index < productos.length; index++) {
    // Obtenemos el producto y lo metemos a la función
    // que nos mostrará el producto
    let productNow = controladorBBDD.getProducts(index);
    arrayProducts += seeProducts(productNow);
  }

  const productsContainer = document.getElementById("products-container");
  productsContainer.innerHTML = arrayProducts;
}

/**
 * Crea el HTML del producto que se le pasa
 * @param {Object} productNow
 * @returns
 */
function seeProducts(productNow) {
  const { id, nombre, categoria, imagen, precio, vendedor, stock } = productNow;

  return `<article id="${id}" class="location-listing" data-categoria="${categoria}">
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

/////////////////////ACTIVIDAD 2/////////////////////////////
seeAllCategories();
putListeners();

/**
 * Muestra las categorias en la barra lateral izquierda
 */
function seeAllCategories() {
  let arrayCategories = `<form>
    <fieldset id="filtro-categoria" name="filtro-categoria">
    <legend>Filtros por categoría:</legend>`;
  for (let index = 0; index < categorias.length; index++) {
    let categoryNow = controladorBBDD.getCategories(index);
    arrayCategories += seeCategorie(categoryNow);
  }

  arrayCategories += `</fieldset>
    </form>`;

  const categorieContainer = document.getElementById("filter-container");
  categorieContainer.innerHTML = arrayCategories;
}

/**
 * Crea el HTML para las categorias
 * @param {Object} categoryNow
 * @returns
 */
function seeCategorie(categoryNow) {
  const { id, nombre } = categoryNow;

  return `<div class="contenedor-categoria">
    <input type="checkbox" id="${id}" name="${id}" class="category" value="${id}">
    <label for="${id}">${nombre}</label>
    </div>`;
}

/**
 * Pone listeners
 */
function putListeners() {
  document
    .getElementById("filter-container")
    .addEventListener("click", filterCategories, false);

  document
    .getElementById("products-container")
    .addEventListener("click", addProductCart, false);

  document
    .getElementById("contenedor-tabla-carrito")
    .addEventListener("click", deleteProductCart, false);

  document
    .getElementById("vaciar-carrito")
    .addEventListener("click", cleanCartEvent, false);
}

/**
 * Aquí entra cuando se hace click en la barra lateral izquierda
 * Gestiona el evento de aplicar filtros
 * @param {evento} e
 */
function filterCategories(e) {
  const arrayChecked = getChecked();
  cleanProducts();
  const htmlProducts = traverseArrayChecked(arrayChecked);

  const productsContainer = document.getElementById("products-container");
  productsContainer.innerHTML = htmlProducts;

}

/**
 * Limpia la parte de productos
 */
function cleanProducts() {
  document.getElementById("products-container").innerHTML = "";
}

/**
 * Devuelve un array de las categorias que se le ha dado check
 * @returns Array
 */
function getChecked() {
  let checkboxElements = document.querySelectorAll(
    'input[type="checkbox"]:checked'
  );

  let checkboxElementsArray = [];

  for (let index = 0; index < checkboxElements.length; index++) {
    checkboxElementsArray.push(checkboxElements[index].value);
  }

  return checkboxElementsArray;
}

/**
 * Recorre el array para meter la cadena HTML de los produtos a mostrar
 * de las categorias seleccionadas
 * @param {Array} arrayChecked
 * @returns
 */
function traverseArrayChecked(arrayChecked) {
  let arrayProductsFilter;
  let arrayProducts = [];

  for (const checkbox of arrayChecked) {
    let arrayProducts = controladorBBDD.filterCategoriesProducts(checkbox);

    for (let index = 0; index < arrayProducts.length; index++) {
      let productNow = controladorBBDD.getProductsByID(arrayProducts[index].id);
      arrayProductsFilter += seeProducts(productNow[0]);
    }
  }

  return arrayProductsFilter;
}

/////////////////////ACTIVIDAD 3/////////////////////////////

function addProductCart(e) {
  e.preventDefault();
  const button = e.target;
  if (button.classList.contains("add")) {
    const idProduct = button.parentNode.parentNode.parentNode.id;
    const productDDBB = controladorBBDD.getProductsByID(idProduct)[0];
    controladorCarrito.addProduct(productDDBB);
  }

  refreshCartHTML();
}

function refreshCartHTML() {
  cleanHTMLCart();
  addHTMLCart();
}

function cleanHTMLCart() {
  document.querySelector("#lista-carrito tbody").innerHTML = "";
}

function addHTMLCart() {
  const product = controladorCarrito.getProducts();
  product.forEach((product) => {
    const { id, nombre, categoria, imagen, precio, vendedor, stock, quantity } =
      product;
    const fila = document.createElement("tr");
    fila.innerHTML = `
    <td>  
         <img src="${imagen}">
    </td>
    <td>${nombre}</td>
    <td>${precio}€</td>
    <td>${quantity} </td>
    <td>
         <a href="#" class="borrar-curso" data-id="${id}">X</a>
    </td>
`;
    document.querySelector("#lista-carrito tbody").appendChild(fila);
  });
}

function deleteProductCart(e){
  e.preventDefault();
  const button = e.target;
  if(button.classList.contains("borrar-curso")){
    const id = button.getAttribute("data-id");
    controladorCarrito.deleteProduct(id);
  }
  refreshCartHTML();
}

function cleanCartEvent(){
  cleanHTMLCart();
  controladorCarrito.vaciarCarrito();
}