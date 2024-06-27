document.addEventListener('DOMContentLoaded', () => {
    // Agregamos tema a los inputs
    const inputs = document.querySelectorAll('input');
    inputs.forEach(function (input) {
        insertarTema(input);
    });
});

var soluciones = [
    "qui", "quae", "quod",
    "quem", "quam", "quod",
    "cuius",
    "cui",
    "quo", "qua", "quo",
    "qui", "quae", "quae",
    "quos", "quas", "quae",
    "quorum", "quarum", "quorum",
    "quibus",
    "quibus"
];

const textos = {
    es: {
        titulo: "Pronombres relativos",
        btnCorregir: "Corregir 🗸",
        singular: "singular",
        plural: "plural",
        nominativo: "Nom./Voc.",
        acusativo: "Acusativo",
        genitivo: "Genitivo",
        dativo: "Dativo",
        ablativo: "Ablativo",
        masculino: "masculino",
        femenino: "femenino",
        neutro: "neutro",
        nota: "Nota: los pronombres interrogativos son iguales, salvo en el nominativo singular, que es «quis, quae, quid»."
    },
    la: {
        titulo: "Pronomina relativa",
        btnCorregir: "Castigare 🗸",
        singular: "singularis",
        plural: "pluralis",
        nominativo: "Nom./Voc.",
        acusativo: "Accusativus",
        genitivo: "Genitivus",
        dativo: "Dativus",
        ablativo: "Ablativus",
        masculino: "masculinum",
        femenino: "femininum",
        neutro: "neutrum",
        nota: "Nota: pronomina interrogativa eadem sunt, nisi in nominativo singulari, qui est «quis, quae, quid»."
    }
};

function aplicarIdioma(codigoIdioma) {
    document.documentElement.lang = codigoIdioma;

    document.getElementById("btnCorregir").value = textos[codigoIdioma].btnCorregir;

    document.getElementById("titulo").innerText = textos[codigoIdioma].titulo;

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

    document.getElementById("nota").innerText = textos[codigoIdioma].nota;
}
