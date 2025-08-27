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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Sistema de Inventario</title>
    <style>
        body {
            overflow-x: auto;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            margin-bottom: 20px;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>

<div class="modo" id="modo"></div>

<body style="padding-top: 70px;">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <a class="navbar-brand" href="../php/principal.php">
                <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form action="" method="GET" class="form-inline ml-auto">
                    <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Buscar"
                        aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" name="enviar" type="submit">Buscar</button>
                </form>

                <!-- Ajustamos los botones con un margen adicional a la derecha -->
                <div class="btn-group ms-3" role="group" aria-label="Button group with nested dropdown"
                    style="margin-right: 20px;">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">Añadir
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../checkList/form_checklist.php">Equipos</a></li>
                            <li><a class="dropdown-item" href="../checkList/form_checklist_impre.php">Impresoras</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    </header>

    <?php
    require("../php/connect2.php");

    // Inicializar la variable de búsqueda
    $busqueda = "";

    // Verificar si se proporcionó un parámetro de búsqueda
    if (isset($_GET['enviar'])) {
        $busqueda = $_GET["busqueda"];

        // Consulta SQL para buscar en la tabla 'form_checklist'
        $sql = "SELECT * FROM form_checklist WHERE (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%')";

        // Ejecutar la consulta
        $result = mysqli_query($conn, $sql);
    } else {
        // Si no hay parámetro de búsqueda, obtener todos los registros
        $sql = "SELECT * FROM form_checklist";
        $result = mysqli_query($conn, $sql);
    }
    ?>

    <div class="table-container">
        <h1 class="display-6">Tabla Checklist</h1>

        <body style="padding-top: 70px;">
            <!-- <div class="container mt-5"><br> -->

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha y Hora</th>
                            <th>Area</th>
                            <th>Cedis</th>
                            <th>Usuario</th>
                            <th>Tipo de Equipo</th>
                            <th>Clave</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Numero de Serie</th>
                            <th>Realizo</th>
                            <th>Ultima Modificacion</th>
                            <th>Ver</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <?php
                    // Iterar sobre los resultados y construir la tabla
                    while ($mostrar = mysqli_fetch_array($result)) {
                        // Inicializar la variable de la última modificación como una cadena vacía
                        $ultimo_usuario = '';

                        // Obtener el nombre de usuario de la última modificación si está disponible en la fila actual
                        if (!empty($mostrar['ultimo_usuario'])) {
                            $ultimo_usuario = $mostrar['ultimo_usuario'];
                        }
                        ?>
                        <tr>
                            <td><?php echo $mostrar['fecha'] ?></td>
                            <td><?php echo $mostrar['area'] ?></td>
                            <td><?php echo $mostrar['cedis'] ?></td>
                            <td><?php echo $mostrar['usuario'] ?></td>
                            <td><?php echo $mostrar['equipo'] ?></td>
                            <td><?php echo $mostrar['clave'] ?></td>
                            <td><?php echo $mostrar['marca'] ?></td>
                            <td><?php echo $mostrar['modelo'] ?></td>
                            <td><?php echo $mostrar['numero_serie'] ?></td>
                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $ultimo_usuario; ?></td> <!-- Última Modificación -->
                            <td class="icon-cell"><a href="ver.php?id=<?php echo $mostrar['Id']; ?>"><i class="fa fa-eye fa-2x"></i></a></td>
                            <td class="icon-cell"><a href="../checkList/modificarCheck.php?id=<?php echo $mostrar['Id']; ?>"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
                            <td class="icon-cell"><a href="../checkList/eliminarCheck.php?id=<?php echo $mostrar['Id']; ?>"onclick="return confirm('¿Estás seguro?')"><i class="fa fa-trash-o fa-2x"></i></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
    </div><br><br><br>
</body>

<?php
// Cerrar la conexión
$conn->close();
?>

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