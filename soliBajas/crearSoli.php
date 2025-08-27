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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/dark.css">
    <title>Sistema de Inventario</title>
    <style>
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

        .reason-textarea {
            width: 100%;
            height: 100px;
            resize: vertical;
            margin-top: 20px;
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
            height: 285vh;
            /* Ajustamos la altura del contenedor al 100% de la altura de la ventana */
        }
    </style>
</head>

<header>
    <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="../soliBajas/bajaEquipo.php">
                <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
</header>

<!-- <div class="modo" id="modo"></div> -->

<body style="padding-top: 70px;">

    <!-- Inicio de Formulario PC -->
    <form id="formulario" method="POST" action="../db/database_solicitud_bajas.php" enctype="multipart/form-data">

        <div class="container">
            <div class="header">
                <div class="ml-auto"><br><br><br>
                    <label for="fecha" class="form-label">Fecha y Hora: </label>
                    <input type="datetime-local" name="fecha" id="fecha" required>
                </div>
            </div><br><br>

            <!-- Fuera del encabezado -->
            <div class="titulo">
                <h2>Solicitud de baja de equipo de cómputo</h2>
            </div><br><br><br><br>

            <!-- Texto central -->
            <div class="subtitulo">
                <p>Por medio de la presente, solicito su autorización para la baja en el inventario del siguiente
                    equipo:
                </p>
            </div>

            <!-- Fuera del encabezado -->
            <div class="cuadro1">
                <h5>MOTIVO DE BAJA</h5>
                <textarea class="form-control" id="motivo" name="motivo" rows="5"
                    placeholder="Ingrese el motivo de la baja"></textarea>
            </div><br>

            
            <!-- Información del equipo -->
            <div class="especificaciones">
                <table class="table table-bordered equipment-info-table">
                    <h5>DESCRIPCIÓN DEL EQUIPO</h5>
                    <tbody>
                        <tr>
                            <th>Área</th>
                            <td><input type="text" name="area" placeholder="Área" class="form-control"></td>
                            <th>Clave</th>
                            <td><input type="text" name="clave" placeholder="Clave" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Marca</th>
                            <td><input type="text" name="marca" placeholder="Marca" class="form-control"></td>
                            <th>Modelo</th>
                            <td><input type="text" name="modelo" placeholder="Modelo" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Serie</th>
                            <td><input type="text" name="serie" placeholder="Serie" class="form-control"></td>
                            <th>Especificaciones</th>
                            <td><textarea name="especificaciones" placeholder="Especificaciones"
                                    class="form-control"></textarea></td>

                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="evidencia">
                <label for="evidencia1" class="form-label">EVIDENCIA</label>
                <input class="form-control form-control-lg" id="evidencia1" name="evidencia1" type="file">
            </div><br><br><br><br></br><br><br></br><br>

            <!-- Firmas -->
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
            </div><br></br><br><br></br><br>
            <!-- Fin de Solicitud -->

            <!-- Boton de guardado solicitud -->
            <div class="text-center">
                <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
            </div>

        </div>


    </form>

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