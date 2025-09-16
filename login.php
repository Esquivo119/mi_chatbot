<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['clave'];

    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("❌ Error en la consulta SQL: " . $conn->error);
    }

    $stmt->bind_param("ss", $usuario, md5($password));
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION["docente"] = $usuario;
        header("Location: materiales_crud.php");
        exit();
    } else {
        $error = "Usuario o clave incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Colegio</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h2>Acceso Docentes</h2>
  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="POST">
    <label>Usuario:</label><br>
    <input type="text" name="usuario" required><br>
    <label>Clave:</label><br>
    <input type="password" name="clave" required><br><br>
    <button type="submit">Ingresar</button>
  </form>
</body>
</html>
