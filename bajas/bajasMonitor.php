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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <title>Sistema de Inventario</title>
    <!-- Agregar enlaces a tus archivos CSS y JS -->
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../php/bajas.php">
                    <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
                </a>
                <ul class="navbar-nav ml-auto"></ul>
            </div>
        </nav>
    </header>
</body>

<?php
require("../php/connect2.php");

?><br>
    
    <!-- <div class="container mt-5"><br> -->
<div class="text-center">
    <h1 class="display-5">Monitores</h1>
</div>

    <!-- <form action="" method="GET" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" name="enviar" type="submit">Buscar</button>
    </form><br> -->

    <div class="table-responsive">
        <table class="table table-hover table-Light">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Numero de Serie</th>
                    <th>Clave</th>
                    <th>Estado</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Tipo de Pantalla</th>
                    <th>Tamaño de Pantalla(pulgadas)</th>
                    <th>Usuario</th>
                    <th>Area</th>
                    <th>Comentarios y Observaciones</th>
                </tr>
            </thead>
                <?php 
                if (isset($_GET['enviar'])) {
                    $busqueda = isset($_GET["busqueda"]) ? $_GET["busqueda"] : "";

                    // Consulta SQL para buscar en la tabla 'form_monitor'
                    $sql = "SELECT * FROM form_monitor WHERE (clave LIKE '%$busqueda%' or numero_serie LIKE '%$busqueda%') AND status = 0";

                    // Ejecutar la consulta
                    $result = mysqli_query($conn, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $mostrar['Id'] ?></td>
                    <td><?php echo $mostrar['numero_serie'] ?></td>
                    <td><?php echo $mostrar['clave'] ?></td>
                    <td><?php echo $mostrar['estado'] ?></td>
                    <td><?php echo $mostrar['marca'] ?></td>
                    <td><?php echo $mostrar['modelo'] ?></td>
                    <td><?php echo $mostrar['tipo_pantalla'] ?></td>
                    <td><?php echo $mostrar['tamaño_pantalla'] ?></td>
                    <td><?php echo $mostrar['usuario'] ?></td>
                    <td><?php echo $mostrar['area'] ?></td>
                    <td><?php echo $mostrar['comentarios_observaciones'] ?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div><br><br><br><br>

    <?php
    // Cerrar la conexión
    $conn->close();
    ?>

    <?php include '../css/footer.php' ?>
</body>
</html>