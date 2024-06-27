<?php

// Funciones auxiliares
function alternarUtilizado($data, $tabla)
{
    global $db_conn;
    global $mysqli;

    $nombre = $data['nombre'];
    $update_query = "UPDATE $tabla SET utilizado = NOT utilizado WHERE nombre = '$nombre'";
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

    // Realizar la consulta para obtener sustantivos no utilizados recientemente
    $query = "SELECT id, nombre, traduccion, declinacion, genero, regularidad FROM sustantivos 
              WHERE utilizado = 0
              ORDER BY RAND() LIMIT $cantidad";
    
    $result = mysqli_query($db_conn, $query);
    
    if (!$result) {
        die("Consulta fallada: " . mysqli_error($db_conn));
    }

    // Si no hay resultados, realizar el "reset" y ejecutar la consulta de nuevo
    if (mysqli_num_rows($result) == 0) {
        resetUtilizados('sustantivos');
        $result = mysqli_query($db_conn, $query);
        if (!$result) {
            die("Consulta fallada: " . mysqli_error($db_conn));
        }
    }

    // Iterar sobre los resultados de la consulta
    while ($data = mysqli_fetch_array($result)) {
        alternarUtilizado($data, "sustantivos");
        $nouns[] = $data;
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

    // Si no hay resultados, realizar el "reset" y ejecutar la consulta de nuevo
    if (mysqli_num_rows($result) == 0) {
        resetUtilizados('sustantivos');
        $result = mysqli_query($db_conn, $query);
        if (!$result) {
            die("Consulta fallada: " . mysqli_error($db_conn));
        }
    }

    $data = mysqli_fetch_array($result);

    alternarUtilizado($data, "sustantivos");

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

    // Si no hay resultados, realizar el "reset" y ejecutar la consulta de nuevo
    if (mysqli_num_rows($result) == 0) {
        resetUtilizados('verbos');
        $result = mysqli_query($db_conn, $query);
        if (!$result) {
            die("Consulta fallada: " . mysqli_error($db_conn));
        }
    }

    $data = mysqli_fetch_array($result);

    alternarUtilizado($data, "verbos");

    return $data;
}

function getRandomExercises($limit)
{
    global $db_conn;
    global $mysqli;

    $query = "SELECT nombre, solucion FROM ejercicios 
              WHERE utilizado = 0
              ORDER BY RAND() LIMIT $limit";
    $result = mysqli_query($db_conn, $query) or die(mysqli_error($mysqli));

    // Si no hay resultados, realizar el "reset" y ejecutar la consulta de nuevo
    if (mysqli_num_rows($result) == 0) {
        resetUtilizados('ejercicios');
        $result = mysqli_query($db_conn, $query);
        if (!$result) {
            die("Consulta fallada: " . mysqli_error($db_conn));
        }
    }

    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        alternarUtilizado($row, "ejercicios");
        $data[] = $row;
    }

    return $data;
}


?>