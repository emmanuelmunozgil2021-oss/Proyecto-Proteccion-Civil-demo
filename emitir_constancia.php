<?php
// 1. configuracion y errores de sesion
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['funcionario_cedula'])) {
    die("<div style='padding:20px; background:#fff3cd; color:#856404; font-family:sans-serif;'><strong>Sesión expirada:</strong> Por favor, ingresa nuevamente desde el login institucional.</div>");
}

// 2. conexion y procesamiento de datos
include("conexion.php");

$cedula_usuario = intval($_SESSION['funcionario_cedula']);
$fecha_hoy = date("Y-m-d");

$codigo_verificacion = strtoupper(substr(md5(uniqid($cedula_usuario, true)), 0, 10));
$motivo_emision = "Tramites Personales";


// insertar los registros
$query_insert = "INSERT INTO constancias_emitidas (cedula_funcionario, fecha_emision, motivo, codigo_verificacion) 
                VALUES ($1, $2, $3, $4)";

$res_insert = @pg_query_params($dbconn, $query_insert, array($cedula_usuario, $fecha_hoy, $motivo_emision, $codigo_verificacion));

if (!$res_insert) {
    echo "<div style='background:#f8d7da; color:#721c24; padding:25px; border:1px solid #f5c6cb; font-family:sans-serif; border-radius:5px; max-width:600px; margin:30px auto;'>";
    echo "<h3 style='margin-top:0;'>❌ Error de Ejecución en Base de Datos</h3>";
    echo "<p><strong>Detalle técnico de PostgreSQL:</strong> " . htmlspecialchars(pg_last_error($dbconn)) . "</p>";
    echo "<a href='panel.php' style='color:#721c24; font-weight:bold;'>Volver al Panel de Control</a>";
    echo "</div>";
    exit();
}

// 4. consulta de datos
$query_datos = "SELECT f.nombre, f.apellido, f.fecha_ingreso, d.nombre_departamento 
                FROM funcionarios f 
                LEFT JOIN departamentos d ON f.id_departamento = d.id_departamento 
                WHERE f.cedula = $1";
$result_datos = pg_query_params($dbconn, $query_datos, array($cedula_usuario));

if (!$result_datos || pg_num_rows($result_datos) == 0) {
    die("<div style='padding:20px; background:#f8d7da; color:#721c24; font-family:sans-serif;'><strong>Error de Integridad:</strong> No se encontraron registros asociados.</div>");
}

$funcionario = pg_fetch_assoc($result_datos);

$fecha_ingreso_formateada = date("d/m/Y", strtotime($funcionario['fecha_ingreso']));
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$mes_actual = $meses[date('n') - 1];

include("constancia_vista.php");
?>