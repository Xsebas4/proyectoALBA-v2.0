<<<<<<< HEAD
const inputElements = document.querySelectorAll(".limite");
const maxLength = 10;

inputElements.forEach(input => {
  input.addEventListener("input", function() {
    if (input.value.length > maxLength) {
      input.value = input.value.substring(0, maxLength);
    }
  });
=======
const inputElement = document.querySelector("#limite");
const maxLength = 10;

inputElement.addEventListener("input", function() {
if (inputElement.value.length > maxLength) {
    inputElement.value = inputElement.value.substring(0, maxLength);
}
>>>>>>> main
});