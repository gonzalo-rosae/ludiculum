<!DOCTYPE html>
<html>

<head>
    <?php include '../widgets/titulo.php'; ?>
    <link rel="stylesheet" href="../styles/vocabulario.css">
    <script src="../scripts/vocabulario.js"></script>
</head>

<body>
    <?php include '../widgets/btnRetroceso.php'; ?>
    <h2 id="titulo">Vocabulario</h2>
    <hr>
    <div id="contenedorGeneral" class="caja">
        <div class="resaltar">
            <h3 id="cabecera">español → latín</h3>
        </div>
        <table>
            <?php
            $i;
            for ($i = 0; $i < 20; $i++) {
                if ($i % 2 == 0) {
                    echo "<tr>";
                }

                echo "<td class='prompt'></td>";
                echo "<td><input type='text'></td>";
                echo "<td><span class='correccion'></span></td>";

                if ($i % 2 == 1) {
                    echo "</tr>";
                }
            }

            if ($i % 2 == 1) {
                echo "<td></td><td></td><td></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <div class="botones">
            <button id="btnNuevasPalabras" onclick="recargar()">Nuevas palabras</button>
            <div id="lineaVertical"></div>
            <button id="btnSentidoInverso" onclick="cambiarSentido()">Sentido inverso</button>
        </div>
    </div>
    <?php include '../widgets/btnCorregir.php'; ?>
</body>

<script>
    var sentidoActual = "la-es";
    var palabras = [];

    recargar();
    var soluciones = [];

    rellenarInterfaz("nombre");
    crearSoluciones("traduccion");

    function cambiarSentido() {
        var prompt, solucion, sentido1, sentido2;
        var cabecera = document.getElementById("cabecera");

        if (getIdiomaActual() == "es") {
            sentido1 = "español → latín";
            sentido2 = "latín → español";
        }
        else {
            sentido1 = "hispanice → latine";
            sentido2 = "latine → hispanice";
        }
        cabecera.innerText = (cabecera.innerText == sentido1) ? sentido2 : sentido1;
        
        limpiarCampos();
        soluciones = [];
        sentidoActual = (sentidoActual == "la-es") ? "es-la" : "la-es";
        recargar();
    }

    function rellenarInterfaz(nombreCampoPrompt) {
        var prompts = document.querySelectorAll('.prompt');
        prompts.forEach((prompt, index) => {
            if (index < palabras.length) {
                prompt.textContent = palabras[index][nombreCampoPrompt];
            }
        });
    }

    function crearSoluciones(nombreCampoSoluciones) {
        for (var palabra of palabras) {
            soluciones.push(palabra[nombreCampoSoluciones]);
        }
    }

    function recargar() {
    fetch('../asyncQueries/getVocabulario.php')
            .then(response => response.json())
            .then(data => {
                palabras = data;
                limpiarCampos();
                soluciones = [];
                if (sentidoActual == "es-la") {
                    prompt = "nombre";
                    solucion = "traduccion";
                }
                else if (sentidoActual == "la-es") {
                    prompt = "traduccion";
                    solucion = "nombre";
                }
                rellenarInterfaz(prompt);
                crearSoluciones(solucion);
            })
            .catch(error => console.error('Error al obtener nuevas palabras:', error));
    }

</script>

</html>