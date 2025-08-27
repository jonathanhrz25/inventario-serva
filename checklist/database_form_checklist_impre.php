<?php
session_start(); // Iniciar la sesión
require("../php/connect2.php");

// Verifica si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtén el nombre de usuario del usuario actual
    $ultimo_usuario = $_SESSION['usuario'];

    // Obtén los valores de los equipos seleccionados
    $equiposSeleccionados = isset($_POST['LimpHardware_Equipo']) ? $_POST['LimpHardware_Equipo'] : [];

    // Convierte el array en una cadena (separada por comas)
    $equiposTexto = implode(', ', $equiposSeleccionados);

    $fecha = $_POST['fecha'];
    $area = $_POST['area'];
    $cedis = $_POST['cedis'];
    $usuario = $_POST['usuario'];
    $equipo = $_POST['equipo'];
    $clave = $_POST['clave'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $numero_serie = $_POST['numero_serie'];
    $fallas = $_POST['fallas'];
    $remover = $_POST['remover'];
    $rev_componentes = $_POST['rev_componentes'];
    $componentes = $_POST['componentes'];
    $comentarios_y_observaciones = $_POST['comentarios_y_observaciones'];
    $mantenimiento = $_POST['mantenimiento'];
    $porcentaje = $_POST['porcentaje'];
    $nombre = $_POST['nombre'];

    // Insertar datos en la tabla 'form_checklist Impresora'
    $sql = "INSERT INTO form_checklist
        (fecha, area, cedis, usuario, equipo, clave, marca, modelo, numero_serie, fallas, remover, rev_componentes, componentes, comentarios_y_observaciones, mantenimiento, porcentaje, nombre)
        VALUES 
        ('$fecha', '$area', '$cedis', '$usuario', '$equipo', '$clave', '$marca', '$modelo', '$numero_serie', '$fallas', '$remover', '$rev_componentes', '$componentes', '$comentarios_y_observaciones', '$mantenimiento', '$porcentaje', '$nombre')";

    $insertar = mysqli_query($conn, $sql);

    if ($insertar) {
        echo "<script> alert('Sus datos han sido registrados');
              window.location ='../checklist/tablaChecklist.php';</script>";
    } else {
        echo "<script> alert('ERROR: " . mysqli_error($conn) . "');
              window.location ='../checklist/form_checklist_impre.php';</script>";
    }

} else {
    // Si no es una solicitud POST, redirige o muestra un mensaje de error según sea necesario
    header("Location: ../checklist/tablaChecklist.php");
    exit();
}
?>