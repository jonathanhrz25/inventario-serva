<?php
session_name('inventario'); // Debe ser el mismo nombre de sesión
session_start();
require("../php/connect2.php");

// Verificar si se ha enviado un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para eliminar el registro
    $sql = "DELETE FROM solicitud WHERE Id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error al eliminar el registro.";
        exit;
    }

    // Redirigir a la página principal después de la eliminación
    header("Location: ../soliBajas/tablaSolicitudes.php");
    exit;
} else {
    echo "ID no proporcionado.";
    exit;
}
?>
