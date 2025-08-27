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
require "../phpqrcode/qrlib.php";
require "../php/connect2.php";
require 'fpdf/fpdf.php';

// Parámetros de Configuración
$tamaño = 10;
$level = 'L';
$framSize = 3;

// Obtenemos el ID del equipo de alguna manera (por ejemplo, a través de la URL)
$id_equipo = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_equipo !== null) {
    // Consulta SQL para obtener la información del equipo específico
    $sql = "SELECT numero_serie, area, clave, fechaAs FROM form_switch_aps WHERE Id = $id_equipo";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Verifica si se encontró un equipo en la base de datos
        if ($row && isset($row['numero_serie'])) {
            $numero_serie = $row['numero_serie'];
            $area = $row['area'];
            $clave = $row['clave'];
            $fechaAs = $row['fechaAs'];

            // Crear una instancia de FPDF con el nuevo tamaño de hoja
            $pdf = new FPDF('L', 'mm', array(300, 250));
            $pdf->AddPage();

            // Inicializar la variable de búsqueda
            $busqueda = "";

            // Verificar si se proporcionó un parámetro de búsqueda
            if (isset($_GET['enviar'])) {
                $busqueda = $_GET["busqueda"];
            }

            // Crear el código QR y guardarlo en un archivo temporal
            $qrContent = "http://11.11.1.39/inventario-serva/invent/switchesyaccessp.php?busqueda=$numero_serie&enviar=";
            $qrFilename = 'temp/qrcode_' . $numero_serie . '.png';
            QRcode::png($qrContent, $qrFilename, $level, $tamaño, $framSize);

            // Agregar el código QR al PDF
            $pdf->Image($qrFilename, 34, 100, 40);

            // Agregar la información del equipo al PDF
            $pdf->SetFont('Arial', '', 10);  // Establecer un tamaño de fuente más grande
            $pdf->Cell(60);
            $pdf->Image('../img/loguito.png', 74, 100, 50);  // Agregar la imagen
            $pdf->Ln(100);
            $pdf->Cell(67);
            $pdf->Cell(0, 7, $area, 10, 1);  // Agregar la fecha en la siguiente línea
            $pdf->Cell(67);
            $pdf->Cell(0, 7, 'Clave: ' . $clave, 10, 1);  // Aumentar el tamaño del texto
            $pdf->Cell(67);
            $pdf->Cell(0, 7, 'Fecha de Asignacion:', 0, 1);  // Aumentar el tamaño del texto y saltar de línea
            $pdf->Cell(67);
            $pdf->Cell(0, 7, $fechaAs, 10, 1);  // Agregar la fecha en la siguiente línea

            // Guardar el PDF en el servidor
            $pdfFilename = 'temp/equipo_info_' . $numero_serie . '.pdf';
            $pdf->Output('F', $pdfFilename);

            // Descargar el PDF
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($pdfFilename) . '"');
            readfile($pdfFilename);

            // Eliminar los archivos temporales después de ser descargados
            unlink($pdfFilename);
            unlink($qrFilename);

        } else {
            echo 'No se encontró un equipo en la base de datos con ID ' . $id_equipo;
        }
    } else {
        echo 'Error en la consulta SQL: ' . mysqli_error($conn);
    }
} else {
    echo 'No se proporcionó un ID de equipo válido.';
}
?>