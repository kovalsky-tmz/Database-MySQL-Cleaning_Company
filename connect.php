<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projekt";

    // Tworzenie połączenia
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Sprawdzenie
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>