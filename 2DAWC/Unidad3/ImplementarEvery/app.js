function every(array, func_callback) {
    let res = true;
    for (let i = 0; i < array.length && !res; i++) {
        if (!func_callback(array[i])) {
            res = false;
        }
    }
    return res;
}

function func_callback(elem) {
    return elem > 18 ? true : false;
}


const elems = [88, 28, 25, 51];
console.log(every(elems, func_callback));