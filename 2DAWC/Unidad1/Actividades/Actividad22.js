baseImponible = parseInt(prompt('Introduzca la base imposible: '));
tipoIva = prompt('Introduzca el tipo de IVA (general, reducido o superreducido): ');
codigoPromo = prompt('Introduzca el código promocional(nopro, mitad, meno5 o 5porc)');

const GENERAL = "IVA GENERAL (21%) ";
const REDUCIDO = "IVA REDUCIDO (10%) ";
const SUPERREDUCIDO = "IVA SUPERREDUCIDO (4%) ";


console.log(baseImponible);

if (tipoIva == "general") {
    impuesto = (baseImponible * 1.21) - baseImponible;
    console.log(GENERAL + impuesto);
} else if (tipoIva == "reducido") {
    impuesto = (baseImponible * 1.10) - baseImponible;
    console.log(REDUCIDO + impuesto);
} else if (tipoIva == "superreducido") {
    impuesto = (baseImponible * 1.04) - baseImponible;
    console.log(SUPERREDUCIDO + impuesto);
} else {
    console.log('No ha introducido un impuesto correcto');
}

precioTotal = baseImponible + impuesto;
console.log('Precio con IVA ' + precioTotal);

if (codigoPromo == "nopro") {
    console.log('Usted no tiene promoción');

} else if (codigoPromo == "mitad") {
    precioDescuento = precioTotal / 2;
    console.log('Cod. promo -> MITAD: -' + precioDescuento);

} else if (codigoPromo == "meno5") {
    precioDescuento = precioTotal - 5;
    console.log('Cod. promo -> MENO5: -' + precioDescuento);

} else if (codigoPromo == "5porc") {
    precioDescuento = precioTotal * 1.05 - precioTotal;
    console.log('Cod. promo -> 5PORC: -' + precioDescuento);

} else {
    console.log('No ha introducido un impuesto correcto');
}

precioFinal = precioTotal + precioDescuento;

console.log('TOTAL ' + precioFinal);