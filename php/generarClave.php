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
require("../php/connect2.php");

$cedi = mysqli_real_escape_string($conn, $_POST['cedi']);
$equipo = mysqli_real_escape_string($conn, $_POST['equipo']);
$area = mysqli_real_escape_string($conn, $_POST['area']);

// Construir la clave inicial
$nuevaClave = strtoupper(substr($cedi, 0, 2) . substr($equipo, 0, 2) . substr($area, 0, 2));

// Array de nombres de tablas
$tablas = array('form_pc', 'form_monitor', 'form_impresora', 'form_hh', 'form_pantalla', 'form_laptop', 'form_nobreak', 'form_switch_aps', 'form_dde', 'form_lectorcb');

// Inicializar variables para el máximo número consecutivo
$maxNumero = 0;

// Iterar sobre las tablas
foreach ($tablas as $tabla) {
    // Obtener el último número consecutivo para el tipo de equipo
    $query = "SELECT MAX(SUBSTRING(clave, 7)) as max_numero FROM $tabla WHERE clave LIKE '$nuevaClave%'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $maxNumero = max($maxNumero, $row['max_numero']);
    } else {
        // Manejar el error al obtener el siguiente número
        echo json_encode(array('error' => "Error al obtener el siguiente número consecutivo para la tabla $tabla."));
        mysqli_close($conn);
        exit;  // Salir del script si hay un error
    }
}

// Calcular el siguiente número consecutivo
$numeroConsecutivo = $maxNumero + 1;

// Actualizar la clave con el número consecutivo
$nuevaClave .= str_pad($numeroConsecutivo, 2, '0', STR_PAD_LEFT);

// Devolver la nueva clave y número consecutivo como JSON
$response = array('nuevaClave' => $nuevaClave, 'numeroConsecutivo' => $numeroConsecutivo);
echo json_encode($response);

mysqli_close($conn);
