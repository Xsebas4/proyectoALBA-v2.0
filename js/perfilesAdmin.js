/* para ocultar/mostrar correo */
var botonesMostrar = document.querySelectorAll('.mostrar-contraseña');
var inputsCorreo = document.querySelectorAll('.input-contraseña');

for (var i = 0; i < botonesMostrar.length; i++) {
botonesMostrar[i].addEventListener('click', mostrarCorreo.bind(null, inputsCorreo[i], botonesMostrar[i]));
}

function mostrarCorreo(input, boton) {
if (input.type === 'password') {
input.type = 'text';
boton.classList.remove('bi-eye');
boton.classList.add('bi-eye-slash');
setTimeout(function() {
input.type = 'password';
boton.classList.remove('bi-eye-slash');
boton.classList.add('bi-eye');
}, 2000);
} else {
input.type = 'password';
boton.classList.remove('bi-eye-slash');
boton.classList.add('bi-eye');
}
}



/* para capitalizar al inicio de la palabra */
let elementos = document.getElementsByClassName("mayuscula");
// Iterar sobre los elementos con la clase "capitalizar"
for(let i = 0; i < elementos.length; i++) {
// Verificar si la primera letra de cada palabra es minúscula al ingresar caracteres
elementos[i].addEventListener("input", function() {
elementos[i].value = elementos[i].value.replace(/\b[a-z]/g,function(f){return f.toUpperCase();});
});
}



/* para el limite de palabras */
const elementosInput = document.querySelectorAll(".limite");
const longitudMaxima = 10;

elementosInput.forEach(elemento => {
elemento.addEventListener("input", function() {
if (elemento.value.length > longitudMaxima) {
    elemento.value = elemento.value.substring(0, longitudMaxima)
}
});
});
