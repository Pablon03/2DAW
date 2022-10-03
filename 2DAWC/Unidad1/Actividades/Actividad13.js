const MEDIANOCHE = 86400;

function calcularSegundos(hora, minutos) {
    let segundosHora = hora * 3600;
    let segundosMinutos = minutos * 60;

    let segundosActuales = segundosHora + segundosMinutos;

    let diferenciaSegundos = MEDIANOCHE - segundosActuales;

    console.log(`${diferenciaSegundos} segundos restantes`);

    let minutosRestantes = diferenciaSegundos / 60;

    console.log(`${minutosRestantes} minutos restantes`);

    let horasRestantes = minutosRestantes / 60;

    console.log(`${horasRestantes} horas restantes`);
}

let hora, minutos;
hora = prompt("¿Qué hora es ahora?");
minutos = prompt("¿Qué minuto es ahora?");

calcularSegundos(hora, minutos);