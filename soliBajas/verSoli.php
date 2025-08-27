<?php
session_name('inventario'); // Debe ser el mismo nombre de sesión
session_start();
// Incluir el archivo de conexión
require ("../php/connect2.php");

// Obtener el ID de la solicitud desde la URL
if (!isset($_GET['Id'])) {
    // Redirigir si no se proporciona un ID válido
    header("Location: ../soliBajas/tablaSolicitudes.php");
    exit();
}

// Obtener el ID de la solicitud
$id_solicitud = $_GET['Id'];

// Consulta SQL para obtener los detalles de la solicitud
$sql = "SELECT * FROM solicitud WHERE Id = $id_solicitud";

// Ejecutar la consulta
$resultado = mysqli_query($conn, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Asignar los resultados a la variable $solicitud
    $solicitud = mysqli_fetch_assoc($resultado);
} else {
    // Redirigir si no se encontró ninguna solicitud con el ID proporcionado
    header("Location: ../soliBajas/tablaSolicitudes.php");
    exit();
}

// Llamar a la función para generar el PDF si se solicita
if (isset($_GET['pdf'])) {
    // Incluir la biblioteca FPDF
    require ('./fpdf/fpdf.php');

    // Crear una instancia de FPDF
    $pdf = new FPDF();

    // Agregar una página al PDF
    $pdf->AddPage();

    // Establecer la fuente para el contenido
    $pdf->SetFont('Arial', '', 12);

    // Obtener las coordenadas actuales antes de agregar la información
    $currentX = $pdf->GetX();
    $currentY = $pdf->GetY();

    // Agregar marca de agua
    $pdf->Image('../img/formato.png', 0, 0, 210, 297, '', '');

    // Agregar la información sobre el equipo con estilos
    $pdf->SetFont('Arial', '', 12); // Texto en negrita para la fecha
    $pdf->MultiCell(0, 20, utf8_decode('Fecha: ' . $solicitud['fecha']), 0, 'R');

    // Agregar el subtítulo con su estilo
    $pdf->SetFont('Arial', 'B', 13); // Titulo
    $pdf->MultiCell(0, 20, utf8_decode('Solicitud de baja de equipo de cómputo'), 0, 'R');
    $pdf->SetFont('Arial', '', 10); // Subtitulo
    $pdf->MultiCell(0, 30, utf8_decode('Por medio de la presente, solicito su autorización para la baja en el inventario del siguiente equipo:'), 0, 'J');

    // Agregar el subtítulo con su estilo
    $pdf->SetFont('Arial', 'B', 12); // Motivo de Baja
    $pdf->MultiCell(0, 10, utf8_decode('MOTIVO DE BAJA'), 0, 'C');
    $pdf->SetFont('Arial', '', 10); // Restaurar la fuente regular
    $pdf->MultiCell(0, 20, utf8_decode($solicitud['motivo']), 1, 'L');

    // Agregar el subtítulo con su estilo
    $pdf->SetFont('Arial', 'B', 12); // Descripcion de Equipo
    $pdf->MultiCell(0, 20, utf8_decode('DESCRIPCIÓN DEL EQUIPO'), 0, 'C');
    $pdf->SetFont('Arial', '', 12);
    // Obtener el ancho de la página
    $pageWidth = $pdf->GetPageWidth();
    // Definir las coordenadas X iniciales para las celdas del lado izquierdo y derecho
    $leftX = 10;
    $rightX = $pageWidth / 2 + 5; // Ajustar según sea necesario
// Definir el ancho de las celdas del lado izquierdo y derecho
    $leftCellWidth = ($pageWidth / 2) - 15; // Ajustar según sea necesario
    $rightCellWidth = ($pageWidth / 2) - 15; // Ajustar según sea necesario

    // Obtener la altura de una celda
    $cellHeight = 10;
    // Celdas en el lado izquierdo (Área y Clave)
    $pdf->SetX($leftX);
    $pdf->Cell($leftCellWidth, $cellHeight, utf8_decode('Área: ' . $solicitud['area']), 1, 0, 'C');
    $pdf->SetX($rightX); // Mover a la posición inicial del lado derecho
    $pdf->Cell($rightCellWidth, $cellHeight, utf8_decode('Clave: ' . $solicitud['clave']), 1, 1, 'C');

    // Celdas en el lado izquierdo (Marca y Modelo)
    $pdf->SetX($leftX);
    $pdf->Cell($leftCellWidth, $cellHeight, utf8_decode('Marca: ' . $solicitud['marca']), 1, 0, 'C');
    $pdf->SetX($rightX); // Mover a la posición inicial del lado derecho
    $pdf->Cell($rightCellWidth, $cellHeight, utf8_decode('Modelo: ' . $solicitud['modelo']), 1, 1, 'C');

    // Celdas en el lado izquierdo (Número de Serie y Especificaciones)
    $pdf->SetX($leftX);
    $pdf->Cell($leftCellWidth, $cellHeight, utf8_decode('Número de Serie: ' . $solicitud['numero_serie']), 1, 0, 'C');
    $pdf->SetX($rightX); // Mover a la posición inicial del lado derecho
    $pdf->SetFont('Arial', '', 10); // Reducir el tamaño de la fuente
    $pdf->MultiCell($rightCellWidth, $cellHeight, utf8_decode('Especificaciones: ' . $solicitud['especificaciones']), 1, 'J');

    //Evidencia
    $pdf->SetFont('Arial', 'B', 12); // Evidencia
    $pdf->MultiCell(0, 10, utf8_decode('Evidencia'), 0, 'C');

    // Verificar si la solicitud tiene la ruta de la carpeta y el nombre de la imagen definidos
    if (isset($solicitud['evidencia1'])) {
        // Construir la ruta completa de la imagen
        $rutaImagen = '../soliBajas/img/' . $solicitud['evidencia1'];
        // Mostrar la imagen utilizando la función Image()
        $pdf->Image($rutaImagen, $pdf->GetX(), $pdf->GetY() + 5, 0, 40); // Ajusta las dimensiones de acuerdo a tu diseño
        // Añadir salto de línea después de la imagen
        $pdf->Ln(40);
    } else {
        // Si no se encontró la ruta de la carpeta o el nombre de la imagen, mostrar un mensaje de error
        $pdf->Cell(0, 10, utf8_decode('No se encontró la imagen de evidencia.'), 0, 1);
    }

    // Calcular el ancho de la página y dividirlo en dos para centrar horizontalmente
    $pageWidth = $pdf->GetPageWidth();
    $halfPageWidth = $pageWidth / 2;

    // Agregar líneas en blanco adicionales para mover los campos hacia abajo
    $pdf->Ln(5);

    // Primera columna
    $pdf->Cell($halfPageWidth, 10, utf8_decode('C. Cristian Zamora Vera'), 0, 0, 'C'); // Alineado a la izquierda
    $pdf->Cell($halfPageWidth, 10, utf8_decode('Roberto Gonzalez'), 0, 1, 'C'); // Alineado a la izquierda

    $pdf->SetFont('Arial', '', 10); // Tamaño de fuente más pequeño para los roles

    $pdf->Cell($halfPageWidth, 10, utf8_decode('Gerencia de Tecnologías'), 0, 0, 'C'); // Alineado a la izquierda
    $pdf->Cell($halfPageWidth, 10, utf8_decode('Dirección General'), 0, 1, 'C'); // Alineado a la izquierda

    $pdf->SetFont('Arial', 'I', 10); // Texto en cursiva para los roles

    $pdf->Cell($halfPageWidth, 10, utf8_decode('(Solicita)'), 0, 0, 'C'); // Alineado a la izquierda
    $pdf->Cell($halfPageWidth, 10, utf8_decode('(Autoriza)'), 0, 1, 'C'); // Alineado a la izquierda

    // Salida del PDF
    $pdf->Output('D', 'solicitud_' . $id_solicitud . '.pdf');
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Sistema de Inventario</title>
    <style>
        /* Estilos CSS */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        .titulo {
            text-align: right;
            padding: 10px;
        }

        .subtitulo {
            text-align: justify;
            padding: 10px;
        }

        .cuadro1 {
            text-align: center;
            padding: 10px;
        }

        .equipment-info-table th,
        .equipment-info-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        .especificaciones {
            text-align: center;
            padding: 10px;
        }

        .evidencia {
            text-align: center;
            padding: 10px;
        }

        /* Estilo para la marca de agua */
        .container {
            position: relative;
            background-image: url('../img/formato.png');
            background-repeat: no-repeat;
            background-size: 100% auto;
            opacity: 0.9;
            min-height: 100vh;
            /* Ajustamos la altura del contenedor al 100% de la altura de la ventana */
            padding-top: 20px;
            /* Espaciado en la parte superior */
        }
    </style>
</head>

<header>
    <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="../soliBajas/tablaSolicitudes.php">
                <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
</header>

<body style="padding-top: 70px;">
    <div class="container">
        <div class="header">
            <div class="ml-auto">
                <label for="fecha" class="form-label">Fecha y Hora: </label>
                <input type="datetime-local" name="fecha" id="fecha" required value="<?php echo $solicitud['fecha']; ?>"
                    readonly>
            </div>
        </div><br><br>

        <div class="titulo">
            <h2>Solicitud de baja de equipo de cómputo</h2>
        </div><br><br><br><br>

        <div class="subtitulo">
            <p>Por medio de la presente, solicito su autorización para la baja en el inventario del siguiente equipo:
            </p>
        </div>

        <div class="cuadro1">
            <h5>MOTIVO DE BAJA</h5>
            <textarea class="form-control" id="motivo" name="motivo" rows="5" placeholder="Ingrese el motivo de la baja"
                readonly><?php echo $solicitud['motivo']; ?></textarea>
        </div><br>

        <div class="especificaciones">
            <table class="table table-bordered equipment-info-table">
                <h5>DESCRIPCIÓN DEL EQUIPO</h5>
                <tbody>
                    <tr>
                        <th>Área</th>
                        <td><input type="text" name="area" placeholder="Área" class="form-control"
                                value="<?php echo $solicitud['area']; ?>" readonly></td>
                        <th>Clave</th>
                        <td><input type="text" name="clave" placeholder="Clave" class="form-control"
                                value="<?php echo $solicitud['clave']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <th>Marca</th>
                        <td><input type="text" name="marca" placeholder="Marca" class="form-control"
                                value="<?php echo $solicitud['marca']; ?>" readonly></td>
                        <th>Modelo</th>
                        <td><input type="text" name="modelo" placeholder="Modelo" class="form-control"
                                value="<?php echo $solicitud['modelo']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <th>Serie</th>
                        <td><input type="text" name="serie" placeholder="Serie" class="form-control"
                                value="<?php echo $solicitud['numero_serie']; ?>" readonly></td>
                        <th>Especificaciones</th>
                        <td>
                            <textarea name="especificaciones" placeholder="Especificaciones" class="form-control"
                                readonly><?php echo $solicitud['especificaciones']; ?></textarea>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>

        <div class="evidencia">
            <label for="evidencia1" class="form-label">EVIDENCIA</label><br>
            <?php
            // Verificar si la solicitud tiene la ruta de la carpeta y el nombre de la imagen definidos
            if (isset($solicitud['evidencia1'])) {
                // Construir la ruta completa de la imagen
                $rutaImagen = '../soliBajas/img/' . $solicitud['evidencia1'];
                // Mostrar la imagen utilizando la etiqueta <img>
                echo '<img src="' . $rutaImagen . '" alt="Evidencia" class="img-fluid">';
            } else {
                // Si no se encontró la ruta de la carpeta o el nombre de la imagen, mostrar un mensaje de error
                echo 'No se encontró la imagen de evidencia.';
            }
            ?>
        </div>
        <br><br><br><br>

        <div class="row">
            <div class="col">
                <hr>
                <p class="text-center"><strong>C. Cristian Zamora Vera</strong></p>
                <p class="text-center">Gerencia de Tecnologías</p>
                <p class="text-center"><strong>Solicita</strong></p>
            </div>
            <div class="col">
                <hr>
                <p class="text-center"><strong>Roberto Gonzalez</strong></p>
                <p class="text-center">Dirección General</p>
                <p class="text-center"><strong>Autoriza</strong></p>
            </div>
        </div>
    </div>

    <!-- Botón para generar PDF -->
    <div class="text-center">
        <a href="?Id=<?php echo $id_solicitud; ?>&pdf=1" class="btn btn-primary">Generar PDF</a>
    </div><br><br>
</body>

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

</html>