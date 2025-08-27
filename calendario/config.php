<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "serva";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>
