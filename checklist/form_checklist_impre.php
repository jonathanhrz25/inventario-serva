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
                        <option value="IMPRESORA">Impresora</option>
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
                            <option value="CANON">CANON</option>
                            <option value="EPSON">EPSON</option>
                            <option value="HP">HP</option>
                            <option value="BROTHER">BROTHER</option>
                            <option value="ZEBRA">ZEBRA</option>
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

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">¿EL EQUIPO PRESENTÓ FALLAS?</label>
                    <textarea class="form-control" name="fallas" id="fallas" rows="3"
                        placeholder="Escriba que fallas presenta"></textarea>
                </div>

                <div class="form-group mb-5">
                    <label for="RespaldoUsuario" class="form-label">REMOVER POLVO Y RESTOS DE PAPEL DEL INTERIOR</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="remover" id="remover1" value="Si">
                            <label class="form-check-label" for="remover1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="remover" id="remover2" value="No">
                            <label class="form-check-label" for="remover2">No</label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label for="RespaldoUsuario" class="form-label">REVISIÓN DE COMPONENTES</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rev_componentes" id="rev_componentes1" value="Si">
                            <label class="form-check-label" for="rev_componentes1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rev_componentes" id="rev_componentes2" value="No">
                            <label class="form-check-label" for="rev_componentes2">No</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">CAMBIO DE COMPONENTES</label>
                    <textarea class="form-control" name="componentes" id="componentes" rows="3"
                        placeholder="Escriba que componentes se cambiaron"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comentarios y Observaciones</label>
                    <textarea class="form-control" name="comentarios_y_observaciones" id="comentarios_y_observaciones"
                        rows="3" placeholder="Describir que se le hizo al equipo"></textarea>
                </div>

                <div class="form-group mb-5">
                    <label for="RespaldoUsuario" class="form-label">TIPO DE MANTENIMIENTO:</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mantenimiento" id="mantenimiento1"
                                value="PREVENTIVO">
                            <label class="form-check-label" for="mantenimiento1">Preventivo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mantenimiento" id="mantenimiento2"
                                value="CORRECTIVO">
                            <label class="form-check-label" for="mantenimiento2">Correctivo</label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="form-label">PORCENTAJE DE EFICIENCIA:</label>
                    <input type="text" name="porcentaje" class="form-control" id="porcentaje"
                        aria-describedby="nameHelp" placeholder="Ingresa el porcentaje de eficiencia" />
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
            </form><br><br>

            <script src="../js/main.js"></script>


</html>


<?php include '../css/footer.php' ?>