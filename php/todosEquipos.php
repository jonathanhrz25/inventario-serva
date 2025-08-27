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

// Inicializar la variable de búsqueda
$busqueda = "";

// Verificar si se proporcionó un parámetro de búsqueda
if (isset($_GET['enviar'])) {
    $busqueda = $_GET["busqueda"];

    // Consulta SQL para buscar en las tablas
    $sql_pc = "SELECT * FROM form_pc WHERE 
                   (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' OR equipo LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') 
                   AND status = 1";
    $result_pc = mysqli_query($conn, $sql_pc);

    $sql_monitor = "SELECT * FROM form_monitor WHERE 
                        (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' OR equipo LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') 
                        AND status = 1";
    $result_monitor = mysqli_query($conn, $sql_monitor);

    $sql_impresora = "SELECT * FROM form_impresora WHERE 
                        (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' OR equipo LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') 
                        AND status = 1";
    $result_impresora = mysqli_query($conn, $sql_impresora);

    $sql_hh = "SELECT * FROM form_hh WHERE 
                        (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR ip LIKE '%$busqueda%' OR area LIKE '%$busqueda%' OR equipo LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') 
                        AND status = 1";
    $result_hh = mysqli_query($conn, $sql_hh);

    $sql_pantalla = "SELECT * FROM form_pantalla WHERE 
                        (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' OR equipo LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') 
                        AND status = 1";
    $result_pantalla = mysqli_query($conn, $sql_pantalla);

    $sql_laptop = "SELECT * FROM form_laptop WHERE 
                        (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' OR equipo LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') 
                        AND status = 1";
    $result_laptop = mysqli_query($conn, $sql_laptop);

    $sql_nobreak = "SELECT * FROM form_nobreak WHERE 
                        (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' OR equipo LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') 
                        AND status = 1";
    $result_nobreak = mysqli_query($conn, $sql_nobreak);

    $sql_switch_aps = "SELECT * FROM form_switch_aps WHERE 
                        (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' OR equipo LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') 
                        AND status = 1";
    $result_switch_aps = mysqli_query($conn, $sql_switch_aps);

    $sql_dde = "SELECT * FROM form_dde WHERE 
                        (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' OR equipo LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') 
                        AND status = 1";
    $result_dde = mysqli_query($conn, $sql_dde);

    $sql_CB = "SELECT * FROM form_lectorcb WHERE 
                        (clave LIKE '%$busqueda%' OR numero_serie LIKE '%$busqueda%' OR area LIKE '%$busqueda%' OR equipo LIKE '%$busqueda%' OR usuario LIKE '%$busqueda%' OR cedis LIKE '%$busqueda%') 
                        AND status = 1";
    $result_CB = mysqli_query($conn, $sql_CB);

} else {
    // Si no hay parámetro de búsqueda, obtener todos los registros
    $sql_pc = "SELECT * FROM form_pc WHERE status = 1";
    $result_pc = mysqli_query($conn, $sql_pc);

    $sql_monitor = "SELECT * FROM form_monitor WHERE status = 1";
    $result_monitor = mysqli_query($conn, $sql_monitor);

    $sql_impresora = "SELECT * FROM form_impresora WHERE status = 1";
    $result_impresora = mysqli_query($conn, $sql_impresora);

    $sql_hh = "SELECT * FROM form_hh WHERE status = 1";
    $result_hh = mysqli_query($conn, $sql_hh);

    $sql_pantalla = "SELECT * FROM form_pantalla WHERE status = 1";
    $result_pantalla = mysqli_query($conn, $sql_pantalla);

    $sql_laptop = "SELECT * FROM form_laptop WHERE status = 1";
    $result_laptop = mysqli_query($conn, $sql_laptop);

    $sql_nobreak = "SELECT * FROM form_nobreak WHERE status = 1";
    $result_nobreak = mysqli_query($conn, $sql_nobreak);

    $sql_switch_aps = "SELECT * FROM form_switch_aps WHERE status = 1";
    $result_switch_aps = mysqli_query($conn, $sql_switch_aps);

    $sql_dde = "SELECT * FROM form_dde WHERE status = 1";
    $result_dde = mysqli_query($conn, $sql_dde);

    $sql_CB = "SELECT * FROM form_lectorcb WHERE status = 1";
    $result_CB = mysqli_query($conn, $sql_CB);

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
            /* Asegura que el texto sea legible */
            padding: 5px;
            border-radius: 3px;
            text-align: center;
        }

        .estado-regular {
            background-color: rgb(255, 241, 102) !important;
            color: black !important;
            /* Asegura que el texto sea legible */
            padding: 5px;
            border-radius: 3px;
            text-align: center;
        }

        .estado-no-sirve {
            background-color: rgb(223, 0, 0) !important;
            color: white !important;
            /* Asegura que el texto sea legible */
            padding: 5px;
            border-radius: 3px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <a class="navbar-brand" href="../php/principal.php">
                <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form action="" method="GET" class="form-inline ml-auto">
                    <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Buscar"
                        aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" name="enviar" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </header><br><br><br>

    <div class="modo" id="modo"></div>

    <!-- <div class="container mt-5"><br> -->
    <h1 class="display-6">Tabla General de Equipos</h1>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Equipo</th>
                    <th>Numero de Serie</th>
                    <th>Clave</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Estado</th>
                    <th>Cedis</th>
                    <th>Area</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <?php
            // Iterar sobre los resultados de la tabla form_pc
            while ($mostrar_pc = mysqli_fetch_array($result_pc)) {
                ?>
                <tr>
                    <td><?php echo $mostrar_pc['Id'] ?></td>
                    <td><?php echo $mostrar_pc['equipo'] ?></td>
                    <td><?php echo $mostrar_pc['numero_serie'] ?></td>
                    <td><?php echo $mostrar_pc['clave'] ?></td>
                    <td><?php echo $mostrar_pc['marca'] ?></td>
                    <td><?php echo $mostrar_pc['modelo'] ?></td>
                    <td class="<?php
                    if ($mostrar_pc['estado'] == 'NUEVA') {
                        echo 'estado-nueva';
                    } elseif ($mostrar_pc['estado'] == 'BUENA') {
                        echo 'estado-buena';
                    } elseif ($mostrar_pc['estado'] == 'REGULAR') {
                        echo 'estado-regular';
                    } elseif ($mostrar_pc['estado'] == 'NO SIRVE') {
                        echo 'estado-no-sirve';
                    }
                    ?>">
                        <?php echo $mostrar_pc['estado'] ?>
                    </td>
                    <td><?php echo $mostrar_pc['cedis'] ?></td>
                    <td><?php echo $mostrar_pc['area'] ?></td>
                    <td><?php echo $mostrar_pc['usuario'] ?></td>
                </tr>
                <?php
            }

            // Iterar sobre los resultados de la tabla form_monitor
            while ($mostrar_monitor = mysqli_fetch_array($result_monitor)) {
                ?>
                <tr>
                    <td><?php echo $mostrar_monitor['Id'] ?></td>
                    <td><?php echo $mostrar_monitor['equipo'] ?></td>
                    <td><?php echo $mostrar_monitor['numero_serie'] ?></td>
                    <td><?php echo $mostrar_monitor['clave'] ?></td>
                    <td><?php echo $mostrar_monitor['marca'] ?></td>
                    <td><?php echo $mostrar_monitor['modelo'] ?></td>
                    <td class="<?php
                    if ($mostrar_monitor['estado'] == 'NUEVA') {
                        echo 'estado-nueva';
                    } elseif ($mostrar_monitor['estado'] == 'BUENA') {
                        echo 'estado-buena';
                    } elseif ($mostrar_monitor['estado'] == 'REGULAR') {
                        echo 'estado-regular';
                    } elseif ($mostrar_monitor['estado'] == 'NO SIRVE') {
                        echo 'estado-no-sirve';
                    }
                    ?>">
                        <?php echo $mostrar_monitor['estado'] ?>
                    </td>
                    <td><?php echo $mostrar_monitor['cedis'] ?></td>
                    <td><?php echo $mostrar_monitor['area'] ?></td>
                    <td><?php echo $mostrar_monitor['usuario'] ?>
                    </td>
                </tr>
                <?php
            }

            // Iterar sobre los resultados de la tabla form_impresora
            while ($mostrar_impresora = mysqli_fetch_array($result_impresora)) {
                ?>
                <tr>
                    <td><?php echo $mostrar_impresora['Id'] ?></td>
                    <td><?php echo $mostrar_impresora['equipo'] ?></td>
                    <td><?php echo $mostrar_impresora['numero_serie'] ?></td>
                    <td><?php echo $mostrar_impresora['clave'] ?></td>
                    <td><?php echo $mostrar_impresora['marca'] ?></td>
                    <td><?php echo $mostrar_impresora['modelo'] ?></td>
                    <td class="<?php
                    if ($mostrar_impresora['estado'] == 'NUEVA') {
                        echo 'estado-nueva';
                    } elseif ($mostrar_impresora['estado'] == 'BUENA') {
                        echo 'estado-buena';
                    } elseif ($mostrar_impresora['estado'] == 'REGULAR') {
                        echo 'estado-regular';
                    } elseif ($mostrar_impresora['estado'] == 'NO SIRVE') {
                        echo 'estado-no-sirve';
                    }
                    ?>">
                        <?php echo $mostrar_impresora['estado'] ?>
                    </td>
                    <td><?php echo $mostrar_impresora['cedis'] ?></td>
                    <td><?php echo $mostrar_impresora['area'] ?></td>
                    <td><?php echo $mostrar_impresora['usuario'] ?>
                    </td>
                </tr>
                <?php
            }

            // Iterar sobre los resultados de la tabla form_hh
            while ($mostrar_hh = mysqli_fetch_array($result_hh)) {
                ?>
                <tr>
                    <td><?php echo $mostrar_hh['Id'] ?></td>
                    <td><?php echo $mostrar_hh['equipo'] ?></td>
                    <td><?php echo $mostrar_hh['numero_serie'] ?></td>
                    <td><?php echo $mostrar_hh['clave'] ?></td>
                    <td><?php echo $mostrar_hh['marca'] ?></td>
                    <td><?php echo $mostrar_hh['modelo'] ?></td>
                    <td class="<?php
                    if ($mostrar_hh['estado'] == 'NUEVA') {
                        echo 'estado-nueva';
                    } elseif ($mostrar_hh['estado'] == 'BUENA') {
                        echo 'estado-buena';
                    } elseif ($mostrar_hh['estado'] == 'REGULAR') {
                        echo 'estado-regular';
                    } elseif ($mostrar_hh['estado'] == 'NO SIRVE') {
                        echo 'estado-no-sirve';
                    }
                    ?>">
                        <?php echo $mostrar_hh['estado'] ?>
                    </td>
                    <td><?php echo $mostrar_hh['cedis'] ?></td>
                    <td><?php echo $mostrar_hh['area'] ?></td>
                    <td><?php echo $mostrar_hh['usuario'] ?></td>
                </tr>
                <?php
            }

            // Iterar sobre los resultados de la tabla form_pantalla
            while ($mostrar_pantalla = mysqli_fetch_array($result_pantalla)) {
                ?>
                <tr>
                    <td><?php echo $mostrar_pantalla['Id'] ?></td>
                    <td><?php echo $mostrar_pantalla['equipo'] ?></td>
                    <td><?php echo $mostrar_pantalla['numero_serie'] ?></td>
                    <td><?php echo $mostrar_pantalla['clave'] ?></td>
                    <td><?php echo $mostrar_pantalla['marca'] ?></td>
                    <td><?php echo $mostrar_pantalla['modelo'] ?></td>
                    <td class="<?php
                    if ($mostrar_pantalla['estado'] == 'NUEVA') {
                        echo 'estado-nueva';
                    } elseif ($mostrar_pantalla['estado'] == 'BUENA') {
                        echo 'estado-buena';
                    } elseif ($mostrar_pantalla['estado'] == 'REGULAR') {
                        echo 'estado-regular';
                    } elseif ($mostrar_pantalla['estado'] == 'NO SIRVE') {
                        echo 'estado-no-sirve';
                    }
                    ?>">
                        <?php echo $mostrar_pantalla['estado'] ?>
                    </td>
                    <td><?php echo $mostrar_pantalla['cedis'] ?></td>
                    <td><?php echo $mostrar_pantalla['area'] ?></td>
                    <td><?php echo $mostrar_pantalla['usuario'] ?></td>
                </tr>
                <?php
            }

            // Iterar sobre los resultados de la tabla form_impresora
            while ($mostrar_laptop = mysqli_fetch_array($result_laptop)) {
                ?>
                <tr>
                    <td><?php echo $mostrar_laptop['Id'] ?></td>
                    <td><?php echo $mostrar_laptop['equipo'] ?></td>
                    <td><?php echo $mostrar_laptop['numero_serie'] ?></td>
                    <td><?php echo $mostrar_laptop['clave'] ?></td>
                    <td><?php echo $mostrar_laptop['marca'] ?></td>
                    <td><?php echo $mostrar_laptop['modelo'] ?></td>
                    <td class="<?php
                    if ($mostrar_laptop['estado'] == 'NUEVA') {
                        echo 'estado-nueva';
                    } elseif ($mostrar_laptop['estado'] == 'BUENA') {
                        echo 'estado-buena';
                    } elseif ($mostrar_laptop['estado'] == 'REGULAR') {
                        echo 'estado-regular';
                    } elseif ($mostrar_laptop['estado'] == 'NO SIRVE') {
                        echo 'estado-no-sirve';
                    }
                    ?>">
                        <?php echo $mostrar_laptop['estado'] ?>
                    </td>
                    <td><?php echo $mostrar_laptop['cedis'] ?></td>
                    <td><?php echo $mostrar_laptop['area'] ?></td>
                    <td><?php echo $mostrar_laptop['usuario'] ?></td>
                </tr>
                <?php
            }

            // Iterar sobre los resultados de la tabla form_nobreak
            while ($mostrar_nobreak = mysqli_fetch_array($result_nobreak)) {
                ?>
                <tr>
                    <td><?php echo $mostrar_nobreak['Id'] ?></td>
                    <td><?php echo $mostrar_nobreak['equipo'] ?></td>
                    <td><?php echo $mostrar_nobreak['numero_serie'] ?></td>
                    <td><?php echo $mostrar_nobreak['clave'] ?></td>
                    <td><?php echo $mostrar_nobreak['marca'] ?></td>
                    <td><?php echo $mostrar_nobreak['modelo'] ?></td>
                    <td class="<?php
                    if ($mostrar_nobreak['estado'] == 'NUEVA') {
                        echo 'estado-nueva';
                    } elseif ($mostrar_nobreak['estado'] == 'BUENA') {
                        echo 'estado-buena';
                    } elseif ($mostrar_nobreak['estado'] == 'REGULAR') {
                        echo 'estado-regular';
                    } elseif ($mostrar_nobreak['estado'] == 'NO SIRVE') {
                        echo 'estado-no-sirve';
                    }
                    ?>">
                        <?php echo $mostrar_nobreak['estado'] ?>
                    </td>
                    <td><?php echo $mostrar_nobreak['cedis'] ?></td>
                    <td><?php echo $mostrar_nobreak['area'] ?></td>
                    <td><?php echo $mostrar_nobreak['usuario'] ?></td>
                </tr>
                <?php
            }

            // Iterar sobre los resultados de la tabla form_switch_aps
            while ($mostrar_switch_aps = mysqli_fetch_array($result_switch_aps)) {
                ?>
                <tr>
                    <td><?php echo $mostrar_switch_aps['Id'] ?></td>
                    <td><?php echo $mostrar_switch_aps['equipo'] ?></td>
                    <td><?php echo $mostrar_switch_aps['numero_serie'] ?></td>
                    <td><?php echo $mostrar_switch_aps['clave'] ?></td>
                    <td><?php echo $mostrar_switch_aps['marca'] ?></td>
                    <td><?php echo $mostrar_switch_aps['modelo'] ?></td>
                    <td class="<?php
                    if ($mostrar_switch_aps['estado'] == 'NUEVA') {
                        echo 'estado-nueva';
                    } elseif ($mostrar_switch_aps['estado'] == 'BUENA') {
                        echo 'estado-buena';
                    } elseif ($mostrar_switch_aps['estado'] == 'REGULAR') {
                        echo 'estado-regular';
                    } elseif ($mostrar_switch_aps['estado'] == 'NO SIRVE') {
                        echo 'estado-no-sirve';
                    }
                    ?>">
                        <?php echo $mostrar_switch_aps['estado'] ?>
                    </td>
                    <td><?php echo $mostrar_switch_aps['cedis'] ?></td>
                    <td><?php echo $mostrar_switch_aps['area'] ?></td>
                    <td><?php echo $mostrar_switch_aps['usuario'] ?></td>
                </tr>
                <?php
            }

            // Iterar sobre los resultados de la tabla form_dde
            while ($mostrar_dde = mysqli_fetch_array($result_dde)) {
                ?>
                <tr>
                    <td><?php echo $mostrar_dde['Id'] ?></td>
                    <td><?php echo $mostrar_dde['equipo'] ?></td>
                    <td><?php echo $mostrar_dde['numero_serie'] ?></td>
                    <td><?php echo $mostrar_dde['clave'] ?></td>
                    <td><?php echo $mostrar_dde['marca'] ?></td>
                    <td><?php echo $mostrar_dde['modelo'] ?></td>
                    <td class="<?php
                    if ($mostrar_dde['estado'] == 'NUEVA') {
                        echo 'estado-nueva';
                    } elseif ($mostrar_dde['estado'] == 'BUENA') {
                        echo 'estado-buena';
                    } elseif ($mostrar_dde['estado'] == 'REGULAR') {
                        echo 'estado-regular';
                    } elseif ($mostrar_dde['estado'] == 'NO SIRVE') {
                        echo 'estado-no-sirve';
                    }
                    ?>">
                        <?php echo $mostrar_dde['estado'] ?>
                    </td>
                    <td><?php echo $mostrar_dde['cedis'] ?></td>
                    <td><?php echo $mostrar_dde['area'] ?></td>
                    <td><?php echo $mostrar_dde['usuario'] ?></td>
                </tr>
                <?php
            }

            // Iterar sobre los resultados de la tabla form_lectorcb
            while ($mostrar_CB = mysqli_fetch_array($result_CB)) {
                ?>
                <tr>
                    <td><?php echo $mostrar_CB['Id'] ?></td>
                    <td><?php echo $mostrar_CB['equipo'] ?></td>
                    <td><?php echo $mostrar_CB['numero_serie'] ?></td>
                    <td><?php echo $mostrar_CB['clave'] ?></td>
                    <td><?php echo $mostrar_CB['marca'] ?></td>
                    <td><?php echo $mostrar_CB['modelo'] ?></td>
                    <td class="<?php
                    if ($mostrar_CB['estado'] == 'NUEVA') {
                        echo 'estado-nueva';
                    } elseif ($mostrar_CB['estado'] == 'BUENA') {
                        echo 'estado-buena';
                    } elseif ($mostrar_CB['estado'] == 'REGULAR') {
                        echo 'estado-regular';
                    } elseif ($mostrar_CB['estado'] == 'NO SIRVE') {
                        echo 'estado-no-sirve';
                    }
                    ?>">
                        <?php echo $mostrar_CB['estado'] ?>
                    </td>
                    <td><?php echo $mostrar_CB['cedis'] ?></td>
                    <td><?php echo $mostrar_CB['area'] ?></td>
                    <td><?php echo $mostrar_CB['usuario'] ?></td>
                </tr>
                <?php
            }

            // Repite este patrón para otras tablas (form_impresora, form_hh, form_pantalla, etc.)
            ?>
        </table>
    </div><br><br><br>
    </div>

    <?php
    // Cerrar la conexión
    $conn->close();
    ?>

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

    <script>
        // JavaScript para mostrar el contenido completo al hacer clic en "Ver más"
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
        });
    </script>

    <?php include '../css/footer.php' ?>
</body>

</html>