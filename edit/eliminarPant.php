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

    // Consulta SQL para actualizar el campo 'status' a 0 (baja)
    $sql = "UPDATE form_pantalla SET status = 0 WHERE Id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error al eliminar el registro.";
        exit;
    }

    // Redirigir a la página principal después de la eliminación
    header("Location: ../invent/pantallas.php");
    exit;
} else {
    echo "ID no proporcionado.";
    exit;
}
?>
