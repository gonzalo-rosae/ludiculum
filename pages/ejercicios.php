<?php
require_once ("../database.php");
require_once ("../api.php");
$ejercicios = getRandomExercises(5);
?>

<!DOCTYPE html>
<html>

<head>
    <?php include '../widgets/titulo.php'; ?>
    <link rel="stylesheet" href="../styles/ejercicios.css">
    <script src="../scripts/ejercicios.js"></script>
</head>

<body>
    <?php include '../widgets/btnRetroceso.php'; ?>
    <div>
        <h2 id="titulo">
            Ejercicios
        </h2>
    </div>
    <hr>
    <input type="button" name="check" value="Otros ejercicios" onclick="recargar()">
    <div>
        <?php
        for ($i = 0; $i < 5; $i++) {
            echo "<li class='caja ejercicio'></li>";
        }
        ?>
    </div>
    <p class="cursiva">Nota: en algún ejercicio puede haber más de una solución correcta.</p>
    <input id="btnCorregir" type="button" name="check" value="Corregir" onclick="corregir()">


    <script>
        var ejercicios = <?php echo json_encode($ejercicios); ?>;
        var soluciones = [];

        ejercicios.forEach(function (ejercicio, index) {
            // Enunciado
            var enunciadoCrudo = ejercicio.nombre;
            var enunciadoHTML = enunciadoCrudo.split(' ').map(palabra => {
                var clase;
                if (palabra.includes("xx")) clase = '';
                else clase = ' class="sobrepasar" onclick="buscar(this)"';
                return `<span${clase}>${palabra}</span>`;
            }).join(' ');
            enunciadoHTML = "<p>" + enunciadoHTML + "</p>";
            enunciadoHTML = enunciadoHTML.replace(/xx/g, '<input type="text"><span class="correccion cursiva"></span>');
            var ejercicioElement = document.getElementsByClassName('ejercicio')[index];
            ejercicioElement.innerHTML = enunciadoHTML;

            // Solución
            var solucion = ejercicio.solucion;
            solucion.split(";").forEach(function (solParcial) {
                soluciones.push(solParcial);
            });
        });

        function buscar(span) {
            var url = "https://glosbe.com/la/en/" + span.innerText.toLowerCase();
            window.open(url, '_blank');
        }

    </script>
</body>

</html>