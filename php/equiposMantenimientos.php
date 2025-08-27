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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Sistema de Inventario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
        }

        .info-container {
            margin-top: 30px;
        }
    </style>

    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../php/principal.php">
                    <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
                </a>
                <ul class="navbar-nav ml-auto"></ul>
            </div>
        </nav>
    </header><br><br><br>
    <h1 class="display-6">Equipos en Mantenimiento</h1>
</head>

<div class="modo" id="modo"></div>

<div style="height: 40px;"></div>


<body>

    <?php
    require("../php/connect2.php");

    // Verificar si 'enviar' está definido
    if (isset($_GET['enviar'])) {
        $tipo = $_GET['enviar'];
        $busqueda = isset($_GET["busqueda2"]) ? $_GET["busqueda2"] : "";

        // Verificar si $conn está definido y no es null
        if (isset($conn) && !is_null($conn)) {
            // Inicializar la consulta SQL
            $sql = "";

            // Consulta SQL para buscar en la tabla correspondiente según el botón presionado
            if ($tipo === 'PC') {
                $sql = "SELECT * FROM form_pc WHERE proceso = 'Mantenimiento'";
            } elseif ($tipo === 'Monitor') {
                $sql = "SELECT * FROM form_monitor WHERE proceso = 'Mantenimiento'";
            } elseif ($tipo === 'Impresora') {
                $sql = "SELECT * FROM form_impresora WHERE proceso = 'Mantenimiento'";
            } elseif ($tipo === 'Hand Held') {
                $sql = "SELECT * FROM form_hh WHERE proceso = 'Mantenimiento'";
            } elseif ($tipo === 'Pantalla') {
                $sql = "SELECT * FROM form_pantalla WHERE proceso = 'Mantenimiento'";
            } elseif ($tipo === 'Laptop') {
                $sql = "SELECT * FROM form_laptop WHERE proceso = 'Mantenimiento'";
            } elseif ($tipo === 'NoBreak') {
                $sql = "SELECT * FROM form_nobreak WHERE proceso = 'Mantenimiento'";
            } elseif ($tipo === 'Switches y Access Points') {
                $sql = "SELECT * FROM form_switch_aps WHERE proceso = 'Mantenimiento'";
            } elseif ($tipo === 'Disco Duro') {
                $sql = "SELECT * FROM form_dde WHERE proceso = 'Mantenimiento'";
            }

            // Agregar condiciones de búsqueda si se proporciona una búsqueda
            if (!empty($busqueda)) {
                $busqueda = "%$busqueda%";
                $sql .= " AND (clave LIKE ? OR numero_serie LIKE ?)";

                // Preparar la consulta
                $stmt = mysqli_prepare($conn, $sql);

                // Verificar si la preparación de la consulta fue exitosa
                if ($stmt) {
                    // Vincular parámetros para la búsqueda
                    mysqli_stmt_bind_param($stmt, "ss", $busqueda, $busqueda);

                    // Ejecutar la consulta
                    $result = mysqli_stmt_execute($stmt);

                    // Verificar si la ejecución fue exitosa
                    if ($result) {
                        // Resto del código para mostrar la información...
                    } else {
                        echo 'Error al ejecutar la consulta: ' . mysqli_error($conn);
                    }
                } else {
                    echo 'Error al preparar la consulta: ' . mysqli_error($conn);
                }
            } else {
                // Si no hay condiciones de búsqueda, ejecutar la consulta sin ellas
                $result = mysqli_query($conn, $sql);

                // Verificar si la ejecución fue exitosa
                if ($result) {
                    // Resto del código para mostrar la información...
                } else {
                    echo 'Error al ejecutar la consulta: ' . mysqli_error($conn);
                }
            }
        } else {
            echo 'La conexión a la base de datos no está establecida.';
        }
    }
    ?>

    <!-- Formulario de búsqueda -->
    <!-- <form action="" method="GET" class="form-inline my-2 my-lg-0" id="search-form">
        <input class="form-control mr-sm-2" type="search" name="busqueda2" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" name="enviar2" type="submit">Buscar</button>
    </form><br><br> -->

    <!-- Botones con enlaces a la misma página -->
    <div class="container mt-6">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary" onclick="cargarContenido(this, 'PC')">PC</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido(this, 'Monitor')">Monitor</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido(this, 'Impresora')">Impresora</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary" onclick="cargarContenido(this, 'Hand Held')">Hand
                    Held</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido(this, 'Pantalla')">Pantalla</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido(this, 'Laptop')">Laptop</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido(this, 'NoBreak')">NoBreak</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido(this, 'Switches y Access Points')">Switches y Access Points</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido(this, 'Disco Duro')">Disco Duro</button>
            </li>
            <!-- Agrega más botones según sea necesario -->
        </ul>
    </div>

    <!-- Contenedor para mostrar la información -->
    <div id="info-container" class="info-container">
        <!-- Resto del código para mostrar la información... -->
    </div>

    <script>

        function cargarContenido(tipo) {
            // Remover la clase 'active' de todos los botones
            var buttons = document.querySelectorAll('.btn-outline-primary');
            buttons.forEach(function (btn) {
                btn.classList.remove('active');
            });

            // Agregar la clase 'active' al botón clicado
            var currentButton = document.querySelector('button[data-tipo="' + tipo + '"]');
            if (currentButton) {
                currentButton.classList.add('active');
            }

            // Simular clic en el botón de búsqueda
            document.getElementById('search-form').submit();
        }

        function cargarContenido(button, tipo) {
            // Remover la clase 'active' de todos los botones
            var buttons = document.querySelectorAll('.btn-outline-primary');
            buttons.forEach(function (btn) {
                btn.classList.remove('active');
            });

            // Agregar la clase 'active' al botón clicado
            button.classList.add('active');

            var xhr = new XMLHttpRequest();
            var url = '';

            // Determinar la URL según el botón presionado
            if (tipo === 'PC') {
                url = '../mantenimiento/mantePC.php';
            } else if (tipo === 'Monitor') {
                url = '../mantenimiento/manteMonitor.php';
            } else if (tipo === 'Impresora') {
                url = '../mantenimiento/manteImpresora.php';
            } else if (tipo === 'Hand Held') {
                url = '../mantenimiento/manteHandHeld.php';
            } else if (tipo === 'Pantalla') {
                url = '../mantenimiento/mantePantalla.php';
            } else if (tipo === 'Laptop') {
                url = '../mantenimiento/manteLaptop.php';
            } else if (tipo === 'NoBreak') {
                url = '../mantenimiento/manteNoBreak.php';
            } else if (tipo === 'Switches y Access Points') {
                url = '../mantenimiento/manteSyA.php';
            } else if (tipo === 'Disco Duro') {
                url = '../mantenimiento/manteDDE.php';
            }

            // Agregar el parámetro 'enviar' a la URL
            url += '?enviar=' + tipo;

            xhr.open('GET', url, true);

            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // Verificar si el contenedor está presente antes de establecer su contenido
                    var infoContainer = document.getElementById('info-container');
                    if (infoContainer) {
                        infoContainer.innerHTML = xhr.responseText;
                    } else {
                        console.error('El contenedor info-container no está presente en el documento.');
                    }
                } else {
                    console.error('Error al cargar la página ' + url);
                    console.error('Estado de la solicitud:', xhr.status);
                }
            };

            xhr.onerror = function () {
                console.error('Error de red al intentar cargar la página ' + url);
            };

            xhr.send();
        }
    </script>

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