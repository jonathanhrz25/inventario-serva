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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bsootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Sistema de Inventario</title>
    <!-- Agregar enlaces a tus archivos CSS y JS -->

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
    <h1 class="display-5">Bajas de Equipos</h1>
</head>

<div class="modo" id="modo"></div>

<div style="height: 40px;"></div>


<body>
    <!-- Botones con enlaces a la misma página -->
    <div class="container mt-6">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary" onclick="cargarContenido('PC')">PC</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido('Monitor')">Monitor</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido('Impresora')">Impresora</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary" onclick="cargarContenido('Hand Held')">Hand
                    Held</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido('Pantalla')">Pantalla</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido('Laptop')">Laptop</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido('NoBreak')">NoBreak</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"
                    onclick="cargarContenido('Switches y Access Points')">Switches y Access Points</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary" onclick="cargarContenido('Disco Duro')">Disco
                    Duro</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary" onclick="cargarContenido('Lector Codigo de Barras')">Lector Codigo de Barras</button>
            </li>
            <!-- Agrega más botones según sea necesario -->
        </ul>
    </div>


    <?php
    require("../php/connect2.php");
    ?>

    <!-- Contenedor para mostrar la información -->
    <div id="info-container" class="info-container">


        <?php
        // Verificar si 'enviar' está definido
        if (isset($_GET['enviar'])) {
            $tipo = $_GET['enviar'];
            $busqueda = isset($_GET["busqueda"]) ? $_GET["busqueda"] : "";

            // Verificar si $conn está definido y no es null
            if (isset($conn) && !is_null($conn)) {
                // Inicializar la consulta SQL
                $sql = "";

                // Consulta SQL para buscar en la tabla correspondiente según el botón presionado
                if ($tipo === 'PC') {
                    $sql = "SELECT * FROM form_pc WHERE status = '0'";
                    $stmt = mysqli_prepare($conn, $sql);

                } elseif ($tipo === 'Monitor') {
                    $sql = "SELECT * FROM form_monitor WHERE status = '0'";
                    $stmt = mysqli_prepare($conn, $sql);

                } elseif ($tipo === 'Impresora') {
                    $sql = "SELECT * FROM form_impresora WHERE status = '0'";
                    $stmt = mysqli_prepare($conn, $sql);

                } elseif ($tipo === 'Hand Held') {
                    $sql = "SELECT * FROM form_hh WHERE status = '0'";
                    $stmt = mysqli_prepare($conn, $sql);

                } elseif ($tipo === 'Pantalla') {
                    $sql = "SELECT * FROM form_pantalla WHERE status = '0'";
                    $stmt = mysqli_prepare($conn, $sql);

                } elseif ($tipo === 'Laptop') {
                    $sql = "SELECT * FROM form_laptop WHERE status = '0'";
                    $stmt = mysqli_prepare($conn, $sql);

                } elseif ($tipo === 'NoBreak') {
                    $sql = "SELECT * FROM form_nobreak WHERE status = '0'";
                    $stmt = mysqli_prepare($conn, $sql);

                } elseif ($tipo === 'Switches y Access Points') {
                    $sql = "SELECT * FROM form_switch_aps WHERE status = '0'";
                    $stmt = mysqli_prepare($conn, $sql);

                } elseif ($tipo === 'Disco Duro') {
                    $sql = "SELECT * FROM form_dde WHERE status = '0'";
                    $stmt = mysqli_prepare($conn, $sql);

                } elseif ($tipo === 'Lector Codigo de Barras') {
                    $sql = "SELECT * FROM form_lectorcb WHERE status = '0'";
                    $stmt = mysqli_prepare($conn, $sql);

                }

                // Agregar condiciones de búsqueda si se proporciona una búsqueda
                if (!empty($busqueda)) {
                    $busqueda = "%$busqueda%";
                    $sql .= " AND (clave LIKE ? OR numero_serie LIKE ?)";
                }

                // Eliminar el espacio redundante antes de AND
                $sql = str_replace(" AND", " ", $sql);

                // Preparar la consulta
                $stmt = mysqli_prepare($conn, $sql);

                // Verificar si la preparación de la consulta fue exitosa
                if ($stmt) {
                    // Agregar condiciones de búsqueda si se proporciona una búsqueda
                    if (!empty($busqueda)) {
                        mysqli_stmt_bind_param($stmt, "ss", $busqueda, $busqueda);
                    }
                }
                // Ejecutar la consulta
                $result = mysqli_stmt_execute($stmt);

                // Ejecutar la consulta solo si $sql no está vacío
                if (!empty($sql)) {
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // Tu código para imprimir la tabla
                    } else {
                        echo 'Error al ejecutar la consulta: ' . mysqli_error($conn);
                    }
                } else {
                    echo 'La consulta SQL está vacía.';
                }
            } else {
                echo 'La conexión a la base de datos no está establecida.';
            }
        }

        ?>

    </div>

    <script>
        function cargarContenido(tipo) {
            var xhr = new XMLHttpRequest();
            var url = '';

            // Determinar la URL según el botón presionado
            if (tipo === 'PC') {
                url = '../bajas/bajasPC.php';
            } else if (tipo === 'Monitor') {
                url = '../bajas/bajasMonitor.php';
            } else if (tipo === 'Impresora') {
                url = '../bajas/bajasImpresora.php';
            } else if (tipo === 'Hand Held') {
                url = '../bajas/bajasHandHeld.php';
            } else if (tipo === 'Pantalla') {
                url = '../bajas/bajasPantalla.php';
            } else if (tipo === 'Laptop') {
                url = '../bajas/bajasLaptop.php';
            } else if (tipo === 'NoBreak') {
                url = '../bajas/bajasNoBreak.php';
            } else if (tipo === 'Switches y Access Points') {
                url = '../bajas/bajasSyA.php';
            } else if (tipo === 'Disco Duro') {
                url = '../bajas/bajasDDE.php';
            } else if (tipo === 'Lector Codigo de Barras') {
                url = '../bajas/bajasCB.php';
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