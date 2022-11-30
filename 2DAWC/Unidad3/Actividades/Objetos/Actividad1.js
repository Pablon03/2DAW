class Vehiculo {
    #pasajeros;

    constructor(pasajeros) {
        this.#pasajeros = pasajeros;
    }

    get pasajeros() {
        return this.#pasajeros;
    }

    set pasajeros(pasajeros) {
        this.#pasajeros = pasajeros;
    }
}

class Coche extends Vehiculo {
    #fabricante;
    #modelo; 
    #marchas;
    #marchaActual;

    constructor(pasajeros, fabricante, modelo){
        super(pasajeros);
        this.#fabricante = fabricante;
        this.#modelo = modelo;
        this.#marchas = ["P", 1, 2, 3, 4, 5, 6, "R"];
        this.#marchaActual = "P";
    }

    cambiarMarcha(marchaCambiar){
        this.#marchas.includes(marchaCambiar) ? this.#marchaActual = marchaCambiar : console.log("Su coche no tiene esta marcha");
    }

    get fabricante () {
        return this.#fabricante;
    }

    get modelo () {
        return this.#modelo;
    }

    get marchas () {
        return this.#marchas;
    }

    get marchaActual () {
        return this.#marchaActual;
    }

    set fabricante (fabricante) {
        this.#fabricante = fabricante;
    }

    set modelo (modelo) {
        this.#modelo = modelo;
    }
    set marchas (marchas) {
        this.#marchas = marchas;
    }

    set marchaActual (marchaActual) {
        this.#marchaActual = marchaActual;
    }

    static cochesIguales(Coche) {
        this.fabricante == Coche.fabricante && this.modelo == Coche.modelo ? true : false; 
    }

    toString () {
        var resultado = super.toString();
        resultado += `Fabricante: ${this.fabricante} | Modelo: ${this.modelo} | Pasajeros: ${this.pasajeros}`;
        return resultado;
    }
}

// Son para el apartado a.2
// const cocheTesla = new Coche("Tesla", "ModelS");
// const cocheMazda = new Coche("Mazda", "3i");

// Son para el apartado a.2
// cocheTesla.cambiarMarcha(1);
// cocheMazda.cambiarMarcha("R");

// Son para el apartado a.3
// console.log(cocheTesla.fabricante +" "+cocheTesla.modelo+ " " + cocheTesla.marchaActual);
// console.log(cocheMazda.fabricante +" "+cocheMazda.modelo+ " " + cocheMazda.marchaActual);

// Es para el apartado C
// cocheTesla.cochesIguales(cocheTesla);

const coche3 = new Coche(3, "Nissan", "Micra");

console.log(coche3.pasajeros);

console.log(coche3.toString());