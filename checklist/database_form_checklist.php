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
    $serie = $_POST['serie'];
    $RespaldoUsuario = $_POST['RespaldoUsuario'];
    $DocsEscritorio = $_POST['DocsEscritorio'];
    $Credenciales = $_POST['Credenciales'];
    $Correo = $_POST['Correo'];
    $RevHardware = $_POST['RevHardware'];
    $HDD = $_POST['HDD'];
    $Fuente = $_POST['Fuente'];
    $InstalarWin = $_POST['InstalarWin'];
    $UsuarioS = $_POST['UsuarioS'];
    $PuntoRest = $_POST['PuntoRest'];
    $InstallOficce = $_POST['InstallOficce'];
    $VNCyTeam = $_POST['VNCyTeam'];
    $Chrome = $_POST['Chrome'];
    $WinAdob = $_POST['WinAdob'];
    $NoPersonalizar = $_POST['NoPersonalizar'];
    $Cobian = $_POST['Cobian'];
    $BloqUSB = $_POST['BloqUSB'];
    $SAP = $_POST['SAP'];
    $Antivirus = $_POST['Antivirus'];
    $CambiarNombre = $_POST['CambiarNombre'];
    $ConfigUserE = $_POST['ConfigUserE'];
    $RegreInfo = $_POST['RegreInfo'];
    $ConfigCorreo = $_POST['ConfigCorreo'];
    $ConfigImpre = $_POST['ConfigImpre'];
    $ConfigCarpCompar = $_POST['ConfigCarpCompar'];
    $SapConfigPre = $_POST['SapConfigPre'];
    $NoJuegos = $_POST['NoJuegos'];
    $Apps2doPlano = $_POST['Apps2doPlano'];
    $ZonaIna = $_POST['ZonaIna'];
    $Drivers = $_POST['Drivers'];
    $PuntoRestau = $_POST['PuntoRestau'];
    $ArchiTemp = $_POST['ArchiTemp'];
    $LimpHardware_SiNo = $_POST['LimpHardware_SiNo'];
    $equiposSeleccionados = isset($_POST['LimpHardware_Equipo']) ? $_POST['LimpHardware_Equipo'] : [];
    $CambioRefa = $_POST['CambioRefa'];
    $SiMotivo2 = isset($_POST['SiMotivo2']) ? $_POST['SiMotivo2'] : '';
    $NuevaRefa = $_POST['NuevaRefa'];
    $SiMotivo = isset($_POST['SiMotivo']) ? $_POST['SiMotivo'] : '';
    $IdTeamViewer = $_POST['IdTeamViewer'];
    $IPVNC = $_POST['IPVNC'];
    $ContraTeam = $_POST['ContraTeam'];
    $ContraVNC = $_POST['ContraVNC'];
    $ContraUsuSiste = $_POST['ContraUsuSiste'];
    $ContraRecuper = $_POST['ContraRecuper'];
    $comentarios_observaciones = $_POST['comentarios_y_observaciones'];
    $nombre = $_POST['nombre'];
    $fallas = $_POST['fallas'];
    $remover = $_POST['remover'];
    $rev_componentes = $_POST['rev_componentes'];
    $componentes = $_POST['componentes'];
    $mantenimiento = $_POST['mantenimiento'];
    $porcentaje = $_POST['porcentaje'];

    // Insertar datos en la tabla 'form_checklist'
    $sql = "INSERT INTO form_checklist 
(fecha, area, cedis, usuario, equipo, clave, marca, modelo, numero_serie, RespaldoUsuario, DocsEscritorio, Credenciales, Correo, 
RevHardware, HDD, Fuente, InstalarWin, UsuarioS, InstallOficce, VNCyTeam, Chrome, WinAdob, NoPersonalizar, Cobian, BloqUSB, 
SAP, Antivirus, CambiarNombre, ConfigUserE, RegreInfo, ConfigCorreo, ConfigImpre, ConfigCarpCompar, SapConfigPre, NoJuegos, Apps2doPlano, ZonaIna, Drivers, PuntoRestau, ArchiTemp, 
LimpHardware_SiNo, LimpHardware_Equipo, CambioRefa, SiMotivo2, NuevaRefa, SiMotivo, IdTeamViewer, IPVNC, ContraTeam, ContraVNC, ContraUsuSiste, ContraRecuper, comentarios_observaciones, nombre, ultimo_usuario, 
fallas, remover, rev_componentes, componentes, porcentaje) 
VALUES 
('$fecha', '$area', '$cedis', '$usuario', '$equipo', '$clave', '$marca', '$modelo', '$serie', '$RespaldoUsuario', '$DocsEscritorio', 
'$Credenciales', '$Correo', '$RevHardware', '$HDD', '$Fuente', '$InstalarWin', '$UsuarioS', '$InstallOficce', '$VNCyTeam', '$Chrome', 
'$WinAdob', '$NoPersonalizar', '$Cobian', '$BloqUSB', '$SAP', '$Antivirus', '$CambiarNombre', '$ConfigUserE', '$RegreInfo', '$ConfigCorreo', 
'$ConfigImpre', '$ConfigCarpCompar', '$SapConfigPre', '$NoJuegos', '$Apps2doPlano', '$ZonaIna', '$Drivers', '$PuntoRestau', '$ArchiTemp', '$LimpHardware_SiNo', '$equiposTexto', '$CambioRefa', 
'$SiMotivo2', '$NuevaRefa', '$SiMotivo', '$IdTeamViewer', '$IPVNC', '$ContraTeam', '$ContraVNC', '$ContraUsuSiste', '$ContraRecuper', '$comentarios_observaciones', '$nombre', '$ultimo_usuario', 
'$fallas', '$remover', '$rev_componentes', '$componentes', '$porcentaje')";

    $insertar = mysqli_query($conn, $sql);

    if ($insertar) {
        echo "<script> alert('Sus datos han sido registrados');
              window.location ='../checklist/tablaChecklist.php';</script>";
    } else {
        echo "<script> alert('ERROR: " . mysqli_error($conn) . "');
              window.location ='../checklist/form_checklist.php';</script>";
    }

} else {
    // Si no es una solicitud POST, redirige o muestra un mensaje de error según sea necesario
    header("Location: ../checklist/tablaChecklist.php");
    exit();
}
?>