<?php

// Funciones auxiliares
function marcarUtilizado($data, $tabla)
{
    global $db_conn;
    global $mysqli;

    $nombre = $data['nombre'];
    $update_query = "UPDATE $tabla SET utilizado = 1 WHERE nombre = '$nombre'";
    mysqli_query($db_conn, $update_query) or die(mysqli_error($mysqli));
}

function resetUtilizados($tabla)
{
    global $db_conn;
    global $mysqli;

    $update_query = "UPDATE $tabla SET utilizado = 0";
    mysqli_query($db_conn, $update_query) or die(mysqli_error($mysqli));
}

function getRandomNouns($cantidad)
{
    global $db_conn;

    $nouns = array();

    $query = "SELECT id, nombre, traduccion, declinacion, genero, regularidad FROM sustantivos 
              WHERE utilizado = 0
              ORDER BY RAND() LIMIT $cantidad";

    $result = mysqli_query($db_conn, $query);

    if (!$result) {
        die("Consulta fallada: " . mysqli_error($db_conn));
    }

    if (count($nouns) < $cantidad) {
        resetUtilizados('sustantivos');
    }

    while ($data = mysqli_fetch_array($result)) {
        marcarUtilizado($data, "sustantivos");
        $nouns[] = $data;
    }

    if (count($nouns) < $cantidad) {
        $faltantes = $cantidad - count($nouns);

        $query = "SELECT id, nombre, traduccion, declinacion, genero, regularidad FROM sustantivos 
                  WHERE utilizado = 0
                  ORDER BY RAND() LIMIT $faltantes";

        $result = mysqli_query($db_conn, $query);

        if (!$result) {
            die("Consulta fallada: " . mysqli_error($db_conn));
        }

        while ($data = mysqli_fetch_array($result)) {
            marcarUtilizado($data, "sustantivos");
            $nouns[] = $data;
        }
    }

    return $nouns;
}

function getRandomNoun()
{
    global $db_conn;
    global $mysqli;

    $query = "SELECT nombre, traduccion, declinacion, genero, regularidad FROM sustantivos 
              WHERE utilizado = 0
              ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($db_conn, $query) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($result) == 0) {
        resetUtilizados('sustantivos');
        $result = mysqli_query($db_conn, $query);
        if (!$result) {
            die("Consulta fallada: " . mysqli_error($db_conn));
        }
    }

    $data = mysqli_fetch_array($result);

    marcarUtilizado($data, "sustantivos");

    return $data;
}

function getRandomVerb()
{
    global $db_conn;
    global $mysqli;

    $query = "SELECT nombre, traduccion, conjugacion FROM verbos 
              WHERE utilizado = 0
              ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($db_conn, $query) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($result) == 0) {
        resetUtilizados('verbos');
        $result = mysqli_query($db_conn, $query);
        if (!$result) {
            die("Consulta fallada: " . mysqli_error($db_conn));
        }
    }

    $data = mysqli_fetch_array($result);

    marcarUtilizado($data, "verbos");

    return $data;
}

function getRandomExercises($cantidad)
{
    global $db_conn;

    $ejercicios = array();

    $query = "SELECT nombre, solucion FROM ejercicios 
              WHERE utilizado = 0
              ORDER BY RAND() LIMIT $cantidad";

    $result = mysqli_query($db_conn, $query);

    if (!$result) {
        die("Consulta fallada: " . mysqli_error($db_conn));
    }

    if (count($ejercicios) < $cantidad) {
        resetUtilizados('ejercicios');
    }

    while ($data = mysqli_fetch_array($result)) {
        marcarUtilizado($data, "ejercicios");
        $ejercicios[] = $data;
    }

    if (count($ejercicios) < $cantidad) {
        $faltantes = $cantidad - count($ejercicios);

        $query = "SELECT nombre, solucion FROM ejercicios 
                  WHERE utilizado = 0
                  ORDER BY RAND() LIMIT $faltantes";

        $result = mysqli_query($db_conn, $query);

        if (!$result) {
            die("Consulta fallada: " . mysqli_error($db_conn));
        }

        while ($data = mysqli_fetch_array($result)) {
            marcarUtilizado($data, "ejercicios");
            $ejercicios[] = $data;
        }
    }

    return $ejercicios;
}

?>