function a() {
    const respuesta = prompt("Introduce un número");

    respuesta % 2 === 0 ? "par" : "impar";
}

function b () {
    for (let index = 0; index < 500; index++) {
        const num = Math.floor(Math.random() * (100000 - 1) + 1);
        texto = num % 2 ===0 ? "Par" : "Impar";
        console.log (num +" "+ texto);
    }
}