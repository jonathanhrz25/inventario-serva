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
$sql = "SELECT * FROM form_pantalla WHERE Id = $id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error al obtener datos del registro.";
    exit;
}

$mostrar = mysqli_fetch_assoc($result);

// Procesar el formulario de modificación si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los datos del formulario
    $proceso = $_POST['proceso'];



    // Consulta SQL para actualizar los datos en la base de datos
    $update_sql = "UPDATE form_pantalla SET proceso = '$proceso' WHERE Id = $id";

    // Ejecutar la consulta de actualización
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        // La actualización se realizó con éxito
        // Muestra la alerta después de realizar los cambios
        echo '<script>alert("Cambios realizados correctamente.");</script>';

        /// Redirigir a la página principal después de la modificación
        header("Location: ../php/equiposReparacion.php");
        exit;
    } else {
        echo "Error al actualizar los datos en la base de datos: " . mysqli_error($conn);
        exit;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<header>
    <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #000000!important;">
        <a class="navbar-brand text-white" href="../php/equiposReparacion.php">Sistema de Inventario</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <!-- <a class="nav-link text-white" href="../formulario/formularioPC.php">Añadir</a> -->
            </li>
        </ul>
    </nav>
</header>

<body>
    <!-- El resto de tu contenido HTML aquí -->

    <div class="container col-8 mt-5"><br><br>
        <h1>Modificar Registro - Pantalla</h1>
        <form action="" method="POST">
            <!-- Campos del formulario -->

            <div class="form-group">
                <label for="proceso">Procedimiento: </label><br>
                    <select class="form-control" id="proceso" name="proceso" >
                        <option value="<?php echo $mostrar['estado']; ?>">Seleccione Uno…</option>
                        <option value="">Sin Procedimiento</option>
                        <option value="Mantenimiento">Para mantenimiento</option>
                        <option value="Reparacion">En reparación</option>
                    </select>
                </label>
            </div>

            <!-- Boton Guardar Cambios -->
            <div class="text-center"><br>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div><br><br>
        </form>
    </div>

    <?php include '../css/footer.php' ?>
</body>

</html>