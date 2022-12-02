/************************************************************ */
/** 1. Añadir o eliminar un elemento al principio o al final **/
/************************************************************ */
const aLetras = ["b", "c", "d"];
//a. (push) Añade la letra "e" al final del array.

//b. (pop) Elimina el último elemento del array.

//c. (unshift) Añade la letra "a" al principio del array.

//d. (shift) Elimina el primer elemento del array.


/****************************************** */
/** 2. Añadir multiples elementos al final **/
/****************************************** */
const aNumeros = [1, 2, 3];
//a. (concat) Añade al final del array los elementos 4, 5, 6.


/************************** */
/** 3. Obtener un subarray **/
/************************** */
const aNumeros2 = [1, 2, 3, 4, 5];
//a. (slice) Extrae el array [4, 5]

//b. (slice) Extrae el array [3, 4]

//c. (slice) Extrae el array [2, 3]


/******************************************************** */
/** 4. Añadir o eliminar elementos en cualquier posicion **/
/******************************************************** */
const aNumeros3 = [1, 5, 7];
//a. (splice) Añade los elementos 2, 3 y 4 después del 1.

//b. (splice) Añade el elemento 6 entre el 5 y el 7.

//c. (splice) Elimina los elementos 2 y 3.


/************************************* */
/** 5. Rellenar un array con un valor **/
/************************************* */
//a. (fill) Crea un nuevo array con 5 posiciones con el valor 1.

//b. (fill) Rellena todo el array con el valor "a".

//c. (fill) Rellena el array con el valor "b" a partir de la segunda posición.


/**************************************** */
/** 6. Ordenar arrays y darles la vuelta **/
/**************************************** */
const aNumeros4 = [1, 2, 3, 4, 5];
//a. (reverse) Da la vuelta a los elementos del array.

const aNumeros5 = [5, 3, 2, 4, 1];
//b. (sort) Ordena de menor a mayor los elementos del array.

const aPersonas = [
  {nombre: "Susana", edad: 30},
  {nombre: "Antonio", edad: 18},
  {nombre: "Manuel", edad: 45}
];
//c. (sort) Ordena el array por orden alfabético.


/************************************* */
/** 7. Búsqueda de elementos en array **/
/************************************* */
const oPersona = { nombre: "Javier" };
const aDatos = [1, 5, "a", oPersona, true, 5, [1, 2], "9"];
//a. (indexOf) Obtén la primera posición que ocupa el elemento 5.

//b. (lastIndexOf) Obtén la última posición que ocupa el elemento 5.

const aDatos2 = [
  { id: 5, nombre: "Julia" }, 
  { id: 7, nombre: "Francisco" }
];
//c. (findIndex) Obtén la posición del elemento con id 5.

//d. (findIndex) Obtén la posición del elemento con nombre "Francisco".

//e. (find) Obtén el elemento con id 5.

const iNumeros6 = [5, 7, 12, 15, 17];
//f. (some) Indica si el array contiene algún elemento par.

const iNumeros7 = [4, 6, 16, 36];
//g. (every) Indica si todos los elementos del array son pares.


/**************************** */
/** 8. map, filter y reduce. **/
/**************************** */
const aCarro = [ 
  { nombre: "Sandía", precio: 6.95 }, 
  { nombre: "Melón", precio: 3.25 },
  { nombre: "Chocolate", precio: 1.5 },
  { nombre: "Pan", precio: 0.75 }
];
//a. (map) Obtén un array con los nombres de los productos.

//b. (map) Obtén un array con los precios de los productos.

//c. (map) Obtén un array con los precios con IVA de los productos.

//d. (filter) Obtén un array con los elementos que valgan más de 2 euros.

//e. (reduce) Obtén la cuenta total de todos los elementos.


/**************************************** */
/** 9. Convertir un array en una cadena. **/
/**************************************** */
const aElementos = ['Viento', 'Lluvia', 'Fuego'];
//a. (join) Obtén una cadena como esta "Viento,Lluvia,Fuego"

//b. (join) Obtén una cadena como esta "Viento, Lluvia, Fuego"

//c. (join) Obtén una cadena como esta "VientoLluviaFuego"