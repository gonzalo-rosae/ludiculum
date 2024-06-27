<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("database.php");
require_once("api.php");

// Establecer la cabecera para que el navegador sepa que la respuesta es JSON
header('Content-Type: application/json');

try {
    // Llamar a la función para obtener sustantivos aleatorios
    $palabras = getRandomNouns(20);

    // Devolver los resultados en formato JSON
    echo json_encode($palabras);
} catch (Exception $e) {
    // Devolver un mensaje de error en formato JSON
    echo json_encode(['error' => $e->getMessage()]);
}
?>