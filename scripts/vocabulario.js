document.addEventListener('DOMContentLoaded', () => {
    insertarTema(document.getElementById("lineaVertical"));
});

const textos = {
    es: {
        titulo: "Vocabulario",
        btnCorregir: "Corregir 🗸",
        btnNuevasPalabras: "Nuevas palabras ↺",
        btnSentidoInverso: "Sentido inverso ⇄",
    },
    la: {
        titulo: "Vocabularium",
        btnCorregir: "Castigare 🗸",
        btnNuevasPalabras: "Novae voces ↺",
        btnSentidoInverso: "Sensus inversus ⇄",
    }
};

function aplicarIdioma(codigoIdioma) {
    document.documentElement.lang = codigoIdioma;

    document.getElementById("btnCorregir").value = textos[codigoIdioma].btnCorregir;
    document.getElementById("btnNuevasPalabras").innerText = textos[codigoIdioma].btnNuevasPalabras;
    document.getElementById("btnSentidoInverso").innerText = textos[codigoIdioma].btnSentidoInverso;

    document.getElementById("titulo").innerText = textos[codigoIdioma].titulo;
}

function recargar() {
    location.reload();
}

function cambiarIdioma() {
    var idiomaSeleccionado = document.getElementById("idioma").value;
    aplicarIdioma(idiomaSeleccionado);
}
