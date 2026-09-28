<?php
// ACTIVAR ERRORES (solo para depurar)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "config.php"; // Conexión PDO

// -----------------------------
// 1. COMPROBAR QUE LLEGA EL ID
// -----------------------------
if (!isset($_GET["id"])) {
    // Si no llega el ID, no podemos editar nada
    die("ERROR: No se recibió el ID de la fruta.");
}

$id = $_GET["id"];

// -------------------------------------------
// 2. OBTENER la fruta QUE VAMOS A EDITAR
// -------------------------------------------
$sql = "SELECT * FROM fruta WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([":id" => $id]);

$fruta = $stmt->fetch(PDO::FETCH_ASSOC);

// Si no existe el coche, mostramos error
if (!$fruta) {
    die("ERROR: No existe una fruta con el ID $id");
}

$errores = [];

// -------------------------------------------
// 3. SI SE ENVÍA EL FORMULARIO (POST)
// -------------------------------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recogemos los datos enviados por el formulario
    $nombre = trim($_POST["nombre"]);
    $calidad = trim($_POST["calidad"]);
    $precio = trim($_POST["precio"]);
   

    // Validación: todos los campos obligatorios
    if ($nombre === "" || $calidad === "" || $precio === "") {
        $errores[] = "Todos los campos son obligatorios.";
    }

    // -------------------------------------------
    // 4. SI NO HAY ERRORES → ACTUALIZAR REGISTRO
    // -------------------------------------------
    if (empty($errores)) {

        $sql = "UPDATE fruta SET 
                nombre = :nombre,
                calidad = :calidad,
                precio = :precio
                
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        // Ejecutamos la actualización
        $stmt->execute([
            ":nombre" => $nombre,
            ":calidad" => $calidad,
            ":precio" => $precio,
            ":id" => $id
        ]);

        // Redirigimos al listado
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar fruta</title>
</head>
<body>

<h1>Editar fruta</h1>

<!-- Mostrar errores si los hay -->
<?php foreach ($errores as $e): ?>
<p style="color:red;"><?= $e ?></p>
<?php endforeach; ?>

<!-- Formulario con los datos actuales -->
<form method="POST">
    nombre: <input type="text" name="nombre" value="<?= $fruta['nombre'] ?>"><br><br>
    calidad: <input type="text" name="calidad" value="<?= $fruta['calidad'] ?>"><br><br>
    precio: <input type="text" name="precio" value="<?= $fruta['precio'] ?>"><br><br>

    <button type="submit">Actualizar</button>
</form>

<a href="index.php">Volver</a>

</body>
</html>
