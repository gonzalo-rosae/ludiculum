const textos = {
    es: {
        titulo: "Verbos",
        btnNuevaPalabra: "Nueva palabra ↺",
        btnCorregir: "Corregir 🗸",
        btnPresente: "Presente",
        btnPretImp: "Pretérito imperfecto",
        btnFutImp: "Futuro imperfecto",
        btnPretPerf: "Pretérito perfecto",
        btnFutPerf: "Futuro perfecto",
        btnPretPlusc: "Pretérito pluscuamperfecto"
    },
    la: {
        titulo: "Verba",
        btnNuevaPalabra: "Alia vox ↺",
        btnCorregir: "Corrige 🗸",
        btnPresente: "Praesens",
        btnPretImp: "Praeteritum imperfectum",
        btnFutImp: "Futurum imperfectum",
        btnPretPerf: "Praeteritum perfectum",
        btnFutPerf: "Futurum perfectum",
        btnPretPlusc: "Praeteritum plusquamperfectum"
    }
};

function aplicarIdioma(codigoIdioma) {
    document.documentElement.lang = codigoIdioma;

    // Cambiar el texto del título
    document.getElementById("titulo").innerText = textos[codigoIdioma]["titulo"];

    // Cambiar el texto de los botones de tiempo
    const botonesTiempo = document.querySelectorAll(".tiempo");
    botonesTiempo.forEach((boton) => {
        const idBoton = boton.id;
        boton.innerText = textos[codigoIdioma]["btn" + idBoton.charAt(0).toUpperCase() + idBoton.slice(1)];
    });

    // Cambiar el texto de los botones "Corregir" y "Nueva palabra ↺"
    const botonNuevaPalabra = document.querySelector("input[name='check']");
    const botonCorregir = document.getElementById("btnCorregir");

    if (botonNuevaPalabra) {
        botonNuevaPalabra.value = textos[codigoIdioma].btnNuevaPalabra;
    }

    if (botonCorregir) {
        botonCorregir.value = textos[codigoIdioma].btnCorregir;
    }
}
