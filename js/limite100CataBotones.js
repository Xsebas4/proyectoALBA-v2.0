/* ------------------------------------------aroma------------------------------------------- */
const descriAroma = document.getElementById('aromaDes');
const texto1 = document.getElementById('texto1');
const boton1 = document.getElementById('b1');

descriAroma.addEventListener('input', () => {
    const words = descriAroma.value.trim().split(/\s+/);
    const wordCountValue = words.length;
    if (wordCountValue >= 200) {
        descriAroma.value = words.slice(0, 200).join(' ');
    }

    texto1.textContent = `${Math.min(wordCountValue, 200)}/200 palabras`;
    boton1.disabled = wordCountValue < 100;
});


const rango1Aroma = document.getElementById('rango1Aroma');
const rango2Aroma = document.getElementById('rango2Aroma');
const rango3Aroma = document.getElementById('rango3Aroma');
const aromaDes = document.getElementById('aromaDes');
const aromaNota = document.getElementById('aromaNota');

const validarAroma = () => {
    
    const words = aromaDes.value.trim().split(/\s+/);
    const wordCountValue = words.length;
    
    if (rango1Aroma.value > 0 && rango2Aroma.value > 0 && rango3Aroma.value > 0 && aromaNota.value.trim() !== '' && aromaNota.validity.valid) {
      boton1.disabled = wordCountValue < 100;
    } else {
      boton1.disabled = true;
    }
  };
  

rango1Aroma.addEventListener('input', validarAroma);
rango2Aroma.addEventListener('input', validarAroma);
rango3Aroma.addEventListener('input', validarAroma);
aromaDes.addEventListener('input', validarAroma);
aromaNota.addEventListener('input', validarAroma);

validarAroma();




/* --------------------------------------------apariencia---------------------------------------------- */
const descriApariencia = document.getElementById('aparienciaDes');
const texto2 = document.getElementById('texto2');
const boton2 = document.getElementById('b2');

descriApariencia.addEventListener('input', () => {
    const words = descriApariencia.value.trim().split(/\s+/);
    const wordCountValue = words.length;
    if (wordCountValue >= 200) {
        descriApariencia.value = words.slice(0, 200).join(' ');
    }

    texto2.textContent = `${Math.min(wordCountValue, 200)}/200 palabras`;
    boton2.disabled = wordCountValue < 100;
});


const aparienciaIns = document.getElementById('aparienciaIns');
const rango1Apariencia = document.getElementById('rango1Apariencia');
const rango2Apariencia = document.getElementById('rango2Apariencia');
const rango3Apariencia = document.getElementById('rango3Apariencia');
const rango4Apariencia = document.getElementById('rango4Apariencia');
const rango5Apariencia = document.getElementById('rango5Apariencia');
const aparienciaDes = document.getElementById('aparienciaDes');
const aparienciaNota = document.getElementById('aparienciaNota');


const validarApariencia = () => {
    
    const words = aparienciaDes.value.trim().split(/\s+/);
    const wordCountValue = words.length;
    
    if (rango1Apariencia.value > 0 && rango2Apariencia.value > 0 && rango3Apariencia.value > 0 && rango4Apariencia.value > 0 && rango5Apariencia.value > 0 && aparienciaIns.value.trim() !== '' && aparienciaNota.value.trim() !== '' && aparienciaIns.validity.valid && aparienciaNota.validity.valid) {
      boton2.disabled = wordCountValue < 100;
    } else {
      boton2.disabled = true;
    }
  };


aparienciaIns .addEventListener('input', validarApariencia);
rango1Apariencia.addEventListener('input', validarApariencia);
rango2Apariencia.addEventListener('input', validarApariencia);
rango3Apariencia.addEventListener('input', validarApariencia);
rango4Apariencia.addEventListener('input', validarApariencia);
rango5Apariencia.addEventListener('input', validarApariencia);
aparienciaDes.addEventListener('input', validarApariencia);
aparienciaNota.addEventListener('input', validarApariencia);

validarApariencia();




/* --------------------------------------------sabor---------------------------------------------- */
const descriSabor = document.getElementById('saborDes');
const texto3 = document.getElementById('texto3');
const boton3 = document.getElementById('b3');

descriSabor.addEventListener('input', () => {
    const words = descriSabor.value.trim().split(/\s+/);
    const wordCountValue = words.length;
    if (wordCountValue >= 200) {
        descriSabor.value = words.slice(0, 200).join(' ');
    }

    texto3.textContent = `${Math.min(wordCountValue, 200)}/200 palabras`;
    boton3.disabled = wordCountValue < 100;
});


const rango1Sabor = document.getElementById('rango1Sabor');
const rango2Sabor = document.getElementById('rango2Sabor');
const rango3Sabor = document.getElementById('rango3Sabor');
const rango4Sabor = document.getElementById('rango4Sabor');
const rango5Sabor = document.getElementById('rango5Sabor');
const rango6Sabor = document.getElementById('rango6Sabor');
const saborDes = document.getElementById('saborDes');
const saborNota = document.getElementById('saborNota');



const validarSabor = () => {
    
    const words = saborDes.value.trim().split(/\s+/);
    const wordCountValue = words.length;
    
    if (rango1Sabor.value > 0 && rango2Sabor.value > 0 && rango3Sabor.value > 0 && rango4Sabor.value > 0 && rango5Sabor.value > 0 && rango6Sabor.value > 0 && saborNota.value.trim() !== '' && saborNota.validity.valid) {
      boton3.disabled = wordCountValue < 100;
    } else {
      boton3.disabled = true;
    }
  };



rango1Sabor.addEventListener('input', validarSabor);
rango2Sabor.addEventListener('input', validarSabor);
rango3Sabor.addEventListener('input', validarSabor);
rango4Sabor.addEventListener('input', validarSabor);
rango5Sabor.addEventListener('input', validarSabor);
rango6Sabor.addEventListener('input', validarSabor);
saborDes.addEventListener('input', validarSabor);
saborNota.addEventListener('input', validarSabor);

validarSabor();




/* --------------------------------------------sensacion---------------------------------------------- */
const descriSensacion = document.getElementById('sensacionDes');
const texto4 = document.getElementById('texto4');
const boton4 = document.getElementById('b4');

descriSensacion.addEventListener('input', () => {
    const words = descriSensacion.value.trim().split(/\s+/);
    const wordCountValue = words.length;
    if (wordCountValue >= 200) {
        descriSensacion.value = words.slice(0, 200).join(' ');
    }

    texto4.textContent = `${Math.min(wordCountValue, 200)}/200 palabras`;
    boton4.disabled = wordCountValue < 100;
});


const rango1Sensacion = document.getElementById('rango1Sensacion');
const rango2Sensacion = document.getElementById('rango2Sensacion');
const rango3Sensacion = document.getElementById('rango3Sensacion');
const rango4Sensacion = document.getElementById('rango4Sensacion');
const rango5Sensacion = document.getElementById('rango5Sensacion');
const sensacionDes = document.getElementById('sensacionDes');
const sensacionNota = document.getElementById('sensacionNota');



const validarSensacion = () => {
    
    const words = sensacionDes.value.trim().split(/\s+/);
    const wordCountValue = words.length;
    
    if (rango1Sensacion.value > 0 && rango2Sensacion.value > 0 && rango3Sensacion.value > 0 && rango4Sensacion.value > 0 && rango5Sensacion.value > 0 && sensacionNota.value.trim() !== '' && sensacionNota.validity.valid) {
      boton4.disabled = wordCountValue < 100;
    } else {
      boton4.disabled = true;
    }
  };



rango1Sensacion.addEventListener('input', validarSensacion);
rango2Sensacion.addEventListener('input', validarSensacion);
rango3Sensacion.addEventListener('input', validarSensacion);
rango4Sensacion.addEventListener('input', validarSensacion);
rango5Sensacion.addEventListener('input', validarSensacion);
sensacionDes.addEventListener('input', validarSensacion);
sensacionNota.addEventListener('input', validarSensacion);

validarSensacion();




/* ------------------------------------------------fallas---------------------------------------------- */
const selects = document.querySelectorAll('.nivel');
const submitBtn = document.getElementById('b5');

// Cantidad de selects
const numSelects = selects.length;
console.log(numSelects)

// Contador de selects seleccionados
let numSelectsSelected = 0;

selects.forEach(select => {

  select.addEventListener('change', () => {

    // Verificar si el valor seleccionado no es vacío
    if (select.value !== '' && select.validity.valid) {

      numSelectsSelected++;

    } else {

      numSelectsSelected--;

    }

    console.log(numSelectsSelected)

    // Si todos los selects han sido seleccionados, habilitar el botón
    if (numSelectsSelected === numSelects) {

      submitBtn.disabled = false;
      
    } 

  });
});




/* ------------------------------------------------general---------------------------------------------- */
const input = document.getElementById('generalDes');
const wordCount = document.getElementById('wordCount');
const button = document.getElementById('b6');

input.addEventListener('input', () => {
    const words = input.value.trim().split(/\s+/);
    const wordCountValue = words.length;
    if (wordCountValue >= 200) {
        input.value = words.slice(0, 200).join(' ');
    }

    wordCount.textContent = `${Math.min(wordCountValue, 200)}/200 palabras`;
    button.disabled = wordCountValue < 100;
});


const rango1General = document.getElementById('rango1General');
const rango2General = document.getElementById('rango2General');
const rango3General = document.getElementById('rango3General');
const generalFallas = document.getElementById('generalFallas');
const generalDes = document.getElementById('generalDes');
const generalNota = document.getElementById('generalNota');

const validarGeneral = () => {
    
    const words = generalDes.value.trim().split(/\s+/);
    const wordCountValue = words.length;
    
    if (rango1General.value > 0 && rango2General.value > 0 && rango3General.value > 0 && generalFallas.value.trim() !== '' && generalNota.value.trim() !== '' && generalFallas.validity.valid && generalNota.validity.valid) {
      button.disabled = wordCountValue < 100;
    } else {
      button.disabled = true;
    }
  };
  

rango1General.addEventListener('input', validarGeneral);
rango2General.addEventListener('input', validarGeneral);
rango3General.addEventListener('input', validarGeneral);
generalFallas.addEventListener('input', validarGeneral);
generalDes.addEventListener('input', validarGeneral);
generalNota.addEventListener('input', validarGeneral);

validarGeneral();
