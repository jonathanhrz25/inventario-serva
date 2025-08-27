<?php
session_start();
require("../php/connect2.php");

// Recopilar datos del formulario - Solicitud
$fecha = $_POST['fecha'];
$motivo = $_POST['motivo'];
$clave = $_POST['clave'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$area = $_POST['area'];
$especificaciones = $_POST['especificaciones'];

// Verificar si se envió una imagen y procesarla si es necesario
if ($_FILES["evidencia1"]["error"] === 0) {
    $ruta = '../soliBajas/img/';

    // Obtener el nombre y extensión de la imagen
    $nombreImagen = $_FILES["evidencia1"]["name"];
    $extension = pathinfo($nombreImagen, PATHINFO_EXTENSION);

    // Generar un nombre único para la imagen
    $nombreImagenUnico = uniqid() . '_' . $nombreImagen;
    
    // Ruta completa para guardar la imagen
    $rutaCompletaImagen = $ruta . $nombreImagenUnico;

    // Mover la imagen al directorio de destino
    if (move_uploaded_file($_FILES["evidencia1"]["tmp_name"], $rutaCompletaImagen)) {
        // Insertar datos en la tabla 'solicitud'
        $sql = "INSERT INTO solicitud (fecha, motivo, clave, marca, modelo, numero_serie, area, especificaciones, evidencia1)
                VALUES ('$fecha', '$motivo', '$clave', '$marca', '$modelo', '$serie', '$area', '$especificaciones', '$nombreImagenUnico')";
        $insertar = mysqli_query($conn, $sql);

        if ($insertar) {
            echo "<script> alert('Sus datos han sido registrados');
                        window.location ='../soliBajas/tablaSolicitudes.php';</script>";
        } else {
            echo "<script> alert('ERROR sus datos NO han sido registrados');
            window.location ='../soliBajas/crearSoli.php';</script>";
        }
    } else {
        echo "<script> alert('Error al subir la imagen.');
            window.location ='../soliBajas/crearSoli.php';</script>";
    }
} else {
    echo "<script> alert('No se ha proporcionado ninguna imagen.');
        window.location ='../soliBajas/crearSoli.php';</script>";
}

// Cerrar conexión con la base de datos
mysqli_close($conn);
?>
