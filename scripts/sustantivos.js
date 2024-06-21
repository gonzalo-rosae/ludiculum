const textos = {
    es: {
        btnNuevaPalabra: "Nueva palabra ↺",
        btnCorregir: "Corregir 🗸",
        singular: "singular",
        plural: "plural",
        nominativo: "nominativo",
        vocativo: "vocativo",
        acusativo: "acusativo",
        genitivo: "genitivo",
        dativo: "dativo",
        ablativo: "ablativo",
    },
    la: {
        btnNuevaPalabra: "Nova vox ↺",
        btnCorregir: "Castigare 🗸",
        singular: "singularis",
        plural: "pluralis",
        nominativo: "nominativus",
        vocativo: "vocativus",
        acusativo: "accusativus",
        genitivo: "genitivus",
        dativo: "dativus",
        ablativo: "ablativus",
    }
};

function aplicarIdioma(codigoIdioma) {
    document.documentElement.lang = codigoIdioma;

    const botonNuevaPalabra = document.querySelector("input[name='check']");
    const botonCorregir = document.getElementById("btnCorregir");

    if (botonNuevaPalabra) {
        botonNuevaPalabra.value = textos[codigoIdioma].btnNuevaPalabra;
    }

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
        textos[codigoIdioma].genitivo, textos[codigoIdioma].dativo, textos[codigoIdioma].ablativo
    ];

    labelsSingular.forEach((label, index) => {
        label.innerText = labelsText[index];
    });

    labelsPlural.forEach((label, index) => {
        label.innerText = labelsText[index];
    });
}
