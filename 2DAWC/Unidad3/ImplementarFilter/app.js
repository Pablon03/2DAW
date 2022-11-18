function filter(array, func_callback) {
    let res = [];
    for (let i = 0; i < array.length; i++) {
        if (func_callback(array[i])) {
            res.push(array[i]);
        }
    }
    return res;
}


function func_callback(elem) {
    return elem % 2 == 0;
}

const elems = [25, 2, 3, 8, 24];
filter(elems, func_callback);