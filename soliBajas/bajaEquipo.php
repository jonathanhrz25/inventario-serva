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
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Sistema de Inventario</title>
    <!-- Agregar enlaces a tus archivos CSS y JS -->

</head>


<header>
    <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important; text-align: left;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="../php/principal.php">
                <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
</header>

<div class="modo" id="modo"></div>

<body style="padding-top: 75px;">
    <h1 class="display-6">Solicitudes - Baja de Equipos de Computo</h1>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <a href="./crearSoli.php" class="btn btn-outline-primary btn-lg btn-block">
                    Crear Solicitud
                </a>
            </div>
            <div class="col-md-6 mx-auto">
                <a href="./tablaSolicitudes.php" class="btn btn-outline-primary btn-lg btn-block">
                    Ver Solicitudes
                </a>
            </div>
        </div>
    </div>


</body>

<script src="../js/main.js"></script>

<!-- <script> //Bloqueo clic derecho y bloqueo para visualizar codigo fuente
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
</script> -->

<?php include '../css/footer.php' ?>

</html>