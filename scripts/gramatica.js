function toggleSection(id, button) {
    var section = document.getElementById(id);
    section.classList.toggle('oculto');
    var icon = document.getElementById('icon-' + id);
    button.style.backgroundColor = 'orange';
    if (icon.textContent === '+') {
        icon.textContent = '-';
    } else {
        icon.textContent = '+';
    }
}

const textos = {
    es: {
        titulo: "Gramática",
        dativo: "Dativo de posesión",
        adjetivos: "Tipos de adjetivo",
        comparativo: "Comparativo",
        ccl: "Complemento Circunstancial de Lugar",
        pasiva: "Pasiva",
        coordinadas: "Coordinadas",
        subordinadas: "Subordinadas",
        numerales: "Numerales",

        singular: "singular",
        plural: "plural",
        nominativo: "Nominativo",
        vocativo: "Vocativo",
        acusativo: "Acusativo",
        genitivo: "Genitivo",
        dativo: "Dativo",
        ablativo: "Ablativo",

        masculino: "masculino",
        femenino: "femenino",
        mascFem: "masc. / fem.",
        neutro: "neutro",

        conjuncion: "Conjunción",
        conjunciones: "Conjunciones",
        tipo: "Tipo",
        ejemplos: "Ejemplos"
    },
    la: {
        titulo: "Grammatica",
        dativo: "Dativus possessionis",
        adjetivos: "Genera adjectivorum",
        comparativo: "Comparativus",
        ccl: "Complementa ad Circunstantis Locorum",
        pasiva: "Passiva",
        coordinadas: "Sententiae coordinatae",
        subordinadas: "Sententiae subordinatae",
        numerales: "Numeri",

        singular: "singularis",
        plural: "pluralis",
        nominativo: "Nominativus",
        vocativo: "Vocativus",
        acusativo: "Accusativus",
        genitivo: "Genitivus",
        dativo: "Dativus",
        ablativo: "Ablativus",

        masculino: "masculinum",
        femenino: "femininum",
        mascFem: "masc. / fem.",
        neutro: "neutrum",

        conjuncion: "Coniunctio",
        conjunciones: "Coniunctiones",
        tipo: "Genus",
        ejemplos: "Exempla"
    }
};


const clases = [
    "nominativo", "vocativo", "acusativo", "genitivo", "dativo", "ablativo",
    "masculino", "femenino", "mascFem", "neutro", "singular", "plural", "conjuncion",
    "conjunciones", "tipo", "ejemplos"
];


function aplicarIdioma(codigoIdioma) {
    document.documentElement.lang = codigoIdioma;

    document.getElementById("titulo").innerText = textos[codigoIdioma].titulo;

    document.querySelector('#dativo').previousElementSibling.innerText = textos[codigoIdioma].dativo;
    document.querySelector('#adjetivos').previousElementSibling.innerText = textos[codigoIdioma].adjetivos;
    document.querySelector('#comparativo').previousElementSibling.innerText = textos[codigoIdioma].comparativo;
    document.querySelector('#ccl').previousElementSibling.innerText = textos[codigoIdioma].ccl;
    document.querySelector('#pasiva').previousElementSibling.innerText = textos[codigoIdioma].pasiva;
    document.querySelector('#coordinadas').previousElementSibling.innerText = textos[codigoIdioma].coordinadas;
    document.querySelector('#subordinadas').previousElementSibling.innerText = textos[codigoIdioma].subordinadas;
    document.querySelector('#numerales').previousElementSibling.innerText = textos[codigoIdioma].numerales;

    clases.forEach(clase => {
        const elementos = document.querySelectorAll("." + clase);
        elementos.forEach(elemento => {
            elemento.innerText = textos[codigoIdioma][clase];
        });
    });

}