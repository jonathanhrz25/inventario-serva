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
$sql = "SELECT * FROM form_checklist WHERE Id = $id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error al obtener datos del registro.";
    exit;
}

$mostrar = mysqli_fetch_assoc($result);

// Procesar el formulario de modificación si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los datos del formulario
    $IPVNC = $_POST['IPVNC'];
    // Recupera más campos según sea necesario

    // Obtener el nombre de usuario actual
    $ultimo_usuario = $_SESSION['usuario'];

    // Consulta SQL para actualizar los datos en la base de datos
    $update_sql = "UPDATE form_checklist SET IPVNC = '$IPVNC', ultimo_usuario = '$ultimo_usuario' WHERE Id = $id";

    // Ejecutar la consulta de actualización
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        // La actualización se realizó con éxito
        // Muestra la alerta después de realizar los cambios
        echo '<script>alert("Cambios realizados correctamente.");</script>';

        /// Redirigir a la página principal después de la modificación
        header("Location: ../checklist/tablaChecklist.php");
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
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/dark.css">
    <style>
        body {
            overflow-x: auto;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            margin-bottom: 20px;
        }
    </style>
    <title>Sistema de Inventario</title>
</head>

<header>
    <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="../checklist/tablaChecklist.php">
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
        <h1 class="display-6">Modificar CheckList</h1>
        <form action="" method="POST">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="form-label">IP de VNC:</label>
                <input type="text" name="IPVNC" class="form-control" id="IPVNC" aria-describedby="nameHelp"
                    placeholder="Ingresa IP de VNC" value="<?php echo $mostrar['IPVNC']; ?>" required>
            </div>
            <div class="text-center"><br>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div><br><br>
        </form>
    </div>
</body>
<?php include '../css/footer.php' ?>

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

</html>