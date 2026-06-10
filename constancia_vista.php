<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constancia Digital - Protección Civil</title>
    <link rel="stylesheet" href="css/constancia_estilos.css">
</head>
<body>

    <div class="constancia-container">
        
        <div class="header-institucional">
            República Bolivariana de Venezuela<br>
            Dirección del Poder Popular para Protección Civil y Administración de Desastres<br>
            Estado Portuguesa
        </div>

        <div class="documento-titulo">CONSTANCIA DE TRABAJO</div>

        <div class="cuerpo-texto">
            Quien suscribe, el Director de Gestión Humana de Protección Civil de la Región Portuguesa, hace constar por medio de la presente que el ciudadano(a) 
            <strong><?php echo htmlspecialchars($funcionario['nombre'] . " " . $funcionario['apellido']); ?></strong>, titular de la Cédula de Identidad N° 
            <strong><?php echo number_format($cedula_usuario, 0, ',', '.'); ?></strong>, presta sus servicios de forma activa en esta institución, adscrito al departamento de 
            <strong><?php echo htmlspecialchars($funcionario['nombre_departamento'] ?? 'Operaciones y Rescate'); ?></strong>, desde su fecha de ingreso formal correspondiente al 
            <strong><?php echo $fecha_ingreso_formateada; ?></strong>. Durante su trayectoria, ha desempeñado sus funciones asignadas con total profesionalismo, ética, rectitud y compromiso institucional.
        </div>

        <div class="cuerpo-texto">
            Constancia que se expide a petición de la parte interesada en la ciudad de Araure, a los <?php echo date('d'); ?> días del mes de <?php echo $mes_actual; ?> del año <?php echo date('Y'); ?>.
        </div>

        <div class="bloque-firma">
            <div class="linea-firma"></div>
            <strong>Dirección de Gestión Humana</strong><br>
            Protección Civil y Administración de Desastres
        </div>

        <div class="footer-seguridad">
            <div><strong>SISTEMA DE GESTIÓN INTERNA - INFORMATICA PNF</strong></div>
            <div>CÓDIGO DIGITAL DE VERIFICACIÓN: <span style="font-family: monospace; font-size:13px; font-weight:bold;"><?php echo $codigo_verificacion; ?></span></div>
        </div>
    </div>

    <div class="btn-print-box">
        <a href="panel.php" class="btn-document" style="background-color: #6c757d; color: white;">Volver al Panel</a>
        <button class="btn-document" style="background-color: #0056b3; color: white;" onclick="window.print()">Imprimir / Guardar PDF</button>
    </div>

</body>
</html>