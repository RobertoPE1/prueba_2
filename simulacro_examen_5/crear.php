<?php
require "config.php"; // Conexión PDO

$errores = []; // Array para guardar errores

// Si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recogemos los datos del formulario
    $nombre = trim($_POST["nombre"]);
    $calidad = trim($_POST["calidad"]);
    $precio = trim($_POST["precio"]);
    

    // Validación: todos los campos obligatorios
    if ($nombre === "" || $calidad === "" || $precio === "") {
        $errores[] = "Todos los campos son obligatorios.";
    }

    // Si no hay errores, insertamos en la BD
    if (empty($errores)) {

        // Consulta preparada para evitar inyecciones SQL
        $sql = "INSERT INTO fruta (nombre, calidad, precio)
                VALUES (:nombre, :calidad, :precio)";
        $stmt = $pdo->prepare($sql);

        // Ejecutamos la consulta con los valores
        $stmt->execute([
            ":nombre" => $nombre,
            ":calidad" => $calidad,
            ":precio" => $precio,
        ]);

        // Redirigimos al listado
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>fruta</title></head>
<body>

<h1>Añadir fruta</h1>

<!-- Mostramos errores si los hay -->
<?php foreach ($errores as $e): ?>
<p style="color:red;"><?= $e ?></p>
<?php endforeach; ?>

<!-- Formulario -->
<form method="POST">
    nombre: <input type="text" name="nombre"><br><br>
    calidad: <input type="text" name="calidad"><br><br>
    precio: <input type="text" name="precio"><br><br>
    

    <button type="submit">Guardar</button>
</form>

<a href="index.php">Volver</a>

</body>
</html>
