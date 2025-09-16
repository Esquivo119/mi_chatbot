<?php
session_start();
if (!isset($_SESSION["docente"])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM libros WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
header("Location: materiales_crud.php");
exit();
?>
