const oPersona = {
    nombre: "Pedro",
    apellidos: "Sánchez",
    edad: 50,
    colorOjos: "azul",
    nombreCompleto: function () {
        return `${this.nombre} ${this.apellidos}`;
    }
};

class Persona {
    constructor(nombreP, apellidosP, edadP, colorOjosP) {
        this.nombre = nombreP;
        this.apellidos = apellidosP;
        this.edad = edadP;
        this.colorOjos = colorOjosP;
    }

    nombreCompleto() {
        return `${this.nombre} ${this.apellidos}`;
    }
}

const oMiPadre = new Persona("Juan", "Sánchez", 70, "marrón");