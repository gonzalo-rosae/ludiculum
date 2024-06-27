<?php
require_once ("database.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ludiculum</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="stylesheet" href="styles/general.css">
    <script src="scripts/general.js"></script>
    <link rel="stylesheet" href="styles/index.css">
    <script src="scripts/index.js"></script>
</head>

<body>
    <button id="btnIdioma" onclick="cambiarIdioma()">Cambiar idioma</button>
    <button id="btnTema" onclick="cambiarTema()">Cambiar tema</button>
    <div id="titulo">Ludiculum</div>
    <div id="envoltorio">
        <div>
            <a href="pages/sustantivos.php" class="button">Sustantivos</a>
            <a href="pages/verbos.php" class="button">Verbos</a>
        </div>
        <br>
        <div>
            <a href="pages/personales.php" class="button">Personales</a>
            <a href="pages/demostrativos.php" class="button">Demostrativos</a>
            <a href="pages/relativos.php" class="button">Relativos</a>
        </div>
        <br>
        <div>
            <a href="pages/vocabulario.php" class="button">Vocabulario</a>
            <a href="pages/ejercicios.php" class="button">Ejercicios</a>
            <a href="pages/gramatica.php" class="button">Gramática</a>
        </div>
    </div>
    <div id="footer1">
        <p></p>
        <p></p>
    </div>
    <div id="footer2">
        <p>© Todos los derechos reservados</p>
    </div>

    <body>

</html>