<?php
require "config.php"; // Conexión a la BD

// Consulta para obtener todos los registros
$sql = "SELECT * FROM fruta";
$stmt = $pdo->query($sql); // Ejecutamos la consulta
$fruta = $stmt->fetchAll(PDO::FETCH_ASSOC); // Guardamos los resultados
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fruta</title>
</head>
<body>

<h1>Fruta</h1>

<!-- Enlace para añadir un nuevo registro -->
<a href="crear.php">Añadir Fruta</a>

<!-- Tabla donde mostramos los registros -->
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>nombre</th>
        <th>calidad</th>
        <th>precio</th>
        <th>Acciones</th>
    </tr>

    <!-- Recorremos los registros y los mostramos -->
    <?php foreach ($fruta as $f): ?>
    <tr>
        <td><?= $f["id"] ?></td>
        <td><?= $f["nombre"] ?></td>
        <td><?= $f["calidad"] ?></td>
        <td><?= $f["precio"] ?></td>
        

        <td>
            <!-- Botón editar -->
            <a href="editar.php?id=<?= $f['id'] ?>">Editar</a>

            <!-- Botón borrar con confirmación -->
            |
            <a href="borrar.php?id=<?= $f['id'] ?>"
               onclick="return confirm('¿Seguro que deseas eliminar esta fruta?')">
               Eliminar
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
