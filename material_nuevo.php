<?php
session_start();
if (!isset($_SESSION["docente"])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo    = $_POST['nombre'];   // cambio de nombre → en DB es "titulo"
    $autor     = $_POST['autor'];
    $nivel     = $_POST['nivel'];
    $categoria = $_POST['categoria'];
    $archivo   = $_POST['pdf'];      // en DB es "archivo"

    $sql = "INSERT INTO libros (titulo, autor, nivel, categoria, archivo) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("❌ Error en la consulta SQL: " . $conn->error);
    }

    $stmt->bind_param("sssss", $titulo, $autor, $nivel, $categoria, $archivo);
    $stmt->execute();

    header("Location: materiales_crud.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Libro</title>
  <link rel="stylesheet" href="styleCrud.css">
</head>
<body>
  <h2>Agregar Libro</h2>
  <form method="POST">
    <label>Título:</label><br><input type="text" name="nombre" required><br>
    <label>Autor:</label><br><input type="text" name="autor" required><br>
    <label>Nivel:</label><br>
    <select name="nivel" required>
      <option>Primaria</option>
      <option>Secundaria</option>
    </select><br>
    <label>Categoría:</label><br>
    <select name="categoria" required>
      <option>LIBROS DE MATEMÁTICAS</option>
      <option>LIBROS DE QUÍMICA</option>
      <option>FÍSICA Y CIENCIAS</option>
      <option>DESARROLLO PERSONAL</option>
      <option>CIUDADANÍA Y CÍVICA</option>
      <option>RELIGIÓN</option>
      <option>EDUCACIÓN PARA EL TRABAJO</option>
      <option>ARTE</option>
      <option>EDUCACIÓN FÍSICA</option>
      <option>ÁREA LECTURAS</option>
    </select><br>
    <label>Archivo PDF (URL o ruta):</label><br><input type="text" name="pdf"><br><br>
    <button type="submit">Guardar</button>
  </form>
  <p><a href="materiales_crud.php">⬅ Volver</a></p>
</body>
</html>
