<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "blankink_db";

    // Connect to the database
    $con = new mysqli($server, $username, $password, $database);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
?>