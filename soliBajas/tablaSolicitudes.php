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

        .table-responsive {
            overflow-x: auto;
        }
    </style>
    <title>Sistema de Inventario</title>
</head>

<div class="modo" id="modo"></div>

<body style="padding-top: 70px;">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <a class="navbar-brand" href="../php/principal.php">
                <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form action="" method="GET" class="form-inline ml-auto">
                    <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" name="enviar" type="submit">Buscar</button>
                </form>
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

            // Consulta SQL para buscar en la tabla 'form_pc'
            $sql = "SELECT * FROM solicitud WHERE (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR marca LIKE '%$busqueda%' OR modelo LIKE '%$busqueda%')";

            // Ejecutar la consulta
            $result = mysqli_query($conn, $sql);
        } else {
            // Si no hay parámetro de búsqueda, obtener todos los registros
            $sql = "SELECT * FROM solicitud";
            $result = mysqli_query($conn, $sql);
        }
    ?>

    <div class="table-container">
        <h1 class="display-6">Baja de Equipos - Solicitudes</h1>

        <body style="padding-top: 70px;">
    <!-- <div class="container mt-5"><br> -->

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Fecha y Hora</th>
                        <th>Clave</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Numero de Serie</th>
                        <th>Especificaciones</th>
                        <th>Ver</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <?php
                // Iterar sobre los resultados y construir la tabla
                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $mostrar['Id'] ?></td>
                    <td><?php echo $mostrar['fecha'] ?></td>
                    <td><?php echo $mostrar['clave'] ?></td>
                    <td><?php echo $mostrar['marca'] ?></td>
                    <td><?php echo $mostrar['modelo'] ?></td>
                    <td><?php echo $mostrar['numero_serie'] ?></td>
                    <td><?php echo $mostrar['especificaciones'] ?></td>
                    <td><a href="verSoli.php?Id=<?php echo $mostrar['Id']; ?>">Ver</a></td>
                    <td><a href="../soliBajas/eliminarSoli.php?id=<?php echo $mostrar['Id']; ?>"onclick="return confirm('¿Estás seguro?')">Eliminar</a></td>
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