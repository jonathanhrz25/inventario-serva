<?php
session_name('inventario'); // Debe ser el mismo nombre de sesión
session_start();
require ("../php/connect.php");
// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: ../php/inicioSesion.php"); // Redirige al inicio de sesión si no ha iniciado sesión
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/dark.css">
    <style>
        body {
            overflow-x: auto;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            margin-bottom: 20px;
        }
    </style>
    <title>Sistema de Inventario</title>
</head>

<div class="modo" id="modo"></div>

<body style="padding-top: 70px;">

    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../invent/monitores.php">
                    <img src="../img/icono2.png" alt="" height="35" class="d-inline-block align-text-top">
                    Sistema de Inventario
                </a>
            </div>
        </nav>
    </header>


    <?php
    // Agregamos la librería para generar códigos QR
    require "../phpqrcode/qrlib.php";
    require "../php/connect2.php"; // Asegúrate de ajustar la ruta según tu estructura de archivos y configuración
    
    // Declaramos una carpeta temporal para guardar las imágenes generadas
    $dir = 'temp/';

    // Si no existe la carpeta, la creamos
    if (!file_exists($dir)) {
        mkdir($dir);
    }

    // Parámetros de Configuración
    $tamaño = 10; // Tamaño de Pixel
    $level = 'L'; // Precisión Baja
    $framSize = 3; // Tamaño en blanco
    
    // Obtenemos el ID del equipo de alguna manera (por ejemplo, a través de la URL)
    $id_equipo = isset($_GET['id']) ? $_GET['id'] : null;

    if ($id_equipo !== null) {
        // Consulta SQL para obtener la información del equipo específico
        $sql = "SELECT numero_serie, area, clave, fechaAs FROM form_monitor WHERE Id = $id_equipo"; // Ajusta la consulta según tu base de datos y estructura de tabla
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            // Verifica si se encontró un equipo en la base de datos
            if ($row && isset($row['numero_serie'])) {
                $numero_serie = $row['numero_serie'];
                $area = $row['area'];
                $clave = $row['clave'];
                $fechaAs = $row['fechaAs'];

                // Ruta y nombre del archivo a generar
                $filename = $dir . $numero_serie . '.png';

                // Inicializar la variable de búsqueda
                $busqueda = "";

                // Verificar si se proporcionó un parámetro de búsqueda
                if (isset($_GET['enviar'])) {
                    $busqueda = $_GET["busqueda"];
                }

                // Contenido del código QR basado en la búsqueda
                $contenido = "http://11.11.1.39/inventario-serva/invent/monitores.php?busqueda=$numero_serie&enviar=";

                // Enviamos los parámetros a la función para generar el código QR
                QRcode::png($contenido, $filename, $level, $tamaño, $framSize);

                // Ruta y nombre del archivo de la imagen PNG
                $imagenArribaArea = '../img/loguito.png'; // Ajusta la ruta y el nombre de tu imagen PNG
    
                // Mostramos la información con más espacio, en color negro y con la imagen PNG encima del área
                echo '<div class="container mt-4 text-center d-flex align-items-center">';
                echo '<div class="row">';
                // Columna para el código QR
                echo '<div class="col-md-5">';
                echo '<img src="' . $dir . basename($filename) . '" class="img-fluid" />';
                echo '</div>';
                // Columna para la información
                echo '<div class="col-md-5 text-left" style="color: black; margin-top: 30px; font-size: 1.5rem; position: relative;">';
                echo '<ul class="list-group">';
                // Agregamos la imagen PNG encima del área
                echo '<img src="' . $imagenArribaArea . '" class="logo-img" />';
                echo '<li class="list-group-item" style="position: relative; z-index: 1;"><strong>Area:</strong> ' . $area . '</li>';
                echo '<li class="list-group-item"><strong>Clave:</strong> ' . $clave . '</li>';
                echo '<li class="list-group-item"><strong>Fecha de Asignacion:</strong> ' . $fechaAs . '</li>';
                echo '</ul>';
                // Botón de descarga con redirección
                echo '<div class="container mt-3 text-center d-flex align-items-center">';
                echo '<a href="etiquetapdfMonit.php?id=' . $id_equipo . '" download="equipo_info_' . $numero_serie . '.pdf" class="btn btn-primary">Descargar</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
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

    <style>
        .logo-img {
            max-width: 100%;
            height: auto;
        }
    </style>

    <script src="../js/main.js"></script>

    <script> //Bloqueo clic derecho y bloqueo para visualizar codigo fuente
        $(document).bind("contextmenu", function (e) {
            e.preventDefault();
        });

        $(document).keydown(function (e) {
            if (e.which === 123) {
                return false;
            }
            if (e.ctrlKey && (e.keyCode == 'U'.charCodeAt(0) || e.keyCode == 'u'.charCodeAt(0))) {
                return false;
            }
        });
    </script>

    <?php include '../css/footer.php' ?>

</body>

</html>