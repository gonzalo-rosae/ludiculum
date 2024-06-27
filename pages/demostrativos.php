<!DOCTYPE html>
<html>

<head>
    <?php include '../widgets/titulo.php'; ?>
    <link rel="stylesheet" href="../styles/demostrativosRelativos.css">
    <script src="../scripts/demostrativos.js"></script>
</head>

<body>
    <?php include '../widgets/btnRetroceso.php'; ?>
    <div>
        <div>
            <h2 id="titulo">
                Pronombres demostrativos
            </h2>
        </div>
        <hr>
        <div id="cabecera" class="resaltar">
            <button id="flechaAtras" onclick="cambiarPersona(-1)">←</button>
            <h3 id="personaActual">
                Primera persona
            </h3>
            <button id="flechaAlante" onclick="cambiarPersona(1)">→</button>
        </div>
        <?php include '../widgets/tablaSingularPlural.php'; ?>
    </div>
    <br>
    <input id="btnCorregir" type="button" name="check" value="Corregir" onclick="corregir()">
</body>

</html>