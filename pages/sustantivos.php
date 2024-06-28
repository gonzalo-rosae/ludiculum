<?php
require_once ("../database.php");
require_once ("../api.php");
$sustantivo = getRandomNoun();

$generoSimbolo = '';
switch ($sustantivo["genero"]) {
    case 'm':
        $generoSimbolo = '♂';
        break;
    case 'f':
        $generoSimbolo = '♀';
        break;
    case 'n':
        // ⚲
        $generoSimbolo = '⚥';
        break;
    default:
        $generoSimbolo = '';
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include '../widgets/titulo.php'; ?>
    <link rel="stylesheet" href="../styles/sustantivos.css">
    <script src="../scripts/sustantivos.js"></script>
</head>

<body>
    <?php include '../widgets/btnRetroceso.php'; ?>
    <input type="button" name="check" value="Nueva palabra" onclick="recargar()">
    <li class="caja">
        <div>
            <h2 id="nombreLatin">
                <?php echo $sustantivo["nombre"] ?>
            </h2>
            <span id="genero" class="<?php echo $sustantivo["genero"] ?> infoSustantivo ayuda">
                <?php echo $generoSimbolo ?>
            </span>
            <span id="declinacion" class="infoSustantivo" onclick="mostrarDeclinacion()">?</span>
            <p id="traduccion">
                <?php echo $sustantivo["traduccion"] ?>
            </p>
        </div>
        <hr>
        <div class="declensionTestHolder">
            <table id="singular" class="declensionTestTable">
                <thead>
                    <tr>
                        <th class="cursiva">singular</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cursiva">nominativo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                    <tr>
                        <td class="cursiva">vocativo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                    <tr>
                        <td class="cursiva">acusativo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                    <tr>
                        <td class="cursiva">genitivo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                    <tr>
                        <td class="cursiva">dativo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                    <tr>
                        <td class="cursiva">ablativo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                </tbody>
            </table>
            <table id="plural" class="declensionTestTable">
                <thead>
                    <tr>
                        <th class="cursiva">plural</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cursiva">nominativo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                    <tr>
                        <td class="cursiva">vocativo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                    <tr>
                        <td class="cursiva">acusativo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                    <tr>
                        <td class="cursiva">genitivo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                    <tr>
                        <td class="cursiva">dativo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                    <tr>
                        <td class="cursiva">ablativo</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php include '../widgets/btnCorregir.php'; ?>
    </li>

</body>

<script>
    var nombre = "<?php echo $sustantivo["nombre"] ?>";
    var declinacion = "<?php echo $sustantivo["declinacion"] ?>";
    var genero = "<?php echo $sustantivo["genero"] ?>";
    var regularidad = "<?php echo $sustantivo["regularidad"] ?>";
    var soluciones = calcularSoluciones(nombre, declinacion, genero, regularidad);
    cargarTooltips();

    function cargarTooltips() {
        // Español
        if (getIdiomaActual() == "es") {
            // Género sustantivo
            var generoLegible;
            if (genero == "m") generoLegible = "masculino";
            else if (genero == "f") generoLegible = "femenino";
            else generoLegible = "neutro";
        }

        // Latín
        else {
            // Género sustantivo
            var generoLegible;
            if (genero == "m") generoLegible = "masculinum";
            else if (genero == "f") generoLegible = "femininum";
            else generoLegible = "neutrum";
        }

        document.getElementById("genero").title = generoLegible;
    }

    function mostrarDeclinacion() {
        var declinacionOrdinal, declinacionLegible;
        if (getIdiomaActual() == "es") {
            declinacionOrdinal = declinacion + ".ª";
            if (declinacion == 1) declinacionLegible = "primera";
            else if (declinacion == 2) declinacionLegible = "segunda";
            else if (declinacion == 3) declinacionLegible = "tercera";
            else if (declinacion == 4) declinacionLegible = "cuarta";
            else if (declinacion == 5) declinacionLegible = "quinta";
            else declinacionLegible = "desconocida";
            declinacionLegible += " declinación";
        }
        else {
            if (declinacion == 1) {
                declinacionOrdinal = "I";
                declinacionLegible = "prima";
            }
            else if (declinacion == 2) {
                declinacionOrdinal = "II";
                declinacionLegible = "secunda";
            }
            else if (declinacion == 3) {
                declinacionOrdinal = "III";
                declinacionLegible = "tertia";
            }
            else if (declinacion == 4) {
                declinacionOrdinal = "IV";
                declinacionLegible = "quarta";
            }
            else if (declinacion == 5) {
                declinacionOrdinal = "V";
                declinacionLegible = "quinta";
            }
            else {
                declinacionOrdinal = "";
                declinacionLegible = "ignota";
            }
            declinacionLegible += " declinatio";
        }

        var infoDeclinacion = document.getElementById("declinacion");
        infoDeclinacion.innerText = declinacionOrdinal;
        infoDeclinacion.classList.add("ayuda");
        infoDeclinacion.title = declinacionLegible;
    }

    function calcularSoluciones(nombre, declinacion, genero, regularidad) {
        // Orden: singular - nom., voc., ac., gen., dat., abl.; plural- nom., voc., ac., gen., dat., abl.
        var decl1 = ["a", "a", "am", "ae", "ae", "a", "ae", "ae", "as", "arum", "is", "is"];
        var decl2_us = ["us", "e", "um", "i", "o", "o", "i", "i", "os", "orum", "is", "is"];
        // Sustantivos con síncopa tratados ad hoc
        var decl2_er_ir = ["", "", "um", "i", "o", "o", "i", "i", "os", "orum", "is", "is"];
        var decl2N = ["um", "um", "um", "i", "o", "o", "a", "a", "a", "orum", "is", "is"];

        var decl3_i = ["is", "is", "em", "is", "i", "i", "es", "es", "es", "ium", "ibus", "ibus"];
        // Labiales y -m
        var decl3_lab_m = ["s", "s", "em", "is", "i", "e", "es", "es", "es", "um", "ibus", "ibus"];
        // Líquidas
        var decl3_liq = ["", "", "em", "is", "i", "e", "es", "es", "es", "um", "ibus", "ibus"];
        // Dentales
        var decl3_d = ["s", "s", "dem", "dis", "di", "de", "des", "des", "des", "dum", "dibus", "dibus"];
        var decl3_d_sinS = ["", "", "dem", "dis", "di", "de", "des", "des", "des", "dum", "dibus", "dibus"];
        var decl3_t = ["s", "s", "tem", "tis", "ti", "te", "tes", "tes", "tes", "tum", "tibus", "tibus"];
        var decl3_t_sinS = ["", "", "tem", "tis", "ti", "te", "tes", "tes", "tes", "tum", "tibus", "tibus"];
        // Guturales
        var decl3_c = ["x", "x", "cem", "cis", "ci", "ce", "ces", "ces", "ces", "cum", "cibus", "cibus"];
        var decl3_g = ["x", "x", "gem", "gis", "gi", "ge", "ges", "ges", "ges", "gum", "gibus", "gibus"];
        // En -n
        var decl3_n = ["", "", "nem", "nis", "ni", "ne", "nes", "nes", "nes", "num", "nibus", "nibus"];
        // Sibilantes (con rotacismo)
        var decl3_s = ["s", "s", "rem", "ris", "ri", "re", "res", "res", "res", "rum", "ribus", "ribus"];

        var decl4_MF = ["us", "us", "um", "us", "ui", "u", "us", "us", "us", "uum", "ibus", "ibus"];
        var decl4_N = ["u", "u", "u", "us", "ui", "u", "ua", "ua", "ua", "uum", "ibus", "ibus"];

        var decl5 = ["es", "es", "em", "ei", "ei", "e", "es", "es", "es", "erum", "ebus", "ebus"];

        var indiceRaiz, desinenciasElegidas;

        if (declinacion == 1) {
            indiceRaiz = 1;
            desinenciasElegidas = decl1;
        }
        else if (declinacion == 2) {
            if (genero == "n") {
                indiceRaiz = 2;
                desinenciasElegidas = decl2N;
            }
            else if (nombre.endsWith("us")) {
                indiceRaiz = 2;
                desinenciasElegidas = decl2_us;
            }
            else {
                if (nombre == "liber") nombre = "libr";
                indiceRaiz = 0;
                desinenciasElegidas = decl2_er_ir;
            }
        }
        else if (declinacion == 3) {
            if (regularidad == "") {
                if (nombre.endsWith("is")) {
                    indiceRaiz = 2;
                    desinenciasElegidas = decl3_i;
                }
                else if (nombre.endsWith("bs") || nombre.endsWith("ps") || nombre.endsWith("ms")) {
                    indiceRaiz = 1;
                    desinenciasElegidas = decl3_lab_m;
                }
                else if (nombre.endsWith("r") || nombre.endsWith("l")) {
                    indiceRaiz = 0;
                    desinenciasElegidas = decl3_liq;
                }
            }
            else {
                // TODO: optimizar la llamada usando lo de Carlos ADIC
                if (regularidad == "d") {
                    if (nombre.endsWith("s")) {
                        indiceRaiz = 1;
                        desinenciasElegidas = decl3_d;
                    }
                    else {
                        indiceRaiz = 0;
                        desinenciasElegidas = decl3_d_sinS;
                    }
                }
                else if (regularidad == "t") {
                    if (nombre == "miles") {
                        indiceRaiz = 2;
                        desinenciasElegidas = ["es", "es", "item", "itis", "iti", "ite", "ites", "ites", "ites", "itum", "itibus", "itibus"]
                    }
                    if (nombre.endsWith("s")) {
                        indiceRaiz = 1;
                        desinenciasElegidas = decl3_t;
                    }
                    else {
                        indiceRaiz = 0;
                        desinenciasElegidas = decl3_t_sinS;
                    }
                }
                else if (regularidad == "c") {
                    indiceRaiz = 1;
                    desinenciasElegidas = decl3_c;
                }
                else if (regularidad == "g") {
                    indiceRaiz = 1;
                    desinenciasElegidas = decl3_g;
                }
                else if (regularidad == "n") {
                    indiceRaiz = 0;
                    desinenciasElegidas = decl3_n;
                }
                else if (regularidad == "s") {
                    indiceRaiz = 1;
                    desinenciasElegidas = decl3_s;
                }
            }
        }
        else if (declinacion == 4) {
            if (genero == "n") {
                indiceRaiz = 1;
                desinenciasElegidas = decl4_N;
            }
            else {
                indiceRaiz = 2;
                desinenciasElegidas = decl4_MF;
            }
        }
        else if (declinacion == 5) {
            indiceRaiz = 2;
            desinenciasElegidas = decl5;
        }

        var raiz = nombre.substring(0, nombre.length - indiceRaiz);
        if (desinenciasElegidas == undefined) {
            alert("No se ha podido calcular la solución de la palabra latina «" + nombre + "». Consulta al administrador.");
        }
        else {
            return desinenciasElegidas.map(terminacion => raiz + terminacion);
        }
    }

</script>

</html>