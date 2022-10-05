
function ultimaCifra(numero) {
    let cifraUltima = numero % 10;

    return cifraUltima;
}

let numero = prompt("Introduce un número: ");
let ultimaCifra = ultimaCifra(numero);

console.log(`${ultimaCifra}`);

