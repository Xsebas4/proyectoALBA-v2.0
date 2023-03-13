/* Ejecutar funcion del elemento click */
document.getElementById("btn_open").addEventListener("click", open_close_menu);

/* declaracion de las variables */
var menu = document.getElementById("menu");
var btn_open = document.getElementById("btn_open");
var body = document.getElementById("body");
var fondo= document.getElementById("fondo");



/* evento para mostrar y ocultar el menu */
function open_close_menu() {

  // Mostrar u ocultar el menú
  body.classList.toggle("body_move");
  menu.classList.toggle("menu_move");
  fondo.classList.toggle("fondo2");
  
}


//Si el ancho de la página es menor a 760px, ocultará el menú al recargar la página

if (window.innerWidth < 760){

    body.classList.add("body_move");
    menu.classList.add("menu_move");
}


/* haciendo el menu responsive */

window.addEventListener("resize", function(){

    if (window.innerWidth >= 760) {
        
        body.classList.remove("body_move");
        menu.classList.remove("menu_move");

    }

    if (window.innerWidth <= 760) {
        
        body.classList.add("body_move");
        menu.classList.add("menu_move");
    }

});