// Importamos la base de datos
import { productos, categorias } from "../db/db.js";
import { controladorCarrito, controladorBBDD } from "../js/controlador.js";

/////////////////////ACTIVIDAD 1/////////////////////////////
seeAllProducts();
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

function seeCategorie(categoryNow) {
  const { id, nombre } = categoryNow;

  return `<div class="contenedor-categoria">
    <input type="checkbox" id="${id}" name="${id}" class="category" value="${id}">
    <label for="${id}">${nombre}</label>
    </div>`;
}

function putListeners() {
  document
    .getElementById("filter-container")
    .addEventListener("click", filterCategories, false);
}

function filterCategories(e) {
  const checkboxElements = document.querySelectorAll(
    'input[type="checkbox"]:checked'
  );
  //
  let arrayProductsFilter = "";

  cleanProducts();

  for (const checkbox of checkboxElements) {
    let arrayProducts = controladorBBDD.filterCategoriesProducts(
      checkbox.value
    );

    for (let index = 0; index < arrayProducts.length; index++) {
      let productNow = controladorBBDD.getProductsByID(arrayProducts[index].id);
      arrayProductsFilter += seeProducts(productNow);
    }
  }

  //   cleanProducts();

  //   const productsContainer = document.getElementById("products-container");
  //   productsContainer.innerHTML = arrayProducts;
}

function cleanProducts() {
  document.getElementById("products-container").innerHTML = "";
}
