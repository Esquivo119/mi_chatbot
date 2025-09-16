<?php
$host = "localhost";
$user = "root";   // cambia si tienes otro usuario
$pass = "";       // cambia si tienes clave en tu MySQL
$db   = "abrahamv_colegio";
$port = 3306;

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}
?>
