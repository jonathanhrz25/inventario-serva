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
    <title>Sistema de Inventario</title>
    <!-- Agregar enlaces a tus archivos CSS y JS -->
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../invent/laptops.php">
                    <img src="../img/icono2.png" alt="" height="35" class="d-inline-block align-text-top">
                    Sistema de Inventario
                </a>
                <ul class="navbar-nav ml-auto"></ul>
            </div>
        </nav>
    </header>

    <div class="modo" id="modo"></div>

    <!-- Inicio de Formulario Laptops -->
    <div class="container col-8">
        <form id="formulario" method="POST" action="../db/database_form_laptops.php">

            <div class="form-group mb-3"><br><br><br><br>
                <label for="clave" class="form-label">Clave:</label>
                <input type="text" name="clave" class="form-control" id="clave" aria-describedby="nameHelp"
                    placeholder="Clave del equipo" required readonly />
            </div>

            <div class="form-group">
                <label for="cedis" class="form-label" name="cedis">Cedis: </label><br>
                <select class="form-control" id="cedis" name="cedis" onchange="actualizarClave()">
                    <option value="">Seleccione el Cedis de la PC…</option>
                    <option value="PA PACHUCA">Pachuca</option>
                    <option value="CA CANCUN">Cancun</option>
                    <option value="CH CHIHUAHUA">Chihuahua</option>
                    <option value="CL CULIACAN">Culiacan</option>
                    <option value="CV CUERNAVACA">Cuernavaca</option>
                    <option value="GD GUADALAJARA">Guadalajara</option>
                    <option value="HR HERMOSILLO">Hermosillo</option>
                    <option value="LE LEON">Leon</option>
                    <option value="MR MERIDA">Merida</option>
                    <option value="MT MONTERREY">Monterrey</option>
                    <option value="OX OAXACA">Oaxaca</option>
                    <option value="PU PUEBLA">Puebla</option>
                    <option value="QR QUERETARO">Queretaro</option>
                    <option value="SL SAN LUIS POTOSI">San Luis Potosi</option>
                    <option value="TG TUXTLA GUTIERREZ">Tuxtla Gutuerrez</option>
                    <option value="VH VILLAHERMOSA">Villahermosa</option>
                </select>
            </div>

            <div class="form-group">
                <label for="equipo" class="form-label" name="equipo">Tipo de Equipo: </label><br>
                <select class="form-control" id="equipo" name="equipo" onchange="actualizarClave()">
                    <option value="">Seleccione que tipo de equipo es…</option>
                    <option value="PC ESCRITORIO">PC ESCRITORIO</option>
                    <option value="MONITOR">Monitor</option>
                    <option value="IMPRESORA">Impresora</option>
                    <option value="HH HAND HELD">Hand Held</option>
                    <option value="PANTALLA">Pantalla</option>
                    <option value="LAPTOP">Laptop</option>
                    <option value="NB NOBREAK">NoBreak</option>
                    <option value="SA SWITCH O ACCESS POINT">Switch o Access Point</option>
                    <option value="DD DISCO DURO EXTERNO">Disco duro externo</option>
                </select>
                </label>
            </div>

            <div class="form-group mb-3">
                <label for="area" class="form-label" name="area">Area: </label><br>
                <select class="form-control" id="area" name="area" onchange="actualizarClave()">
                    <option value="">Seleccione el area de la PC…</option>
                    <option value="AD Adquisiciones">Adquisiciones</option>
                    <option value="CD ADMINISTRACION CEDIS">ADMINISTRACION CEDIS</option>
                    <option value="AL Almacen">Almacen</option>
                    <option value="AC Centro de Atencion al Clientes">Centro de Atención al Cliente</option>
                    <option value="AS ASISTENTE DE DIRECCION">Asistente de Direccion</option>
                    <option value="BO Bodegas">Bodegas</option>
                    <option value="CM Compras">Compras</option>
                    <option value="CO Contabilidad">Contabilidad</option>
                    <option value="CC Credito y Cobranza">Credito y Cobranza</option>
                    <option value="DE Devoluciones">Devoluciones</option>
                    <option value="EM Embarques">Embarques</option>
                    <option value="FC Facturacion">Facturacion</option>
                    <option value="FI Finanzas">Finanzas</option>
                    <option value="FL Flotillas">Flotillas</option>
                    <option value="GC Gerencia">Gerencia</option>
                    <option value="IF IFuel">IFuel</option>
                    <option value="IN Inventarios">Inventarios</option>
                    <option value="JR Juridico">Juridico</option>
                    <option value="ME Mercadotecnia">Mercadotecnia</option>
                    <option value="MP Modelado de Productos">Modelado de Productos</option>
                    <option value="PE Precios Especiales">Precios Especiales</option>
                    <option value="RH Recursos Humanos">Recursos Humanos</option>
                    <option value="RE Recepcion">Recepcion</option>
                    <option value="RM Recepcion de Materiales">Recepcion de Materiales</option>
                    <option value="AT Refaccionaria Actopan">Refaccionaria Actopan</option>
                    <option value="MA Refaccionaria Madero">Refaccionaria Madero</option>
                    <option value="MI Refaccionaria Minero">Refaccionaria Minero</option>
                    <option value="TU Refaccionaria Tulancingo">Refaccionaria Tulancingo</option>
                    <option value="RA Reabastos">Reabastos</option>
                    <option value="SM Servicio Medico">Servicio Medico</option>
                    <option value="SI Sistemas">Sistemas</option>
                    <option value="SC Surtido Cedis">Surtido Cedis</option>
                    <option value="TL Telemarketing">Telemarketing</option>
                    <option value="VI Vigilancia">Vigilancia</option>
                    <option value="VT VENTAS">Ventas</option>
                </select>
            </div>

            <div class="form-group">
                <label for="serie" class="form-label">Numero de Serie: </label>
                <input type="text" name="serie" id="serie" aria-describedby="nameHelp" placeholder="No. Serie" />
            </div>

            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="form-label">Porcentaje de Eficiencia del equipo: </label>
                <input type="text" name="estado" class="form-control" id="estado" aria-describedby="nameHelp"
                    placeholder="Estado del Equipo" />
            </div>

            <div class="form-group">
                <label for="proceso" class="form-label" name="proceso">Procedimiento: </label><br>
                <select class="form-control" id="proceso" name="proceso">
                    <option value="">Seleccione el proceso de la laptop</option>
                    <option value="">Sin Procedimiento</option>
                    <option value="Mantenimiento">Para mantenimiento</option>
                    <option value="Reparacion">En reparación</option>
                </select>
                </label>
            </div>

            <div class="form-group">
                <label for="marca" class="form-label" name="marca">Marca:</label><br>
                <select class="form-control" id="marca" name="marca">
                    <option value="">Seleccione la marca de la PC…</option>
                    <option value="HP">HP</option>
                    <option value="DELL">DELL</option>
                    <option value="LENOVO">LENOVO</option>
                    <option value="LG">LG</option>
                    <option value="ACER">ACER</option>
                    <option value="ASUS">ASUS</option>
                    <option value="SAMSUMG">SAMSUMG</option>
                    <option value="ENSAMBLADA">ENSAMBLADA</option>
                </select>
                </label>
            </div>

            <div class="form-group mb-3">
                <label for="modelo" class="form-label">Modelo: </label>
                <input type="text" name="modelo" class="form-control" id="modelo" aria-describedby="nameHelp"
                    placeholder="Modelo del Equipo" />
            </div>

            <div class="form-group mb-3">
                <label for="especificaciones" class="form-label">Especificaciones: </label>
                <input type="text" name="especificaciones" class="form-control" id="especificaciones"
                    aria-describedby="nameHelp" placeholder="Especificaciones del Equipo" />
            </div>

            <div class="form-group mb-3">
                <label for="usuario" class="form-label">Usuario: </label>
                <input type="text" name="usuario" class="form-control" id="usuario" aria-describedby="nameHelp"
                    placeholder="Usuario" />
            </div>

            <div class="form-group">
                <label for="responsiva" class="form-label" name="responsiva">Responsiva: </label><br>
                <select class="form-control" id="responsiva" name="responsiva">
                    <option value="">Seleccione si la laptop cuenta con una responsiva…</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                </label>
            </div>

            <div class="form-group"><br>
                <label for="fechaCo" class="form-label">Fecha de Compra de Equipo: </label>
                <input type="datetime-local" name="fechaCo" id="fechaCo">
            </div>

            <div class="form-group">
                <label for="fechaAs" class="form-label">Fecha de Asignacion del Equipo: </label>
                <input type="datetime-local" name="fechaAs" id="fechaAs">
            </div>

            <div class="form-group">
                <label for="comentarios_y_observaciones">Comentarios y Observaciones</label>
                <textarea class="form-control" name="comentarios_y_observaciones" id="comentarios_y_observaciones"
                    rows="3" placeholder="Escriba Comentarios y Observaciones"></textarea>
            </div>

            <!-- Fin de Formulario Laptop -->

            <!-- Boton de guardado Formulario -->
            <div class="text-center">
                <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
            </div>
        </form>
    </div><br><br><!-- Fin de Boton -->


</body>

<script src="../js/main.js"></script>

<script>
    // Modifica esta función para manejar los eventos de cambio de los elementos select
    function actualizarClave() {
        // Obtener valores seleccionados
        var cedi = document.getElementById("cedis").value;
        var equipo = document.getElementById("equipo").value;
        var area = document.getElementById("area").value;

        // Hacer la solicitud AJAX para obtener la nueva clave del servidor
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/generarClave.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                try {
                    // Parsear la respuesta como JSON
                    var respuesta = JSON.parse(xhr.responseText);

                    // Actualizar los campos con la respuesta del servidor
                    document.getElementById("clave").value = respuesta.nuevaClave;
                    document.getElementById("numero_identificacion").value = respuesta.numeroConsecutivo;
                } catch (error) {
                    console.error("Error al parsear la respuesta JSON:", error);
                }
            }
        };

        // Codificar los parámetros de la solicitud correctamente
        var params = "cedi=" + encodeURIComponent(cedi) + "&equipo=" + encodeURIComponent(equipo) + "&area=" + encodeURIComponent(area);

        // Enviar la solicitud con los parámetros codificados
        xhr.send(params);
    }
</script>

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

</html>