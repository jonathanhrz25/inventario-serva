<?php
session_name('inventario'); // Debe ser el mismo nombre de sesión
session_start();
require("../php/connect2.php");

// Verificar si se ha enviado un ID válido
if (!isset($_GET['id'])) {
    echo "ID no proporcionado.";
    exit;
}

$id = $_GET['id'];

// Consulta SQL para obtener los datos del registro
$sql = "SELECT * FROM form_switch_aps WHERE Id = $id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error al obtener datos del registro.";
    exit;
}

$mostrar = mysqli_fetch_assoc($result);

// Procesar el formulario de modificación si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los datos del formulario
    $numero_serie = $_POST['numero_serie'];
    $clave = $_POST['clave'];
    $usuario = $_POST['usuario'];
    $area = $_POST['area'];
    $estado = $_POST['estado'];
    $proceso = $_POST['proceso'];
    $fechaCo = $_POST['fechaCo'];
    $fechaAs = $_POST['fechaAs'];
    $comentarios_observaciones = $_POST['comentarios_observaciones'];

    // Consulta SQL para actualizar los datos en la base de datos
    $update_sql = "UPDATE form_switch_aps SET numero_serie = '$numero_serie', clave = '$clave', usuario = '$usuario' , area = '$area', estado = '$estado', proceso = '$proceso', fechaCo = '$fechaCo', fechaAs = '$fechaAs', comentarios_observaciones = '$comentarios_observaciones' WHERE Id = $id";

    // Ejecutar la consulta de actualización
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        // La actualización se realizó con éxito
        // Muestra la alerta después de realizar los cambios
        echo '<script>alert("Cambios realizados correctamente.");</script>';

        /// Redirigir a la página principal después de la modificación
        header("Location: ../invent/switchesyaccessp.php");
        exit;
    } else {
        echo "Error al actualizar los datos en la base de datos: " . mysqli_error($conn);
        exit;
    }
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
            <a class="navbar-brand text-white" href="../invent/switchesyaccessp.php">
                <img src="../img/icono2.png" alt="" height="35" class="d-inline-block align-text-top">
                Sistema de Inventario
            </a>
            <ul class="navbar-nav ml-auto"></ul>
        </div>
    </nav>
</header>

<div class="modo" id="modo"></div>

<body>
    <!-- El resto de tu contenido HTML aquí -->

    <div class="container col-8 mt-5"><br><br>
        <h1 class="display-6">Modificar Registro - Switch y Access Point</h1>
        <form action="" method="POST">
            <!-- Campos del formulario -->
            <div class="form-group">
                <label for="numero_serie">Numero de Serie:</label>
                <input type="text" class="form-control" name="numero_serie"
                    value="<?php echo $mostrar['numero_serie']; ?>" required>
            </div>

            <div class="form-group">
                <label for="clave">Clave:</label>
                <input type="text" class="form-control" name="clave" value="<?php echo $mostrar['clave']; ?>" required>
            </div>

            <div class="form-group">
                <label for="dispositivo" class="form-label" name="marca">Tipo de Dispositivo: </label><br>
                    <select class="form-control" id="dispositivo" name="dispositivo">
                        <option value="">Selecciona el tipo de dispositivo…</option>
                        <option value="SWITCH" <?php if ($mostrar['equipo'] == "SWITCH") echo "selected"; ?>>Switch</option>
                        <option value="ACCESS POINT" <?php if ($mostrar['equipo'] == "ACCESS POINT") echo "selected"; ?>>Access Point</option>
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" name="usuario" value="<?php echo $mostrar['usuario']; ?>"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="area" class="form-label" name="area">Area: </label><br>
                <select class="form-control" id="area" name="area">
                    <option value="">Seleccione el area…</option>
                    <option value="ADQUISICIONES" <?php if ($mostrar['area'] == "ADQUISICIONES") echo "selected"; ?>>Adquisiciones</option>
                    <option value="ADMINISTRACION CEDIS" <?php if ($mostrar['area'] == "ADMINISTRACION CEDIS") echo "selected"; ?>>Administracion Cedis</option>
                    <option value="ALMACEN" <?php if ($mostrar['area'] == "ALMACEN") echo "selected"; ?>>Almacen</option>
                    <option value="ATENCION A CLIENTES" <?php if ($mostrar['area'] == "ATENCION A CLIENTES") echo "selected"; ?>>Atencion a Clientes</option>
                    <option value="BODEGAS" <?php if ($mostrar['area'] == "BODEGAS") echo "selected"; ?>>Bodegas</option>
                    <option value="COMPRAS" <?php if ($mostrar['area'] == "COMPRAS") echo "selected"; ?>>Compras</option>
                    <option value="CONTABILIDAD" <?php if ($mostrar['area'] == "CONTABILIDAD") echo "selected"; ?>>Contabilidad</option>
                    <option value="CREDITO Y COBRANZA" <?php if ($mostrar['area'] == "CREDITO Y COBRANZA") echo "selected"; ?>>Credito y Cobranza</option>
                    <option value="DEVOLUCIONES" <?php if ($mostrar['area'] == "DEVOLUCIONES") echo "selected"; ?>>Devoluciones</option>
                    <option value="EMBARQUES" <?php if ($mostrar['area'] == "EMBARQUES") echo "selected"; ?>>Embarques</option>
                    <option value="FACTURACION" <?php if ($mostrar['area'] == "FACTURACION") echo "selected"; ?>>Facturacion</option>
                    <option value="FINANZAS" <?php if ($mostrar['area'] == "FINANZAS") echo "selected"; ?>>Finanzas</option>
                    <option value="FLOTILLAS" <?php if ($mostrar['area'] == "FLOTILLAS") echo "selected"; ?>>Flotillas</option>
                    <option value="GERENCIA" <?php if ($mostrar['area'] == "GERENCIA") echo "selected"; ?>>Gerencia</option>
                    <option value="IFUEL" <?php if ($mostrar['area'] == "IFUEL") echo "selected"; ?>>IFuel</option>
                    <option value="INVENTARIOS" <?php if ($mostrar['area'] == "INVENTARIOS") echo "selected"; ?>>Inventarios</option>
                    <option value="JURIDICO" <?php if ($mostrar['area'] == "JURIDICO") echo "selected"; ?>>Juridico</option>
                    <option value="MERCADOTECNIA" <?php if ($mostrar['area'] == "MERCADOTECNIA") echo "selected"; ?>>Mercadotecnia</option>
                    <option value="MODELADO DE PRODUCTOS" <?php if ($mostrar['area'] == "MODELADO DE PRODUCTOS") echo "selected"; ?>>Modelado de Productos</option>
                    <option value="PRECIOS ESPECIALES" <?php if ($mostrar['area'] == "PRECIOS ESPECIALES") echo "selected"; ?>>Precios Especiales</option>
                    <option value="RECURSOS HUMANOS" <?php if ($mostrar['area'] == "RECURSOS HUMANOS") echo "selected"; ?>>Recursos Humanos</option>
                    <option value="RECEPCION" <?php if ($mostrar['area'] == "RECEPCION") echo "selected"; ?>>Recepcion</option>
                    <option value="RECEPCION DE MATERIALES" <?php if ($mostrar['area'] == "RECEPCION DE MATERIALES") echo "selected"; ?>>Recepcion de Materiales</option>
                    <option value="REFACCIONARIA ACTOPAN" <?php if ($mostrar['area'] == "REFACCIONARIA ACTOPAN") echo "selected"; ?>>Refaccionaria Actopan</option>
                    <option value="REFACCIONARIA MADERO" <?php if ($mostrar['area'] == "REFACCIONARIA MADERO") echo "selected"; ?>>Refaccionaria Madero</option>
                    <option value="REFACCIONARIA MINERO" <?php if ($mostrar['area'] == "REFACCIONARIA MINERO") echo "selected"; ?>>Refaccionaria Minero</option>
                    <option value="REFACCIONARIA TULANCINGO" <?php if ($mostrar['area'] == "REFACCIONARIA TULANCINGO") echo "selected"; ?>>Refaccionaria Tulancingo</option>
                    <option value="REABASTOS" <?php if ($mostrar['area'] == "REABASTOS") echo "selected"; ?>>Reabastos</option>
                    <option value="SERVICIO MEDICO" <?php if ($mostrar['area'] == "SERVICIO MEDICO") echo "selected"; ?>>Servicio Medico</option>
                    <option value="SISTEMAS" <?php if ($mostrar['area'] == "SISTEMAS") echo "selected"; ?>>Sistemas</option>
                    <option value="SURTIDO CEDIS" <?php if ($mostrar['area'] == "SURTIDO CEDIS") echo "selected"; ?>>Surtido Cedis</option>
                    <option value="TELEMARKETING" <?php if ($mostrar['area'] == "TELEMARKETING") echo "selected"; ?>>Telemarketing</option>
                    <option value="VIGILANCIA" <?php if ($mostrar['area'] == "VIGILANCIA") echo "selected"; ?>>Vigilancia</option>
                    <option value="VENTAS" <?php if ($mostrar['area'] == "VENTAS") echo "selected"; ?>>Ventas</option>
                </select>
            </div>

            <div class="form-group">
                <label for="estado" class="form-label" name="estado">Estado: </label><br>
                    <select class="form-control" id="status" name="estado">
                        <option value="">Seleccione el estado de la Laptop…</option>
                        <option value="NUEVA" <?php if ($mostrar['estado'] == "NUEVA") echo "selected"; ?>>Nueva</option>
                        <option value="BUENA" <?php if ($mostrar['estado'] == "BUENA") echo "selected"; ?>>Buena</option>
                        <option value="REGULAR" <?php if ($mostrar['estado'] == "REGULAR") echo "selected"; ?>>Regular</option>
                        <option value="NO SIRVE" <?php if ($mostrar['estado'] == "NO SIRVE") echo "selected"; ?>>No sirve</option>
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label for="proceso">Procedimiento: </label><br>
                <select class="form-control" id="proceso" name="proceso">
                    <option value="">Seleccione Uno…</option>
                    <option value="" <?php if ($mostrar['proceso'] == "") echo "selected"; ?>>Sin Procedimiento</option>
                    <option value="Mantenimiento" <?php if ($mostrar['proceso'] == "Mantenimiento") echo "selected"; ?>>Para mantenimiento</option>
                    <option value="Reparacion" <?php if ($mostrar['proceso'] == "Reparacion") echo "selected"; ?>>En reparación</option>
                </select>
            </div><br>

            <div class="form-group mb-3">
              <label for="fechaCo" class="form-label">Fecha de Compra de Equipo: </label>
              <input type="datetime-local" name="fechaCo" id="fechaCo" value="<?php echo $mostrar['fechaCo']; ?>">
            </div>

            <div class="form-group mb-3">
              <label for="fechaAs" class="form-label">Fecha de Asignacion del Equipo: </label>
              <input type="datetime-local" name="fechaAs" id="fechaAs" value="<?php echo $mostrar['fechaAs']; ?>">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comentarios y Observaciones</label>
                <textarea class="form-control" name="comentarios_y_observaciones"
                    value="<?php echo $mostrar['comentarios_observaciones']; ?>" rows="3"
                    placeholder="Escriba Comentarios y Observaciones"></textarea>
            </div>

            <!-- Agrega más campos según sea necesario -->
            <div class="text-center"><br>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div><br><br>
        </form>
    </div>

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