function find(array, func_callback) {
    let res = null;
    for (let i = 0; i < array.length && !res; i++) {
        if (func_callback(array[i], i, array)) {
            res = array[i];
        }
    }
    return res;
}

function func_callback(elem, indice, array) {
    let res = false;
for (let j = indice + 1; j < array.length && !res; j++) {
        if (array[j] === elem) {
            res = true;
        }
    }
    return res;
}
    

const elems = [3, 6, 9, 7, 7, 4, 9];
const numero = find(elems, func_callback);
console.log(numero);