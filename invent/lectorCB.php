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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Markazi+Text:wght@450" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Sistema de Inventario</title>
    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .more-content {
            display: none;
        }

        .show-more-btn {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        /* Campos de colores respecto al campo "Estado" */
        .estado-nueva,
        .estado-buena {
            background-color: rgb(112, 240, 155) !important;
            color: black !important;
            padding: 5px;
            border-radius: 3px;
            text-align: center;
        }

        .estado-regular {
            background-color: rgb(255, 241, 102) !important;
            color: black !important;
            padding: 5px;
            border-radius: 3px;
            text-align: center;
        }

        .estado-no-sirve {
            background-color: rgb(223, 0, 0) !important;
            color: white !important;
            padding: 5px;
            border-radius: 3px;
            text-align: center;
        }

        .sidebar-nav {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 280px;
            background-color: #081856 !important;
            padding-top: 70px;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1000;
            color: white;
            transition: transform 0.3s ease, width 0.3s ease;
        }

        .navbar-nav {
            width: 80%;
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
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        .navbar-toggler {
            margin-left: auto;
        }

        .sidebar-toggle {
            display: flex;
            align-items: center;
            cursor: pointer;
            color: white;
        }

        .table thead {
            background-color: #081856;
            color: white;
        }

        .thead th {
            color: white;
            font-family: "Segoe IU", serif;
            font-size: 120%;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <div class="d-flex align-items-center">
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../php/principal.php">
                    <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
                </a>
                <div class="sidebar-toggle" id="sidebarToggle">
                    <span class="navbar-toggler-icon"></span>
                </div>
            </div>
                
            <div class="collapse navbar-collapse" id="navbarNav">
                <form action="" method="GET" class="form-inline ml-auto">
                    <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" name="enviar" type="submit">Buscar</button>
                </form>
                <a class="btn btn-success ml-2" href="../formulario/formularioLectorCB.php">Añadir</a>
            </div>
        </nav>

        <nav class="sidebar-nav hidden" id="sidebarNav">
            <ul class="navbar-nav flex-column justify-content-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="modo" id="modo"></div>

    <body style="padding-top: 70px;">

        <h1 class="display-6">Tabla de Inventario - Lector Codigo de Barras</h1>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead">
                    <tr>
                        <?php
                        // Establece el valor de las variables de ordenación
                        $order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'Id';
                        $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
                        $new_order = ($order === 'ASC') ? 'DESC' : 'ASC';

                        // Muestra los encabezados de las columnas con enlaces para ordenar
                        ?>
                        <th><a class="text-white"
                                href="?order_by=Id&order=<?php echo $new_order; ?>&busqueda=<?php echo urlencode(isset($_GET['busqueda']) ? $_GET['busqueda'] : ''); ?>">Id</a>
                        </th>
                        <th>
                            <?php if ($order_by === 'clave'): ?>
                                <a href="http://localhost/inventario-serva/invent/lectorCB.php?busqueda=&enviar=">Clave</a>
                            <?php else: ?>
                                <a class="text-white"
                                    href="?order_by=clave&order=<?php echo $order; ?>&busqueda=<?php echo urlencode(isset($_GET['busqueda']) ? $_GET['busqueda'] : ''); ?>">Clave</a>
                            <?php endif; ?>
                        </th>
                        <th>Equipo</th>
                        <th>Numero de Serie</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Especificaciones</th>
                        <th>Cedis</th>
                        <th>Area</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Fecha de Compra</th>
                        <th>Fecha Asignacion de Equipo</th>
                        <th>Comentarios y Observaciones</th>
                        <th>Ver QR</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <?php
                $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
                $resultados_por_pagina = 10;
                $pagina_actual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
                $indice_inicio = ($pagina_actual - 1) * $resultados_por_pagina;

                require("../php/connect2.php");

                $order_by_query = "ORDER BY $order_by $order";
                if ($order_by === 'clave') {
                    $order_by_query = "
                        ORDER BY 
                            SUBSTRING(clave, 1, 2),           -- Ordena por CEDIS
                            SUBSTRING(clave, 3, 3),           -- Ordena por equipo
                            SUBSTRING(clave, 6, 2),           -- Ordena por área
                            CAST(SUBSTRING(clave, LENGTH(clave) - LOCATE('0', REVERSE(clave)) + 2) AS UNSIGNED) -- Ordena por secuencia
                        $order
                    ";
                }

                $sql_paginacion = "SELECT * FROM form_lectorcb WHERE 
                    (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' 
                    OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') AND status = 1 
                    $order_by_query
                    LIMIT $indice_inicio, $resultados_por_pagina";

                $result_paginacion = mysqli_query($conn, $sql_paginacion);

                if ($result_paginacion) {
                    while ($mostrar = mysqli_fetch_array($result_paginacion)) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $mostrar['Id'] ?></td>
                            <td class="text-center"><?php echo $mostrar['clave'] ?></td>
                            <td class="text-center"><?php echo $mostrar['equipo'] ?></td>
                            <td class="text-center"><?php echo $mostrar['numero_serie'] ?></td>
                            <td class="text-center"><?php echo $mostrar['marca'] ?></td>
                            <td class="text-center"><?php echo $mostrar['modelo'] ?></td>
                            <td class="text-center">
                                <?php
                                if (strlen($mostrar['especificaciones']) > 10) {
                                    echo substr($mostrar['especificaciones'], 0, 10) . '<span class="more-content">' . substr($mostrar['especificaciones'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['especificaciones'];
                                }
                                ?>
                            </td>
                            <td class="text-center"><?php echo $mostrar['cedis'] ?></td>
                            <td class="text-center"><?php echo $mostrar['area'] ?></td>
                            <td class="text-center"><?php echo $mostrar['usuario'] ?></td>
                            <td class="text-center <?php
                                        if ($mostrar['estado'] == 'NUEVA') {
                                            echo 'estado-nueva';
                                        } elseif ($mostrar['estado'] == 'BUENA') {
                                            echo 'estado-buena';
                                        } elseif ($mostrar['estado'] == 'REGULAR') {
                                            echo 'estado-regular';
                                        } elseif ($mostrar['estado'] == 'NO SIRVE') {
                                            echo 'estado-no-sirve';
                                        }
                                        ?>">
                                <?php echo $mostrar['estado'] ?>
                            </td>
                            <td class="text-center"><?php echo $mostrar['fechaCo'] ?></td>
                            <td class="text-center"><?php echo $mostrar['fechaAs'] ?></td>
                            <td class="text-center">
                                <?php
                                if (strlen($mostrar['comentarios_observaciones']) > 10) {
                                    echo substr($mostrar['comentarios_observaciones'], 0, 10) . '<span class="more-content">' . substr($mostrar['comentarios_observaciones'], 10) . '</span>';
                                    echo '<span class="show-more-btn"> Ver más</span>';
                                } else {
                                    echo $mostrar['comentarios_observaciones'];
                                }
                                ?>
                            </td>
                            <td class="text-center icon-cell"><a href="../codigo_qr/generarLectorCB.php?id=<?php echo $mostrar['Id']; ?>"><i class="fa fa-qrcode fa-2x"></i></a></td>
                            <td class="text-center icon-cell"><a href="../edit/modificarLectorCB.php?id=<?php echo $mostrar['Id']; ?>"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
                            <td class="text-center icon-cell"><a href="../edit/eliminarLectorCB.php?id=<?php echo $mostrar['Id']; ?>" onclick="return confirm('¿Estás seguro?')"><i class="fa fa-trash-o fa-2x"></i></a></td>
                        </tr>
                        <?php }
                } else {
                    echo "Error en la consulta: " . mysqli_error($conn);
                }
                ?>
                </tbody>
            </table>
        </div>

        <?php
        // Calcular el número total de resultados
        $sql_total_resultados = "SELECT COUNT(*) as total FROM form_lectorcb WHERE 
        (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' 
        OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') AND status = 1";

        $result_total_resultados = mysqli_query($conn, $sql_total_resultados);

        if ($result_total_resultados) {
            $total_resultados = mysqli_fetch_assoc($result_total_resultados)['total'];
            $total_paginas = ceil($total_resultados / $resultados_por_pagina);
        } else {
            echo "Error al obtener el total de resultados.";
            exit();
        }
        ?>

        <div style="height: 20px;"></div>

        <div class="d-flex justify-content-center">
            <nav aria-label="Paginación de inventario">
                <ul class="pagination">
                    <!-- Botón Anterior -->
                    <li class="page-item <?php echo ($pagina_actual <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link"
                            href="?pagina=<?php echo ($pagina_actual <= 1) ? 1 : ($pagina_actual - 1); ?>&order_by=<?php echo $order_by; ?>&order=<?php echo $order; ?>&busqueda=<?php echo urlencode($busqueda); ?>">Anterior</a>
                    </li>

                    <?php
                    // Limita el número de páginas mostradas a solo 4
                    $max_paginas_mostradas = 4;

                    $mitad_max_paginas = floor($max_paginas_mostradas / 2);
                    $pagina_inicio = max(1, $pagina_actual - $mitad_max_paginas);
                    $pagina_fin = min($total_paginas, $pagina_inicio + $max_paginas_mostradas - 1);

                    if ($pagina_fin - $pagina_inicio < $max_paginas_mostradas - 1) {
                        $pagina_inicio = max(1, $pagina_fin - $max_paginas_mostradas + 1);
                    }

                    // Muestra "..." si hay más páginas antes de la primera página mostrada
                    if ($pagina_inicio > 1) {
                        echo '<li class="page-item"><a class="page-link" href="?pagina=1&order_by=' . $order_by . '&order=' . $order . '&busqueda=' . urlencode($busqueda) . '">1</a></li>';
                        if ($pagina_inicio > 2) {
                            echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                        }
                    }

                    // Muestra las páginas
                    for ($i = $pagina_inicio; $i <= $pagina_fin; $i++) {
                        echo '<li class="page-item ' . (($pagina_actual == $i) ? 'active' : '') . '"><a class="page-link" href="?pagina=' . $i . '&order_by=' . $order_by . '&order=' . $order . '&busqueda=' . urlencode($busqueda) . '">' . $i . '</a></li>';
                    }

                    // Muestra "..." si hay más páginas después de la última página mostrada
                    if ($pagina_fin < $total_paginas) {
                        if ($pagina_fin < $total_paginas - 1) {
                            echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                        }
                        echo '<li class="page-item"><a class="page-link" href="?pagina=' . $total_paginas . '&order_by=' . $order_by . '&order=' . $order . '&busqueda=' . urlencode($busqueda) . '">' . $total_paginas . '</a></li>';
                    }
                    ?>

                    <!-- Botón Siguiente -->
                    <li class="page-item <?php echo ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">
                        <a class="page-link"
                            href="?pagina=<?php echo ($pagina_actual >= $total_paginas) ? $total_paginas : ($pagina_actual + 1); ?>&order_by=<?php echo $order_by; ?>&order=<?php echo $order; ?>&busqueda=<?php echo urlencode($busqueda); ?>">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div><br><br>


    <?php
    // Cerrar la conexión
    $conn->close();
    ?>

    <script src="../js/main.js"></script>

    <!-- <script>
        // Bloquear clic derecho y teclas específicas
        $(document).ready(function () {
            // Bloquear clic derecho
            $(document).bind("contextmenu", function (e) {
                e.preventDefault();
            });

            // Bloquear ciertas teclas (F12, Ctrl+U, Ctrl+Shift+I)
            $(document).keydown(function (e) {
                if (e.which === 123) { // F12
                    return false;
                }
                if (e.ctrlKey && (e.shiftKey && e.keyCode === 73)) { // Ctrl+Shift+I
                    return false;
                }
                if (e.ctrlKey && (e.keyCode === 85 || e.keyCode === 117)) { // Ctrl+U
                    return false;
                }
            });
        });</script> -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var showMoreBtns = document.querySelectorAll('.show-more-btn');
            showMoreBtns.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var moreContent = this.previousElementSibling;
                    if (moreContent.style.display === 'none') {
                        moreContent.style.display = 'inline';
                        this.textContent = ' Ver menos';
                    } else {
                        moreContent.style.display = 'none';
                        this.textContent = ' Ver más';
                    }
                });
            });

            var sidebarToggle = document.getElementById('sidebarToggle');
            var sidebarNav = document.getElementById('sidebarNav');
            var mainContent = document.querySelector('.main-content');

            sidebarToggle.addEventListener('click', function () {
                sidebarNav.classList.toggle('hidden');
                mainContent.classList.toggle('expanded');
            });
        });
    </script>

    <?php include '../css/footer.php' ?>
</body>

</html>
