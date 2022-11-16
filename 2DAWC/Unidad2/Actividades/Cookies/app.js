function setAndEncodeCookie(name, value, daysToLive = null) {

    let nameEnconde = encodeURI(name);
    let valueEncode = encodeURI(value);
    let segundos = daysToLive * 24 * 60 * 60;
    document.cookie = `${nameEnconde}=${valueEncode}; max-age=${segundos}`;

}

function getAndDecodeCookie(name) {
    let cookies = document.cookie.split(";");
    let mostrar = null;

    for (let i in cookies) {
        const cookiesSplit = cookies[i].split("=");
        if (cookiesSplit[0].trim() === name) {
            mostrar = decodeURI(cookiesSplit[1]);
        }
    } 

    return mostrar;
}
function checkCookie(name) {
    let cookies = document.cookie.split(";");
    let mostrar = false;

    for (const i in cookies) {
        const cookiesSplit = cookies[i].split("=");
        if (cookiesSplit[0].trim() === name) {
            mostrar = true;
        }
    } 

    return mostrar;
}

function getAndDecodeCookies() {
    const mapCookie = new Map();
    const cookies = document.cookie.split(";");

    for (const i in cookies) {
        const key = cookies[i].split("=");
        mapCookie.set(key[0], key[1]);
    }

    console.log(mapCookie);
}

/////////////////////////////////////////////////////////////////////////

function crearCookie () {
    const nombre = prompt("Nombre de la cookie: ");
    const valor = prompt("Valor de la cookie: ");
    let dias = prompt("Dias de la cookie: ", "0");

    dias = parseInt(dias);

    if(nombre, valor, dias) {
        setAndEncodeCookie(nombre, valor, dias);
    } else {
        crearCookie();
    }
}

function verCookie() {
    const nombre = prompt("Nombre de la cookie: ");

    if(nombre) {
        getAndDecodeCookie(nombre);
    } else {
        verCookie();
    }
}

function comprobarCookie() {
    const nombre = prompt("Nombre de la cookie: ");

    if(nombre) {
        checkCookie(nombre);
    } else {
        comprobarCookie();
    }
}
