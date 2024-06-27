// Ejecución

document.addEventListener('DOMContentLoaded', function() {
    let temaGuardado = localStorage.getItem('tema');
    let idiomaGuardado = localStorage.getItem('idioma');
    const body = document.body;
    
    // Si el valor de temaGuardado es nulo, establece el tema predeterminado y se guarda
    if (!temaGuardado) {
        temaGuardado = 'claro';
        localStorage.setItem('tema', temaGuardado);
    }

    // Si el valor de idiomaGuardado es nulo, establece el idioma predeterminado y se guarda
    if (!idiomaGuardado) {
        idiomaGuardado = 'es';
        localStorage.setItem('idioma', idiomaGuardado);
    }

    // Aplica el tema guardado al cuerpo del documento
    if (temaGuardado === 'oscuro') {
        body.classList.add('tema-oscuro');
    } else {
        body.classList.add('tema-claro');
    }

    // Aplica el idioma guardado a los textos del documento
    aplicarIdioma(idiomaGuardado);


    // Insertamos tema actual en las barras horizontales
    document.querySelectorAll("hr").forEach(hr => {
        insertarTema(hr);
    });
});



// Funciones auxiliares

var colorPrevio;

function getTemaActual() {
    return localStorage.getItem('tema');
}

function getIdiomaActual() {
    return localStorage.getItem('idioma');
}

function cambiarTema() {
    var temaActual = getTemaActual();
    var elementos = document.querySelectorAll('.tema-claro, .tema-oscuro');
    var btn = document.getElementById("btnTema");

    for (var i = 0; i < elementos.length; i++) {
        if (temaActual == "claro") {
            elementos[i].classList.add('tema-oscuro');
            elementos[i].classList.remove('tema-claro');
            if (btn) btn.innerText = "☀️";
        } else {
            elementos[i].classList.add('tema-claro');
            elementos[i].classList.remove('tema-oscuro');
            if (btn) btn.innerText = "🌑";
        }
    }
    
    temaActual = (temaActual == 'claro') ? 'oscuro' : 'claro';
    localStorage.setItem('tema', temaActual);
}


function insertarTema(nodo) {
    var clase = "tema-" + getTemaActual();
    nodo.classList.add(clase);
}

function recargar() {
    location.reload();
}

function corregir() {
    corregirEnRango(0, -1);
}

function corregirEnRango(desde, hasta) {
    var entradas = document.querySelectorAll('input[type="text"]');
    var correcciones = document.querySelectorAll('.correccion');
    var boton = document.getElementById("btnCorregir");
    var textoBoton = (localStorage.getItem('idioma') === 'es') ? "Corregir" : "Castigare";
    colorPrevio = entradas[0].style.backgroundColor;
    var clase;

    if (hasta == -1) hasta = entradas.length - 1;

    if (boton.value === textoBoton) {
        for (var i = desde; i <= hasta; i++) {
            if (esCorrecto(entradas[i].value.toLowerCase(), soluciones[i].toLowerCase())) {
                clase = 'correcto';
            }
            else {
                clase = 'incorrecto';
                correcciones[i].textContent = "(" + soluciones[i] + ")";
            }
            entradas[i].classList.add(clase);
        }
        boton.value = (localStorage.getItem("idioma") === 'es') ? "Limpiar" : "Delere";
    }
    else {
        limpiarCampos();
    }

}


function esCorrecto(candidato, solucion) {
    if (!solucion.includes("/")) {
        return candidato == solucion;
    }
    else {
        var posibilidades = solucion.split("/");
        for (const sol of posibilidades) {
            if (candidato == sol) return true;
        }
        return false;
    }
}


function limpiarCampos() {
    var entradas = document.querySelectorAll('input[type="text"]');
    var correcciones = document.querySelectorAll('.correccion');

    // Limpiamos los campos
    for (var i = 0; i < entradas.length; i++) {
        entradas[i].classList.remove("correcto", "incorrecto");
        entradas[i].value = "";
        correcciones[i].textContent = "";
    }

    // Reseteamos el botón
    var boton = document.getElementById("btnCorregir");
    const codigoIdioma = document.documentElement.lang || 'es';
    boton.value = textos[codigoIdioma].btnCorregir;
    boton.hidden = false;
}
