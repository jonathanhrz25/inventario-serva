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

<?php
require ("../php/connect2.php");

// Verificar si se ha enviado un ID válido
if (!isset($_GET['id'])) {
    echo "ID no proporcionado.";
    exit;
}

$id = $_GET['id'];

// Consulta SQL para obtener los datos del registro
$sql = "SELECT * FROM form_lectorcb WHERE Id = $id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error al obtener datos del registro.";
    exit;
}

$mostrar = mysqli_fetch_assoc($result);

// Procesar el formulario de modificación si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los datos del formulario
    $equipo = $_POST['equipo'];
    $numero_serie = $_POST['numero_serie'];
    $clave = $_POST['clave'];
    $status = $_POST['estado'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $especificaciones = $_POST['especificaciones'];
    $cedis = $_POST['cedi'];
    $usuario = $_POST['usuario'];
    $area = $_POST['area'];
    $fechaCo = $_POST['fechaCo'];
    $fechaAs = $_POST['fechaAs'];
    $comentarios_observaciones = $_POST['comentarios_y_observaciones'];


    // Consulta SQL para actualizar los datos en la base de datos
    $update_sql = "UPDATE form_lectorcb SET numero_serie = '$numero_serie', equipo = '$equipo', clave = '$clave', estado = '$status', marca = '$marca', modelo = '$modelo', especificaciones = '$especificaciones', cedis = '$cedis', usuario = '$usuario', area = '$area', fechaCo = '$fechaCo', fechaAs = '$fechaAs', comentarios_observaciones = '$comentarios_observaciones' WHERE Id = $id";

    // Ejecutar la consulta de actualización
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        // La actualización se realizó con éxito
        // Muestra la alerta después de realizar los cambios
        echo '<script>alert("Cambios realizados correctamente.");</script>';

        /// Redirigir a la página principal después de la modificación
        header("Location: ../invent/lectorCB.php");
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
            <a class="navbar-brand text-white" href="../invent/lectorCB.php">
                <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
            </a>
            <ul class="navbar-nav ml-auto"></ul>
        </div>
    </nav>
</header>

<div class="modo" id="modo"></div>

<body>
    <!-- El resto de tu contenido HTML aquí -->

    <div class="container col-8 mt-5"><br>
        <h1 class="display-6">Modificar Registro - Lector Codigo de Barras</h1>
        <form action="" method="POST">

            <div class="form-group">
                <label for="equipo">Equipo:</label>
                <input type="text" class="form-control" name="equipo" value="LECTOR CODIGO DE BARRAS" <?php if ($mostrar['equipo'] == "LECTOR CODIGO DE BARRAS")echo "selected"; ?> readonly>
            </div>

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
                <label for="estado" class="form-label" name="estado">Estado: </label><br>
                <select class="form-control" id="status" name="estado">
                    <option value="">Seleccione el estado del Lector…</option>
                    <option value="NUEVA" <?php if ($mostrar['estado'] == "NUEVA")echo "selected"; ?>>Nueva</option>
                    <option value="BUENA" <?php if ($mostrar['estado'] == "BUENA")echo "selected"; ?>>Buena</option>
                    <option value="REGULAR" <?php if ($mostrar['estado'] == "REGULAR")echo "selected"; ?>>Regular</option>
                    <option value="NO SIRVE" <?php if ($mostrar['estado'] == "NO SIRVE")echo "selected"; ?>>No sirve</option>
                </select>
                </label>
            </div>

            <div class="form-group">
                <label for="marca" class="form-label" name="marca">Marca:</label><br>
                <select class="form-control" id="marca" name="marca">
                    <option value="">Seleccione la marca del Lector…</option>
                    <option value="EcLINE" <?php if ($mostrar['marca'] == "EcLINE")echo "selected"; ?>>EcLine</option>
                    <option value="DATALOGIC" <?php if ($mostrar['marca'] == "DATALOGIC")echo "selected"; ?>>Datalogic</option>
                    <option value="HONEYWELL" <?php if ($mostrar['marca'] == "HONEYWELL")echo "selected"; ?>>Honeywell</option>
                    <option value="ZEBRA" <?php if ($mostrar['marca'] == "ZEBRA")echo "selected"; ?>>Zebra</option>
                    <option value="3nSTAR" <?php if ($mostrar['marca'] == "3nSTAR")echo "selected"; ?>>3nStar</option>
                    </option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="form-label">Modelo: </label>
                <input type="text" name="modelo" class="form-control" id="modelo" aria-describedby="nameHelp"
                    value="<?php echo $mostrar['modelo']; ?>" placeholder="Modelo del Equipo" />
            </div>

            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="form-label">Especificaciones: </label>
                <input type="text" name="especificaciones" class="form-control" id="especificaciones"
                    value="<?php echo $mostrar['especificaciones']; ?>" aria-describedby="nameHelp"
                    placeholder="Especificaciones del Equipo" />
            </div>

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" name="usuario" value="<?php echo $mostrar['usuario']; ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="cedi" class="form-label" name="cedi">Cedis: </label><br>
                <select class="form-control" id="cedi" name="cedi">
                    <option value="">Seleccione el Cedis del Lector…</option>
                    <option value="PACHUCA" <?php if ($mostrar['cedis'] == "PACHUCA")echo "selected"; ?>>Pachuca</option>
                    <option value="CANCUN" <?php if ($mostrar['cedis'] == "CANCUN")echo "selected"; ?>>Cancun</option>
                    <option value="CHIHUAHUA" <?php if ($mostrar['cedis'] == "CHIHUAHUA")echo "selected"; ?>>Chihuahua</option>
                    <option value="CULIACAN" <?php if ($mostrar['cedis'] == "CULIACAN")echo "selected"; ?>>Culiacan</option>
                    <option value="CUERNAVACA" <?php if ($mostrar['cedis'] == "CUERNAVACA")echo "selected"; ?>>Cuernavaca</option>
                    <option value="GUADALAJARA" <?php if ($mostrar['cedis'] == "GUADALAJARA")echo "selected"; ?>>Guadalajara</option>
                    <option value="HERMOSILLO" <?php if ($mostrar['cedis'] == "HERMOSILLO")echo "selected"; ?>>Hermosillo</option>
                    <option value="LEON" <?php if ($mostrar['cedis'] == "LEON")echo "selected"; ?>>Leon</option>
                    <option value="MERIDA" <?php if ($mostrar['cedis'] == "MERIDA")echo "selected"; ?>>Merida</option>
                    <option value="MONTERREY" <?php if ($mostrar['cedis'] == "MONTERREY")echo "selected"; ?>>Monterrey</option>
                    <option value="OAXACA" <?php if ($mostrar['cedis'] == "OAXACA")echo "selected"; ?>>Oaxaca</option>
                    <option value="PUEBLA" <?php if ($mostrar['cedis'] == "PUEBLA")echo "selected"; ?>>Puebla</option>
                    <option value="QUERETARO" <?php if ($mostrar['cedis'] == "QUERETARO")echo "selected"; ?>>Queretaro</option>
                    <option value="SAN LUIS POTOSI" <?php if ($mostrar['cedis'] == "SAN LUIS POTOSI")echo "selected"; ?>>San Luis Potosi</option>
                    <option value="TUXTLA GUTIERREZ" <?php if ($mostrar['cedis'] == "TUXTLA GUTIERREZ")echo "selected"; ?>>Tuxtla Gutuerrez</option>
                    <option value="VILLAHERMOSA" <?php if ($mostrar['cedis'] == "VILLAHERMOSA")echo "selected"; ?>>Villahermosa</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="area" class="form-label" name="area">Area: </label><br>
                <select class="form-control" id="area" name="area">
                    <option value="">Seleccione el Area del Lector…</option>
                    <option value="ADQUISICIONES" <?php if ($mostrar['area'] == "ADQUISICIONES")echo "selected"; ?>>Adquisiciones</option>
                    <option value="ADMINISTRACION CEDIS" <?php if ($mostrar['area'] == "ADMINISTRACION CEDIS")echo "selected"; ?>>Administracion Cedis</option>
                    <option value="ALMACEN" <?php if ($mostrar['area'] == "ALMACEN")echo "selected"; ?>>Almacen</option>
                    <option value="ATENCION A CLIENTES" <?php if ($mostrar['area'] == "ATENCION A CLIENTES")echo "selected"; ?>>Atencion a Clientes</option>
                    <option value="BODEGAS" <?php if ($mostrar['area'] == "BODEGAS")echo "selected"; ?>>Bodegas</option>
                    <option value="COMPRAS" <?php if ($mostrar['area'] == "COMPRAS")echo "selected"; ?>>Compras</option>
                    <option value="CONTABILIDAD" <?php if ($mostrar['area'] == "CONTABILIDAD")echo "selected"; ?>>Contabilidad</option>
                    <option value="CREDITO Y COBRANZA" <?php if ($mostrar['area'] == "CREDITO Y COBRANZA")echo "selected"; ?>>Credito y Cobranza</option>
                    <option value="DEVOLUCIONES" <?php if ($mostrar['area'] == "DEVOLUCIONES")echo "selected"; ?>>Devoluciones</option>
                    <option value="EMBARQUES" <?php if ($mostrar['area'] == "EMBARQUES")echo "selected"; ?>>Embarques</option>
                    <option value="FACTURACION" <?php if ($mostrar['area'] == "FACTURACION")echo "selected"; ?>>Facturacion</option>
                    <option value="FINANZAS" <?php if ($mostrar['area'] == "FINANZAS")echo "selected"; ?>>Finanzas</option>
                    <option value="FLOTILLAS" <?php if ($mostrar['area'] == "FLOTILLAS")echo "selected"; ?>>Flotillas</option>
                    <option value="GERENCIA" <?php if ($mostrar['area'] == "GERENCIA")echo "selected"; ?>>Gerencia</option>
                    <option value="IFUEL" <?php if ($mostrar['area'] == "IFUEL")echo "selected"; ?>>IFuel</option>
                    <option value="INVENTARIOS" <?php if ($mostrar['area'] == "INVENTARIOS")echo "selected"; ?>>Inventarios</option>
                    <option value="JURIDICO" <?php if ($mostrar['area'] == "JURIDICO")echo "selected"; ?>>Juridico</option>
                    <option value="MERCADOTECNIA" <?php if ($mostrar['area'] == "MERCADOTECNIA")echo "selected"; ?>>Mercadotecnia</option>
                    <option value="MODELADO DE PRODUCTOS" <?php if ($mostrar['area'] == "MODELADO DE PRODUCTOS")echo "selected"; ?>>Modelado de Productos</option>
                    <option value="PRECIOS ESPECIALES" <?php if ($mostrar['area'] == "PRECIOS ESPECIALES")echo "selected"; ?>>Precios Especiales</option>
                    <option value="RECURSOS HUMANOS" <?php if ($mostrar['area'] == "RECURSOS HUMANOS")echo "selected"; ?>>Recursos Humanos</option>
                    <option value="RECEPCION" <?php if ($mostrar['area'] == "RECEPCION")echo "selected"; ?>>Recepcion</option>
                    <option value="RECEPCION DE MATERIALES" <?php if ($mostrar['area'] == "RECEPCION DE MATERIALES")echo "selected"; ?>>Recepcion de Materiales</option>
                    <option value="REFACCIONARIA ACTOPAN" <?php if ($mostrar['area'] == "REFACCIONARIA ACTOPAN")echo "selected"; ?>>Refaccionaria Actopan</option>
                    <option value="REFACCIONARIA MADERO" <?php if ($mostrar['area'] == "REFACCIONARIA MADERO")echo "selected"; ?>>Refaccionaria Madero</option>
                    <option value="REFACCIONARIA MINERO" <?php if ($mostrar['area'] == "REFACCIONARIA MINERO")echo "selected"; ?>>Refaccionaria Minero</option>
                    <option value="REFACCIONARIA TULANCINGO" <?php if ($mostrar['area'] == "REFACCIONARIA TULANCINGO")echo "selected"; ?>>Refaccionaria Tulancingo</option>
                    <option value="REABASTOS" <?php if ($mostrar['area'] == "REABASTOS")echo "selected"; ?>>Reabastos</option>
                    <option value="SERVICIO MEDICO" <?php if ($mostrar['area'] == "SERVICIO MEDICO")echo "selected"; ?>>Servicio Medico</option>
                    <option value="SISTEMAS" <?php if ($mostrar['area'] == "SISTEMAS")echo "selected"; ?>>Sistemas</option>
                    <option value="SURTIDO CEDIS" <?php if ($mostrar['area'] == "SURTIDO CEDIS")echo "selected"; ?>>Surtido Cedis</option>
                    <option value="TELEMARKETING" <?php if ($mostrar['area'] == "TELEMARKETING")echo "selected"; ?>>Telemarketing</option>
                    <option value="VIGILANCIA" <?php if ($mostrar['area'] == "VIGILANCIA")echo "selected"; ?>>Vigilancia</option>
                    <option value="VENTAS" <?php if ($mostrar['area'] == "VENTAS")echo "selected"; ?>>Ventas</option>
                </select>
            </div>

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
                <textarea class="form-control" name="comentarios_y_observaciones" rows="3"
                    placeholder="Escriba Comentarios y Observaciones"><?php echo $mostrar['comentarios_observaciones']; ?></textarea>
            </div>

            <!-- Agrega más campos según sea necesario -->
            <div class="text-center"><br>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div><br><br><br>
        </form>
    </div>

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
</body>

</html>