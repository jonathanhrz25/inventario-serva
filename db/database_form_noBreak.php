<?php
session_start();
require("../php/connect2.php"); // Conexión a inventario-serva (MySQLi)
require("../php/connect_estadisticas.php"); // Conexión a estadisticas_cedis (PDO)

// Recopilar datos del formulario - NoBreak
$equipo = $_POST['equipo'];
$serie = $_POST['serie'];
$clave = $_POST['clave'];
$estado = $_POST['estado'];
$proceso = $_POST['proceso'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$usuario = $_POST['usuario'];
$area = $_POST['area'];
$cedis = $_POST['cedis'];
$fechaCo = $_POST['fechaCo'];
$fechaAs = $_POST['fechaAs'];
$comentarios_observaciones = $_POST['comentarios_y_observaciones'];
$status = 1;

// Mapeo de CEDIS a tablas
$cedis_tablas = [
    'PA PACHUCA' => 'pachuca',
    'CA CANCUN' => 'cancun',
    'CH CHIHUAHUA' => 'chihuahua',
    'CL CULIACAN' => 'culiacan',
    'CV CUERNAVACA' => 'cuernavaca',
    'CR CORDOBA' => 'cordoba',
    'GD GUADALAJARA' => 'guadalajara',
    'HR HERMOSILLO' => 'hermosillo',
    'LE LEON' => 'leon',
    'MR MERIDA' => 'merida',
    'MT MONTERREY' => 'monterrey',
    'OX OAXACA' => 'oaxaca',
    'PU PUEBLA' => 'puebla',
    'QR QUERETARO' => 'queretaro',
    'SL SAN LUIS POTOSI' => 'san_luis_potosi',
    'TG TUXTLA GUTIERREZ' => 'tuxtla_gutierrez',
    'VE VERACRUZ' => 'veracruz',
    'VH VILLAHERMOSA' => 'villahermosa'
];

try {
    // Iniciar transacción para la base de datos inventario-serva (MySQLi)
    $conn->autocommit(false); // Desactiva el autocommit

    // Insertar en la base de datos 'serva' (inventario-serva)
    $sql1 = "INSERT INTO form_noBreak (equipo, numero_serie, clave, estado, proceso, marca, 
             modelo, usuario, area, cedis, fechaCo, fechaAs, comentarios_observaciones, status)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param('ssssssssssssssi', $equipo, $serie, $clave, $estado, $proceso, 
                        $marca, $modelo, $usuario, $area, $cedis, 
                        $fechaCo, $fechaAs, $comentarios_observaciones, $status);
    $stmt1->execute();

    // Obtener la conexión a la base de datos 'estadistica' (estadisticas_cedis)
    $connEstadisticas = connectPdo(); // Usando la función PDO del archivo connect_estadisticas.php
    $connEstadisticas->beginTransaction();

    // Determinar la tabla correspondiente al CEDIS
    if (array_key_exists($cedis, $cedis_tablas)) {
        $tabla_cedis = $cedis_tablas[$cedis];
        // Insertar en la tabla del CEDIS correspondiente
        $sql2 = "INSERT INTO $tabla_cedis (clave, area, tipo_equipo, marca, modelo, comentarios_observaciones) 
                 VALUES (?, ?, ?, ?, ?, ?)";
        $stmt2 = $connEstadisticas->prepare($sql2);
        $stmt2->execute([$clave, $area, $equipo, $marca, $modelo, $comentarios_observaciones]);

        // Confirmar ambas transacciones
        $conn->commit(); // Confirmar transacción en MySQLi
        $connEstadisticas->commit(); // Confirmar transacción en PDO

        echo "<script> alert('Sus datos han sido registrados en ambas bases de datos');
                window.location ='../invent/noBreak.php';</script>";
    } else {
        // Deshacer transacción si el CEDIS no es válido
        $conn->rollback(); // Deshacer transacción en MySQLi
        $connEstadisticas->rollBack(); // Deshacer transacción en PDO
        echo "<script> alert('ERROR: CEDIS no válido');
                window.location ='../formulario/formularionoBreak.php';</script>";
    }
} catch (Exception $e) {
    // Si hay un error, deshacer ambas transacciones
    $conn->rollback(); // Deshacer transacción en MySQLi
    if (isset($connEstadisticas)) {
        $connEstadisticas->rollBack(); // Deshacer transacción en PDO
    }
    echo "<script> alert('ERROR: Sus datos NO han sido registrados en ambas bases de datos');
    window.location ='../formulario/formularionoBreak.php';</script>";
}

// Cerrar las conexiones
$conn->close();
$connEstadisticas = null;
?>
