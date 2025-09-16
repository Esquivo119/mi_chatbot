<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libro_id = $_POST['libro_id'];
    $nombre = $_POST['nombre'];
    $comentario = $_POST['comentario'];

    $stmt = $conn->prepare("INSERT INTO comentarios (libro_id, nombre, comentario) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $libro_id, $nombre, $comentario);
    $stmt->execute();
}
header("Location: materiales.php");
exit;
