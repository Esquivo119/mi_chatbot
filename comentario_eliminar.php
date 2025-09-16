<?php
session_start();
if (!isset($_SESSION['usuario'])) { header("Location: login.php"); exit; }
include 'db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM comentarios WHERE id=$id");

header("Location: comentarios_crud.php");
exit;
