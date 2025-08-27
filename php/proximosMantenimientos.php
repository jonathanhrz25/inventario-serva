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
    <title>Sistema de Inventario</title>
</head>


<header>
    <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #333333!important;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="../php/principal.php">
                <img src="../img/icono2.png" alt="" height="35" class="d-inline-block align-text-top">
                Sistema de Inventario
            </a>
            <ul class="navbar-nav ml-auto">
            </ul>
        </div>
    </nav>
</header><br><br><br>

<div style="height: 50px;"></div>


<body>

    <?php
    function generarCalendario($mes, $anio)
    {
        // Obtener el primer día del mes
        $primerDia = mktime(0, 0, 0, $mes, 1, $anio);

        // Número de días en el mes
        $diasEnMes = date('t', $primerDia);

        // Día de la semana del primer día del mes (0 = Domingo, 1 = Lunes, ..., 6 = Sábado)
        $diaInicio = date('w', $primerDia);

        // Día actual
        $diaActual = date('j');

        // Crear una tabla para mostrar el calendario utilizando Bootstrap
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo '<th colspan="7" class="text-center">' . date('F Y', $primerDia) . '</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<th scope="col" class="text-light">Domingo</th>';
        echo '<th scope="col">Lunes</th>';
        echo '<th scope="col">Martes</th>';
        echo '<th scope="col">Miércoles</th>';
        echo '<th scope="col">Jueves</th>';
        echo '<th scope="col">Viernes</th>';
        echo '<th scope="col">Sábado</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Llenar los espacios en blanco antes del primer día del mes
        echo '<tr>';
        for ($d = 0; $d < $diaInicio; $d++) {
            echo '<td></td>';
        }

        // Llenar los días del mes
        for ($dia = 1; $dia <= $diasEnMes; $dia++) {
            echo '<td';
            if ($dia == $diaActual) {
                echo ' class="table-primary"'; // Resaltar el día actual
            } elseif (($dia + $diaInicio - 1) % 7 === 0) {
                echo ' class="table-danger"'; // Sombrear los domingos
            }
            echo '>';
            $identificador = $dia . '-' . $mes . '-' . $anio;
            echo '<a href="#" class="date-link btn btn-info" data-toggle="modal" data-target="#infoModal" data-fecha="' . $dia . '-' . $mes . '-' . $anio . '" data-identificador="' . $identificador . '">' . $dia . '</a>';
            // También puedes incluir un formulario aquí para asignar información
            echo '<form action="../calendario/asignar_info.php" method="post">';
            echo '<input type="hidden" name="fecha" value="' . $dia . '-' . $mes . '-' . $anio . '">';
            // Botón para visualizar la información guardada
            echo '<div id="infoContainer"></div>';
            echo '<button type="button" class="btn btn-link" onclick="verInformacion(\'' . $dia . '-' . $mes . '-' . $anio . '\')">Ver Info</button>';
            /* echo '<button class="btn btn-link view-info-btn" data-fecha="' . $identificador . '">Ver Info</button>'; */
            echo '</form>';
            echo '</td>';
            // Si es sábado (día de la semana = 6), cerrar la fila y comenzar una nueva
            if (($dia + $diaInicio) % 7 === 0) {
                echo '</tr><tr>';
            }
        }

        // Llenar los espacios en blanco después del último día del mes
        while (($dia + $diaInicio - 1) % 7 !== 0) {
            echo '<td></td>';
            $dia++;
        }

        echo '</tr>';
        echo '</tbody>';
        echo '</table>';

        // Agregar el modal al final del cuerpo del documento
        echo '<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">';
        echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="infoModalLabel">Añadir Mantenimiento</h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        // Puedes agregar un formulario u otro contenido aquí para recopilar información
        echo '<form action="../calendario/asignar_info.php" method="post" id="infoForm">';
        echo '<input type="hidden" name="fecha" id="modalFecha" value="">';
        echo '<input type="hidden" name="identificador" id="identificador" value="">';
        echo '<label for="informacion">Información:</label>';
        echo '<textarea name="informacion" id="informacion" rows="4" class="form-control"></textarea>';
        echo '<br>';
        echo '<button type="submit" class="btn btn-primary" id="guardarInfoBtn">Guardar</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    // Obtener el mes y año actual si no se proporcionan
    $mes = isset($_GET['mes']) ? $_GET['mes'] : date('n');
    $anio = isset($_GET['anio']) ? $_GET['anio'] : date('Y');

    // Mostrar el calendario para el mes y año especificados
    generarCalendario($mes, $anio);
    ?>

    <script>
        $(document).ready(function () {
            // Manejar clic en enlace de fecha
            $('.date-link').on('click', function () {
                // Obtener la fecha y actualizar el campo oculto en el formulario del modal
                var fecha = $(this).data('fecha');
                $('#modalFecha').val(fecha);

                // Obtener el identificador único basado en la fecha
                var identificador = $(this).data('identificador');

                // Limpiar el contenido anterior y mostrar la nueva información en el recuadro blanco
                $('#infoContainer').empty();

                // Hacer la solicitud AJAX para obtener la información específica
                $.ajax({
                    type: 'POST',
                    url: '../calendario/obtener_info.php',
                    data: { identificador: identificador },
                    success: function (data) {
                        $('#infoContainer').html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error al obtener información: " + error);
                    }
                });

                // Abrir el modal
                $('#infoModal').modal('show');
            });

            // Manejar evento de envío del formulario del modal
            $('#infoForm').on('submit', function () {
                // Agregar lógica adicional si es necesario
                alert('Información guardada exitosamente.');
            });
        });
    </script>

    <script>
        function verInformacion(fecha) {
            // Hacer una solicitud AJAX para obtener la información
            $.ajax({
                type: 'POST',
                url: '../calendario/obtener_info.php', // Archivo que obtiene la información
                data: { fecha: fecha },
                success: function (data) {
                    // Mostrar la información en el modal
                    $('#infoModal').modal('show');
                    $('#modalFecha').val(fecha);
                    $('#informacion').val(data); // Asigna la información obtenida del servidor al textarea
                },
                error: function () {
                    alert('Error al obtener la información.');
                }
            });
        }
    </script>

</body><br><br>

</html>