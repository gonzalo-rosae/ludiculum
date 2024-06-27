document.addEventListener('DOMContentLoaded', () => {
    insertarTema(document.getElementById("titulo"));
    insertarTema(document.getElementById("envoltorio"));
    document.querySelectorAll("#envoltorio a.button").forEach(boton => {
       insertarTema(boton); 
    });
    insertarTema(document.getElementById("btnTema"));
    insertarTema(document.getElementById("btnIdioma"));
    insertarTema(document.getElementById("footer1"));
    insertarTema(document.getElementById("footer2"));
});

const textos = {
    es: {
        btnIdioma: "Latín",
        titulo: "Ludiculum",
        sustantivos: "Sustantivos",
        verbos: "Verbos",
        personales: "P. Personales",
        demostrativos: "P. Demostrativos",
        relativos: "P. Relativos",
        vocabulario: "Vocabulario",
        ejercicios: "Ejercicios",
        gramatica: "Gramática",
        footer1: "Autor: Gonzalo de la Rosa Palacio",
        footer2: "Revisión: Eduardo del Pino y Sandra Ramos",
        derechos: "© Todos los derechos reservados"
    },
    la: {
        btnIdioma: "Hispanice",
        titulo: "Ludiculum",
        sustantivos: "Substantiva",
        verbos: "Verba",
        personales: "P. Personalia",
        demostrativos: "P. Demonstrativa",
        relativos: "P. Relativa",
        vocabulario: "Vocabularium",
        ejercicios: "Exercitia",
        gramatica: "Grammatica",
        footer1: "Auctor: Gonzalo de la Rosa Palacio",
        footer2: "Revisio: Eduardo del Pino et Sandra Ramos",
        derechos: "© Omnia iura reservata"
    }
};

function cambiarIdioma() {
    let idiomaActual = localStorage.getItem('idioma');
    const nuevoIdioma = idiomaActual === "es" ? "la" : "es";
    localStorage.setItem('idioma', nuevoIdioma);
    aplicarIdioma(nuevoIdioma);
}

function aplicarIdioma(codigoIdioma) {
    document.documentElement.lang = codigoIdioma;
    document.getElementById("btnTema").innerText = (getTemaActual() == "claro") ? "🌑" : "☀️";
    document.getElementById("btnIdioma").innerText = textos[codigoIdioma].btnIdioma;
    document.getElementById("titulo").innerText = textos[codigoIdioma].titulo;
    document.querySelectorAll("a")[0].innerText = textos[codigoIdioma].sustantivos;
    document.querySelectorAll("a")[1].innerText = textos[codigoIdioma].verbos;
    document.querySelectorAll("a")[2].innerText = textos[codigoIdioma].personales;
    document.querySelectorAll("a")[3].innerText = textos[codigoIdioma].demostrativos;
    document.querySelectorAll("a")[4].innerText = textos[codigoIdioma].relativos;
    document.querySelectorAll("a")[5].innerText = textos[codigoIdioma].vocabulario;
    document.querySelectorAll("a")[6].innerText = textos[codigoIdioma].ejercicios;
    document.querySelectorAll("a")[7].innerText = textos[codigoIdioma].gramatica;
    document.getElementById("footer1").children[0].innerText = textos[codigoIdioma].footer1;
    document.getElementById("footer1").children[1].innerText = textos[codigoIdioma].footer2;
    document.getElementById("footer2").innerText = textos[codigoIdioma].derechos;
}