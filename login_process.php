<?php

include("conexion.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $cedula     = intval($_POST['cedula']);
    $contrasena = $_POST['contrasena'];

    $query = "SELECT cedula, nombre, apellido, contrasena FROM funcionarios WHERE cedula = $1";
    
    $result = pg_query_params($dbconn, $query, array($cedula));

    if ($result) {
        if (pg_num_rows($result) > 0) {
            $user_data = pg_fetch_assoc($result);
            
            if ($contrasena === $user_data['contrasena']) {
                
                $_SESSION['funcionario_cedula']   = $user_data['cedula'];
                $_SESSION['funcionario_nombre']   = $user_data['nombre'];
                $_SESSION['funcionario_apellido'] = $user_data['apellido'];

                header("Location: panel.php");
                exit();
                
            } else {
                echo "<script>alert('Contraseña incorrecta.'); window.location.href='index.html';</script>";
            }
        } else {
            echo "<script>alert('La cédula ingresada no está registrada.'); window.location.href='index.html';</script>";
        }
    } else {
        echo "Error en la consulta a la base de datos.";
    }
} else {
    header("Location: index.html");
    exit();
}
?>