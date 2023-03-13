/* para lo botones de siguiente */
const btnScrollUpList = document.querySelectorAll(".bs");

btnScrollUpList.forEach(btn => {
  btn.addEventListener("click", () => {
    window.scrollTo({
      top: 60,
      behavior: "smooth"
    });
  });
});


/* para los botones de atras */
const btnScrollUpLista = document.querySelectorAll(".ba");

btnScrollUpLista.forEach(btn => {
  btn.addEventListener("click", () => {
    window.scrollTo({
      top: 60,
      behavior: "smooth"
    });
  });
});