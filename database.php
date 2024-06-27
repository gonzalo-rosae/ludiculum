<?php
    // Database configuration
    define("DB_URL", "localhost");
    define("DB_username", "root");
    define("DB_password", "");

    $db_conn = mysqli_connect(
        DB_URL,
        DB_username,
        DB_password,
        'ludiculum'
    ) or die(mysqli_error($mysqli));

    mysqli_query($db_conn, "SET NAMES 'utf8'");

?>