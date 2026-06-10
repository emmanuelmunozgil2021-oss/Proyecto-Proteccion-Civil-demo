<?php
$host     = "localhost";
$port     = "5432";
$dbname   = "Proteccion_civil";
$user     = "postgres"; 
$password = "1234"; 

$connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

$dbconn = pg_connect($connection_string);

if (!$dbconn) {
    die("Error crítico: No se pudo conectar a la base de datos de Protección Civil.");
}

?>