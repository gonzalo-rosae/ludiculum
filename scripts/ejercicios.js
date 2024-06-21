const textos = {
    es: {
        titulo: "Ejercicios",
        btnCorregir: "Corregir 🗸",
        btnOtrosEjercicios: "Nuevos ejercicios ↺",
        nota: "Nota: en algún ejercicio puede haber más de una solución correcta, pero la corrección solo contempla una."
    },
    la: {
        titulo: "Exercitia",
        btnCorregir: "Castigare 🗸",
        btnOtrosEjercicios: "Nova exercitia ↺",
        nota: "Nota: in aliquo exercitio plus quam unum rectum responsum esse potest, sed correctio unam tantum considerat."
    }
};

function aplicarIdioma(codigoIdioma) {
    document.documentElement.lang = codigoIdioma;

    document.getElementById("btnCorregir").value = textos[codigoIdioma].btnCorregir;
    document.querySelector("input[name='check']").value = textos[codigoIdioma].btnOtrosEjercicios;

    document.getElementById("titulo").innerText = textos[codigoIdioma].titulo;
    document.querySelector("p.cursiva").innerText = textos[codigoIdioma].nota;
}
