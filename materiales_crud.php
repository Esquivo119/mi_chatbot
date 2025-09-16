<?php
session_start();
if (!isset($_SESSION["docente"])) {
    header("Location: login.php");
    exit();
}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>CRUD Materiales</title>
<link rel="stylesheet" href="styleCrud.css">
</head>
<body>
<div class="crud-container">
    <h2>Gestión de Materiales</h2>
    <a href="material_nuevo.php" class="btn-add">➕ Agregar Material</a>
    <table class="crud-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Nivel</th>
                <th>Categoría</th>
                <th>Archivo PDF</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM libros ORDER BY id DESC";
            $result = $conn->query($sql);
            if($result && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['titulo']."</td>";
                    echo "<td>".$row['autor']."</td>";
                    echo "<td>".$row['nivel']."</td>";
                    echo "<td>".$row['categoria']."</td>";
                    echo "<td><a href='".$row['archivo']."' target='_blank'>Abrir PDF</a></td>";
                    echo "<td>
                            <a class='btn-edit' href='material_editar.php?id=".$row['id']."'>Editar</a>
                            <a class='btn-delete' href='material_eliminar.php?id=".$row['id']."' onclick=\"return confirm('¿Seguro que quieres eliminar este material?');\">Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>No hay materiales disponibles.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
