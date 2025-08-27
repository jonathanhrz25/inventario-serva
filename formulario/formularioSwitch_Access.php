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
                <a class="navbar-brand text-white" href="../invent/switchesyaccessp.php">
                    <img src="../img/icono2.png" alt="" height="35" class="d-inline-block align-text-top">
                    Sistema de Inventario
                </a>
                <ul class="navbar-nav ml-auto">
                </ul>
            </div>
        </nav>
    </header><br><br><br><br>

    <div class="modo" id="modo"></div>

    <!-- Inicio de Formulario NoBreak -->
    <div class="container col-8 ">
        <form id="formulario" method="POST" action="../db/database_form_SWyAcc.php">

            <div class="form-group mb-3">
                <label for="clave" class="form-label">Clave:</label>
                <input type="text" name="clave" class="form-control" id="clave" aria-describedby="nameHelp"
                    placeholder="Clave del equipo" required disabled />
            </div>

            <div class="form-group">
                <label for="cedi" class="form-label" name="cedi">Cedis: </label><br>
                <select class="form-control" id="cedi" name="cedi" onchange="actualizarClave()">
                    <option value="">Seleccione el Cedis…</option>
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
                <label for="dispositivo" class="form-label" name="tipodispositivo">Tipo de Dispositivo: </label><br>
                <select class="form-control" id="dispositivo" name="dispositivo" onchange="actualizarClave()">
                    <option value="">Seleccione el dispositivo…</option>
                    <option value="SW Switch">Switch</option>
                    <option value="AP Access Point">Access Point</option>
                </select>
                </label>
            </div>

            <div class="form-group mb-3">
                <label for="area" class="form-label" name="area">Area: </label><br>
                <select class="form-control" id="area" name="area" onchange="actualizarClave()">
                    <option value="">Seleccione el area de la PC…</option>
                    <option value="AD">Adquisiciones</option>
                    <option value="CE">Administracion Cedis</option>
                    <option value="AL">Almacen</option>
                    <option value="AC Centro de Atencion al Clientes">Centro de Atención al Cliente</option>
                    <option value="BO">Bodegas</option>
                    <option value="CM">Compras</option>
                    <option value="CO">Contabilidad</option>
                    <option value="CC">Credito y Cobranza</option>
                    <option value="DE">Devoluciones</option>
                    <option value="EM">Embarques</option>
                    <option value="FC">Facturacion</option>
                    <option value="FI">Finanzas</option>
                    <option value="FL">Flotillas</option>
                    <option value="GC">Gerencia</option>
                    <option value="IF">IFuel</option>
                    <option value="IN">Inventarios</option>
                    <option value="JR">Juridico</option>
                    <option value="ME">Mercadotecnia</option>
                    <option value="MP">Modelado de Productos</option>
                    <option value="PE">Precios Especiales</option>
                    <option value="RH">Recursos Humanos</option>
                    <option value="RE">Recepcion</option>
                    <option value="RM">Recepcion de Materiales</option>
                    <option value="AT">Refaccionaria Actopan</option>
                    <option value="MA">Refaccionaria Madero</option>
                    <option value="MI">Refaccionaria Minero</option>
                    <option value="TU">Refaccionaria Tulancingo</option>
                    <option value="RA">Reabastos</option>
                    <option value="SM">Servicio Medico</option>
                    <option value="SI">Sistemas</option>
                    <option value="SC">Surtido Cedis</option>
                    <option value="TL">Telemarketing</option>
                    <option value="VI">Vigilancia</option>
                    <option value="VT">Ventas</option>
                </select>
            </div>

            <div class="form-group">
                <label for="serie" class="form-label">Numero de Serie: </label>
                <input type="text" name="serie" id="serie" aria-describedby="nameHelp" placeholder="No. Serie" />
            </div>

            <div class="form-group">
                <label for="estado" class="form-label" name="estado">Estado del Dispositivo: </label><br>
                <select class="form-control" id="estado" name="estado">
                    <option value="">Seleccione el estado del dispositivo</option>
                    <option value="Nuevo">Nuevo</option>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="No funciona">No funciona</option>
                </select>
                </label>
            </div>

            <div class="form-group">
                <label for="proceso" class="form-label" name="proceso">Procedimiento: </label><br>
                <select class="form-control" id="proceso" name="proceso">
                    <option value="">Seleccione el estado del dispositivo</option>
                    <option value="Mantenimiento">Para mantenimiento</option>
                    <option value="Reparacion">En reparación</option>
                </select>
                </label>
            </div>

            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="form-label">Marca: </label>
                <input type="text" name="marca" class="form-control" id="marca" aria-describedby="nameHelp"
                    placeholder="Modelo del Equipo" />
            </div>

            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="form-label">Modelo: </label>
                <input type="text" name="modelo" class="form-control" id="modelo" aria-describedby="nameHelp"
                    placeholder="Modelo del Equipo" />
            </div>

            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="form-label">Usuario: </label>
                <input type="text" name="usuario" class="form-control" id="usuario" aria-describedby="nameHelp"
                    placeholder="Usuario Actual" />
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
                <label for="exampleFormControlTextarea1">Comentarios y Observaciones</label>
                <textarea class="form-control" name="comentarios_y_observaciones" id="comentarios_y_observaciones"
                    rows="3" placeholder="Escriba Comentarios y Observaciones"></textarea>
            </div>

    </div>
    <!-- Fin de Formulario NoBreak -->

    <!-- Boton de guardado Formulario -->
    <div class="text-center">
        <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
    </div>
    </form>

    </div><br><br><!-- Fin de Boton -->


</body>

<script src="../js/main.js"></script>

<script>
    function actualizarClave() {
        // Obtener valores seleccionados
        var cedi = document.getElementById("cedi").value;
        var equipo = document.getElementById("dispositivo").value;
        var area = document.getElementById("area").value;

        // Crear la clave combinando valores
        var clave = cedi.substring(0, 2) + equipo.substring(0, 2) + area.substring(0, 2);

        // Obtener el tipo de equipo seleccionado
        var tipoEquipo = equipo.toLowerCase(); // Convertir a minúsculas para uniformidad

        // Incorporar el tipo de equipo en la clave del localStorage
        var claveLocalStorage = clave + "_" + tipoEquipo;

        // Obtener el último número consecutivo para el tipo de equipo
        var ultimoConsecutivo = localStorage.getItem(claveLocalStorage) || 0;

        // Incrementar el consecutivo
        ultimoConsecutivo++;

        // Guardar el nuevo consecutivo en el localStorage
        localStorage.setItem(claveLocalStorage, ultimoConsecutivo);

        // Formatear el consecutivo para que tenga al menos dos dígitos
        var formatoConsecutivo = ("00" + ultimoConsecutivo).slice(-2);

        // Agregar el consecutivo a la clave
        clave += formatoConsecutivo;

        // Actualizar el campo de clave
        document.getElementById("clave").value = clave;
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