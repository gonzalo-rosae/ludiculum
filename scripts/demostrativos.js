var personasCastellano, personasLatin, persActual, flechaAlante, flechaAtras, solucionesVariables, soluciones;

document.addEventListener('DOMContentLoaded', () => {
    personasCastellano = ['Primera persona', 'Segunda persona', 'Tercera persona'];
    personasLatin = ['Prima persona', 'Secunda persona', 'Tertia persona'];
    persActual = document.getElementById("personaActual");
    flechaAtras = document.getElementById("flechaAtras");
    flechaAlante = document.getElementById("flechaAlante");
    flechaAtras.disabled = true;

    // Agregamos tema a los inputs
    const inputs = document.querySelectorAll('input');
    inputs.forEach(function (input) {
        insertarTema(input);
    });
});


solucionesVariables = [
    [
        "hic", "haec", "hoc",
        "hunc", "hanc", "hoc",
        "huius",
        "huic",
        "hoc", "hac", "hoc",
        "hi", "hae", "haec",
        "hos", "has", "haec",
        "horum", "harum", "horum",
        "his",
        "his"
    ],

    [
        "iste", "ista", "istud",
        "istum", "istam", "istud",
        "istius",
        "isti",
        "isto", "ista", "isto",
        "isti", "istae", "ista",
        "istos", "istas", "ista",
        "istorum", "istarum", "istorum",
        "istis",
        "istis"
    ],

    [
        "ille", "illa", "illud",
        "illum", "illam", "illud",
        "illius",
        "illi",
        "illo", "illa", "illo",
        "illi", "illae", "illa",
        "illos", "illas", "illa",
        "illorum", "illarum", "illorum",
        "illis",
        "illis"
    ]
];
soluciones = solucionesVariables[0];


const textos = {
    es: {
        titulo: "Pronombres demostrativos",
        btnNuevaPalabra: "Nueva palabra ↺",
        btnCorregir: "Corregir 🗸",
        personaActual: "Primera persona",
        singular: "singular",
        plural: "plural",
        nominativo: "Nom./Voc.",
        vocativo: "Vocativo",
        acusativo: "Acusativo",
        genitivo: "Genitivo",
        dativo: "Dativo",
        ablativo: "Ablativo",
        masculino: "masculino",
        femenino: "femenino",
        neutro: "neutro"
    },
    la: {
        titulo: "Pronomina demonstrativa",
        btnNuevaPalabra: "Nova vox ↺",
        btnCorregir: "Castigare 🗸",
        personaActual: "Prima persona",
        singular: "singularis",
        plural: "pluralis",
        nominativo: "Nom./Voc.",
        vocativo: "Vocativus",
        acusativo: "Accusativus",
        genitivo: "Genitivus",
        dativo: "Dativus",
        ablativo: "Ablativus",
        masculino: "masculinum",
        femenino: "femininum",
        neutro: "neutrum"
    }
};

function aplicarIdioma(codigoIdioma) {
    document.documentElement.lang = codigoIdioma;

    document.getElementById("btnCorregir").value = textos[codigoIdioma].btnCorregir;

    document.getElementById("titulo").innerText = textos[codigoIdioma].titulo;
    document.getElementById("personaActual").innerText = textos[codigoIdioma]["personaActual"];

    const tablasSingular = document.getElementById("singular").querySelectorAll("thead th");
    const tablasPlural = document.getElementById("plural").querySelectorAll("thead th");

    tablasSingular[0].innerText = textos[codigoIdioma].singular;
    tablasSingular[1].innerText = textos[codigoIdioma].masculino;
    tablasSingular[2].innerText = textos[codigoIdioma].femenino;
    tablasSingular[3].innerText = textos[codigoIdioma].neutro;

    tablasPlural[0].innerText = textos[codigoIdioma].plural;
    tablasPlural[1].innerText = textos[codigoIdioma].masculino;
    tablasPlural[2].innerText = textos[codigoIdioma].femenino;
    tablasPlural[3].innerText = textos[codigoIdioma].neutro;

    const labelsSingular = document.getElementById("singular").querySelectorAll("tbody td.cursiva");
    const labelsPlural = document.getElementById("plural").querySelectorAll("tbody td.cursiva");

    const labelsText = [
        textos[codigoIdioma].nominativo, textos[codigoIdioma].acusativo,
        textos[codigoIdioma].genitivo, textos[codigoIdioma].dativo, textos[codigoIdioma].ablativo
    ];

    labelsSingular.forEach((label, index) => {
        label.innerText = labelsText[index];
    });

    labelsPlural.forEach((label, index) => {
        label.innerText = labelsText[index];
    });
}



function cambiarPersona(variacion) {
    limpiarCampos();
    var personas = (document.documentElement.lang == "es") ? personasCastellano : personasLatin;
    var indActual = personas.indexOf(persActual.innerText);
    var indNuevo = indActual + variacion;

    // Escondo las flechas oportunas
    if (variacion == 1) {
        flechaAlante.disabled = (indNuevo == 2) ? true : false;
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
