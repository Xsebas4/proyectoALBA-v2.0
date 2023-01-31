const inputElement = document.querySelector("#limite");
const maxLength = 10;

inputElement.addEventListener("input", function() {
if (inputElement.value.length > maxLength) {
    inputElement.value = inputElement.value.substring(0, maxLength);
}
});