<!DOCTYPE html>
<html>

<head>
    <?php include '../widgets/titulo.php'; ?>
    <link rel="stylesheet" href="../styles/demostrativosRelativos.css">
    <script src="../scripts/relativos.js"></script>
</head>

<body>
    <?php include '../widgets/btnRetroceso.php'; ?>
    <div>
        <div>
            <h2 id="titulo">
                Pronombres relativos
            </h2>
        </div>
        <hr>
        <br>
        <br>
        <?php include '../widgets/tablaSingularPlural.php'; ?>
        <p id="nota" class="cursiva">
            Nota: los pronombres interrogativos son iguales, salvo en el nominativo singular, que es «quis, quae,
            quid».
        </p>
        <br>
        <input id="btnCorregir" type="button" name="check" value="Corregir" onclick="corregir()">
    </div>
</body>

</html>