var personasCastellano, personasLatin, persActual, flechaAtras, flechaAlante, solucionesVariables, soluciones;

document.addEventListener('DOMContentLoaded', () => {
    personasCastellano = ['Primera persona', 'Segunda persona'];
    personasLatin = ['Prima persona', 'Secunda persona'];
    persActual = document.getElementById("personaActual");
    flechaAtras = document.getElementById("flechaAtras");
    flechaAlante = document.getElementById("flechaAlante");
    flechaAtras.disabled = true;
    solucionesVariables = [
        [
            "ego", "ego", "me", "mei", "mihi", "me",
            "nos", "nos", "nos", "nostri", "nostrum", "nobis", "nobis"
        ],
        [
            "tu", "tu", "te", "tui", "tibi", "te",
            "vos", "vos", "vos", "vestri", "vestrum", "vobis", "vobis"
        ]
    ];
    soluciones = solucionesVariables[0];
});


const textos = {
    es: {
        titulo: "Pronombres personales",
        personaActual: "Primera persona",
        btnCorregir: "Corregir 🗸",
        singular: "singular",
        plural: "plural",
        nominativo: "nominativo",
        vocativo: "vocativo",
        acusativo: "acusativo",
        genitivo: "genitivo",
        genitivoNormal: "genitivo (posesivo)",
        genitivoPartitivo: "genitivo (partitivo)",
        dativo: "dativo",
        ablativo: "ablativo",
    },
    la: {
        titulo: "Pronomina personalia",
        personaActual: "Prima persona",
        btnCorregir: "Castigare 🗸",
        singular: "singularis",
        plural: "pluralis",
        nominativo: "nominativus",
        vocativo: "vocativus",
        acusativo: "accusativus",
        genitivo: "genitivus",
        genitivoNormal: "genitivus (possess.)",
        genitivoPartitivo: "genitivus (partitivus)",
        dativo: "dativus",
        ablativo: "ablativus",
    }
};

function aplicarIdioma(codigoIdioma) {
    document.documentElement.lang = codigoIdioma;

    document.getElementById("titulo").innerText = textos[codigoIdioma]["titulo"];
    document.getElementById("personaActual").innerText = textos[codigoIdioma]["personaActual"];

    const botonCorregir = document.getElementById("btnCorregir");

    if (botonCorregir) {
        botonCorregir.value = textos[codigoIdioma].btnCorregir;
    }

    const tablasSingular = document.getElementById("singular").querySelectorAll("thead th");
    const tablasPlural = document.getElementById("plural").querySelectorAll("thead th");

    tablasSingular[0].innerText = textos[codigoIdioma].singular;
    tablasPlural[0].innerText = textos[codigoIdioma].plural;

    const labelsSingular = document.getElementById("singular").querySelectorAll("tbody td.cursiva");
    const labelsPlural = document.getElementById("plural").querySelectorAll("tbody td.cursiva");

    const labelsText = [
        textos[codigoIdioma].nominativo, textos[codigoIdioma].vocativo, textos[codigoIdioma].acusativo,
        textos[codigoIdioma].genitivo, textos[codigoIdioma].dativo, textos[codigoIdioma].ablativo,
        textos[codigoIdioma].nominativo, textos[codigoIdioma].vocativo, textos[codigoIdioma].acusativo,
        textos[codigoIdioma].genitivoNormal, textos[codigoIdioma].genitivoPartitivo,
        textos[codigoIdioma].dativo, textos[codigoIdioma].ablativo
    ];

    labelsSingular.forEach((label, index) => {
        label.innerText = labelsText[index];
    });

    labelsPlural.forEach((label, index) => {
        label.innerText = labelsText[index + 6];
    });
}


function cambiarPersona(variacion) {
    limpiarCampos();
    var personas = (document.documentElement.lang == "es") ? personasCastellano : personasLatin;
    var indActual = personas.indexOf(persActual.innerText);
    var indNuevo = indActual + variacion;

    // Escondo las flechas oportunas
    if (variacion == 1) {
        flechaAlante.disabled = (indNuevo == 1) ? true : false;
        flechaAtras.disabled = false;
    }
    else {
        flechaAtras.disabled = (indNuevo == 0) ? true : false;
        flechaAlante.disabled = false;
    }

    // Cambio el texto y modifico las soluciones
    persActual.innerText = personas[indActual + variacion];
    soluciones = solucionesVariables[indNuevo];
}
