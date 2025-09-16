<?php
session_start();
if (!isset($_SESSION["docente"])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if (!isset($_GET['id'])) {
    die("❌ ID del material no proporcionado.");
}

$id = intval($_GET['id']);

// Obtener datos del material
$sql = "SELECT * FROM libros WHERE id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("❌ Error en la consulta SQL: " . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("❌ Material no encontrado.");
}

$libro = $result->fetch_assoc();

// Actualizar material
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $nivel = $_POST['nivel'];
    $categoria = $_POST['categoria'];
    $archivo = $_POST['archivo'];

    $update = "UPDATE libros SET titulo=?, autor=?, nivel=?, categoria=?, archivo=? WHERE id=?";
    $stmt2 = $conn->prepare($update);
    if (!$stmt2) {
        die("❌ Error en la actualización: " . $conn->error);
    }
    $stmt2->bind_param("sssssi", $titulo, $autor, $nivel, $categoria, $archivo, $id);
    $stmt2->execute();

    header("Location: materiales_crud.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Material</title>
<link rel="stylesheet" href="styleCrud.css">
</head>
<body>
<div class="crud-container">
    <h2>Editar Material</h2>
    <div class="form-container">
        <form method="POST">
            <label>Título:</label>
            <input type="text" name="titulo" value="<?php echo htmlspecialchars($libro['titulo']); ?>" required>

            <label>Autor:</label>
            <input type="text" name="autor" value="<?php echo htmlspecialchars($libro['autor']); ?>" required>

            <label>Nivel:</label>
            <select name="nivel" required>
                <option <?php if($libro['nivel']=='Primaria') echo 'selected'; ?>>Primaria</option>
                <option <?php if($libro['nivel']=='Secundaria') echo 'selected'; ?>>Secundaria</option>
            </select>

            <label>Categoría:</label>
            <select name="categoria" required>
                <option <?php if($libro['categoria']=='LIBROS DE MATEMÁTICAS') echo 'selected'; ?>>LIBROS DE MATEMÁTICAS</option>
                <option <?php if($libro['categoria']=='LIBROS DE QUÍMICA') echo 'selected'; ?>>LIBROS DE QUÍMICA</option>
                <option <?php if($libro['categoria']=='FÍSICA Y CIENCIAS') echo 'selected'; ?>>FÍSICA Y CIENCIAS</option>
                <option <?php if($libro['categoria']=='DESARROLLO PERSONAL') echo 'selected'; ?>>DESARROLLO PERSONAL</option>
                <option <?php if($libro['categoria']=='CIUDADANÍA Y CÍVICA') echo 'selected'; ?>>CIUDADANÍA Y CÍVICA</option>
                <option <?php if($libro['categoria']=='RELIGIÓN') echo 'selected'; ?>>RELIGIÓN</option>
                <option <?php if($libro['categoria']=='EDUCACIÓN PARA EL TRABAJO') echo 'selected'; ?>>EDUCACIÓN PARA EL TRABAJO</option>
                <option <?php if($libro['categoria']=='ARTE') echo 'selected'; ?>>ARTE</option>
                <option <?php if($libro['categoria']=='EDUCACIÓN FÍSICA') echo 'selected'; ?>>EDUCACIÓN FÍSICA</option>
                <option <?php if($libro['categoria']=='ÁREA LECTURAS') echo 'selected'; ?>>ÁREA LECTURAS</option>
            </select>

            <label>Archivo PDF:</label>
            <input type="text" name="archivo" value="<?php echo htmlspecialchars($libro['archivo']); ?>">

            <button type="submit">Actualizar</button>
        </form>
        <p><a href="materiales_crud.php">⬅ Volver</a></p>
    </div>
</div>
</body>
</html>
