let paso = 1;
const pasoInicial = 1;
const pasoFinal = 3;

document.addEventListener("DOMContentLoaded", function () {
  iniciarApp();
});

function iniciarApp() {
  
  mostrarSeccion();// muestra y oculta la seccion
  
  tabs();// Cambia la sección cuando se presione los tabs
  
  botonesPaginado();// agrega o quita los botones de paginador

  paginaSiguiente();
  paginaAnterior();
}

function mostrarSeccion() {
  // Ocultar la seccion que tenga la clase mostrar.
  const seccionAnterior = document.querySelector(".mostrar");

  if (seccionAnterior) {
    seccionAnterior.classList.remove("mostrar");
  }

  // selecionar la seccion con el paso.
  const pasoSelector = `#paso-${paso}`;
  const seccion = document.querySelector(pasoSelector);

  if (seccion) {
    seccion.classList.add("mostrar");
  }

  // quitar la clase actual al tab anterior
  const tabAnterior = document.querySelector(".actual");
  if (tabAnterior) {
    tabAnterior.classList.remove("actual");
  }

  // Resalta el tab actual
  const tab = document.querySelector(`[data-paso="${paso}"]`);

  if (tab) {
    tab.classList.add("actual");
  }
}

function tabs() {
  const botones = document.querySelectorAll(".tabs button");
  botones.forEach((boton) => {
    boton.addEventListener("click", function (e) {
      paso = parseInt(e.target.dataset.paso);
      mostrarSeccion();
      botonesPaginado();
    });
  });
}

function botonesPaginado()
{
  const paginaSiguiente = document.querySelector('#siguiente');
  const paginaAnterior = document.querySelector('#anterior');

  if(paso === 1){
    paginaAnterior.classList.add('ocultar');
  }else if (paso === 3){
    paginaAnterior.classList.remove('ocultar');
    paginaSiguiente.classList.add('ocultar');

  }else {
    paginaAnterior.classList.remove('ocultar');
    paginaSiguiente.classList.remove('ocultar');
  }

  mostrarSeccion();
}


function paginaAnterior(){
  const paginaAnterior = document.querySelector('#anterior');

  paginaAnterior.addEventListener('click', function()
  {
    if(paso <= pasoInicial) return;
      paso--;
    botonesPaginado();    
  })
}

function paginaSiguiente(){
  const paginaSiguiente = document.querySelector('#siguiente');

  paginaSiguiente.addEventListener('click', function()
  {
    if(paso >= pasoFinal) return;
      paso++;
    botonesPaginado();    
  })
}