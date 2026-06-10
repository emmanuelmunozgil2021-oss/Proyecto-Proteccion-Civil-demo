<?php
session_start();

if (!isset($_SESSION['funcionario_cedula'])) {
    header("Location: index.html");
    exit();
}

include("conexion.php");
$cedula_usuario = intval($_SESSION['funcionario_cedula']);

$query = "SELECT f.nombre, f.apellido, f.fecha_ingreso, d.nombre_departamento 
        FROM funcionarios f 
        LEFT JOIN departamentos d ON f.id_departamento = d.id_departamento 
        WHERE f.cedula = $1";

$result = pg_query_params($dbconn, $query, array($cedula_usuario));
$funcionario = pg_fetch_assoc($result);


$query_vacaciones = "SELECT * FROM control_vacaciones WHERE cedula_funcionario = $1";
$result_vac = pg_query_params($dbconn, $query_vacaciones, array($cedula_usuario));
$vacaciones = pg_fetch_assoc($result_vac);

$dias_disponibles = $vacaciones ? $vacaciones['dias_restantes'] : 0;
$dias_disfrutados = $vacaciones ? $vacaciones['dias_disfrutados'] : 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - Protección Civil</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header class="navbar">
        <div class="nav-brand">Protección Civil Sistema</div>
        <div class="nav-user">
            <span>Bienvenido, <?php echo htmlspecialchars($funcionario['nombre'] . " " . $funcionario['apellido']); ?></span>
            <a href="logout.php" class="btn-logout">Cerrar Sesión</a>
        </div>
    </header>

    <main class="panel-container">
        
        <section class="card profile-card">
            <h3>Datos del Funcionario</h3>
            <hr>
            <p><strong>Cédula:</strong> <?php echo $cedula_usuario; ?></p>
            <p><strong>Departamento:</strong> <?php echo htmlspecialchars($funcionario['nombre_departamento'] ?? 'No asignado'); ?></p>
            <p><strong>Fecha de Ingreso:</strong> <?php echo $funcionario['fecha_ingreso']; ?></p>
        </section>

        <section class="card balance-card">
            <h3>Estado de Vacaciones</h3>
            <hr>
            <div class="balance-grid">
                <div class="balance-item disponible">
                    <span class="number"><?php echo $dias_disponibles; ?></span>
                    <span class="label">Días Restantes</span>
                </div>
                <div class="balance-item disfrutado">
                    <span class="number"><?php echo $dias_disfrutados; ?></span>
                    <span class="label">Días Disfrutados</span>
                </div>
            </div>
        </section>

        <section class="card actions-card">
            <h3>Trámites Disponibles</h3>
            <hr>
            <div class="actions-grid">
                
                <a href="solicitar_vacaciones.php" class="action-box">
                    <div class="icon">📅</div>
                    <h4>Solicitar Vacaciones</h4>
                    <p>Registrar una nueva petición de días libres.</p>
                </a>

                <a href="emitir_constancia.php" class="action-box">
                    <div class="icon">📄</div>
                    <h4>Constancia de Trabajo</h4>
                    <p>Generar y descargar constancia digital con código QR/Verificación.</p>
                </a>

                <a href="conversor_dias.html" class="action-box">
                    <div class="icon">🔄</div>
                    <h4>Conversor de Días</h4>
                    <p>Calcular días de vacaciones según tus años de servicio.</p>
                </a>

            </div>
        </section>

    </main>

</body>
</html>