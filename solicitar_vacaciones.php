<?php

session_start();
if (!isset($_SESSION['funcionario_cedula'])) {
    header("Location: index.html");
    exit();
}

include("conexion.php");

$cedula_funcionario = $_SESSION['funcionario_cedula'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fecha_inicio  = $_POST['fecha_inicio'];
    $fecha_fin     = $_POST['fecha_fin'];
    $observaciones = $_POST['observaciones'];
    $fecha_actual  = date("Y-m-d"); 

    if (strtotime($fecha_fin) < strtotime($fecha_inicio)) {
        echo "<script>alert('Error: La fecha de finalización no puede ser anterior a la fecha de inicio.'); window.location.href='solicitar_vacaciones.html';</script>";
        exit();
    }

    $segundos_diferencia = strtotime($fecha_fin) - strtotime($fecha_inicio);
    $dias_solicitados    = ($segundos_diferencia / (60 * 60 * 24)) + 1;

    $query_saldo = "SELECT dias_restantes FROM Control_vacaciones WHERE cedula_funcionario = $1";
    $res_saldo   = pg_query_params($dbconn, $query_saldo, array($cedula_funcionario));
    $saldo_data  = pg_fetch_assoc($res_saldo);

    $dias_disponibles = $saldo_data ? intval($saldo_data['dias_restantes']) : 0;

    if ($dias_solicitados > $dias_disponibles) {
        echo "<script>
                alert('Solicitud Rechazada: Estás solicitando $dias_solicitados días, pero solo dispones de $dias_disponibles días restantes.'); 
                window.location.href='solicitar_vacaciones.html';
            </script>";
        exit();
    }

    $query_insert = "INSERT INTO peticiones_vacaciones (cedula_funcionario, fecha_solicitud, fecha_inicio, fecha_fin, estado_peticion, observaciones) 
                    VALUES ($1, $2, $3, $4, 'Pendiente', $5)";
    
    $params_insert = array($cedula_funcionario, $fecha_actual, $fecha_inicio, $fecha_fin, $observaciones);
    $res_insert    = pg_query_params($dbconn, $query_insert, $params_insert);

    if ($res_insert) {
        echo "<script>
                alert('¡Solicitud registrada con éxito! Tu petición de $dias_solicitados días queda en estado Pendiente por aprobación de la directiva.'); 
                window.location.href='panel.php';
            </script>";
    } else {
        echo "Error al intentar registrar la solicitud en la base de datos.";
    }

} else {
    header("Location: solicitar_vacaciones.html");
    exit();
}
?>