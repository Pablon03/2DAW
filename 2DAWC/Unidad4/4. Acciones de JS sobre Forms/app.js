//----------------------------------------------------------//

function desactivarSubmit() {
  // Obtenemos el elemento de submit, y lo desactivamos
  document.getElementById("enviar").addEventListener(
    "click",
    () => {
      document.getElementById("enviar").disabled = true;
    },
    false
  );
}

desactivarSubmit();

//----------------------------------------------------------//

function focusEmail() {
  document.getElementById("email").focus();
}

focusEmail();

//----------------------------------------------------------//

function edadIncorrecta() {
  document.getElementById("edad").addEventListener("change", () => {
    if (isNaN(document.getElementById("edad").value)) {
      alert("No es un numero");
    }
  });
}
edadIncorrecta();

//----------------------------------------------------------//

//Array de objetos de paises
const arrayPaises = [
  { text: "Portugal", value: "pt" },
  { text: "Francia", value: "fr" },
  { text: "Reino Unido", value: "uk" },
  { text: "Alemania", value: "de" },
  { text: "España", value: "es" },
];

function generaCamposDinamicos(arrayPaises) {
    let elementoSelect = document.getElementById("pais");
    arrayPaises.map((element, index) => {
      let option = document.createElement("option");
      option.text = element.text;
      option.setAttribute("value", element.value);
      elementoSelect.add(option, elementoSelect[index]);
    });
}

generaCamposDinamicos(arrayPaises);
