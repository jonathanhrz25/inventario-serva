<?php
    session_name('inventario'); // Debe ser el mismo nombre de sesión
    session_start();
    require("../php/connect.php");
    // Verifica si el usuario ha iniciado sesión
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../php/inicioSesion.php"); // Redirige al inicio de sesión si no ha iniciado sesión
        exit();
    }
?>

<?php
session_start();
require("../php/connect2.php");

// Verificar si se ha enviado un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para actualizar los campos 'status' y 'proceso'
    $sql = "UPDATE form_pc SET status = 0, proceso = 'Mantenimiento' WHERE Id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error al actualizar el registro.";
        exit;
    }

    // Redirigir a la página principal después de la actualización
    header("Location: ../invent/pc.php");
    exit;
} else {
    echo "ID no proporcionado.";
    exit;
}
?>