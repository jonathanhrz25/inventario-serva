<?php
// Conectar a la base de datos (ajusta los detalles de conexión)
$conn = new mysqli("localhost", "root", "", "serva");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se recibió la clave por POST
if (isset($_POST['clave'])) {
    $clave = $_POST['clave'];

    // Consulta SQL para verificar si la clave ya existe
    $sql = "SELECT * FROM form_monitor WHERE clave = '$clave'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // La clave ya existe
        echo "repetida";
    } else {
        // La clave no está repetida
        echo "no_repetida";
    }
} else {
    // No se recibió la clave por POST
    echo "error";
}

// Cerrar la conexión
$conn->close();
?>
