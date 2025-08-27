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
    <link rel="stylesheet" href="../css/dark.css">
    <title>Sistema de Inventario</title>
    <!-- Agregar enlaces a tus archivos CSS y JS -->
</head>

<header>
    <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="../checkList/tablaChecklist.php">
                <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
            </a>
            <ul class="navbar-nav ml-auto"></ul>
        </div>
    </nav>
</header>

<div class="modo" id="modo"></div>

<body style="padding-top: 40px;">

    <div class="containerCheck mt-5">
        <?php
        require("../php/connect2.php");

        // Verificar si se proporcionó un parámetro de ID
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Consulta SQL para obtener los detalles del elemento seleccionado
            $sql = "SELECT * FROM form_checklist WHERE Id = $id";

            // Ejecutar la consulta
            $result = mysqli_query($conn, $sql);

            // Obtener los detalles
            $detalles = mysqli_fetch_assoc($result);

            // Campos a mostrar si el equipo es impresora
            $camposImpresora = array(
                'fecha' => 'Fecha y Hora',
                'area' => 'Area',
                'cedis' => 'Cedis',
                'usuario' => 'Usuario',
                'equipo' => 'Tipo de Equipo',
                'clave' => 'Clave',
                'marca' => 'Marca',
                'modelo' => 'Modelo',
                'numero_serie' => 'Numero de Serie',
                'comentarios_observaciones' => 'Comentarios y Observaciones',
                'fallas' => '¿EL EQUIPO PRESENTÓ FALLAS?',
                'remover' => 'REMOVER POLVO Y RESTOS DE PAPEL DEL INTERIOR',
                'rev_componentes' => 'REVISIÓN DE COMPONENTES',
                'componentes' => 'CAMBIO DE COMPONENTES',
                'mantenimiento' => 'TIPO DE MANTENIMIENTO',
                'porcentaje' => 'PORCENTAJE DE EFICIENCIA',
                'nombre' => 'Realizo'
            );

            // Mapeo de nombres de campos
            $nombreCampos = array(
                'fecha' => 'Fecha y Hora',
                'area' => 'Area',
                'cedis' => 'Cedis',
                'usuario' => 'Usuario',
                'equipo' => 'Tipo de Equipo',
                'clave' => 'Clave',
                'marca' => 'Marca',
                'modelo' => 'Modelo',
                'numero_serie' => 'Numero de Serie',
                'RespaldoUsuario' => 'Respaldo Usuario Estándar',
                'DocsEscritorio' => 'Docs, Escritorio, Descargas Electronico',
                'Credenciales' => 'Credenciales de Windows',
                'Correo' => 'Correo Outlook',
                'RevHardware' => 'Revisión de hardware',
                'HDD' => 'HDD',
                'Fuente' => 'Fuente de poder y MB',
                'InstalarWin' => 'Instalar Windows 10 Pro',
                'UsuarioS' => 'Crear Usuario Sistemas + Contraseña',
                'InstallOficce' => 'Instalación y activación Office 2019',
                'VNCyTeam' => 'VNC y Team',
                'Chrome' => 'Chrome',
                'WinAdob' => 'Winrar, Adobe Reader',
                'NoPersonalizar' => 'Quitar privilegios de personalización',
                'Cobian' => 'Cobian V10',
                'BloqUSB' => 'USB Bloqueo',
                'SAP' => 'SAP (Opcional)',
                'Antivirus' => 'Antivirus Eset con licencia',
                'CambiarNombre' => 'Cambiar nombre a equipo',
                'ConfigUserE' => 'Configuración Usuario Estándar',
                'RegreInfo' => 'Regresar respaldo de Informacion',
                'ConfigCorreo' => 'Configurar Correo Outlook',
                'ConfigImpre' => 'Configurar Impresora',
                'ConfigCarpCompar' => 'Configurar carpeta(s) compartidas',
                'SapConfigPre' => 'SAP Configurar Predeterminado',
                'NoJuegos' => 'Quitar juegos',
                'Apps2doPlano' => 'Desactivar apps en 2do plano',
                'ZonaIna' => 'Desactivar zona Inalambrica',
                'Drivers' => 'Instalacion y Actualizacion de Drivers',
                'PuntoRestau' => 'Crear Punto de Restauracion',
                'ArchiTemp' => 'Borrar archivos temporales',
                'LimpHardware_SiNo' => 'Limpieza de Hardware',
                'LimpHardware_Equipo' => 'Equipo',
                'CambioRefa' => 'Cambio de Refaccion',
                'SiMotivo2' => 'Motivo',
                'NuevaRefa' => 'Nueva Refaccion',
                'SiMotivo' => 'Motivo',
                'IdTeamViewer' => 'ID de TeamViewer',
                'IPVNC' => 'IP de VNC',
                'ContraTeam' => 'Contraseña TeamViewer',
                'ContraVNC' => 'Contraseña de VNC',
                'ContraUsuSiste' => 'Constraseña Usuario Sistemas',
                'ContraRecuper' => 'Contraseña de Recuperacion',
                'comentarios_observaciones' => 'Comentarios y Observaciones',
                'nombre' => 'Realizo'
            );

            echo "<div class='container d-flex justify-content-center align-items-center'>";
            echo "  <h1 class='display-4 text-center'>Detalles del Checklist</h1>";
            echo "</div>";

            echo "  <div class='container d-flex justify-content-center align-items-center'>";
            echo "    <div class='card col-md-8'>";
            echo "      <div class='card-body'>";

            // Si el equipo es una impresora, mostrar solo los campos específicos
            if (isset($detalles['equipo']) && $detalles['equipo'] === 'IMPRESORA') {
                foreach ($camposImpresora as $campoBD => $nombreMostrar) {
                    if (isset($detalles[$campoBD]) && $detalles[$campoBD] !== null) {
                        echo "<div class='form-group'>";
                        echo "<label class='font-weight-bold'>" . $nombreMostrar . ":</label>";
                        echo "<p class='form-control-static'>" . $detalles[$campoBD] . "</p>";
                        echo "</div>";
                    }
                }
            } else {
                // Mostrar todos los campos si no es impresora
                foreach ($nombreCampos as $campoBD => $nombreMostrar) {
                    if (isset($detalles[$campoBD]) && $detalles[$campoBD] !== null) {
                        echo "<div class='form-group'>";
                        echo "<label class='font-weight-bold'>" . $nombreMostrar . ":</label>";
                        echo "<p class='form-control-static'>" . $detalles[$campoBD] . "</p>";
                        echo "</div>";
                    }
                }
            }

            echo "</div>";
            echo "</div>";

        } else {
            // Si no se proporcionó un ID válido, redirigir a la página principal o mostrar un mensaje de error
            header("Location: principal.php");
            exit();
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </div><br><br><br>

    <script src="../js/main.js"></script>

    <?php include '../css/footer.php' ?>
</body>

</html>