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
    <link rel="stylesheet" href="../css/dark.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <title>Sistema de Inventario</title>
    <!-- Agregar enlaces a tus archivos CSS y JS -->
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../checkList/tablaChecklist.php">
                    <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
                </a>
                <ul class="navbar-nav ml-auto"></ul>
            </div>
        </nav>
    </header><br><br>

    <div class="modo" id="modo"></div>

    <body onload="ocultarDiv(); ocultarDiv2();">

        <!-- Inicio de Formulario PC -->
        <div class="container col-8">
            <form id="formulario" method="POST" action="../checklist/database_form_checklist.php">

                <div class="form-group mb-3"><br><br>
                    <label for="fecha" class="form-label">Fecha y Hora: </label>
                    <input type="datetime-local" name="fecha" id="fecha" required>
                </div>

                <!-- <div class="container col-8"> -->
                <div class="form-group mb-3">
                    <label for="area" class="form-label" name="area">Area: </label><br>
                    <select class="form-control" id="area" name="area">
                        <option value="">Seleccione el area…</option>
                        <option value="Adquisiciones">Adquisiciones</option>
                        <option value="Administracion Cedis">Administracion Cedis</option>
                        <option value="Almacen">Almacen</option>
                        <option value="Atencion a Clientes">Atencion a Clientes</option>
                        <option value="Bodegas">Bodegas</option>
                        <option value="Cedis">Cedis</option>
                        <option value="Compras">Compras</option>
                        <option value="Contabilidad">Contabilidad</option>
                        <option value="Credito y Cobranza">Credito y Cobranza</option>
                        <option value="Devoluciones">Devoluciones</option>
                        <option value="Embarques">Embarques</option>
                        <option value="Facturacion">Facturacion</option>
                        <option value="Finanzas">Finanzas</option>
                        <option value="Flotillas">Flotillas</option>
                        <option value="Gerencia">Gerencia</option>
                        <option value="IFuel">IFuel</option>
                        <option value="Inventarios">Inventarios</option>
                        <option value="Juridico">Juridico</option>
                        <option value="Mercadotecnia">Mercadotecnia</option>
                        <option value="Modelado de Productos">Modelado de Productos</option>
                        <option value="Precios Especiales">Precios Especiales</option>
                        <option value="Recursos Humanos">Recursos Humanos</option>
                        <option value="Recepcion">Recepcion</option>
                        <option value="Recepcion de Materiales">Recepcion de Materiales</option>
                        <option value="Refaccionaria Actopan">Refaccionaria Actopan</option>
                        <option value="Refaccionaria Madero">Refaccionaria Madero</option>
                        <option value="Refaccionaria Minero">Refaccionaria Minero</option>
                        <option value="Refaccionaria Tulancingo">Refaccionaria Tulancingo</option>
                        <option value="Reabastos">Reabastos</option>
                        <option value="Servicio Medico">Servicio Medico</option>
                        <option value="Sistemas">Sistemas</option>
                        <option value="Surtido Cedis">Surtido Cedis</option>
                        <option value="Telemarketing">Telemarketing</option>
                        <option value="Vigilancia">Vigilancia</option>
                        <option value="Ventas">Ventas</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cedis" class="form-label" name="cedis">Cedis: </label><br>
                    <select class="form-control" id="cedis" name="cedis">
                        <option value="">Seleccione el Cedis…</option>
                        <option value="PACHUCA">Pachuca</option>
                        <option value="CANCUN">Cancun</option>
                        <option value="CHIHUAHUA">Chihuahua</option>
                        <option value="CULIACAN">Culiacan</option>
                        <option value="CUERNAVACA">Cuernavaca</option>
                        <option value="GUADALAJARA">Guadalajara</option>
                        <option value="HERMOSILLO">Hermosillo</option>
                        <option value="LEON">Leon</option>
                        <option value="MERIDA">Merida</option>
                        <option value="MONTERREY">Monterrey</option>
                        <option value="OAXACA">Oaxaca</option>
                        <option value="PUEBLA">Puebla</option>
                        <option value="QUERETARO">Queretaro</option>
                        <option value="SAN LUIS POTOSI">San Luis Potosi</option>
                        <option value="TUXTLA GUTIERREZ">Tuxtla Gutuerrez</option>
                        <option value="VILLAHERMOSA">Villahermosa</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="form-label">Usuario:</label>
                    <input type="text" name="usuario" class="form-control" id="usuario" aria-describedby="nameHelp"
                        placeholder="Usuario Actual" />
                </div>

                <div class="form-group">
                    <label for="equipo" class="form-label" name="equipo">Tipo de Equipo: </label><br>
                    <select class="form-control" id="equipo" name="equipo">
                        <option value="">Seleccione que tipo de equipo es…</option>
                        <option value="PC">PC</option>
                        <option value="IMPRESORA">Impresora</option>
                        <option value="LAPTOP">Laptop</option>
                    </select>
                    </label>
                </div>

                <div class="form-group mb-3">
                    <label for="clave" class="form-label">Clave:</label>
                    <input type="text" name="clave" class="form-control" id="clave" aria-describedby="nameHelp"
                        placeholder="Ingresa la clave del equipo" required />
                </div>

                <div class="form-group">
                    <label for="marca" class="form-label" name="marca">Marca:</label><br>
                    <select class="form-control" id="marca" name="marca">
                        <option value="">Seleccione la marca…</option>
                        <option value="HP">HP</option>
                        <option value="DELL">DELL</option>
                        <option value="LENOVO">LENOVO</option>
                        <option value="LG">LG</option>
                        <option value="ACER">ACER</option>
                        <option value="ASUS">ASUS</option>
                        <option value="SAMSUMG">SAMSUMG</option>
                        <option value="EPSON">EPSON</option>
                        <option value="ENSAMBLADA">ENSAMBLADA</option>
                    </select>
                    </label>
                </div>

                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="form-label">Modelo: </label>
                    <input type="text" name="modelo" class="form-control" id="modelo" aria-describedby="nameHelp"
                        placeholder="Modelo del Equipo" />
                </div><br>

                <div class="form-group">
                    <label for="serie" class="form-label">Numero de Serie: </label>
                    <input type="text" name="serie" id="serie" aria-describedby="nameHelp" placeholder="No. Serie" />
                </div><br>

                <div class="border p-5">
                    <div class="form-group mb-5">
                        <label for="RespaldoUsuario" class="form-label">Respaldo Usuario Estándar:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="RespaldoUsuario"
                                    id="RespaldoUsuario1" value="Si">
                                <label class="form-check-label" for="RespaldoUsuario1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="RespaldoUsuario"
                                    id="RespaldoUsuario2" value="No">
                                <label class="form-check-label" for="RespaldoUsuario2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="DocsEscritorio" class="form-label">Docs, Escritorio, Descargas Electronico:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="DocsEscritorio" id="DocsEscritorio1"
                                    value="Si">
                                <label class="form-check-label" for="DocsEscritorio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="DocsEscritorio" id="DocsEscritorio2"
                                    value="No">
                                <label class="form-check-label" for="DocsEscritorio2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="Credenciales" class="form-label">Credenciales de Windows:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Credenciales" id="Credenciales1"
                                    value="Si">
                                <label class="form-check-label" for="Credenciales1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Credenciales" id="Credenciales2"
                                    value="No">
                                <label class="form-check-label" for="Credenciales2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Respaldo Correo Outlook:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Correo" id="Correo1" value="Si">
                                <label class="form-check-label" for="Correo1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Correo" id="Correo2" value="No">
                                <label class="form-check-label" for="Correo2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Revisión de hardware:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="RevHardware" id="RevHardware1"
                                    value="Si">
                                <label class="form-check-label" for="RevHardware1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="RevHardware" id="RevHardware2"
                                    value="No">
                                <label class="form-check-label" for="RevHardware2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">HDD:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="HDD" id="HDD1" value="Si">
                                <label class="form-check-label" for="HDD1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="HDD" id="HDD2" value="No">
                                <label class="form-check-label" for="HDD2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Fuente de poder y MB:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Fuente" id="Fuente1" value="Si">
                                <label class="form-check-label" for="Fuente1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Fuente" id="Fuente2" value="No">
                                <label class="form-check-label" for="Fuente2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Instalar Windows 10 Pro:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="InstalarWin" id="InstalarWin1"
                                    value="Si">
                                <label class="form-check-label" for="InstalarWin1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="InstalarWin" id="InstalarWin2"
                                    value="No">
                                <label class="form-check-label" for="InstalarWin2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Crear Usuario Sistemas + Contraseña:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="UsuarioS" id="UsuarioS1" value="Si">
                                <label class="form-check-label" for="UsuarioS1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="UsuarioS" id="UsuarioS2" value="No">
                                <label class="form-check-label" for="UsuarioS2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="InstallOficce" class="form-label">Instalación y activación Office 2019:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="InstallOficce" id="InstallOficce1"
                                    value="Si">
                                <label class="form-check-label" for="InstallOficce1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="InstallOficce" id="InstallOficce2"
                                    value="No">
                                <label class="form-check-label" for="InstallOficce2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">VNC y Team:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="VNCyTeam" id="VNCyTeam1" value="Si">
                                <label class="form-check-label" for="VNCyTeam1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="VNCyTeam" id="VNCyTeam2" value="No">
                                <label class="form-check-label" for="VNCyTeam2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Chrome:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Chrome" id="Chrome1" value="Si">
                                <label class="form-check-label" for="Chrome1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Chrome" id="Chrome2" value="No">
                                <label class="form-check-label" for="Chrome2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Winrar, Adobe Reader:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="WinAdob" id="WinAdob1" value="Si">
                                <label class="form-check-label" for="WinAdob1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="WinAdob" id="WinAdob2" value="No">
                                <label class="form-check-label" for="WinAdob2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Quitar privilegios de personalización:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="NoPersonalizar" id="NoPersonalizar1"
                                    value="Si">
                                <label class="form-check-label" for="NoPersonalizar1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="NoPersonalizar" id="NoPersonalizar2"
                                    value="No">
                                <label class="form-check-label" for="NoPersonalizar2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Cobian V10:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Cobian" id="Cobian1" value="Si">
                                <label class="form-check-label" for="Cobian1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Cobian" id="Cobian2" value="No">
                                <label class="form-check-label" for="Cobian2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">USB Bloqueo:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="BloqUSB" id="BloqUSB1" value="Si">
                                <label class="form-check-label" for="BloqUSB1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="BloqUSB" id="BloqUSB2" value="No">
                                <label class="form-check-label" for="BloqUSB2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">SAP (Opcional):</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="SAP" id="SAP1" value="Si">
                                <label class="form-check-label" for="SAP1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="SAP" id="SAP2" value="No">
                                <label class="form-check-label" for="SAP2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Antivirus Eset con licencia:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Antivirus" id="Antivirus1"
                                    value="Si">
                                <label class="form-check-label" for="Antivirus1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Antivirus" id="Antivirus2"
                                    value="No">
                                <label class="form-check-label" for="Antivirus2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Cambiar nombre a equipo:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CambiarNombre" id="CambiarNombre1"
                                    value="Si">
                                <label class="form-check-label" for="CambiarNombre1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CambiarNombre" id="CambiarNombre2"
                                    value="No">
                                <label class="form-check-label" for="CambiarNombre2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Configuración Usuario Estándar:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ConfigUserE" id="ConfigUserE1"
                                    value="Si">
                                <label class="form-check-label" for="ConfigUserE1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ConfigUserE" id="ConfigUserE2"
                                    value="No">
                                <label class="form-check-label" for="ConfigUserE2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Regresar respaldo de Informacion:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="RegreInfo" id="RegreInfo1"
                                    value="Si">
                                <label class="form-check-label" for="RegreInfo1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="RegreInfo" id="RegreInfo2"
                                    value="No">
                                <label class="form-check-label" for="RegreInfo2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Configurar Correo Outlook:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ConfigCorreo" id="ConfigCorreo1"
                                    value="SI">
                                <label class="form-check-label" for="ConfigCorreo1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ConfigCorreo" id="ConfigCorreo2"
                                    value="No">
                                <label class="form-check-label" for="ConfigCorreo2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Configurar Impresora:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ConfigImpre" id="ConfigImpre1"
                                    value="Si">
                                <label class="form-check-label" for="ConfigImpre1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ConfigImpre" id="ConfigImpre2"
                                    value="No">
                                <label class="form-check-label" for="ConfigImpre2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Configurar carpeta(s) compartidas:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ConfigCarpCompar"
                                    id="ConfigCarpCompar1" value="Si">
                                <label class="form-check-label" for="ConfigCarpCompar1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ConfigCarpCompar"
                                    id="ConfigCarpCompar2" value="No">
                                <label class="form-check-label" for="ConfigCarpCompar2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">SAP Configurar Predeterminado:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="SapConfigPre" id="SapConfigPre1"
                                    value="Si">
                                <label class="form-check-label" for="SapConfigPre1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="SapConfigPre" id="SapConfigPre2"
                                    value="No">
                                <label class="form-check-label" for="SapConfigPre2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Quitar juegos:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="NoJuegos" id="NoJuegos1" value="Si">
                                <label class="form-check-label" for="NoJuegos1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="NoJuegos" id="NoJuegos2" value="No">
                                <label class="form-check-label" for="NoJuegos2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Desactivar apps en 2do plano:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Apps2doPlano" id="Apps2doPlano1"
                                    value="Si">
                                <label class="form-check-label" for="Apps2doPlano1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Apps2doPlano" id="Apps2doPlano2"
                                    value="No">
                                <label class="form-check-label" for="Apps2doPlano2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="ZonaIna" class="form-label">Desactivar zona Inalambrica:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ZonaIna" id="ZonaIna1" value="Si">
                                <label class="form-check-label" for="ZonaIna1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ZonaIna" id="ZonaIna2" value="No">
                                <label class="form-check-label" for="ZonaIna2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="Drivers" class="form-label">Instalacion y Actualizacion de Drivers:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Drivers" id="Drivers1" value="Si">
                                <label class="form-check-label" for="Drivers1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Drivers" id="Drivers2" value="No">
                                <label class="form-check-label" for="Drivers2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="PuntoRestau" class="form-label">Crear Punto de Restauracion:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="PuntoRestau" id="PuntoRestau1"
                                    value="Si">
                                <label class="form-check-label" for="PuntoRestau1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="PuntoRestau" id="PuntoRestau2"
                                    value="No">
                                <label class="form-check-label" for="PuntoRestau2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Borrar archivos temporales:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ArchiTemp" id="ArchiTemp1"
                                    value="Si">
                                <label class="form-check-label" for="ArchiTemp1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ArchiTemp" id="ArchiTemp2"
                                    value="No">
                                <label class="form-check-label" for="ArchiTemp2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="VisitaInteres" class="form-label">Limpieza de Hardware:</label><br>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LimpHardware_SiNo"
                                    id="LimpHardware_Si" value="Si">
                                <label class="form-check-label" for="LimpHardware_Si">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LimpHardware_SiNo"
                                    id="LimpHardware_No" value="No">
                                <label class="form-check-label" for="LimpHardware_No">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="Equipo" class="form-label">Equipo:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="LimpHardware_Equipo[]"
                                id="LimpHardware_PC" value="PC">
                            <label class="form-check-label" for="LimpHardware_PC">PC</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="LimpHardware_Monit" value="Monitor">
                            <label class="form-check-label" for="LimpHardware_Monitor">MONITOR</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="LimpHardware_TeclyMouse"
                                value="Teclado y Mouse">
                            <label class="form-check-label" for="LimpHardware_tecladoymouse">TECLADO Y MOUSE</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="LimpHardware_NoBreak" value="NoBreak">
                            <label class="form-check-label" for="LimpHardware_Nobreak">NOBREAK</label>
                        </div>
                    </div>


                    <div class="form-group mb-3">
                        <label for="CambioRefa" class="form-label" name="CambioRefa">Cambio de Refaccion:</label><br>
                        <select class="form-control" onchange="ocultarDiv2();" id="CambioRefa" name="CambioRefa">
                            <option value="">Seleccione Uno …</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div id="divSiMotivo2">
                        <input type="text" name="SiMotivo2" class="form-control" id="SiMotivo2"
                            aria-describedby="nameHelp" placeholder="Escriba la refaccion" />
                    </div>


                    <div class="form-group mb-3">
                        <label for="NuevaRefa" class="form-label" name="NuevaRefa">Nueva Refaccion: </label><br>
                        <select class="form-control" onchange="ocultarDiv();" id="NuevaRefa" name="NuevaRefa">
                            <option value="">Seleccione Uno …</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div id="SiMotivo">
                        <input type="text" name="SiMotivo" class="form-control" id="SiMotivo"
                            aria-describedby="nameHelp" placeholder="Escriba la refaccion" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">ID de TeamViewer:</label>
                        <input type="text" name="IdTeamViewer" class="form-control" id="IdTeamViewer"
                            aria-describedby="nameHelp" placeholder="Ingresa ID de TeamViewer" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">IP de VNC:</label>
                        <input type="text" name="IPVNC" class="form-control" id="IPVNC" aria-describedby="nameHelp"
                            placeholder="Ingresa IP de VNC" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Contraseña TeamViewer:</label>
                        <input type="text" name="ContraTeam" class="form-control" id="ContraTeam"
                            aria-describedby="nameHelp" placeholder="Ingresa contraseña de TeamViewer" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Contraseña de VNC:</label>
                        <input type="text" name="ContraVNC" class="form-control" id="ContraVNC"
                            aria-describedby="nameHelp" placeholder="Ingresa contraseña de VNC" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Constraseña Usuario Sistemas:</label>
                        <input type="text" name="ContraUsuSiste" class="form-control" id="ContraUsuSiste"
                            aria-describedby="nameHelp" placeholder="Ingresa contraseña de Usuario Sistemas" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Contraseña de Recuperacion:</label>
                        <input type="text" name="ContraRecuper" class="form-control" id="ContraRecuper"
                            aria-describedby="nameHelp" placeholder="Ingresa contraseña de Recuperacion" />
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comentarios y Observaciones</label>
                        <textarea class="form-control" name="comentarios_y_observaciones"
                            id="comentarios_y_observaciones" rows="3"
                            placeholder="Escriba Comentarios y Observaciones"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Realizo:</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nameHelp"
                            placeholder="Quien realizo" />
                    </div>


                    <!-- Boton de guardado Formulario -->
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
                    </div>
            </form>

        </div><br><br><!-- Fin de Boton -->

        <script>
            function ocultarDiv() {
                var selectBox = document.getElementById("NuevaRefa");
                var divToShow = document.getElementById("SiMotivo");

                if (selectBox.value === "Si") {
                    divToShow.style.display = "block";
                } else {
                    divToShow.style.display = "none";
                }
            }

            function ocultarDiv2() {
                var selectBox = document.getElementById("CambioRefa");
                var divToShow = document.getElementById("SiMotivo2");

                if (selectBox.value === "Si") {
                    divToShow.style.display = "block";
                } else {
                    divToShow.style.display = "none";
                }
            }
        </script>

<script src="../js/main.js"></script>


</html>


<?php include '../css/footer.php' ?>