<?php
session_name('inventario'); // Debe ser el mismo nombre de sesión
session_start();

if (!isset($_SESSION['user_id'])) {
    // Si no hay sesión activa, redirige a la página de inicio de sesión
    header("Location: ./inicioSesion.php");
    exit();
}

// Si la sesión está activa, puedes mostrar el contenido de la página
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Sistema de Inventario</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            overflow-x: hidden;
        }

        .sidebar-nav {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 280px;
            background-color: #081856 !important;
            padding-top: 100px; /* Ajustado para la altura de la barra de navegación */
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1000;
            color: white;
            transition: transform 0.3s ease, width 0.3s ease;
        }

        .navbar-nav {
            width: 80%; /* Mover Menu */
        }

        .sidebar-nav.hidden {
            transform: translateX(-100%);
        }

        .sidebar-nav.show {
            transform: translateX(0);
        }

        .sidebar-nav .navbar-brand {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar-nav .welcome-text {
            text-align: left;
            margin-bottom: 20px;
        }

        .sidebar-nav .nav-item {
            width: 100%;
        }

        .sidebar-nav .nav-link {
            color: white;
            display: flex;
            align-items: center;
        }

        .sidebar-nav .nav-link i {
            margin-right: 10px;
        }

        .sidebar-nav .dropdown-menu {
            position: static;
            float: none;
            width: 100%;
            background: rgb(4, 24, 27);
        }

        .sidebar-nav .dropdown-menu a {
            color: white;
        }

        .main-content {
            margin-left: 280px;
            padding: 120px;
            flex: 1;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        .navbar-toggler {
            margin-left: auto;
        }

        @media (max-width: 768px) {
            .sidebar-nav {
                width: 100%;
                height: auto;
                position: fixed;
                transform: translateX(-100%);
                z-index: 1000;
            }

            .sidebar-nav.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .main-content.expanded {
                margin-left: 0;
            }
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand,
        .navbar-toggler {
            display: flex;
            align-items: center;
        }

        .welcome-text {
            flex: 1;
            text-align: center;
            display: none; /* Oculto por defecto */
        }

        @media (min-width: 769px) {
            .welcome-text {
                display: block; /* Mostrar en pantallas más grandes */
            }
        }

        .card-body {
            position: relative;
            z-index: 1;
        }

        .card-body::after {
            content: '\f00c'; /* Icono por defecto */
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            top: 10%;
            right: 10px;
            transform: translateY(-10%);
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.3); /* Color blanco con baja opacidad */
            z-index: 0;
        }

        .bg-primary .card-body::after {
            content: '\f233'; /* Todos los equipos */
        }

        .bg-secondary .card-body::after {
            content: '\f085'; /* Equipos en Reparación */
        }

        .bg-success .card-body::after {
            content: '\f073'; /* Próximos Mantenimientos */
        }

        .bg-danger .card-body::after {
            content: '\f7d9'; /* Equipos en Mantenimiento */
        }

        .bg-warning .card-body::after {
            content: '\f058'; /* CheckList de Mantenimientos */
        }

        .bg-info .card-body::after {
            content: '\f02e'; /* Solicitud para Baja de Equipos */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="principal.php">
                <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="welcome-text text-white">
                Bienvenido de nuevo <?php echo $_SESSION['usuario']; ?>
                <div class="modo" id="modo">
                    <i class="fas fa-toggle-off fa-1x"></i>
                </div>
            </div>
        </div>
    </nav>

    <nav class="sidebar-nav" id="sidebarNav">
        <ul class="navbar-nav flex-column justify-content-center">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Inventario
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item d-flex justify-content-between" href="../invent/pc.php">PC <i class="bi bi-pc-display"></i></a>
                    <a class="dropdown-item d-flex justify-content-between" href="../invent/monitores.php">Monitores <i class="fa fa-desktop" aria-hidden="true"></i></a>
                    <a class="dropdown-item d-flex justify-content-between" href="../invent/impresoras.php">Impresoras <i class="fa fa-print" aria-hidden="true"></i></a>
                    <a class="dropdown-item d-flex justify-content-between" href="../invent/handHeld.php">Hand Held <i class="fas fa-chalkboard" aria-hidden="true"></i></a>
                    <a class="dropdown-item d-flex justify-content-between" href="../invent/pantallas.php">Pantallas <i class="fa fa-television" aria-hidden="true"></i></a>
                    <a class="dropdown-item d-flex justify-content-between" href="../invent/laptops.php">Laptops <i class="fa fa-laptop" aria-hidden="true"></i></a>
                    <a class="dropdown-item d-flex justify-content-between" href="../invent/noBreak.php">NoBreak <i class="fa fa-bolt" aria-hidden="true"></i></a>
                    <a class="dropdown-item d-flex justify-content-between" href="../invent/switchesyaccessp.php">Switches y Access Point <i class="fa fa-wifi" aria-hidden="true"></i></a>
                    <a class="dropdown-item d-flex justify-content-between" href="../invent/dde.php">Discos duros Externos <i class="fa fa-hdd-o" aria-hidden="true"></i></a>
                    <a class="dropdown-item d-flex justify-content-between" href="../invent/lectorCB.php">Lector Codigo de Barras <i class="bi bi-upc"></i></a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bajas.php">Bajas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cerrarSesion.php">Cerrar Sesión</a>
            </li>
        </ul>
    </nav>

    <body style="padding-top: 30px;"></body>

    <main class="main-content" id="mainContent">
        <div class="container mt-5">
            <!-- Primera fila de 2 botones -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <div class="card text-white bg-primary h-100">
                        <div class="card-body">
                            <h5 class="card-title">Todos los equipos</h5>
                            <p class="card-text">Ver tabla general de equipos registrados</p>
                            <a href="todosEquipos.php" class="btn btn-light">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <div class="card text-white bg-secondary h-100">
                        <div class="card-body">
                            <h5 class="card-title">Equipos en Reparación</h5>
                            <p class="card-text">Equipos que están siendo reparados</p>
                            <a href="equiposReparacion.php" class="btn btn-light">Ver detalles</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Segunda fila de 2 botones -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <div class="card text-white bg-success h-100">
                        <div class="card-body">
                            <h5 class="card-title">Próximos Mantenimientos</h5>
                            <p class="card-text">Calendario de mantenimientos</p>
                            <a href="../calendario/index.php" class="btn btn-light">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body">
                            <h5 class="card-title">Equipos en Mantenimiento</h5>
                            <p class="card-text">Equipos que están en mantenimiento</p>
                            <a href="equiposMantenimientos.php" class="btn btn-light">Ver detalles</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tercera fila de 2 botones -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body">
                            <h5 class="card-title">CheckList de Mantenimientos</h5>
                            <p class="card-text">Verificar listas de mantenimientos</p>
                            <a href="../checkList/tablaChecklist.php" class="btn btn-light">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body">
                            <h5 class="card-title">Solicitud para Baja de Equipos</h5>
                            <p class="card-text">Solicitar la baja de equipos</p>
                            <a href="../soliBajas/bajaEquipo.php" class="btn btn-light">Ver detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
    </main>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebarNav = document.getElementById('sidebarNav');
            var mainContent = document.getElementById('mainContent');

            // Comprobar el estado almacenado en localStorage
            if (localStorage.getItem('sidebarState') === 'open') {
                sidebarNav.classList.remove('hidden');
                sidebarNav.classList.add('show');
                mainContent.classList.remove('expanded');
            } else {
                sidebarNav.classList.add('hidden');
                sidebarNav.classList.remove('show');
                mainContent.classList.add('expanded');
            }

            document.querySelector('.navbar-toggler').addEventListener('click', function() {
                sidebarNav.classList.toggle('hidden');
                sidebarNav.classList.toggle('show');
                mainContent.classList.toggle('expanded');

                // Guardar el estado del sidebar en localStorage
                if (sidebarNav.classList.contains('hidden')) {
                    localStorage.setItem('sidebarState', 'closed');
                } else {
                    localStorage.setItem('sidebarState', 'open');
                }
            });
        });
    </script>

    <?php include '../css/footer.php'; ?>

</body>
</html>
