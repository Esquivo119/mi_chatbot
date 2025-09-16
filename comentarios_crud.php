<?php
session_start();
if (!isset($_SESSION['usuario'])) { header("Location: login.php"); exit; }
include 'db.php';

$result = $conn->query("SELECT c.id, c.nombre, c.comentario, c.fecha, l.titulo 
                        FROM comentarios c 
                        JOIN libros l ON c.libro_id=l.id 
                        ORDER BY c.fecha DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Admin Comentarios</title></head>
<body>
<h1>Comentarios</h1>
<a href="materiales_crud.php">⬅️ Volver</a>
<hr>

<table border="1">
<tr><th>ID</th><th>Libro</th><th>Nombre</th><th>Comentario</th><th>Fecha</th><th>Acción</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
  <td><?php echo $row['id']; ?></td>
  <td><?php echo $row['titulo']; ?></td>
  <td><?php echo $row['nombre']; ?></td>
  <td><?php echo $row['comentario']; ?></td>
  <td><?php echo $row['fecha']; ?></td>
  <td>
    <a href="comentario_eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Eliminar comentario?')">🗑️ Eliminar</a>
  </td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
