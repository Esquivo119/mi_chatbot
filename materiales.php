<?php
include 'db.php';
$sql = "SELECT * FROM libros ORDER BY fecha_subida DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Materiales de Estudio</title>
  <link rel="stylesheet" href="styleCrud.css">
</head>
<body>
  <h2>📚 Materiales de Estudio</h2>
  <ul>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <li>
        <strong><?php echo htmlspecialchars($row['titulo']); ?></strong>  
        - <?php echo htmlspecialchars($row['autor']); ?>  
        (<?php echo htmlspecialchars($row['nivel']); ?>, <?php echo htmlspecialchars($row['categoria']); ?>)  
        <a href="<?php echo htmlspecialchars($row['archivo']); ?>" target="_blank">📖 Ver PDF</a>
      </li>
    <?php } ?>
  </ul>
</body>
</html>
