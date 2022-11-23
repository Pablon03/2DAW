function map(numeros, func_callback) {
    let array = [];
    for (let index = 0; index < numeros.length; index++) {
        array.push(func_callback(numeros[index]));
    }
    return array;
}

function func_callback(numero) {
    return numero * 2;
}

let numeros = [2, 3, 5, 8];
map(numeros, func_callback);