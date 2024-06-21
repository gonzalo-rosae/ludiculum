<?php

// Funciones auxiliares
function incrementar($campo, $data, $tabla)
{
    global $db_conn;
    global $mysqli;

    $nombre = $data['nombre'];
    $update_query = "UPDATE $tabla SET $campo = $campo + 1 WHERE nombre = '$nombre'";
    mysqli_query($db_conn, $update_query) or die(mysqli_error($mysqli));
}



// Funciones propiamente API

function crearBaseDatos()
{
    global $db_conn;
    global $mysqli;

    // Nombre del archivo SQL
    $sql_file = 'db.sql';

    // Leer el contenido del archivo SQL
    $sql = file_get_contents($sql_file);

    // Ejecutar las consultas SQL
    if (mysqli_multi_query($db_conn, $sql)) {
        do {
            // almacenar resultados
            if ($result = mysqli_store_result($db_conn)) {
                mysqli_free_result($result);
            }
        } while (mysqli_next_result($db_conn));
    }
}


function getRandomNouns($cantidad)
{
    global $db_conn;

    $nouns = array();

    // Realizar una sola consulta para obtener todos los sustantivos necesarios
    $query = "SELECT id, nombre, traduccion, declinacion, genero, regularidad FROM sustantivos 
              ORDER BY apariciones_v ASC, RAND() LIMIT $cantidad";
    
    $result = mysqli_query($db_conn, $query);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($db_conn));
    }

    // Iterar sobre los resultados de la consulta
    while ($data = mysqli_fetch_array($result)) {
        incrementar("apariciones_v", $data, "sustantivos");
        $nouns[] = $data;
    }

    return $nouns;
}




function getRandomNoun()
{
    global $db_conn;
    global $mysqli;

    $query = "SELECT nombre, traduccion, declinacion, genero, regularidad FROM sustantivos ORDER BY apariciones_d ASC, RAND() LIMIT 1";
    $result = mysqli_query($db_conn, $query) or die(mysqli_error($mysqli));
    $data = mysqli_fetch_array($result);

    incrementar("apariciones_d", $data, "sustantivos");

    return $data;
}

function getRandomVerb()
{
    global $db_conn;
    global $mysqli;

    $query = "SELECT nombre, traduccion, conjugacion FROM verbos ORDER BY apariciones ASC, RAND() LIMIT 1";
    $result = mysqli_query($db_conn, $query) or die(mysqli_error($mysqli));
    $data = mysqli_fetch_array($result);

    incrementar("apariciones", $data, "verbos");

    return $data;
}


function getRandomExercises($limit)
{
    global $db_conn;
    global $mysqli;

    $query = "SELECT nombre, solucion FROM ejercicios ORDER BY apariciones ASC, RAND() LIMIT $limit";
    $result = mysqli_query($db_conn, $query) or die(mysqli_error($mysqli));
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        incrementar("apariciones", $row, "ejercicios");
        $data[] = $row;
    }

    return $data;
}

?>