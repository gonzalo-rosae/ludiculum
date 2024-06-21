<!DOCTYPE html>
<html>

<head>
    <?php include '../widgets/titulo.php'; ?>
    <link rel="stylesheet" href="../styles/personales.css">
    <script src="../scripts/personales.js"></script>
</head>

<body>
    <?php include '../widgets/btnRetroceso.php'; ?>
    <div>
        <h2 id="titulo">
            Pronombres personales
        </h2>
    </div>
    <hr>
    <li class="caja">
        <div id="cabecera" class="resaltar">
            <button id="flechaAtras" onclick="cambiarPersona(-1)">←</button>
            <h3 id="personaActual">
                Primera persona
            </h3>
            <button id="flechaAlante" onclick="cambiarPersona(1)">→</button>
        </div>
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
                        <td class="cursiva">genitivo (normal)</td>
                        <td class="colEntrada"><input type="text" value=""><span class="correccion"></span></td>
                    </tr>
                    <tr>
                        <td class="cursiva">genitivo (partitivo)</td>
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
        <input id="btnCorregir" type="button" name="check" value="Corregir" onclick="corregirEnRango(0,12)">
    </li>
</body>

</html>